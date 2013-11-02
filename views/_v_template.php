<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- Common JS/CSS -->
    <link rel=stylesheet type="text/css" href="/css/master.css">
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	
<div id="container">
    <div id="header">
    <br><br>
    <div id="col1">
            <div id="apptitle">
            <li><a href='/'>Chitchat</a></li>
            </div> <!-- end of apptitle --> 
    </div> <!-- end of col1 --> 

    <div id="col2">
        <div id='navbar'>
            <ul id="navbar">
            <li><a href='/'>Home</a></li>

            <!-- Menu for users who are logged in -->
            <?php if($user): ?>
            
            <li><a href='/users/logout'>Logout</a></li>
            <li><a href='/users/profile'>Profile</a></li>
            <li><a href='/posts/add'>Chat</a></li>
            <li><a href='/posts/users'>Chitchattrs</a></li>
            <li><a href='/posts/index'>All Chatter</a></li>
            

            <!-- Menu options for users who are not logged in -->
            <?php else: ?>

            <li><a href='/users/signup'>Sign up</a></li>
            <li><a href='/users/login'>Log in</a></li>

            <?php endif; ?>
            </ul>
        </div> <!-- end of navbar -->
    </div> <!-- end of col2 -->    
    </div> <!-- end of header -->
    
    <br>

	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>
    <br>
    <br>
    <br>
    <div id="footer">
         <p>Copyright 2013</p>
    </div>

</div> <!-- end container div -->
</body>
</html>