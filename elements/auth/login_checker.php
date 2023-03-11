<?php
include_once('libraries/models/User.php');
$userModel = new User();

// Store input into variables
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

$error = null;

// Check if all fields are complete
if (empty($email) || (empty($password))) {
    $error = 'Vous devez rentrer toutes les valeurs !';
}

// Check password
if (!$error) {
    
    $user = $userModel->findOne($email, 'email');

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['is_connected'] = true;
        header("location: index.php");
        exit;
    } else {
        $error = 'L\'utilisateur n\'a pas été trouvé. Vérifiez le mot de passe ou l\'adresse mail.';
        echo '<p class="my-5">' . $error . '</p>';
    }
}
