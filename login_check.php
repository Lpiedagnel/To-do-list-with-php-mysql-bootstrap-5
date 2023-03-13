<?php

include_once('libraries/models/User.php');
include_once('libraries/utils.php');

$userModel = new User();

// Store input into variables
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

$message = null;

// Check if all fields are complete
if (empty($email) || (empty($password))) {
    $message = 'Vous devez rentrer toutes les valeurs !';
}

// Check password
if (!$message) {
    
    $user = $userModel->findOne($email, 'email');

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['is_connected'] = true;
        $message = "Connexion réussie !";
        header("location: index.php");
        exit();
    } else {
        $message = 'L\'utilisateur n\'a pas été trouvé. Vérifiez le mot de passe ou l\'adresse mail.';
    }
}

$title = 'Connexion';
$description = 'Vérification de la connexion';

render('message', compact('title', 'description', 'message'));