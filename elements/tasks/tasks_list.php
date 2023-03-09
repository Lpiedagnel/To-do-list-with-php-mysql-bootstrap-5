<?php
require_once('functions/tasks.php');
include_once('libraries/database.php');

$pdo = new Database;
$pdo = $pdo->getPdo();

$tasks = $pdo->query("SELECT * FROM `tasks`")->fetchAll();

// Create associative array
$tasksByDate = [];

// Loop on each task
foreach ($tasks as $task) {

    // Get date of current task
    $date = $task['date'];

    // If date doesn't exist on associative array, create one.
    if (!isset($tasksByDate[$date])) {
        $tasksByDate[$date] = [];
    }

    // Add task on current date.
    $tasksByDate[$date][] = $task;
}

echo renderTask($tasksByDate);