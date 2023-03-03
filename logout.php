<?php require_once 'functions/header.php'; ?>
<?php require_once 'functions/sessions.php'; ?>
<?= createHeader('Accueil', 'Bienvenue dans la To-Do-List ! Un site très moderne conçu avec Bootstrap 5 !') ?>
<?php require 'elements/layout/navbar.php'; ?>
<?= destroySession() ?>
<?php require 'elements/layout/footer.php'; ?>