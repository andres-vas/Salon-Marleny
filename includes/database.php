<?php

// Conexión a la base de datos utilizando mysqli_connect
$db = mysqli_connect('localhost', 'root', '', 'salon_marleny');

if (!$db) {
    // Mostrar un mensaje de error si no se puede conectar a la base de datos
    echo "Error: No se pudo conectar a MySQL.";
    echo "errno de depuración: " . mysqli_connect_errno();
    echo "error de depuración: " . mysqli_connect_error();
    exit;
}

?>
