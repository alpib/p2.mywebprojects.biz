
<?php foreach($posts as $post): ?>

        <article>
            <img src='/uploads/avatars/<?=$post['avatar']?>'>
                
            <h4><?=$post['first_name']?> <?=$post['last_name']?> posted:</h4>

            <?=$post['content']?>
            <h5><time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
                 <?=Time::display(($post['created']), '', ($post['timezone'])) ?>
            </time></h5>

        </article>

<?php endforeach; ?>