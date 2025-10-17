<?php
session_start();
include("includes/conexion.php");

// Verifica si hay sesión y carrito
if (!isset($_SESSION['usuario']) || empty($_SESSION['carrito'])) {
    header("Location: carrito.php");
    exit;
}

$usuario = $_SESSION['usuario'];
$carrito = $_SESSION['carrito'];

// 1. Insertar pedido
$stmt = $conexion->prepare("INSERT INTO pedidos (usuario) VALUES (?)");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$pedido_id = $stmt->insert_id;

// 2. Insertar productos del pedido
$stmt_producto = $conexion->prepare("INSERT INTO pedido_productos (pedido_id, producto_id, nombre, precio, cantidad) VALUES (?, ?, ?, ?, ?)");

foreach ($carrito as $item) {
    $stmt_producto->bind_param(
        "iisdi",
        $pedido_id,
        $item['id'],
        $item['nombre'],
        $item['precio'],
        $item['cantidad']
    );
    $stmt_producto->execute();
}

// 3. Vaciar carrito
unset($_SESSION['carrito']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedido realizado</title>
    
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="alert alert-success">
        <h4 class="alert-heading">¡Gracias por tu compra, <?= htmlspecialchars($usuario) ?>!</h4>
        <p>Tu pedido ha sido registrado correctamente. Número de pedido: <strong>#<?= $pedido_id ?></strong></p>
        <hr>
        <a href="index.php" class="btn btn-primary">Volver a la tienda</a>
    </div>
</div>
</body>
</html>
