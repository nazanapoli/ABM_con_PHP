<?php
$host = 'localhost';        // Default for XAMPP
$user = 'root';             // Default MySQL username
$password = '';             // Default MySQL password (empty string)
$database = 'prueba'; // Replace with your database name

// Attempt to connect to the MySQL database
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connection successful to database: " . $database;
}
?>