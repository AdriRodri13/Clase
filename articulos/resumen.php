<?php
if (!isset($_POST['nombre'], $_POST['clientes'], $_POST['articulos'])) {
    header("Location: index.php");
    exit();
}

$nombre = $_POST['nombre'];
$clientes = $_POST['clientes'];
$articulos = $_POST['articulos'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resumen del VideoClub</title>
    <link rel="stylesheet" href="styles.css">
</head>
<div class="container">
    <body>
    <h1>Resumen del VideoClub: <?= htmlspecialchars($nombre) ?></h1>

    <h2>Clientes</h2>
    <ul>
        <?php foreach ($clientes as $cliente): ?>
            <li>Nombre: <?= htmlspecialchars($cliente['nombre']) ?>, Número: <?= htmlspecialchars($cliente['numero']) ?>, Máximo de Alquileres: <?= htmlspecialchars($cliente['maxAlquiler']) ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Artículos</h2>
    <ul>
        <?php foreach ($articulos as $articulo): ?>
            <li>Título: <?= htmlspecialchars($articulo['titulo']) ?>, Número: <?= htmlspecialchars($articulo['numero']) ?>, Precio: <?= htmlspecialchars($articulo['precio']) ?>, Tipo: <?= htmlspecialchars($articulo['tipo']) ?></li>
        <?php endforeach; ?>
    </ul>
    </body>
</div>

</html>