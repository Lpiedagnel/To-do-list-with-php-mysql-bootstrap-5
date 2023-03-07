<?php
function renderTask($tasksByDate) 
{
    $html = null;
    
    // Create accordion
    $html .= "<div class='accordion my-5'>";

    // Create accordion item
    $i = 0;
    foreach ($tasksByDate as $date => $tasks) {
        $i++;
        $dateFormat = date_format(date_create($date), 'D d M y');
        $html .= 
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

        // Create item for each task
        foreach($tasks as $task) {
            $html .= "<li><strong>" . $task['person_in_charge'] . ":</strong> " . $task['task_name'];
    
            // If user is connected
            if (isset($_SESSION['is_connected'])) {
                $html .=
                "
                  <a href='#' class='mx-2 text-success'><i class='fa-solid fa-check'></i></a>
                  <a href='edit_task.php?id=" . $task['id'] . "' class='mx-2 text-warning'><i class='fa-solid fa-pen-to-square'></i></a>
                  <a class='mx-2 text-danger' href='#' onclick='deleteAlert(" . $task['id'] . ")'><i class='fa-solid fa-trash'></i></a>
                ";
            }
            // Close item
            $html .= "</li>";
        }
        // Close accordion item
        $html .=
        "
        </ul>
        </div>
      </div>
    </div>
        ";
    }
    // Close accordion
    $html .= "</div>";

    return $html;
}