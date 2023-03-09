<?php
require_once('libraries/utils.php');

$title = 'Enregistrement';
$description = 'Enregistrement du compte';

$pageContent = render('auth/signup_checker', $title, $description);
echo $pageContent;