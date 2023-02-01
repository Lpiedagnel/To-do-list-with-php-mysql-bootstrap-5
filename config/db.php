<?php
include('config.php');

// Create connection
$conn = new mysqli(DB_HOST, DB_NAME, DB_PASSWORD);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->$connect_error);
}
echo "Connected successfully";
?>