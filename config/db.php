<?php
require_once('config/config.php');

function connect_to_database()
{
    try {
        $conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        return $conn;
    } catch (PDOException $e) {
        echo 'Error to connected to the database: ' . $e->getMessage();
        die();
    }
}
