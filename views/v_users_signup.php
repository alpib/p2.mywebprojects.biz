<div id="contentview">
<form method='POST' action='/users/p_signup'>
    <h4>
    <div class='error'>
    <?php if(isset($error_email)) echo $error_email; ?>        
    <?php if(isset($error)) echo $error; ?>        
    </div></h4>

    <h3>
    Please signup here:
    </h3>

    First Name<br>
    <input type='text' name='first_name'>
    <br>

    Last Name<br>
    <input type='text' name='last_name'>
    <br>

    Email<br>
    <input type='text' name='email'>

    <br><br>

    Password<br>
    <input type='password' name='password'>

    <br><br>

    <input type='submit' value='Register'>

</form>
</div>