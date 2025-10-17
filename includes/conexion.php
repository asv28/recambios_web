<?php
$conexion = new mysqli("localhost", "root", "", "recambios_db", 3307);
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
