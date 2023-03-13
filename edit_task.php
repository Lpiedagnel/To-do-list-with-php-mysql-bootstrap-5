<?php
include_once('libraries/models/Task.php');
include_once('libraries/utils.php');

$taskModel = new Task;

$message = null;

if (!isset($_GET['id']) || (!is_numeric($_GET['id']))) {
    $message = "La tâche n'existe pas.";
}

if (!isset($_SESSION['is_connected'])) {
    $message = 'Vous devez être connecté(e) pour modifier une tâche.';
}

if (!$message) {
  // Get data on database
  $id = $_GET['id'];
  $task = $taskModel->findOne($id, 'id');


  // Verify if the task is already checked or not.
  function isChecked (int $previousValue, string $inputValue)
  {
    // Convert SQL bool to string value
    $value = $previousValue === 1 ? 'checked' : 'not_checked';

    // Compare string value to input value
    $isChecked = $value === $inputValue ? 'selected="selected"' : null;

    return $isChecked;
  }

  $title = "Edition de la tâche";
  $description = "Modifiez la tâche ici";
}

// Start render
render('tasks/edit', compact('title', 'description', 'task'));