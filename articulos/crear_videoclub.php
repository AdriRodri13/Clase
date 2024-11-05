<?php
if (!isset($_POST['nombre'])) {
    header("Location: index.php");
    exit();
}
$nombre = $_POST['nombre'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Configurar VideoClub</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>VideoClub: <?= htmlspecialchars($nombre) ?></h1>
    <form action="agregar_clientes.php" method="post">
        <input type="hidden" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
        <label for="numClientes">Número de Clientes:</label>
        <input type="number" name="numClientes" id="numClientes" min="1" required>
        <label for="numArticulos">Número de Artículos:</label>
        <input type="number" name="numArticulos" id="numArticulos" min="1" required>
        <button type="submit">Continuar</button>
    </form>
</div>
</body>
</html>