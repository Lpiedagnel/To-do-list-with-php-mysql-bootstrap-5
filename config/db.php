<?php
include('config.php');

// Create connection
$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->$connect_error);
}
?>