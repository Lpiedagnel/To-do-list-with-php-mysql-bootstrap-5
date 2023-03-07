<?php
require_once('utils/db.php');
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

// Render for each date
foreach ($tasksByDate as $date => $tasks) {
    echo '<h2>' . $date . '</h2>';

    echo '<ul>';
    foreach ($tasks as $task) {
        echo '<li>' . $task['task_name'] . ' - ' . $task['person_in_charge'] . '</li>';
    }
    echo '</ul>';
}