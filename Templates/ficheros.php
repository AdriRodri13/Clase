<?php
// Crear y abrir el archivo para escritura
$file = fopen("registro.txt", "w"); // "w" abre el archivo para escritura, lo crea si no existe
if ($file) {
    // Escribir en el archivo
    fwrite($file, "Este es un ejemplo de manejo de archivos en PHP.\n");
    fwrite($file, "Este archivo se va a leer y luego eliminar.\n");
    fclose($file); // Cerrar el archivo
    echo "Archivo creado y datos escritos.<br>";
}

// Leer el archivo
$file = fopen("registro.txt", "r"); // "r" abre el archivo para lectura
if ($file) {
    echo "Contenido del archivo:<br>";
    while (($linea = fgets($file)) !== false) { // Leer línea por línea
        echo $linea . "<br>";
    }
    fclose($file); // Cerrar el archivo
}

// Eliminar el archivo
if (file_exists("registro.txt")) { // Comprobar si el archivo existe
    unlink("registro.txt"); // Eliminar el archivo
    echo "Archivo eliminado.";
} else {
    echo "El archivo ya no existe.";
}
