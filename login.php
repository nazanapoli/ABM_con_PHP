<?php
session_start();
include 'db_connection.php'; // archivo con la conexión a la BD

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta para recuperar el usuario con el nombre de usuario ingresado
    $query = $pdo->prepare("SELECT * FROM usuarios WHERE username = ?");
    $query->execute([$username]);
    $user = $query->fetch();

    // Si el usuario existe, verificamos la contraseña
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['role']; // 'admin' o 'standard'
        header("Location: home.php");
    } else {
        echo "Credenciales incorrectas";
    }
}