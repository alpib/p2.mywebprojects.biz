<?php
class practice_controller extends base_controller {
    
    public function  test1() {

    	#echo 'This is a test';
    	echo APP_PATH. "<br>";

        #require(APP_PATH.'/libraries/image.php');

        $imageObj = new Image('http://placekitten.com/1000/1000'); 

        $imageObj -> resize(200,200);

        #$imageObj -> display();

    }

    public function test2() {

        # Static
    	echo Time::now();
    }
    
    public function test_db() {

        /*
        #INSERT Practice
    	$q = 'INSERT INTO users SET first_name = "Albert",
    	last_name = "Einstein" ';

    	echo $q;
    	*/
    	/*
    	$q = 'UPDATE users
    	SET email = "Albert@aol.com" 
    	WHERE first_name = "Albert"';

    	DB::instance(DB_NAME)->query($q);
        */

    	$new_user = Array( 
    		'first_name' => 'Albert',
    		'last_name' => 'Einstein',
    		'email' => 'albert@gmail.com',
    		);

    	DB::instance(DB_NAME)->insert('users', $new_user);

    }

    public function test_db2() {
    	$_POST['first_name'] = 'Albert';
    	$_POST = DB::instance(DB_NAME)->sanitize($_POST);

        $q = "SELECT email
              FROM users
              WHERE first_name = '".$_POST['first_name']."' 
              "; 

        echo DB::instance(DB_NAME)->select_field($q);

    }


    # Create an array of 1 or many client files to be included in the head
    $client_files_head = Array(
        '/css/master.css'
        );

    # Use load_client_files to generate the links from the above array
    $this->template->client_files_head = Utils::load_client_files($client_files_head);   


} # eoc

#some html


    #for nav bar
	<!--Navigation menu -->
    <ul id="nav">

    <li><a href="#">Home</a></li>

    <li><a href="#">About</a></li>

    <li><a href="#">Services</a></li>

    <li><a href="#">Products</a></li>

    <li><a href="#">Sitemap</a></li>

    <li><a href="#">Help</a></li>

    <li><a href="#">Contact Us</a></li>

</ul>

	<!-- Common CSS/JSS -->
    <link rel="stylesheet" href="/css/master.css" type="text/css">

