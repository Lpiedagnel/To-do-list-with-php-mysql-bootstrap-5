<?php

include_once('libraries/models/Model.php');

class Task extends Model
{
    protected $table = 'tasks';

    public function insert(array $data): void
    {
        $query = "INSERT INTO tasks (person_in_charge, task_name, date) VALUES (:person_in_charge, :task_name, :date)";
        $statement = $this->pdo->prepare($query);
        $statement->execute($data);
    }

    public function update(int $id, array $data): void
    {
        $query = "UPDATE tasks SET person_in_charge = :person_in_charge, task_name = :task_name, date = :date, is_checked = :is_checked WHERE id = $id";
        $statement = $this->pdo->prepare($query);
        $statement->execute($data);
    }
}