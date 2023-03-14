<div class="row">
  <form class="my-3 col-6" action="index.php?controller=user&action=login" method="POST">
    <div class="mb-3">
      <label for="email" class="form-label">Adresse Email</label>
      <input type="email" class="form-control" name="email">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Mot de passe</label>
      <input type="password" class="form-control" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
  </form>
</div>
<div class="row">
  <div class="col-6 py-5">
    <p>Pas de compte ? <a href="index.php?controller=user&action=signupform">S'inscrire !</a></p>
  </div>
</div>