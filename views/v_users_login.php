<div id="contentview">
<form method='POST' action='/users/p_login'>

     <?php if(isset($error)): ?>
        <div class='error'>
            Login failed. Please double check your email and password.
        </div>
        <br>
    <?php endif; ?>
    
    <h3>
    Please login here:
    </h3>

    Email<br>
    <input type='text' name='email'>

    <br><br>

    Password<br>
    <input type='password' name='password'>

    <br><br>

    <input type='submit' value='Log in'>

</form>
</div>