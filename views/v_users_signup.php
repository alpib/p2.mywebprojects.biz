<div id="contentview">
<form method='POST' action='/users/p_signup'>

     <?php if(isset($error) && $error == 'blank-fields'): ?>
        <div class='error'>
             Signup Failed. All fields are required.
        </div>
        <br>
    <?php endif; ?>

    <?php if(isset($error) && $error == 'user-exists'): ?>
        <div class='error'>
            There is already an account associated with this email. 
            <a href="/users/login">Login</a>
        </div>
        
    <?php endif; ?>

    
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