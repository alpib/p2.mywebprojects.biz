<?php if(isset($user_name)): ?>
    <h1>This is the profile for <?=$user_name?></h1>
<?php else: ?>
    <h2>No user specified</h2>
<? endif; ?>