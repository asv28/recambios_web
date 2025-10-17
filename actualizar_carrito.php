<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['cantidad'])) {
    $id = intval($_POST['id']);
    $cantidad = intval($_POST['cantidad']);

    // Validar que la cantidad sea un entero positivo válido
    if ($cantidad < 1) {
        // Eliminar producto si cantidad es menor a 1
        if (isset($_SESSION['carrito'][$id])) {
            unset($_SESSION['carrito'][$id]);
        }
    } else {
        // Actualizar cantidad solo si el producto existe en el carrito
        if (isset($_SESSION['carrito'][$id])) {
            $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
        }
    }
}

// Redirigir al carrito
header("Location: carrito.php");
exit;
?>
