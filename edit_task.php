<?php
include_once('libraries/models/Task.php');
$taskModel = new Task;

$error = null;

if (!isset($_GET['id']) || (!is_numeric($_GET['id']))) {
    $error = "La tâche n'existe pas.";
}

if (!isset($_SESSION['is_connected'])) {
    $error = 'Vous devez être connecté(e) pour modifier une tâche.';
}

if (!$error) {
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

  // Start tender
  render('tasks/list', compact('title', 'tasks', 'tasksByDate'));

} else {
    echo 'Une erreur est survenue : ' . $error;
}