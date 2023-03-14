<?php

namespace Controllers;

require_once('libraries/utils.php');
require_once('libraries/autoload.php');


class User extends Controller {

    protected $modelName = \Models\User::class;

    public function signupForm()
    {
        $title = 'S\'inscrire';
        $description = 'S\'inscrire à la To-do-List pour voir et ajouter des tâches !';

        render('auth/signup_form',compact('title', 'description'));
    }

    public function signup()
    {
        // Store input into variables
        $first_name = htmlspecialchars($_POST['firstName']);
        $last_name = htmlspecialchars($_POST['lastName']);
        $email = htmlspecialchars($_POST['email']);
        $job = $_POST['job'] ? htmlspecialchars($_POST['job']) : null;
        $password = htmlspecialchars($_POST['password']);
        $password_confirmation = htmlspecialchars($_POST['passwordConfirmation']);

        $message = null;
        // Check if all fields are complete
        if (empty($first_name) || (empty($last_name)) || (empty($email)) || (empty($password)) || (empty($password_confirmation))) {
            $message = 'Vous devez rentrer toutes les valeurs !';
        }

        // Check password
        if ($password !== $password_confirmation) {
            $message = 'Les mots de passe doivent êtres identiques !';
        }

        // Check email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = 'Vous devez rentrer un email valide';
        }

        // Password length
        if (strlen($password) <= 4) {
            $message = "Vous devez choisir un mot de passe d'au moins 4 caractères !";
        }

        if (!$message) {
            $checkEmail = $this->model->findOne($email, 'email');

            if ($checkEmail !== false) {
                $message = "L'utilisateur existe déjà.";
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
                $this->model->insert($data);

                // Back to index
                $message = "Enregistrement du compte réussi !";
            }
        }

        $title = 'Enregistrement';
        $description = 'Enregistrement du compte. ';

        render('message', compact('title', 'description', 'message'));
    }

    public function loginForm()
    {
        $title = 'Connexion';
        $description = 'Connectez-vous pour voir la To-do-list !';

        render('auth/login_form', compact('title', 'description',));
    }

    public function login()
    {
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
            
            $user = $this->model->findOne($email, 'email');
        
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
    }

    public function logout()
    {
        session_destroy();

        $title = "Déconnexion";
        $description = "Vous êtes bien déconnecté !";

        $message = "Vous avez été déconnecté.";

        $pageContent = render('message', compact('title', 'description', 'message'));
    }
}