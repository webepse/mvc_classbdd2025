<?php $title = "404 Page non trouvée"; ?>
<?php header("http/1.0 404 Not Found"); ?>

<?php ob_start(); ?>

<h1><?= $errorMessage ?></h1>



<?php $content = ob_get_clean(); ?>

<?php require "base.php" ?>