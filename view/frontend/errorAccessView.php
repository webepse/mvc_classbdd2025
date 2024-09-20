<?php $title = "403 Forbidden"; ?>
<?php header("http/1.0 403 Forbidden"); ?>

<?php ob_start(); ?>

<h1><?= $errorMessage ?></h1>



<?php $content = ob_get_clean(); ?>

<?php require "base.php" ?>