<?php
require_once('libraries/utils.php');

$title = 'S\'inscrire';
$description = 'S\'inscrire à la To-do-List pour voir et ajouter des tâches !';

$pageContent = render('auth/signup_form', $title, $description);
echo $pageContent;