<h1>Edit your profile</h1>
<form action="/users/p_editprofile" method="post" accept-charset="utf-8">
  First name<br>
  <input type="text" name="first_name" value="<?=$user->first_name;?>"><br>
  Last name<br>
  <input type="text" name="last_name" value="<?=$user->last_name;?>"><br>
  Email<br>
  <input type="text" name="email" value="<?=$user->email;?>"><br>
  Password<br>
  <input type="text" name="password"><br>

 
  Photo<br>
  <input type='file' accept='image' name='avatar'><br>
  Bio<br>
  <textarea name="bio" id= rows="8" cols="40"></textarea><br>
</form>