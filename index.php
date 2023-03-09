<?php
require_once('libraries/utils.php');

$title = 'Accueil';
$description = 'Bienvenue dans la To-Do-List ! Un site très moderne conçu avec Bootstrap 5 !';

$pageContent = render('tasks/tasks_list', $title, $description);
echo $pageContent;