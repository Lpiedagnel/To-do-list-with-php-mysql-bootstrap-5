<?php

include_once('libraries/models/Model.php');

class Task extends Model
{
    public function getAll(): array
    {
        $tasks = $this->pdo->query("SELECT * FROM `tasks`")->fetchAll();
        return $tasks;
    }

    public function getOne(int $id): array
    {
        $query = 'SELECT * FROM tasks WHERE id = :id';
        $taskStatement = $this->pdo->prepare($query);
        $taskStatement->execute(['id' => $id]);
        $task = $taskStatement->fetch();

        return $task;
    }

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

    public function delete(int $id): void
    {
        $query = "DELETE FROM tasks WHERE id = $id";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
    }
}