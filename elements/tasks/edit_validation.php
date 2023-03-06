<?php
include_once('utils/db.php');
$pdo = connect_to_database();

$error = null;

if (!isset($_GET['id']) || (!is_numeric($_GET['id']))) {
    $error = "La tâche n'existe pas.";
}

if (!isset($_SESSION['is_connected'])) {
    $error = 'Vous devez être connecté(e) pour modifier une tâche.';
}

if (!$error) {
    if (isset($_POST) && (isset($_POST['task_name'])) && (isset($_POST['date']))) {
        $id = $_GET['id'];
        // Get data
        $data = [
            'person_in_charge' => $_POST['person'] ? htmlspecialchars($_POST['person']) : null,
            'task_name' => htmlspecialchars($_POST['task_name']),
            'date' => htmlspecialchars($_POST['date'])
        ];
        // Store to database
        $query = "UPDATE tasks SET person_in_charge = :person_in_charge, task_name = :task_name, date = :date WHERE id = $id";
        $statement = $pdo->prepare($query);
        $statement->execute($data);
        header('Location: index.php');
    
    } else {
        echo 'Aucune valeur indiquée';
    }
} else {
    echo "Une erreur est survenue : " . $error;
}

