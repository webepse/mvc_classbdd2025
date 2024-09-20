<?php $title = $post->title; ?>

<?php ob_start() ?>

<h2><?= $post->title ?></h2>
<em><?=  $post->creation_date ?></em>
<a href="index.php?action=listPost">Retour</a>
<div>
    <?= nl2br($post->content) ?>
</div>
<h4>Les commentaires</h4>
<?php foreach($comments as $comment) : ?>
    <div class="comments">
        <div class="info"><strong><?= $comment->author ?></strong> à <?= $comment->mydate ?></div>
        <div class="content">
            <?= nl2br($comment->comment) ?>
        </div>
    </div>
<?php endforeach ?>


<?php $content = ob_get_clean(); ?>

<?php require "base.php" ?>