<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

include("../includes/conexion.php");

if (!isset($_GET['id'])) {
    header("Location: admin.php");
    exit;
}

$id = intval($_GET['id']);

// Obtener datos del producto
$stmt = $conexion->prepare("SELECT * FROM productos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    echo "Producto no encontrado";
    exit;
}
$producto = $result->fetch_assoc();

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

    $ruta_imagen = $producto['imagen']; // Por defecto la imagen antigua

    // Si se subió nueva imagen, procesarla
    if (!empty($_FILES['imagen']['name'])) {
        $imagen_nombre = $_FILES['imagen']['name'];
        $imagen_tmp = $_FILES['imagen']['tmp_name'];
        $ruta_carpeta = "img/img_" . strtolower($categoria);
        $ruta_imagen = $ruta_carpeta . "/" . $imagen_nombre;

        if (!is_dir("../" . $ruta_carpeta)) {
            mkdir("../" . $ruta_carpeta, 0777, true);
        }

        move_uploaded_file($imagen_tmp, "../" . $ruta_imagen);
    }

    $stmt = $conexion->prepare("UPDATE productos SET nombre=?, descripcion=?, fabricante=?, categoria=?, precio=?, stock=?, imagen=?, ancho=?, diam_ext=?, diam=?, longitud=? WHERE id=?");
    $stmt->bind_param("sssssdissssi",
        $nombre, $descripcion, $fabricante, $categoria, $precio, $stock, $ruta_imagen,
        $ancho, $diam_ext, $diam, $longitud, $id);
    $stmt->execute();

    header("Location: admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Editar producto</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required value="<?= htmlspecialchars($producto['nombre']) ?>">
        </div>
        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control"><?= htmlspecialchars($producto['descripcion']) ?></textarea>
        </div>
        <div class="mb-3">
            <label>Fabricante</label>
            <input type="text" name="fabricante" class="form-control" value="<?= htmlspecialchars($producto['fabricante']) ?>">
        </div>
        <div class="mb-3">
            <label>Categoría</label>
            <input type="text" name="categoria" class="form-control" required value="<?= htmlspecialchars($producto['categoria']) ?>">
            <small class="text-muted">Ej: correas, baterias, bujias</small>
        </div>
        <div class="mb-3">
            <label>Precio (€)</label>
            <input type="number" step="0.01" name="precio" class="form-control" required value="<?= htmlspecialchars($producto['precio']) ?>">
        </div>
        <div class="mb-3">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" required value="<?= htmlspecialchars($producto['stock']) ?>">
        </div>
        <div class="mb-3">
            <label>Imagen actual</label><br>
            <img src="../<?= htmlspecialchars($producto['imagen']) ?>" alt="Imagen producto" style="max-width: 150px; max-height: 150px;">
        </div>
        <div class="mb-3">
            <label>Cambiar imagen</label>
            <input type="file" name="imagen" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <label>Ancho</label>
            <input type="text" name="ancho" class="form-control" value="<?= htmlspecialchars($producto['ancho']) ?>">
        </div>
        <div class="mb-3">
            <label>Diámetro Exterior</label>
            <input type="text" name="diam_ext" class="form-control" value="<?= htmlspecialchars($producto['diam_ext']) ?>">
        </div>
        <div class="mb-3">
            <label>Diámetro</label>
            <input type="text" name="diam" class="form-control" value="<?= htmlspecialchars($producto['diam']) ?>">
        </div>
        <div class="mb-3">
            <label>Longitud</label>
            <input type="text" name="longitud" class="form-control" value="<?= htmlspecialchars($producto['longitud']) ?>">
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <a href="admin.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
