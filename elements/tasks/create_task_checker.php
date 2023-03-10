<?php
include_once('libraries/Database.php');
$pdo = new Database;
$pdo = $pdo->getPdo();

if (isset($_POST) && (isset($_POST['task_name'])) && (isset($_POST['date']))) {
    // Get data
    $data = [
        'person_in_charge' => $_POST['person'] ? htmlspecialchars($_POST['person']) : null,
        'task_name' => htmlspecialchars($_POST['task_name']),
        'date' => htmlspecialchars($_POST['date'])
    ];
    // Store to database
    $query = "INSERT INTO tasks (person_in_charge, task_name, date) VALUES (:person_in_charge, :task_name, :date)";
    $statement = $pdo->prepare($query);
    $statement->execute($data);
    echo '<p class="my-5">Votre tâche est enregistrée</p>';

} else {
    echo 'Aucune valeur indiquée';
}
