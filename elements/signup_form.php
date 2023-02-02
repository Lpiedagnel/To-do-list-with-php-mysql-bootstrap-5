<div class="row">
  <form class="my-3 col-6" action="register.php" method="post">
    <div class="mb-3">
      <label for="email" class="form-label">Adresse Email</label>
      <input type="email" name="email" class="form-control" id="email" required>
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Votre nom</label>
      <input type="text" name="name" class="form-control" id="name">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Mot de passe</label>
      <input type="password" name="password" class="form-control" id="password" required>
    </div>
    <div class="mb-3">
      <label for="passwordConfirmation" class="form-label">Confirmer mot de passe</label>
      <input type="password" name="passwordConfirmation" class="form-control" id="passwordConfirmation" required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" required>S'inscrire'</button>
  </form>
</div>
<div class="row">
  <div class="col-6 py-5">
    <p>Déjà un compte ? <a href="connexion.php">Se connecter !</a></p>
</div>
