<html>
    <head>
        <title>Prueba de PHP</title>
    </head>
    <body>
        <h1>Prueba de PHP</h1>
        <p>Este es un ejemplo de HTML con PHP</p>
        <p><?php echo "Hola Mundo"; ?></p>
        <p><?php echo "La fecha de hoy es " . date("d/m/Y"); ?></p>
    </body>
    <footer>
        <p>&copy; 2023 Mi Sitio Web. Todos los derechos reservados.</p>
    </footer>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</html>

<?php

session_start();
if (!isset($_SESSION['user_role'])) {
    header("Location: login.php");
    exit();
}

echo "<h1>Bienvenido, " . ($_SESSION['user_role'] == 'admin' ? "Administrador" : "Usuario") . "</h1>";
echo "<a href='manage_products.php'>Administrar Productos</a>";

if ($_SESSION['user_role'] == 'admin') {
    echo "<a href='admin_dashboard.php'>Dashboard Admin</a>";
}

$datos = array(
    "nombre" => "Juan",
    "edad" => 30,
    "ciudad" => "Buenos Aires"
);

$json = json_encode($datos);

?>