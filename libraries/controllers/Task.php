<?php

namespace Controllers;

require_once('libraries/utils.php');
require_once('libraries/models/Task.php');

class Task {
    public function list()
    {
        // Show list
        $model = new \Models\Task();

        $tasks = $model->findAll();

        // Create associative array
        $tasksByDate = [];

        // Loop on each task
        foreach ($tasks as $task) {

            // Get date of current task
            $date = $task['date'];

            // If date doesn't exist on associative array, create one.
            if (!isset($tasksByDate[$date])) {
                $tasksByDate[$date] = [];
            }

            // Add task on current date.
            $tasksByDate[$date][] = $task;
        }

        $title = 'Accueil';
        $description = 'Bienvenue dans la To-Do-List ! Un site très moderne conçu avec Bootstrap 5 !';

        render('tasks/list', compact('title', 'description', 'tasks', 'tasksByDate'));
    }

    public function edit()
    {

    }

    public function delete()
    {

    }
}