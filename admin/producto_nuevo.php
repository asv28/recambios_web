<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

include("../includes/conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $fabricante = $_POST['fabricante'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $ancho = $_POST['ancho'];
    $diam_ext = $_POST['diam_ext'];
    $diam = $_POST['diam'];
    $longitud = $_POST['longitud'];

    // Ruta de imagen
    $imagen_nombre = $_FILES['imagen']['name'];
    $imagen_tmp = $_FILES['imagen']['tmp_name'];
    $ruta_carpeta = "img/img_" . strtolower($categoria); // Ej: img/img_correas
    $ruta_imagen = $ruta_carpeta . "/" . $imagen_nombre;

    // Crear carpeta si no existe
    if (!is_dir("../" . $ruta_carpeta)) {
        mkdir("../" . $ruta_carpeta, 0777, true);
    }

    // Mover la imagen a su carpeta
    move_uploaded_file($imagen_tmp, "../" . $ruta_imagen);

    // Insertar producto en la base de datos
    $stmt = $conexion->prepare("INSERT INTO productos 
        (nombre, descripcion, fabricante, categoria, precio, stock, imagen, ancho, diam_ext, diam, longitud) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssdissss", 
        $nombre, $descripcion, $fabricante, $categoria, $precio, $stock, $ruta_imagen, 
        $ancho, $diam_ext, $diam, $longitud);
    $stmt->execute();

    header("Location: admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Producto</title>
    
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Añadir nuevo producto</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Fabricante</label>
            <input type="text" name="fabricante" class="form-control">
        </div>
        <div class="mb-3">
            <label>Categoría</label>
            <input type="text" name="categoria" class="form-control" required>
            <small class="text-muted">Ej: correas, baterias, bujias</small>
        </div>
        <div class="mb-3">
            <label>Precio (€)</label>
            <input type="number" step="0.01" name="precio" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Imagen</label>
            <input type="file" name="imagen" class="form-control" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label>Ancho</label>
            <input type="text" name="ancho" class="form-control">
        </div>
        <div class="mb-3">
            <label>Diámetro Exterior</label>
            <input type="text" name="diam_ext" class="form-control">
        </div>
        <div class="mb-3">
            <label>Diámetro</label>
            <input type="text" name="diam" class="form-control">
        </div>
        <div class="mb-3">
            <label>Longitud</label>
            <input type="text" name="longitud" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="admin.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
