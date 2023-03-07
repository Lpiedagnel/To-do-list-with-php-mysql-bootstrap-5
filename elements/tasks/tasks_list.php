<?php
require_once('utils/db.php');
require_once('functions/tasks.php');
$db = connect_to_database();
$tasks = $db->query("SELECT * FROM `tasks`")->fetchAll();

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