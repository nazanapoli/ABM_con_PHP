// contact.php
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    echo "<h2>Mensaje Enviado:</h2>";
    echo "<p><strong>De:</strong> $name ($email)</p>";
    echo "<p><strong>Mensaje:</strong> $message</p>";
}
?>
