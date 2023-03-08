<?php
function renderTask($tasksByDate) 
{
    $html = null;
    
    // Create accordion
    $html .= "<div class='accordion my-5'>";

    // Create accordion item
    
    $i = 0;
    foreach ($tasksByDate as $date => $tasks) {

        // Format date in french with ICU library and convert the first letter of string on uppercase with ucfirst.
        $fmt = new IntlDateFormatter('fr_FR', IntlDateFormatter::NONE, IntlDateFormatter::NONE);
        $fmt->setPattern('EEEE dd MMMM YYYY');
        $dateFormat = $fmt->format(new DateTime($date));
        $dateFormat = ucfirst($dateFormat);

        $i++;      
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
                  <a href='edit_task.php?id=" . $task['id'] . "' class='mx-2 text-warning'><i class='fa-solid fa-pen-to-square'></i></a>
                  <a class='mx-2 text-danger' href='#' onclick='deleteAlert(" . $task['id'] . ")'><i class='fa-solid fa-trash'></i></a>
                ";
            }
            // Check if task is done
            if ($task['is_checked'] === 1) {
                $html .= "<i class='fa-solid fa-check mx-2 text-success'></i>";
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