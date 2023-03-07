<?php
require_once('utils/db.php');
$db = connect_to_database();
$query = $db->query("SELECT * FROM `tasks`")->fetchAll();
// Date function

?>
<div class="accordion my-5">
  <?php
    $i = 0;
foreach ($query as $row) {
    $i++;
    $date = date_format(date_create($row['date']), 'D d M y');
    // Start render
    $html =
    "
        <div class='accordion-item'>
          <h2 class='accordion-header' id='heading-$i'>
            <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapse-$i' aria-expanded='true' aria-controls='collapse-$i'>
              $date
            </button>
          </h2>
          <div id='collapse-$i' class='accordion-collapse collapse' aria-labelledby='heading-$i' data-bs-parent='#accordionExample'>
            <div class='accordion-body'>
              <ul>
                  <li><strong>" . $row['person_in_charge'] . ":</strong> " . $row['task_name'];
          
    // Add buttons is user is connected
    if (isset($_SESSION['is_connected'])) {
        $html .=
          "
              <a href='#' class='mx-2 text-success'><i class='fa-solid fa-check'></i></a>
              <a href='edit_task.php?id=" . $row['id'] . "' class='mx-2 text-warning'><i class='fa-solid fa-pen-to-square'></i></a>
              <a class='mx-2 text-danger' href='#' onclick='deleteAlert(" . $row['id'] . ")'><i class='fa-solid fa-trash'></i></a>
            ";
    }

    // Finish render
    $html .=
    "
                </li>
                </ul>
              </div>
            </div>
          </div>
          ";
    // Render html
    echo $html;
}
?>
</div>

<!-- LOGIQUE -->
<!-- 

POUR CHAQUE DATE -> Créer un UL
TROUVER CHAQUE DATE, TROUVER TOUTES LES TÂCHES CORRESPONDANTES

-->