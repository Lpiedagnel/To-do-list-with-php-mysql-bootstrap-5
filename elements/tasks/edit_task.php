<?php

include_once('libraries/Database.php');
$pdo = new Database;
$pdo = $pdo->getPdo();

$error = null;

if (!isset($_GET['id']) || (!is_numeric($_GET['id']))) {
    $error = "La tâche n'existe pas.";
}

if (!isset($_SESSION['is_connected'])) {
    $error = 'Vous devez être connecté(e) pour modifier une tâche.';
}

if (!$error): 
  // Get data on database
  $id = $_GET['id'];
  $query = 'SELECT * FROM tasks WHERE id = :id';
  $taskStatement = $pdo->prepare($query);
  $taskStatement->execute(['id' => $id]);
  $task = $taskStatement->fetch();

  // Verify if the task is already checked or not.
  function isChecked (int $previousValue, string $inputValue)
  {
    // Convert SQL bool to string value
    $value = $previousValue === 1 ? 'checked' : 'not_checked';

    // Compare string value to input value
    $isChecked = $value === $inputValue ? 'selected="selected"' : null;

    return $isChecked;
  }

  // Start tender
  ?>

  <form class="col-6 my-3" action="edit_validation.php?id=<?php echo $_GET['id']; ?>" method="POST">
    <div class="mb-3">
      <label for="task_name" class="form-label">Entrez votre tâche</label>
      <input type="text" class="form-control" name="task_name" value="<?= $task['task_name'] ?>" required>
    </div>
    <div class="mb-3">
      <label for="person" class="form-label">Personne(s) en charge</label>
      <input type="text" class="form-control" name="person" value="<?= $task['person_in_charge'] ?>">
    </div>
    <div class="mb-3">
      <label for="date" class="form-label">Date</label>
      <input type="date" class="form-control" name="date" value="<?= $task['date'] ?>">
    </div>
    <div class="mb-3">
      <label for="is_checked" class="form-label">État</label>
      <select class="form-select" name="is_checked">
        <option value="not_checked" <?= isChecked($task['is_checked'], "not_checked") ?>>Non fait</option>
        <option value="checked" <?= isChecked($task['is_checked'], "checked") ?>>Fait</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Créer la tâche</button>
  </form>

  <?php
  else:
      echo 'Une erreur est survenue : ' . $error;
endif; ?>