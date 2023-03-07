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

?>
<div class="accordion my-5">
<?php

$i = 0;
foreach ($tasksByDate as $date => $tasks) {
    $i++;
    $dateFormat = date_format(date_create($date), 'D d M y');
    echo 
    "
    <div class='accordion-item'>
    <h2 class='accordion-header' id='heading-$i'>
      <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapse-$i' aria-expanded='true' aria-controls='collapse-$i'>
        $dateFormat
      </button>
    </h2>
    <div id='collapse-$i' class='accordion-collapse collapse' aria-labelledby='heading-$i' data-bs-parent='#accordionExample'>
      <div class='accordion-body'>
        <ul>
    ";
    foreach($tasks as $task) {
        echo 
        "<li><strong>" . $task['person_in_charge'] . ":</strong> " . $task['task_name'];

        if (isset($_SESSION['is_connected'])) {
            echo 
            "
              <a href='#' class='mx-2 text-success'><i class='fa-solid fa-check'></i></a>
              <a href='edit_task.php?id=" . $task['id'] . "' class='mx-2 text-warning'><i class='fa-solid fa-pen-to-square'></i></a>
              <a class='mx-2 text-danger' href='#' onclick='deleteAlert(" . $task['id'] . ")'><i class='fa-solid fa-trash'></i></a>
            ";
        }

        echo "</li>";
    }
    
    echo 
    "
    </ul>
    </div>
  </div>
</div>
    ";
}
?>
</div>