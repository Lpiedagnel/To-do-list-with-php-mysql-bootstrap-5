<?php

include_once('libraries/models/User.php');
$userModel = new User;

// Store input into variables
$first_name = htmlspecialchars($_POST['firstName']);
$last_name = htmlspecialchars($_POST['lastName']);
$email = htmlspecialchars($_POST['email']);
$job = $_POST['job'] ? htmlspecialchars($_POST['job']) : null;
$password = htmlspecialchars($_POST['password']);
$password_confirmation = htmlspecialchars($_POST['passwordConfirmation']);

$error = null;
// Check if all fields are complete
if (empty($first_name) || (empty($last_name)) || (empty($email)) || (empty($password)) || (empty($password_confirmation))) {
    $error = 'Vous devez rentrer toutes les valeurs !';
}

// Check password
if ($password !== $password_confirmation) {
    $error = 'Les mots de passe doivent êtres identiques !';
}

// Check email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = 'Vous devez rentrer un email valide';
}

// Password length
if (strlen($password) <= 4) {
    $error = "Vous devez choisir un mot de passe d'au moins 4 caractères !";
}

if (!$error) {
    $checkEmail = $userModel->findOne($email, 'email');

    if ($checkEmail !== false) {
        echo "L'utilisateur existe déjà.";
    } else {
        // Hash
        $password_hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
        // Get data
        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'job' => $job,
            'password' => $password_hash,
        ];
        // Store to database
        $userModel->registerOne($data);

        echo '<p class="my-5">Vous êtes enregistré(e) ! <br> Vous allez être redirigé à la liste des tâches.</p>';

        // Back to index
        header('Location: connexion.php');
    }
} else {
    echo 'Une erreur s\'est produite : '.$error;
}
