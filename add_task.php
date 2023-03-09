<?php
require_once('libraries/utils.php');

$title = 'Ajouter une tâche !';
$description = 'Ajouter une tâche dans la To-Do-List !';

$pageContent = render('tasks/create_task_form', $title, $description);
echo $pageContent;