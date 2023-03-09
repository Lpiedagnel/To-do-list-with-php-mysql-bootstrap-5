<?php
require_once('libraries/utils.php');

$title = "Déconnexion";
$description = "Vous êtes bien déconnecté !";

$pageContent = render('auth/logout', $title, $description);
echo $pageContent;