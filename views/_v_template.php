<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    

    <!-- JS/CSS File we want on every page -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
    <!-- Google Font Link -->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <!-- Common CSS -->
    <link rel=stylesheet type="text/css" href="/css/master.css">
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	
    <div ="wrapper">
    <div id="header"></div> <!-- end of header -->

    
        <div id='navbar'>
            <ul id="navbar">
            <li><a href='/'>Home</a></li>

            <!-- Menu for users who are logged in -->
            <?php if($user): ?>
            
            <li><a href='/users/logout'>Logout</a></li>
            <li><a href='/users/profile'>Profile</a></li>
            <li><a href='/posts/add'>New Chat</a></li>
            <li><a href='/posts/followerposts'>My Chatter</a></li>
            <li><a href='/posts/users'>Chitchattrs</a></li>
            <li><a href='/posts/index'>All Chatter</a></li>
            

            <!-- Menu options for users who are not logged in -->
            <?php else: ?>

            <li><a href='/users/signup'>Sign up</a></li>
            <li><a href='/users/login'>Log in</a></li>

            <?php endif; ?>
            </ul>
        </div> <!-- end of navbar -->
      
        <!--OPEN CONTENT--> 

        <div id="content">

        <!--start content text-->

	    <?php if(isset($content)) echo $content; ?>

	    <?php if(isset($client_files_body)) echo $client_files_body; ?>
        <br>


         <div id="footer">
         <p>Harvard Extension School CSCI E-15 </p>
         <p>Copyright 2013  Alpana Barua</p>
         </div> <!-- end of footer -->

          </div> <!-- end of content-->

    </div> <!-- end of wrapper -->

</body>
</html>