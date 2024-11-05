

<?php

if (!isset($_POST['nombre'], $_POST['numArticulos'], $_POST['clientes'])) {
    header("Location: agregar_clientes.php");
    exit();
}

$nombre = $_POST['nombre'];
$numArticulos = $_POST['numArticulos'];
$clientes = $_POST['clientes'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Artículos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<div  class="container">
    <body>
    <h1>Agregar Artículos al VideoClub: <?= htmlspecialchars($nombre) ?></h1>
    <form action="resumen.php" method="post">
        <input type="hidden" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
        <?php foreach ($clientes as $key => $cliente): ?>
            <input type="hidden" name="clientes[<?= $key ?>][nombre]" value="<?= htmlspecialchars($cliente['nombre']) ?>">
            <input type="hidden" name="clientes[<?= $key ?>][numero]" value="<?= htmlspecialchars($cliente['numero']) ?>">
            <input type="hidden" name="clientes[<?= $key ?>][maxAlquiler]" value="<?= htmlspecialchars($cliente['maxAlquiler']) ?>">
        <?php endforeach; ?>

        <?php for ($i = 1; $i <= $numArticulos; $i++): ?>
            <h2>Artículo <?= $i ?></h2>
            <label for="titulo_articulo_<?= $i ?>">Título:</label>
            <input type="text" name="articulos[<?= $i ?>][titulo]" required>
            <label for="numero_articulo_<?= $i ?>">Número:</label>
            <input type="number" name="articulos[<?= $i ?>][numero]" required>
            <label for="precio_articulo_<?= $i ?>">Precio:</label>
            <input type="number" name="articulos[<?= $i ?>][precio]" step="0.01" required>
            <label for="tipo_articulo_<?= $i ?>">Tipo:</label>
            <select name="articulos[<?= $i ?>][tipo]" required>
                <option value="Dvd">DVD</option>
                <option value="CintaVideo">Cinta de Video</option>
                <option value="Juego">Juego</option>
            </select>
        <?php endfor; ?>

        <button type="submit">Finalizar y Ver Resumen</button>
    </form>
    </body>
</html>
</div>
