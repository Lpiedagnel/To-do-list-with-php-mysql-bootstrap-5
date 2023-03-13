<?php
require_once('libraries/utils.php');

$title = 'S\'inscrire';
$description = 'S\'inscrire à la To-do-List pour voir et ajouter des tâches !';

render('auth/signup_form',compact('title', 'description'));