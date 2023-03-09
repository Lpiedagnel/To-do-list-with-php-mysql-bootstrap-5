<?php
require_once('libraries/utils.php');

$title = 'Tâche modifiée !';
$description = 'Votre tâche est bien modifiée !';

$pageContent = render('tasks/edit_validation', $title, $description);
echo $pageContent;