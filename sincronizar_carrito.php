<?php
session_start();

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['carrito'])) {
    $_SESSION['carrito'] = $data['carrito'];
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'No se recibió carrito']);
}
