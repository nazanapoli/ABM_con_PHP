// list.php (consulta simple con paginación)
<?php
$items_per_page = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $items_per_page;

$query = $pdo->prepare("SELECT * FROM registros LIMIT ?, ?");
$query->execute([$offset, $items_per_page]);
$results = $query->fetchAll();
?>

