<?php 
require_once('functions/menu.php');
require_once('functions/tasks.php');
require_once('functions/sessions.php');

?>
<!-- Header -->
<!doctype html>
<html lang="fr">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?= $title ?> </title>
    <meta name="description" content=" <?= $description ?>">
    <script src="https://kit.fontawesome.com/ef8b364259.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand" href="./index.php">To Do List</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?= createMenu('nav-link') ?>
      </ul>
      <span class="navbar-text">
        <?= getName() ?>
      </span>
    </div>
  </div>
</nav>

<!-- Content -->
<div class="container">
    <?= $pageContent ?>
</div>

<!-- Footer -->
<footer class="bg-dark pt-5">
    <div class="col-3 mx-auto bg-dark">
        <ul>
            <?= createMenu('link-light') ?>
        </ul>
    </div>
    <p class="text-light text-center">
      @<?= date('Y') ?></p>
</footer>

<!-- Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/ef8b364259.js" crossorigin="anonymous"></script>
<script src="js/auth.js"></script>
</body>
</html>