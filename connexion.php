<?php
require_once('libraries/utils.php');

$title = 'Connexion';
$description = 'Connectez-vous pour voir la To-do-list !';

$pageContent = render('auth/login_form', $title, $description);
echo $pageContent;