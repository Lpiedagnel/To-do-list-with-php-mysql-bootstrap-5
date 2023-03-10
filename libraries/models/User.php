<?php

include_once('libraries/Database.php');

class User 
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getPdo();
    }
    
    public function findOneByEmail (string $email) 
    {

        $result = $this->pdo->prepare("SELECT * FROM users WHERE email= :email");
        $result->execute(['email' => $email]);
        $user = $result->fetch();

        return $user;
    }

    public function checkByEmail (string $email)
    {

        $userWithEmail = $this->pdo->prepare('SELECT email FROM users WHERE email = :email');
        $userWithEmail->bindParam(':email', $email);
        $userWithEmail->execute();

        return $userWithEmail;
    }

    public function registerOne (array $data) 
    {

        $query = 'INSERT INTO users (first_name, last_name, email, job, password) VALUES (:first_name, :last_name, :email, :job, :password)';
        $statement = $this->pdo->prepare($query);
        $statement->execute($data);
    }

}