<?php

include_once('libraries/models/Model.php');

class User extends Model
{ 
    protected $table = 'users';

    public function registerOne(array $data): void
    {

        $query = 'INSERT INTO users (first_name, last_name, email, job, password) VALUES (:first_name, :last_name, :email, :job, :password)';
        $statement = $this->pdo->prepare($query);
        $statement->execute($data);
    }

}