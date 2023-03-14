<form class="col-6 my-3" action="index.php?controller=task&action=add" method="POST">
  <div class="mb-3">
    <label for="task_name" class="form-label">Entrez votre tâche</label>
    <input type="text" class="form-control" name="task_name" required>
  </div>
  <div class="mb-3">
    <label for="person" class="form-label">Personne(s) en charge</label>
    <input type="text" class="form-control" name="person">
  </div>
  <div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" class="form-control" name="date" value="<?= date('Y-m-d') ?>">
  </div>
  <button type="submit" class="btn btn-primary">Créer la tâche</button>
</form>