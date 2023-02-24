<?php
require_once('config/db.php');
$db = connect_to_database();
$query = $db->query("SELECT * FROM `task`")->fetchAll();
// Date function

?>
<div class="accordion my-5" id="accordionExample">
  <?php
    foreach ($query as $row) {
        $date = date_format(date_create($row['date']), 'D d M y');
        echo <<<TASK
<div class="accordion-item">
  <h2 class="accordion-header" id="headingOne">
    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      {$date}
    </button>
  </h2>
  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
    <div class="accordion-body">
      <ul>
          <li><strong>{$row['person_in_charge']} :</strong> {$row['task_name']} <a href="#" class="mx-3 text-success"><i class="fa-solid fa-check"></i></a><a class="mx-3 text-danger" href="#"><i class="fa-solid fa-trash"></i></a></li>
      </ul>
    </div>
  </div>
</div>
TASK;
    }
?>

  <!--
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Lundi 16 Janvier 2023
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <ul>
              <li><strong>Tâche 1 :</strong> 10H - 12H <a href="#" class="mx-3 text-success"><i class="fa-solid fa-check"></i></a><a class="mx-3 text-danger" href="#"><i class="fa-solid fa-trash"></i></a></li>
              <li><strong>Tâche 2 :</strong> 14H - 16H <a href="#" class="mx-3 text-success"><i class="fa-solid fa-check"></i></a><a class="mx-3 text-danger" href="#"><i class="fa-solid fa-trash"></i></a></li>
              <li><strong>Tâche 3 :</strong> 16H - 18H <a href="#" class="mx-3 text-success"><i class="fa-solid fa-check"></i></a><a class="mx-3 text-danger" href="#"><i class="fa-solid fa-trash"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
   -->
</div>