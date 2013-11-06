<div id="contentview">
        
    <h2>Profile for: <?=$user->first_name?></h2>
    <p> <label for='first_name'>First Name: </label><?=$user->first_name?></p>
    <p> <label for='last_name'>Last Name: </label><?=$user->last_name?></p>
    <p> <label for='email'>Email: </label><?=$user->email?></p>
    

    <?php if ($user->avatar != "/uploads/avatars/defaultimage.jpeg"): ?>
        <div id="cropped">
        <img src="<?=$user->avatar?>" alt="<?=$user->first_name?> <?=$user->last_name?>" width="300" height="300">
        </div>
                    
    <?php endif; ?>

    <form role="form" method='POST' enctype="multipart/form-data" action='/users/new_photo_upload/'>
        Upload a photo for your profile:
        <br>
        <input type="file" name="avatar" id="avatar">
        <br>
         <input type="submit" name="Update">
        <br>
        </form>


    <?php if(isset($myPosts)) : ?>
        <h4><?=$user->first_name?>'s Chatter</h4>
        <?=$myPosts?>
    <?php endif; ?>

    <?php if(isset($allPosts)) : ?>
        <h4>Recent Chitchat</h4>
        <?=$allPosts?>
    <?php endif; ?>   
        
</div>        
