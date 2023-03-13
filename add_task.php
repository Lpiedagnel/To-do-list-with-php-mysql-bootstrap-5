<?php
require_once('libraries/utils.php');

$title = 'Ajouter une tâche !';
$description = 'Ajouter une tâche dans la To-Do-List !';

render('tasks/add', compact('title', 'description'));