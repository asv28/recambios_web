<?php
$folder = "datos";
$archivos = glob("$folder/productos_*.json");

foreach ($archivos as $archivo) {
    $json = file_get_contents($archivo);
    $productos = json_decode($json, true);

    echo "<h3>$archivo</h3>";
    if (!is_array($productos)) {
        echo "⚠️ JSON inválido<br>";
        continue;
    }

    foreach ($productos as $i => $p) {
        $tipo = $p['tipo'] ?? '❌ NO DEFINIDO';
        echo "Producto $i: tipo = <strong>$tipo</strong><br>";
    }
}
?>
