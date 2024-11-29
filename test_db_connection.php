<?php
$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "web_ii";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

?>