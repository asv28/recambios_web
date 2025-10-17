<?php
header('Content-Type: application/json');
$conexion = new mysqli('localhost', 'root', '', 'recambios_db', 3307);
if ($conexion->connect_error) {
    die(json_encode(['error' => 'Conexión fallida']));
}

// Recibir filtros desde GET
$categoria = $_GET['categoria'] ?? null;
$fabricante = $_GET['fabricante'] ?? null;

// Construir consulta dinámica
$sql = "SELECT * FROM productos WHERE 1=1";
$parametros = [];
$tipos = '';

if ($categoria) {
    $sql .= " AND categoria = ?";
    $tipos .= 's';
    $parametros[] = $categoria;
}

if ($fabricante) {
    $sql .= " AND fabricante = ?";
    $tipos .= 's';
    $parametros[] = $fabricante;
}

$stmt = $conexion->prepare($sql);
if ($parametros) {
    $stmt->bind_param($tipos, ...$parametros);
}
$stmt->execute();
$result = $stmt->get_result();

$productos = [];
while ($row = $result->fetch_assoc()) {
    $productos[] = $row;
}

echo json_encode($productos);
