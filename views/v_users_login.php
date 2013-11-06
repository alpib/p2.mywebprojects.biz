<div id="contentview">
<form method='POST' action='/users/p_login'>
     <h5>
     <?php if(isset($error) && $error == 'both'): ?>
        <div class='error'>
            Login failed. Please double check your email and password.
        </div>
        <br>
    <?php endif; ?> 
    <?php if(isset($error) && $error == 'email'): ?>
        <div class='error'>
            Login failed. Please enter your email.
        </div>
        <br>
    <?php endif; ?> 

    <?php if(isset($error) && $error == 'pword'): ?>
        <div class='error'>
            Login failed. Please enter your password.
        </div>
        <br>
    <?php endif; ?> 

        <?php if(isset($error) && $error == 'error'): ?>
        <div class='error'>
            Login failed. Email or password invalid.
        </div>
        <br>
    <?php endif; ?> 

    <h5>
     
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