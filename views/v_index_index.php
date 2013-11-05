<div id="contentview">

        <?php if($user): 
                
            # Send to Profile Page
            Router::redirect('/users/profile');
        ?>

        <?php else: ?>

           
             <h1>Welcome to <?=APP_NAME?> <br></h1>
             <p>
             At Chitchat you can share your thoughts with 
             fellow chatters and read what everyone else is
             chattering about. <br><br>

             This is a simple microblog where you can: <br>
              -Sign up for a chatter account <br>
              -Create 'chats' <br>
              -View a list of other chatters<br>
              - Follow other chatter's chats<br>
              -Unfollow chatters you're following<br>
              -View a list of all chats of chatters you're following </p><br><br>

                        <a href="/users/login">Login</a> if you are already a registered chatter.<br>
                        or <a href="/users/signup">Signup</a> to create a new account 
                
        
        <?php endif; ?>

</div>


