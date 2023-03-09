<?php 
require_once('functions/sessions.php');
require_once('functions/menu.php');
require_once('functions/tasks.php');

getSession(); 

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
<!-- Start container -->
<div class="container">