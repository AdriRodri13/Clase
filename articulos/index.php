<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear VideoClub</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Crear VideoClub</h1>
    <form action="crear_videoclub.php" method="post">
        <label for="nombre">Nombre del VideoClub:</label>
        <input type="text" name="nombre" id="nombre" required>
        <button type="submit">Crear</button>
    </form>
</div>
</body>
</html>