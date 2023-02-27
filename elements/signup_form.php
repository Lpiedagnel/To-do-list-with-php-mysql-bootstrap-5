<div class="row">
  <form class="my-3 col-6" action="signup_validation.php" method="POST">
    <div class="mb-3">
      <label for="lastName" class="form-label">Nom</label>
      <input type="text" name="lastName" class="form-control"required>
    </div>
    <div class="mb-3">
      <label for="firstName" class="form-label">Prénom</label>
      <input type="text" name="firstName" class="form-control"required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" class="form-control"required>
    </div>
    <div class="mb-3">
      <label for="job" class="form-label">Fonction dans l'entreprise</label>
      <input type="text" name="job" class="form-control">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Mot de passe</label>
      <input type="password" name="password" class="form-control"required>
    </div>
    <div class="mb-3">
      <label for="passwordConfirmation" class="form-label">Confirmer mot de passe</label>
      <input type="password" name="passwordConfirmation" class="form-control"required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" required>S'inscrire'</button>
  </form>
</div>
<div class="row">
  <div class="col-6 py-5">
    <p>Déjà un compte ? <a href="connexion.php">Se connecter !</a></p>
</div>
