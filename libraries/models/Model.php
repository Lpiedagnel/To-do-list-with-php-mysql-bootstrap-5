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

    public function findAll(): array
    {
        $query = "SELECT * FROM {$this->table}";

        $items = $this->pdo->query($query)->fetchAll();
        return $items;
    }

    public function delete(int $id): void
    {
        $query = "DELETE FROM {$this->table} WHERE id = $id";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
    }

}