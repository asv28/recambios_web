<?php
include '../includes/conexion.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Eliminar el producto
    $query = "DELETE FROM productos WHERE id = $id";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado) {
        header("Location: listar.php?mensaje=Producto eliminado correctamente");
    } else {
        echo "Error al eliminar el producto: " . mysqli_error($conexion);
    }
} else {
    echo "ID no válido.";
}
?>
