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
    <div id='navbar'>
        <ul id="navbar">
        <li><a href='/'>Home</a></li>

        <!-- Menu for users who are logged in -->
        <?php if($user): ?>
            
            <li><a href='/users/logout'>Logout</a></li>
            <li><a href='/users/profile'>Profile</a></li>
            

        <!-- Menu options for users who are not logged in -->
        <?php else: ?>

            <li><a href='/users/signup'>Sign up</a></li>
            <li><a href='/users/login'>Log in</a></li>

        <?php endif; ?>
        </ul>
    </div>

    <br>

	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>
</body>
</html>