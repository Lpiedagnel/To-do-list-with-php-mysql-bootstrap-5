<?php
include_once('libraries/models/Task.php');
include_once('libraries/utils.php');

$taskModel = new Task;

if (isset($_POST) && (isset($_POST['task_name'])) && (isset($_POST['date']))) {
    // Get data
    $data = [
        'person_in_charge' => $_POST['person'] ? htmlspecialchars($_POST['person']) : null,
        'task_name' => htmlspecialchars($_POST['task_name']),
        'date' => htmlspecialchars($_POST['date'])
    ];
    // Store to database
    $taskModel->insert($data);
    $message = "Votre tâche est enregistrée.";

} else {
    $message = 'Aucune valeur indiquée';
}

$title = "Validation de la tâche";
$description = "Validation de la tâche";

render('message', compact('title', 'description', 'message'));