<?php
require_once('libraries/utils.php');

$title = 'Enregistrement';
$description = 'Enregistrement du compte';

$pageContent = render('auth/login_checker', $title, $description);
echo $pageContent;