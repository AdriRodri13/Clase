<?php

// Crear una cookie
// La cookie se llama 'mi_cookie', tiene el valor 'valor_inicial' y expira en 1 hora.
setcookie('mi_cookie', 'valor_inicial', time() + 3600, '/');
echo "Cookie creada con valor: " . ($_COOKIE['mi_cookie'] ?? 'No disponible') . "<br>";

// Actualizar la cookie
// Para actualizar, simplemente se usa setcookie con el mismo nombre pero otro valor.
setcookie('mi_cookie', 'valor_actualizado', time() + 3600, '/');
echo "Cookie actualizada con valor: " . ($_COOKIE['mi_cookie'] ?? 'No disponible') . "<br>";

// Eliminar la cookie
// Para eliminar una cookie, se establece una fecha de expiración en el pasado.
setcookie('mi_cookie', '', time() - 3600, '/');
echo "Cookie eliminada.";
