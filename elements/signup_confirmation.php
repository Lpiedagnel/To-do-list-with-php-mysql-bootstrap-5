<?php require_once('config/db.php');

if (isset($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($name) && !empty($email) && !empty($password)) {

        $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
        $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param("sss", $name, $email, $password);
        $result = $stmt->execute();

        if ($result) {
            echo "Enregistrement réussi !";
        } else {
            echo "Echec lors de l'enregistrement";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
