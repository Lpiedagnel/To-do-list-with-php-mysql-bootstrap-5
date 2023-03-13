<?php
include_once('libraries/models/Task.php');
include_once('libraries/utils.php');

$taskModel = new Task;

$message = null;
$link = '<a href="index.php">Retournez à la liste des tâches.</a>';

if (!isset($_GET['id']) || (!is_numeric($_GET['id']))) {
    $message = "La tâche n'existe pas.";
}

if (!isset($_SESSION['is_connected'])) {
    $message = 'Vous devez être connecté(e) pour supprimer une tâche.';
}

if (!$message) {
    $id = htmlspecialchars($_GET['id']);
    // Delete to database
    $taskModel->delete($id);

    $message = "La tâche a bien été supprimée.";
} else {
    $message = "Une erreur est survenue";
}

$title = "Suppression d'une tâche";
$description = "Une tâche a été supprimée.";

render('message', compact('title', 'description', 'message'));
