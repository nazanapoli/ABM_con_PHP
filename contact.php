<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
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
        input, textarea {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        textarea {
            resize: none;
        }
        button {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .response {
            margin-top: 20px;
            background: #e9ffe9;
            border: 1px solid #b6fcb6;
            padding: 10px;
            border-radius: 5px;
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
    <div class="container">
        <h1>Contacto</h1>
        <h2>Dejanos tu mensaje y será respondido a la brevedad</h2>
        <form method="POST" action="">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Mensaje:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit">Enviar</button>
        </form>

        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = htmlspecialchars(trim($_POST['name']));
                $email = htmlspecialchars(trim($_POST['email']));
                $message = htmlspecialchars($_POST['message']);
                session_start();
                $_SESSION['response'] = [
                    'name' => $name,
                    'email' => $email,
                    'message' => $message
                ];
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            }
            session_start();
            if (!empty($_SESSION['response'])) {
                $response = $_SESSION['response'];
                echo '<div class="response">';
                echo '<h3>Mensaje enviado:</h3>';
                echo '<p><strong>Nombre:</strong> ' . $response['name'] . '</p>';
                echo '<p><strong>Correo:</strong> ' . $response['email'] . '</p>';
                echo '<p><strong>Mensaje:</strong></p>';
                echo '<p>' . $response['message'] . '</p>';
                echo '</div>';
                session_destroy();
            }
        ?>
    </div>

    <footer>
        <p>&copy; 2024 - Programación Web II</p>
    </footer>
</body>
</html>
