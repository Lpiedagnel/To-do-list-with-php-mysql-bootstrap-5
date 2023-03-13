
<form class="col-6 my-3" action="edit_check.php?id=<?php echo $_GET['id']; ?>" method="POST">
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