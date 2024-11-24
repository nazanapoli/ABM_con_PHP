<html>
    <head>
        <title>Bienvenido</title>
    </head>
    <body>
        <header>
            <ul>
                <li><a href=""><img src="" alt="">Logo</a></li>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Productos</a></li>
                <li><a href="contact.php">Contacto</a></li>
            </ul>
        </header>
        <h1>Bienvenido</h1>
        <p>Este es un ejemplo de HTML con PHP</p>
        <p><?php echo "Hola Mundo"; ?></p>
        <p><?php echo "La fecha de hoy es " . date("d/m/Y"); ?></p>
    </body>
    <footer>
        <p>&copy; 2024 Mi Sitio Web. Todos los derechos reservados.</p>
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

?>