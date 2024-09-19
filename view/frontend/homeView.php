<?php $title = "Homepage"; ?>

<?php ob_start(); ?>

<h1>Bienvenue sur mon site!</h1>



<?php $content = ob_get_clean(); ?>

<?php require "base.php" ?>