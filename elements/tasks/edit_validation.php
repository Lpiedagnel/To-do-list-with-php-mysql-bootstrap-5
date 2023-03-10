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
    if (isset($_POST) && (isset($_POST['task_name'])) && (isset($_POST['date'])) && isset($_POST['is_checked'])) {
        $id = $_GET['id'];
        // Is checked
        // $isChecked = $_POST['is_checked'] === 'checked' ? 1 : 0;
        if ($_POST['is_checked'] === 'checked') {
            $isChecked = 1;
        } else {
            $isChecked = 0;
        }
        // Get data
        $data = [
            'person_in_charge' => $_POST['person'] ? htmlspecialchars($_POST['person']) : null,
            'task_name' => htmlspecialchars($_POST['task_name']),
            'date' => htmlspecialchars($_POST['date']),
            'is_checked' => $isChecked
        ];
        // Store to database
        $taskModel->update($id, $data);
        header('Location: index.php');
    
    } else {
        echo 'Aucune valeur indiquée';
    }
} else {
    echo "Une erreur est survenue : " . $error;
}

