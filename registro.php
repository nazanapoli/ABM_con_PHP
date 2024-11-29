<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        header {
            background-color: #333;
            color: white;
            padding: 10px;
        }
        a {
            color: white;
            text-decoration: none;
        }
        .ul-header {
            display: flex;
            justify-content: space-between;
            list-style: none;
            padding: 0;
        }
        .ul-header li {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .img-logo {
            width: 50px;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        h2 {
            color: #333;
            font-weight: lighter;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input {
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #555;
        }
    </style>
    </head>
        <body>
            <header>
                <ul class="ul-header">
                    <li>
                        <a href="index.php">
                            <img class="img-logo" src="img/logo.png" alt="Logo">
                        </a>
                    </li>
                    <li>
                        <a href="product.php">Productos</a>
                    </li>
                    <li>
                        <a href="contacto.php">Contacto</a>
                    </li>
                </ul>
            </header>
            <div class="container">
                <h1>Registro</h1>
                <form action="registro.php" method="POST">
                    <label for="usuario">Usuario:</label>
                    <input type="text" name="usuario" id="usuario" required>
                    <label for="contrasenya">Contraseña:</label>
                    <input type="password" name="contrasenya" id="contrasenya" required>
                    <label for="correo">Correo:</label>
                    <input type="correo" name="correo" id="correo" required>
                    <button type="submit">Registrarse</button>
                </form>
            </div>
        </body>
        <footer>
            <p>© 2024 - Programación Web II</p>
        </footer>
</html>

<?php
session_start();
include 'test_db_connection.php'; // Incluye la conexión

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $usuario = trim($_POST['usuario']);
    $contrasenya = trim($_POST['contrasenya']);
    $correo = trim($_POST['correo']);

    // Validar campos no vacíos
    if (empty($usuario) || empty($contrasenya) || empty($correo)) {
        echo "Todos los campos son obligatorios.";
        exit();
    }

    // Verificar si el usuario o correo ya existen
    $sql_check = "SELECT * FROM usuario WHERE usuario = ? OR correo = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("ss", $usuario, $correo);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        echo "El nombre de usuario o correo ya están registrados.";
        $stmt_check->close();
        exit();
    }
    $stmt_check->close();

    // Preparar la consulta para insertar
    $sql = "INSERT INTO usuario (usuario, contrasenya, correo) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sss", $usuario, $contrasenya, $correo);
        if ($stmt->execute()) {
            echo "¡Registro exitoso!";
        } else {
            echo "Error al registrar: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }

    // Redirigir después del registro para evitar reenvío de formulario
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit();
}

$conn->close();
?>
