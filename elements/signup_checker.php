<?php
include_once('config/db.php');
$pdo = connect_to_database();

if 
    (isset($_POST) && 
    (isset($_POST['firstName'])) && 
    (isset($_POST['lastName'])) &&
    (isset($_POST['email'])) &&
    (isset($_POST['password'])) &&
    (isset($_POST['passwordConfirmation']))
    ) {
    // Hash
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 12]);
    // Get data
    $data = [
        'first_name' => htmlspecialchars($_POST['firstName']),
        'last_name' => htmlspecialchars($_POST['lastName']),
        'email' => htmlspecialchars($_POST['email']),
        'job' => $_POST['job'] ? htmlspecialchars($_POST['job']) : null,
        'password' => $password
    ];
    // Store to database
    $query = "INSERT INTO users (first_name, last_name, email, job, password) VALUES (:first_name, :last_name, :email, :job, :password)";
    $statement = $pdo->prepare($query);
    $statement->execute($data);
    echo '<p class="my-5">Vous êtes enregistré(e) !</p>';
} else {
    echo 'Aucune valeur indiquée';
}
