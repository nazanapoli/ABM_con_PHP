<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <style>
        header {
            background-color: #333;
            color: white;
            padding: 10px;
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
        a {
            color: white;
            text-decoration: none;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        p {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        label {
            margin-top: 10px;
        }
        input, textarea {
            padding: 5px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button {
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        button:hover {
            background-color: #555;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<header>
        <ul class="ul-header">
            <li><a href="index.php"><img src="images/logo.png" alt="Logo" class="img-logo"></a></li>
            <li><a href="product.php">Productos</a></li>
            <li><a href="contact.php">Contacto</a></li>
        </ul>
    </header>
    <h1>Catalogo de productos</h1>
    <p>Bienvenido a la página de inicio</p>
    <form action="product.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="precio">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio" required>
        
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"></textarea>
        
        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" required>
    
        <button type="submit">Crear Producto</button>
    </form>

    <footer>
        <p>&copy; 2024 - Programación Web II</p>
    </footer>
</body>

<?php
    session_start();
    include 'test_db_connection.php'; // Incluye la conexión

    // // Verificar si el usuario es admin
    // if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "admin") {
    //     die("Acceso denegado.");
    // }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $descripcion = $_POST["descripcion"];
        $stock = $_POST["stock"];

        $sql = "INSERT INTO producto (nombre, precio, descripcion, stock) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("sdsi", $nombre, $precio, $descripcion, $stock);
            $stmt->execute();
            echo "Producto creado exitosamente";
            $stmt->close();
        } else {
            echo "Error al crear producto: " . $conn->error;
        }
    }
    //Una vez enviado el formulario no se reenvía al recargar, se redirige a la misma página
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        header("Location: " . $_SERVER["PHP_SELF"]);
        exit();
    }

    $conn->close();
?>