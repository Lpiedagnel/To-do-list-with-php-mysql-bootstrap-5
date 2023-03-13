<?php
require_once('libraries/utils.php');

$title = 'Connexion';
$description = 'Connectez-vous pour voir la To-do-list !';

render('auth/login_form', compact('title', 'description',));