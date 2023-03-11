<?php

require_once('libraries/Database.php');

abstract class Model
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Database::getPdo();
    }
}