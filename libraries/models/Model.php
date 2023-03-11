<?php

require_once('libraries/Database.php');

abstract class Model
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = Database::getPdo();
    }

    public function findOne($value, string $column)
    {

        $result = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE {$column}= :{$column}");
        $result->execute([$column => $value]);
        $item = $result->fetch();

        return $item;
    }


}