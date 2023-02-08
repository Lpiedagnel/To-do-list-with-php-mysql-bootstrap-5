<?php require_once('config/db.php');

if (isset($_POST)) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Récupération des données du formulaire
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // Récupération du hash stocké dans la base de données
    $query = "SELECT password FROM users WHERE email='$email'";
    $result = mysqli_query($db, $query);
    $hash = mysqli_fetch_assoc($result)['password'];

    // Vérification des informations d'identification
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($db, $query);
    if (password_verify($password, $hash)) {
        // Redirection vers une page protégée
        header("Location: index.php");
    } else {
        // Affichage d'un message d'erreur
        echo "Nom d'utilisateur ou mot de passe incorrect";
    }
}
