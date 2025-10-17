<?php
session_start();

$data = json_decode(file_get_contents('php://input'), true);

header('Content-Type: application/json'); // Asegura que responde con JSON


if (isset($data['carrito'])) {
    $_SESSION['carrito'] = $data['carrito'];
    echo json_encode(['ok' => true]);
} else {
    echo json_encode(['ok' => false, 'error' => 'No se recibió el carrito.']);
}
