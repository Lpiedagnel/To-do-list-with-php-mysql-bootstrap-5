<?php
include_once('utils/db.php');
$pdo = connect_to_database();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);

    // Delete to database
    $query = "DELETE FROM tasks WHERE id = $id";
    $statement = $pdo->prepare($query);
    $statement->execute();
    echo 'La tâche a bien été supprimée !';
}