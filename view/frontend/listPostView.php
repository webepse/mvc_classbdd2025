<?php $title = "Mon blog" ?>

<?php ob_start() ?>

<h2>Ma page d'article</h2>
<?php //var_dump($posts); ?>

<?php foreach($posts as $post) : ?>
    <div class="news">
        <h3><a href="<?= $post->getURL() ?>"><?= $post->title ?></a></h3>
        <em>le <?= $post->creation_date ?></em>
        <div>
            <?= $post->getExtrait() ?>
        </div>
    </div>

<?php endforeach; ?>


<?php $content = ob_get_clean() ?>

<?php require "base.php" ?>
