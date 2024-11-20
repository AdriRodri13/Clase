<?php
if (!isset($_POST['nombre'], $_POST['numClientes'], $_POST['numArticulos'])) {
    header("Location: configurar_videoclub.php");
    exit();
}

$nombre = $_POST['nombre'];
$numClientes = $_POST['numClientes'];
$numArticulos = $_POST['numArticulos'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Clientes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<div class="container">
    <body>
    <h1>Agregar Clientes al VideoClub: <?= htmlspecialchars($nombre) ?></h1>
    <form action="agregar_articulos.php" method="post">
        <input type="hidden" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
        <input type="hidden" name="numArticulos" value="<?= htmlspecialchars($numArticulos) ?>">

        <?php for ($i = 1; $i <= $numClientes; $i++): ?>
            <h2>Cliente <?= $i ?></h2>
            <input type="hidden" name="numClientes" value="<?= htmlspecialchars($numClientes) ?>">
            <label for="nombre_cliente_<?= $i ?>">Nombre:</label>
            <input type="text" name="clientes[<?= $i ?>][nombre]" required>
            <label for="numero_cliente_<?= $i ?>">Número:</label>
            <input type="number" name="clientes[<?= $i ?>][numero]" required>
            <label for="maxAlquiler_cliente_<?= $i ?>">Máximo de Alquileres:</label>
            <input type="number" name="clientes[<?= $i ?>][maxAlquiler]" required>
        <?php endfor; ?>

        <button type="submit">Agregar Artículos</button>
    </form>
    </body>
</html>
</div>
