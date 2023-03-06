<?php
include_once('utils/db.php');
$pdo = connect_to_database();

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
    $result = $pdo->prepare("SELECT * FROM users WHERE email= :email");
    $result->execute(['email' => $email]);
    $user = $result->fetch();
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
