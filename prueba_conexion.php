<?php
include 'includes/conexion.php';
$conn = new mysqli($host, $usuario, $password, $db, $puerto);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
    echo "Conexión exitosa a la base de datos recambios_db";
}
?>
