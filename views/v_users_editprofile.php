<div id='contentview'>
  <form method='POST' enctype="multipart/form-data" action='/users/p_editprofile'>
    <h2>Edit Your Profile <?=$user->first_name?></h2>

     <h5><div class='error'>
      <?php if(isset($error_email)) echo $error_email; ?>        
      <?php if(isset($error)) echo $error; ?>        
    </div></h5>

    <h3>All Fields Are Required</h3>
    <label for='first_name'>First Name:</label><br>
    <input type='text' name='first_name' value='<?=$first_name?>'>
    <br><br>

    <label for='last_name'>Last Name:</label><br>
    <input type='text' name='last_name' value='<?=$last_name?>'>
    <br><br>

    <label for='email'>Email:</label><br>
    <input type='text' name='email' value='<?=$email?>'>
    <br><br>

    <label for='avatar'>Photo:</label><br>
    <input type='file' name='avatar'>
    <br><br>

    <input type='submit' name='submit' value='Save Changes'>

  </form>
</div>