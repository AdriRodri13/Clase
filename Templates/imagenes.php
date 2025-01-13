<?php

$directorioSubida = 'IMG/';


if (!is_dir($directorioSubida)) {
    mkdir($directorioSubida, 0777, true);
}

// Verifica si se ha enviado un archivo
if (isset($_FILES['imagen'])) {
    $archivo = $_FILES['imagen'];


    if ($archivo['error'] === UPLOAD_ERR_OK) {
        $rutaTemporal = $archivo['tmp_name'];
        $nombreArchivo = $archivo['name'];
        $tipoArchivo = mime_content_type($rutaTemporal); // Detecta el tipo MIME del archivo

        // Validar tipo de archivo (solo jpg y png)
        $tiposPermitidos = ['image/jpeg', 'image/png'];
        if (in_array($tipoArchivo, $tiposPermitidos)) {


            // Intentar mover el archivo a la carpeta de destino
            if (move_uploaded_file($rutaTemporal, $directorioSubida . $nombreArchivo)) {
                echo "La imagen se ha subido correctamente como: $nombreArchivo";
            } else {
                echo "Error al mover el archivo a la carpeta de destino.";
            }
        } else {
            echo "Solo se permiten imágenes en formato JPG o PNG.";
        }
    } else {
        echo "Error al subir el archivo. Código de error: " . $archivo['error'];
    }
} else {
    echo "No se ha enviado ninguna imagen.";
}
