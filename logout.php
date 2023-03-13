<?php
require_once('libraries/utils.php');

session_destroy();

$title = "Déconnexion";
$description = "Vous êtes bien déconnecté !";

$message = "Vous avez été déconnecté.";

$pageContent = render('message', compact('title', 'description', 'message'));