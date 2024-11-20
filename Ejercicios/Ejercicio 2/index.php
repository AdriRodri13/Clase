<?php

$carpeta = 'mi_carpeta';

if (!is_dir($carpeta)) {
    mkdir($carpeta);
    echo "La carpeta '$carpeta' ha sido creada.<br>";
}

$archivos = ['archivo1.txt', 'archivo2.txt', 'archivo3.txt'];
foreach ($archivos as $index => $archivo) {
    $contenido = "Este es el contenido del archivo " . ($index + 1);
    file_put_contents($carpeta . '/' . $archivo, $contenido);
    echo "El archivo '$archivo' ha sido creado con el siguiente contenido: '$contenido'.<br>";
}

$archivosEnCarpeta = scandir($carpeta);
$archivosEnCarpeta = array_diff($archivosEnCarpeta, array('.', '..'));
echo "<br>Archivos en la carpeta '$carpeta':<br>";
foreach ($archivosEnCarpeta as $archivo) {
    echo "$archivo<br>";
}

$archivoAEliminar = $carpeta . '/archivo3.txt';
if (file_exists($archivoAEliminar)) {
    unlink($archivoAEliminar);
    echo "<br>El archivo '$archivoAEliminar' ha sido eliminado correctamente.<br>";
}

if (!file_exists($archivoAEliminar)) {
    echo "Confirmación: El archivo '$archivoAEliminar' ya ha sido eliminado.<br>";
}







