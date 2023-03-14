<?php

namespace Controllers;

require_once('libraries/utils.php');
require_once('libraries/models/Task.php');
require_once('functions/tasks.php');

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

    public function addForm()
    {
        require_once('libraries/utils.php');

        $title = 'Ajouter une tâche !';
        $description = 'Ajouter une tâche dans la To-Do-List !';

        render('tasks/add', compact('title', 'description'));
    }

    public function add()
    {
        $taskModel = new \Models\Task;

        if (isset($_POST) && (isset($_POST['task_name'])) && (isset($_POST['date']))) {
            // Get data
            $data = [
                'person_in_charge' => $_POST['person'] ? htmlspecialchars($_POST['person']) : null,
                'task_name' => htmlspecialchars($_POST['task_name']),
                'date' => htmlspecialchars($_POST['date'])
            ];
            // Store to database
            $taskModel->insert($data);
            $message = "Votre tâche est enregistrée.";
        
        } else {
            $message = 'Aucune valeur indiquée';
        }
        
        $title = "Validation de la tâche";
        $description = "Validation de la tâche";
        
        render('message', compact('title', 'description', 'message'));
    }

    public function editForm()
    {
        $taskModel = new \Models\Task;

        $message = null;
        
        if (!isset($_GET['id']) || (!is_numeric($_GET['id']))) {
            $message = "La tâche n'existe pas.";
        }
        
        if (!isset($_SESSION['is_connected'])) {
            $message = 'Vous devez être connecté(e) pour modifier une tâche.';
        }
        
        if (!$message) {
          // Get data on database
          $id = $_GET['id'];
          $task = $taskModel->findOne($id, 'id');
        
          $title = "Edition de la tâche";
          $description = "Modifiez la tâche ici";
        }
        
        // Start render
        render('tasks/edit', compact('title', 'description', 'task'));
    }

    public function edit()
    {
        $taskModel = new \Models\Task;

        $message = null;
        
        if (!isset($_GET['id']) || (!is_numeric($_GET['id']))) {
            $message = "La tâche n'existe pas.";
        }
        
        if (!isset($_SESSION['is_connected'])) {
            $message = 'Vous devez être connecté(e) pour modifier une tâche.';
        }
        
        if (!$message) {
            if (isset($_POST) && (isset($_POST['task_name'])) && (isset($_POST['date'])) && isset($_POST['is_checked'])) {
                $id = $_GET['id'];
                // Is checked
                // $isChecked = $_POST['is_checked'] === 'checked' ? 1 : 0;
                if ($_POST['is_checked'] === 'checked') {
                    $isChecked = 1;
                } else {
                    $isChecked = 0;
                }
                // Get data
                $data = [
                    'person_in_charge' => $_POST['person'] ? htmlspecialchars($_POST['person']) : null,
                    'task_name' => htmlspecialchars($_POST['task_name']),
                    'date' => htmlspecialchars($_POST['date']),
                    'is_checked' => $isChecked
                ];
                // Store to database
                $taskModel->update($id, $data);
                header('Location: index.php');
            
            } else {
                $message = 'Aucune valeur indiquée';
            }
        }
        
        $title = "Vérification de la modification";
        $description = "Modification de la tâche";
        
        render('message', compact('title', 'description', 'message'));
    }

    public function delete()
    {
        $taskModel = new \Models\Task;

        $message = null;
        $link = '<a href="index.php">Retournez à la liste des tâches.</a>';
        
        if (!isset($_GET['id']) || (!is_numeric($_GET['id']))) {
            $message = "La tâche n'existe pas.";
        }
        
        if (!isset($_SESSION['is_connected'])) {
            $message = 'Vous devez être connecté(e) pour supprimer une tâche.';
        }
        
        if (!$message) {
            $id = htmlspecialchars($_GET['id']);
            // Delete to database
            $taskModel->delete($id);
        
            $message = "La tâche a bien été supprimée.";
        } else {
            $message = "Une erreur est survenue";
        }
        
        $title = "Suppression d'une tâche";
        $description = "Une tâche a été supprimée.";
        
        render('message', compact('title', 'description', 'message'));
    }
}