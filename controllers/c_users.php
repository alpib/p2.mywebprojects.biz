<?php
class users_controller extends base_controller {

    public function __construct() {
        # Call the base constructor
        parent::__construct();
        #echo "users_controller construct called<br><br>";
    } 

    public function index() {
        echo "This is the index page";
    }

    public function signup() {
        //echo "This is the signup page";
        # Setup view
        $this->template->content = View::instance('v_users_signup');
        $this->template->title   = "Signup";

        # Pass data to the view
        $this->template->content->error = $error;

        # Render template
        echo $this->template;
    }

    public function p_signup() {

        # Sanitize Data Entry
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        //Check input for blank fields
        foreach($_POST as $field => $value){
           if(empty($value)) {
                //If any fields are blank, send error message
                 Router::redirect("/users/signup/blank-fields");  
           }
        }  

        # Set up Email / Password Query
        $q = "SELECT * FROM users WHERE email = '".$_POST['email']."'"; 
        
        # Query Database
        $user_exists = DB::instance(DB_NAME)->select_rows($q);

        # Check if email exists in database
        if(!empty($user_exists)){
            
                # needs to pass some error message along...
                Router::redirect('/users/signup/user-exists');
        } 
        else {

        # More data we want stored with the user
        $_POST['created']  = Time::now();
        $_POST['modified'] = Time::now();

        # Encrypt the password  
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);            

        # Create an encrypted token via their email address and a random string
        $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

        # Insert this user into the database
        $user_id = DB::instance(DB_NAME)->insert('users', $_POST);

        # Setup view
        $this->template->content = View::instance('v_users_signupsuccess');
        # Login view within this view        
        $this->template->content->login = View::instance('v_users_login');
        $this->template->title   = "Signed Up";

        # Display template
        echo $this->template;

       }

    } #end of p_signup

    public function login($error = NULL) {
        //echo "This is the login page";
        # Setup view
        $this->template->content = View::instance('v_users_login');
        $this->template->title   = "Login";

        # Pass data to the view
        $this->template->content->error = $error;

        # Render template
        echo $this->template;

    }

    public function p_login() {

        # Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        # Hash submitted password so we can compare it against one in the db
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        # Search the db for this email and password
        # Retrieve the token if it's available
        $q = "SELECT token 
          FROM users 
          WHERE email = '".$_POST['email']."' 
          AND password = '".$_POST['password']."'";

        $token = DB::instance(DB_NAME)->select_field($q);
        
        if(!$token) {  # If no matching token, login failed
        Router::redirect("/users/login/error"); # Send back to the login page 
        } 

        else {   # login succeeded! 
        /* 
        Store this token in a cookie using setcookie()
        Important Note: *Nothing* else can echo to the page before setcookie is called
        Not even one single white space.
        param 1 = name of the cookie
        param 2 = the value of the cookie
        param 3 = when to expire
        param 4 = the path of the cooke (a single forward slash sets it for the entire domain)
        */
        setcookie("token", $token, strtotime('+1 year'), '/');

        # Send them to the main page - or whever you want them to go
        Router::redirect("/");
        }

    }

    public function logout() {
        //echo "This is the logout page";
        # Generate and save a new token for next login
        $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

        # Create the data array we'll use with the update method
        # In this case, we're only updating one field, so our array only has one entry
        $data = Array("token" => $new_token);

        # Do the update
        DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

        # Delete their token cookie by setting it to a date in the past - effectively logging them out
        setcookie("token", "", strtotime('-1 year'), '/');

        # Send them back to the main index.
        Router::redirect("/");
    }

    public function profile($user_name = NULL) {

        # If user is blank, they're not logged in; redirect them to the login page
        if(!$this->user) {
        Router::redirect('/users/login');
        }

        # If they weren't redirected away, continue:

        # Setup view
        $this->template->content = View::instance('v_users_profile');
        
        $this->template->content->followerposts = View::instance('v_posts_followerposts');
        $this->template->title   = "Profile of".$this->user->first_name;

        # Render template
        echo $this->template;
  
    }

    public function uploadphoto($error = NULL) {
        
                # Sanitize Data Entry
            $_POST = DB::instance(DB_NAME)->sanitize($_POST);
                
        # Upload Image
        if ($_FILES['avatar']['error'] == 0) {
            
            $avatar = Upload::upload($_FILES, "/uploads/avatars/", array('jpg', 'jpeg', 'gif', 'png'), $this->user->user_id);

            if($avatar == 'Invalid file type.') {
                
                # Error
                Router::redirect("/users/profile/error"); 
            }
            
            else {
                
                # Upload Image
                $data = Array('avatar' => $avatar);
                DB::instance(DB_NAME)->update('users', $data, 'WHERE user_id = '.$this->user->user_id);

                # Resize and Save Image
                $imageObj = new Image($_SERVER['DOCUMENT_ROOT'].'/uploads/avatars/'.$avatar);
                $imageObj->resize(150,150);
            }
        }
        
        else {
        
            # Error
            Router::redirect("/users/profile/error");  
        }

        # Send to Profile Page
        Router::redirect('/users/profile'); 
    }  
           

} # end of the class