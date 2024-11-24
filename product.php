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
    <footer>
        <p>&copy; 2024 - Programación Web II</p>
    </footer>
</body>