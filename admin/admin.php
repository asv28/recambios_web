<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'admin') {
    header("Location: index.php");
    exit;
}
include("includes/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    
</head>
<body class="bg-light">
<div class="container mt-4">
    <h2>Panel de Administración</h2>

    <a href="producto_nuevo.php" class="btn btn-success mb-3">Añadir nuevo producto</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $result = $conexion->query("SELECT * FROM productos");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['nombre']}</td>";
            echo "<td>" . number_format($row['precio'], 2) . " €</td>";
            echo "<td><img src='img/{$row['imagen']}' width='100'></td>";
            echo "<td>
                    <a href='producto_editar.php?id={$row['id']}' class='btn btn-warning btn-sm'>Editar</a>
                    <a href='producto_eliminar.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Eliminar este producto?\")'>Eliminar</a>
                  </td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
