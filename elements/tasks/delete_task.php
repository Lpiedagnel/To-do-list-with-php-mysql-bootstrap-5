<?php

include_once('libraries/models/Task.php');
$taskModel = new Task;

$error = null;
$link = '<a href="index.php">Retournez à la liste des tâches.</a>';

if (!isset($_GET['id']) || (!is_numeric($_GET['id']))) {
    $error = "La tâche n'existe pas.";
}

if (!isset($_SESSION['is_connected'])) {
    $error = 'Vous devez être connecté(e) pour supprimer une tâche.';
}

if (!$error) {
    $id = htmlspecialchars($_GET['id']);
    // Delete to database
    $taskModel->delete($id);

    echo 'La tâche a bien été supprimée ! '.$link;
} else {
    echo 'Une erreur est survenue : '.$error.' '.$link;
}
