<?php
include('config.php');

// Create connection
$msqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if ($msqli->connect_error) {
    die("Connection failed: " . $msqli->$connect_error);
}
?>