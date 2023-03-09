<?php
require_once('libraries/utils.php');

$title = 'Tâche créée';
$description = 'Nouvelle tâche crée !';

$pageContent = render('tasks/create_task_checker', $title, $description);
echo $pageContent;