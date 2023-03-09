<?php
require_once('libraries/utils.php');

$title = 'Modification d\'une tâche';
$description = 'Vous pouvez modifier une tâche ici.';

$pageContent = render('tasks/edit_task', $title, $description);
echo $pageContent;