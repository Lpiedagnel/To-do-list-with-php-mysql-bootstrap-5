<?php require_once 'functions/header.php'; ?>
<?= createHeader('Connexion', 'Connexion réussie !') ?>
<?php require 'elements/layout/navbar.php'; ?>
<?php require 'elements/auth/login_confirmation.php'; ?>
<?php require 'elements/layout/footer.php'; ?>

<?php
require_once('libraries/utils.php');

$title = 'Connexion';
$description = 'Connexion réussie !';

$pageContent = render('auth/login_confirmation', $title, $description);
echo $pageContent;