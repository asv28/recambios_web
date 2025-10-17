<?php
session_start();
include("includes/conexion.php");

// Validar que el carrito no esté vacío
if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    echo "<p>El carrito está vacío.</p>";
    echo "<a href='index.php' class='btn btn-primary'>Volver a la tienda</a>";
    exit;
}

// Calcular total del carrito
$total = 0;
foreach ($_SESSION['carrito'] as $producto) {
    $total += $producto['precio'] * $producto['cantidad'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $email = $conexion->real_escape_string($_POST['email']);
    $direccion = $conexion->real_escape_string($_POST['direccion']);

    // Guardar pedido en la base de datos
    $stmt = $conexion->prepare("INSERT INTO pedidos (nombre, email, direccion, total) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssd", $nombre, $email, $direccion, $total);

    if ($stmt->execute()) {
    $pedido_id = $stmt->insert_id;

    
    // Guardar detalles de cada producto
    $stmt_detalle = $conexion->prepare("INSERT INTO detalle_pedido (pedido_id, cantidad, precio_unitario, codigo, marca) VALUES (?, ?, ?, ?, ?)");

foreach ($_SESSION['carrito'] as $producto) {
    $cantidad = $producto['cantidad'];
    $precio = $producto['precio'];
    $codigo = $producto['codigo']; 
    $marca = $producto['marca'];

    $stmt_detalle->bind_param("iidss", $pedido_id, $cantidad, $precio, $codigo, $marca);
    $stmt_detalle->execute();
}

        

        // Enviar correo (simulado)
        $to = $email;
        $subject = "Confirmación de pedido #$pedido_id";
        $message = "Hola $nombre,\n\nGracias por tu compra. Aquí tienes el resumen de tu pedido:\n\n";
        
        foreach ($_SESSION['carrito'] as $producto) {
            $nombreProducto = $producto['marca'] . " - " . $producto['codigo'];
            $message .= "- " . $nombreProducto . " x " . $producto['cantidad'] . " = " . number_format($producto['precio'] * $producto['cantidad'], 2) . "€\n";
        }

        $message .= "\nTotal: " . number_format($total, 2) . "€\n";
        $message .= "\nDirección de envío:\n$direccion\n\n";
        $message .= "Nos pondremos en contacto contigo pronto.\n\nSaludos,\nTu Tienda";

        $headers = "From: no-reply@tutienda.com\r\n" .
                   "Reply-To: no-reply@tutienda.com\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        // mail($to, $subject, $message, $headers); // Descomenta esto en producción

        echo "<p><em>Correo enviado: Confirmación de pedido enviada a $to</em></p>";

        unset($_SESSION['carrito']);

        echo "<h3>✅ Pedido realizado con éxito</h3>";
        echo "<p>Gracias por su compra, " . htmlspecialchars($nombre) . ".</p>";
        echo "<a href='index.php' class='btn btn-success'>Volver a la tienda</a>";
        exit;
    } else {
        echo "<p>Error al procesar el pedido. Intente nuevamente.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Finalizar Compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h2>Finalizar Compra</h2>

    <h4>Productos en el carrito:</h4>
    <ul class="list-group mb-3">
        <?php
        $total = 0;
        foreach ($_SESSION['carrito'] as $producto) {
            $nombre = $producto['marca'] . " - " . $producto['codigo'];
            $subtotal = $producto['precio'] * $producto['cantidad'];
            $total += $subtotal;
            echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
            echo htmlspecialchars($nombre) . " - " . number_format($producto['precio'], 2) . "€ x " . $producto['cantidad'] . " = " . number_format($subtotal, 2) . "€";
            echo "</li>";
        }
        ?>
        <li class="list-group-item d-flex justify-content-between">
            <strong>Total:</strong>
            <strong><?php echo number_format($total, 2); ?> €</strong>
        </li>
    </ul>

    <form method="post" class="mb-4">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre completo</label>
            <input type="text" class="form-control" name="nombre" required value="<?php echo isset($_SESSION['usuario']) ? htmlspecialchars($_SESSION['usuario']) : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" name="email" required value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección de envío</label>
            <textarea class="form-control" name="direccion" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Confirmar Pedido</button>
        <a href="index.php" class="btn btn-secondary">Seguir comprando</a>
    </form>
</div>
</body>
</html>
