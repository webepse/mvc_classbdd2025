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
<?php if(isset($_GET['error'])) : ?>

    <div class='error'>Une erreur est survenue (code erreur: <?= $_GET['error'] ?> )</div>

<?php endif ?>

<form action="index.php?action=addComment&id=<?= $post->id ?>" method="POST">
    <div>
        <label for="author">Auteur: </label>
        <input type="text" name="author" id="author">
    </div>
    <div>
        <label for="comment">Commentaire: </label>
        <textarea name="comment" id="comment"></textarea>
    </div>
    <div>
        <input type="submit" value="Envoyer">
    </div>
</form>


<?php $content = ob_get_clean(); ?>

<?php require "base.php" ?>