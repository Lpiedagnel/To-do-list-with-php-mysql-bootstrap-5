<?php
include_once('libraries/models/Task.php');
$taskModel = new Task;

$tasks = $taskModel->findAll();

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