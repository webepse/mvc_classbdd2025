<?php $title = $post->title; ?>

<?php ob_start() ?>

<h2><?= $post->title ?></h2>
<em><?=  $post->creation_date ?></em>
<a href="index.php?action=listPost">Retour</a>
<div>
    <?= nl2br($post->content) ?>
</div>


<?php $content = ob_get_clean(); ?>

<?php require "base.php" ?>