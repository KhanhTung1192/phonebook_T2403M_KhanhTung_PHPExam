<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$dbname = 'phonebook';

$mysqli = new mysqli($host, $user, $password, $dbname);

try {
    if ($mysqli->connect_error) {
        throw new Exception("Database Connection Failed: " . $mysqli->connect_error);
    }
} catch (Exception $e) {
    echo $e->getMessage();
    exit(); // Terminate script if connection fails
}
?>