<?php
require_once('libraries/utils.php');

$title = 'Suppression de la tâche';
$description = 'Suppression de la tâche';

$pageContent = render('tasks/delete_task', $title, $description);
echo $pageContent;