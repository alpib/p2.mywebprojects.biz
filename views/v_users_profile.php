<div id="contentview">
        
    <h2>Profile for: <?=$user->first_name?></h2>
    <p> <label for='first_name'>First Name: </label><?=$user->first_name?></p>
    <p> <label for='last_name'>Last Name: </label><?=$user->last_name?></p>
    <p> <label for='email'>Email: </label><?=$user->email?></p>
    
    <h1><?=$user->avatar?></h1>
        
    <?php if(isset($avatar)) : ?>
        <img src='<?=$user->avatar?>'>
    <?php endif; ?>


    <?php if(isset($myPosts)) : ?>
        <h4><?=$user->first_name?>'s Chatter</h4>
        <?=$myPosts?>
    <?php endif; ?>

    <?php if(isset($allPosts)) : ?>
        <h4>Recent Chitchat</h4>
        <?=$allPosts?>
    <?php endif; ?>   
        
</div>        
