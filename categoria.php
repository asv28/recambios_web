<?php
session_start();

$categoria = $_GET['cat'] ?? '';
$tipo = $_GET['tipo'] ?? '';
$json_path = "datos/productos_{$tipo}.json";

if (!file_exists($json_path)) {
    echo "<p>No se encontró la categoría o el archivo JSON.</p>";
    exit;
}

$contenido = file_get_contents($json_path);
$productos = json_decode($contenido, true);

if (!is_array($productos)) {
    echo "<p>Error al leer los productos.</p>";
    exit;
}

// Si se especifica un tipo, filtrar los productos que coincidan con ese tipo
if ($tipo !== '') {
    $productos = array_filter($productos, function($producto) use ($tipo) {
        // Comparar el tipo del producto con el solicitado, ignorando mayúsculas/minúsculas
        return strcasecmp($producto['tipo'], $tipo) === 0;
    });
}

?>
<script>
  const params = new URLSearchParams(window.location.search);
  const tipo = params.get('tipo');
  if (tipo) {
    localStorage.setItem('ultimaCategoria', tipo);
  }
</script>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo ucfirst(str_replace('_', ' ', $categoria)); ?></title>
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_correa.css">
    <link rel="stylesheet" href="css/style_img_fondo.css">
    <link rel="icon" href="img_logos/logo.jpg">
</head>
<body>
      <header class="cabecera">
        <h1>ENTREGA GRATIS EN PEDIDOS SUPERIORES DE 69€</h1>
        <span class="logo-nav">
            <a href="index.php">
                <img src="img_logos/logo.jpg" width="100" height="70" alt="Logo">
            </a>
        </span>
        <nav class="nav-container">  
            <div class="nav-left">
                <ul class="menu">
                    <li class="submenu-nav">
                        <a href="#">Motor</a>
                        <ul class="menu_nav">
                            <li><a href="categoria.php?cat=motor&tipo=inyector">Inyectores</a></li>
                            <li><a href="categoria.php?cat=motor&tipo=baterias">Baterías</a></li>
                            <li><a href="categoria.php?cat=motor&tipo=radiador">Radiador</a></li>
                            <li><a href="categoria.php?cat=motor&tipo=soporte_motor">Soporte Motor</a></li>
                            <li><a href="categoria.php?cat=motor&tipo=bujias">Bujías</a></li>
                        </ul>
                    <li class="submenu-nav">
                        <a href="#">Filtros</a>
                        <ul class="menu_nav">
                            <li><a href="categoria.php?cat=filtros&tipo=aceite">Aceites</a></li>
                            <li><a href="categoria.php?cat=filtros&tipo=filtro_aire">Filtro Aire</a></li>
                            <li><a href="categoria.php?cat=filtros&tipo=filtro_aceite">Filtro Aceite</a></li>
                            <li><a href="categoria.php?cat=filtros&tipo=filtro_combustible">Filtro Combustible</a></li>
                            <li><a href="categoria.php?cat=filtros&tipo=filtro_habitaculo">Filtro Habitáculo</a></li>
                        </ul>
                    </li>
                    <li class="submenu-nav">
                        <a href="#">Escapes</a>
                        <ul class="menu_nav">
                            <li><a href="categoria.php?cat=escape&tipo=egr">Válvula Egr</a></li>
                            <li><a href="categoria.php?cat=escape&tipo=catalizadores">Catalizadores</a></li>
                            <li><a href="categoria.php?cat=escape&tipo=silenciadores">Silenciadores</a></li>
                            <li><a href="categoria.php?cat=escape&tipo=soporte_escape">Soporte de escape</a></li>
                            <li><a href="categoria.php?cat=escape&tipo=filtro_particulas">Filtro de partículas</a></li>
                        </ul>
                    </li>
                    <li class="submenu-nav">
                        <a href="#">Suspensión</a>
                        <ul class="menu_nav">
                            <li><a href="categoria.php?cat=suspension&tipo=amortiguadores">Amortiguadores</a></li>
                            <li><a href="categoria.php?cat=suspension&tipo=suspension">Suspensión</a></li>
                            <li><a href="categoria.php?cat=suspension&tipo=rodamientos">Rodamientos</a></li>
                            <li><a href="categoria.php?cat=suspension&tipo=transmision">Transmisión</a></li>
                            <li><a href="categoria.php?cat=suspension&tipo=direccion">Dirección</a></li>
                        </ul>
                    </li>
                    <li class="submenu-nav">
                        <a href="#">Frenado</a>
                        <ul class="menu_nav">
                            <li><a href="categoria.php?cat=frenado&tipo=bomba_freno">Bomba Freno</a></li>
                            <li><a href="categoria.php?cat=frenado&tipo=cables">Cable Freno Mano</a></li>
                            <li><a href="categoria.php?cat=frenado&tipo=discos">Discos de Freno</a></li>
                            <li><a href="categoria.php?cat=frenado&tipo=latiguillos">Latiguillos</a></li>
                            <li><a href="categoria.php?cat=frenado&tipo=pastillas">Pastillas de Freno</a></li>
                        </ul>
                    </li>
                    <li class="submenu-nav">
                        <a href="#">Ópticas</a>
                        <ul class="menu_nav">
                            <li><a href="categoria.php?cat=optica&tipo=bombillas">Bombillas</a></li>
                            <li><a href="categoria.php?cat=optica&tipo=bombillas_led">Bombillas led</a></li>
                            <li><a href="categoria.php?cat=optica&tipo=lampara">Lámpara xenón</a></li>
                            <li><a href="categoria.php?cat=optica&tipo=opticas">Faros</a></li>
                            <li><a href="categoria.php?cat=optica&tipo=pilotos">Pilotos</a></li>
                        </ul>
                    </li>
                    <li class="submenu-nav">
                        <a href="#">Distribución</a>
                        <ul class="menu_nav">
                            <li><a href="categoria.php?cat=distribucion&tipo=correa">Correas</a></li>
                            <li><a href="categoria.php?cat=distribucion&tipo=kit_correa">Kit correa distribución</a></li>
                            <li><a href="categoria.php?cat=distribucion&tipo=kit_cadena">Kit cadena distribución</a></li>
                            <li><a href="categoria.php?cat=distribucion&tipo=poleas">Poleas cigueñal</a></li>
                            <li><a href="categoria.php?cat=distribucion&tipo=tensor">Tensores y guías</a></li>
                        </ul>
                    </li>
                    <li class="submenu-nav">
                        <a href="#">Embrague</a>
                        <ul class="menu_nav">
                            <li><a href="categoria.php?cat=embrague&tipo=embrague">Embragues</a></li>
                            <li><a href="categoria.php?cat=embrague&tipo=cojinete_embrague">Cojinete Embrague</a></li>
                            <li><a href="categoria.php?cat=embrague&tipo=volante_motor">Volante de motor</a></li>
                            <li><a href="categoria.php?cat=embrague&tipo=disco_embrague">Disco Embrague</a></li>
                        </ul>
                    </li>
                    <li class="submenu-nav">
                        <a href="#">Herramientas</a>
                        <ul class="menu_nav">
                            <li><a href="categoria.php?cat=herramientas&tipo=herramientas_filtros">Cambios de aceite</a></li>
                            <li><a href="categoria.php?cat=herramientas&tipo=herramientas_pinzas">Apriete y pinzas</a></li>
                            <li><a href="categoria.php?cat=herramientas&tipo=herramientas_freno">Herramientas frenado</a></li>
                            <li><a href="categoria.php?cat=herramientas&tipo=herramientas_bateria">Para baterías</a></li>
                        </ul>
                </ul>
            </div>
        </nav>
        <div class="nav-right">
            <a href="carrito.php">
                <img class="carrito" src="img_logos/carrito.jpg" alt="carrito">
                 <span id="contador-carrito">0</span>
            </a>
        </div>
    </header>

<section class="contenedor1">
    <aside class="izquierda">
        <h1>FILTRAR POR</h1><br>    
            <div class="marcas-medidas">
                <h3>Fabricante</h3>

                <div class="marcas">
                    <input type="checkbox" id="marca_bendix" name="fabricante[]" value="BENDIX"> 
                    <label for="marca_bendix">BENDIX</label><br>

                    <input type="checkbox" id="marca_bosch" name="fabricante[]" value="BOSCH">
                    <label for="marca_bosch">BOSCH</label><br>

                    <input type="checkbox" id="marca_brembo" name="fabricante[]" value="BREMBO">
                    <label for="marca_brembo">BREMBO</label><br>

                    <input type="checkbox" id="marca_champion" name="fabricante[]" value="CHAMPION">
                    <label for="marca_champion">CHAMPION</label><br>

                    <input type="checkbox" id="marca_continental" name="fabricante[]" value="CONTINENTAL">
                    <label for="marca_continental">CONTINENTAL</label><br>

                    <input type="checkbox" id="marca_contitech" name="fabricante[]" value="CONTITECH">
                    <label for="marca_contitech">CONTITECH</label><br>

                    <input type="checkbox" id="marca_febi" name="fabricante[]" value="FEBI BILSTEIN">
                    <label for="marca_febi">FEBI BILSTEIN</label><br>

                    <input type="checkbox" id="marca_gates" name="fabricante[]" value="GATES">
                    <label for="marca_gates">GATES</label><br>

                    <input type="checkbox" id="marca_ina" name="fabricante[]" value="INA">
                    <label for="marca_ina">INA</label><br>

                    <input type="checkbox" id="marca_luk" name="fabricante[]" value="LUK">
                    <label for="marca_luk">LUK</label><br>

                    <input type="checkbox" id="marca_mann" name="fabricante[]" value="MANN-FILTER">
                    <label for="marca_mann">MANN-FILTER</label><br>

                    <input type="checkbox" id="marca_motomoly" name="fabricante[]" value="MOTOMOLY">
                    <label for="marca_motomoly">MOTOMOLY</label><br>

                    <input type="checkbox" id="marca_purflux" name="fabricante[]" value="PURFLUX">
                    <label for="marca_purflux">PURFLUX</label><br>

                    <input type="checkbox" id="marca_qh" name="fabricante[]" value="QH">
                    <label for="marca_qh">QH</label><br>

                    <input type="checkbox" id="marca_rh" name="fabricante[]" value="ROAD HOUSE">
                    <label for="marca_rh">ROAD HOUSE</label><br>

                    <input type="checkbox" id="marca_sachs" name="fabricante[]" value="SACHS">
                    <label for="marca_sachs">SACHS</label><br>

                    <input type="checkbox" id="marca_skf" name="fabricante[]" value="SKF">
                    <label for="marca_skf">SKF</label><br>

                    <input type="checkbox" id="marca_snr" name="fabricante[]" value="SNR">
                    <label for="marca_snr">SNR</label><br>

                    <input type="checkbox" id="marca_trw" name="fabricante[]" value="TRW">
                    <label for="marca_trw">TRW</label><br>

                    <input type="checkbox" id="marca_valeo" name="fabricante[]" value="VALEO">
                    <label for="marca_valeo">VALEO</label><br>
                </div>

                     <h3>Peso [kg]</h3>
                <div class="medidas">
                        <input type="checkbox" id="peso_0.1" name="peso[]" value="0.1">
                        <label for="peso_0.1">0.1</label><br> 
                        
                        <input type="checkbox" id="peso_0.2" name="peso[]" value="0.2">
                        <label for="peso_0.2">0.2</label><br>

                        <input type="checkbox" id="peso_0.3" name="peso[]" value="0.3">
                        <label for="peso_0.3">0.3</label><br>

                        <input type="checkbox" id="peso_0.4" name="peso[]" value="0.4">
                        <label for="peso_0.4">0.4</label><br>

                        <input type="checkbox" id="peso_0.5" name="peso[]" value="0.5">
                        <label for="peso_0.5">0.5</label><br>

                        <input type="checkbox" id="peso_0.6" name="peso[]" value="0.6">
                        <label for="peso_0.6">0.6</label><br>

                        <input type="checkbox" id="peso_0.7" name="peso[]" value="0.7">
                        <label for="peso_0.7">0.7</label><br>

                        <input type="checkbox" id="peso_0.8" name="peso[]" value="0.8">
                        <label for="peso_0.8">0.8</label><br>

                        <input type="checkbox" id="peso_0.9" name="peso[]" value="0.9">
                        <label for="peso_0.9">0.9</label><br>

                        <input type="checkbox" id="peso_1.0" name="peso[]" value="1.0">
                        <label for="peso_1.0">1.0</label><br>

                        <input type="checkbox" id="peso_1.1" name="peso[]" value="1.1">
                        <label for="peso_1.1">1.1</label><br>

                        <input type="checkbox" id="peso_1.2" name="peso[]" value="1.2">
                        <label for="peso_1.2">1.2</label><br>

                        <input type="checkbox" id="peso_1.3" name="peso[]" value="1.3">
                        <label for="peso_1.3">1.3</label><br>

                        <input type="checkbox" id="peso_1.4" name="peso[]" value="1.4">
                        <label for="peso_1.4">1.4</label><br>

                        <input type="checkbox" id="peso_1.5" name="peso[]" value="1.5">
                        <label for="peso_1.5">1.5</label><br>

                        <input type="checkbox" id="peso_1.6" name="peso[]" value="1.6">
                        <label for="peso_1.6">1.6</label><br>

                        <input type="checkbox" id="peso_1.7" name="peso[]" value="1.7">
                        <label for="peso_1.7">1.7</label><br>

                        <input type="checkbox" id="peso_1.8" name="peso[]" value="1.8">
                        <label for="peso_1.8">1.8</label><br>

                        <input type="checkbox" id="peso_1.9" name="peso[]" value="1.9">
                        <label for="peso_1.9">1.9</label><br>

                        <input type="checkbox" id="peso_2.0" name="peso[]" value="2.0">
                        <label for="peso_2.0">2.0</label><br>

                        <input type="checkbox" id="peso_5.0" name="peso[]" value="5.0">
                        <label for="peso_5.0">5.0</label><br>

                        <input type="checkbox" id="peso_6.0" name="peso[]" value="6.0">
                        <label for="peso_6.0">6.0</label><br>

                        <input type="checkbox" id="peso_7.0" name="peso[]" value="7.0">
                        <label for="peso_7.0">7.0</label><br>

                        <input type="checkbox" id="peso_8.0" name="peso[]" value="8.0">
                        <label for="peso_8.0">8.0</label><br>

                        <input type="checkbox" id="peso_9.0" name="peso[]" value="9.0">
                        <label for="peso_9.0">9.0</label><br>

                        <input type="checkbox" id="peso_15" name="peso[]" value="15">
                        <label for="peso_15">15</label><br>

                        <input type="checkbox" id="peso_16.5" name="peso[]" value="16.5">
                        <label for="peso_16.5">16.5</label><br>

                        <input type="checkbox" id="peso_18.5" name="peso[]" value="18.5">
                        <label for="peso_18.5">18.5</label><br>

                        <input type="checkbox" id="peso_19.0" name="peso[]" value="19.0">
                        <label for="peso_19.0">19.0</label><br>

                        <input type="checkbox" id="peso_20.0" name="peso[]" value="20.0">
                        <label for="peso_20.0">20.0</label><br>

                </div>

                      <h3>Densidad</h3>
                <div class="medidas">
                    <input type="checkbox" id="densidad_0w20" name="densidad[]" value="0W20">
                    <label for="densidad_0w20">0W20</label><br>
                    
                    <input type="checkbox" id="densidad_5w30" name="densidad[]" value="5W30">
                    <label for="densidad_5w30">5W30</label><br>

                    <input type="checkbox" id="densidad_5w40" name="densidad[]" value="5W40">
                    <label for="densidad_5w40">5W40</label><br>

                    <input type="checkbox" id="densidad_10w40" name="densidad[]" value="10W40">
                    <label for="densidad_10w40">10W40</label><br>

                    <input type="checkbox" id="densidad_15w40" name="densidad[]" value="15W40">
                    <label for="densidad_15w40">15W40</label><br>

                    <input type="checkbox" id="densidad_20w50" name="densidad[]" value="20W50">
                    <label for="densidad_20w50">20W50</label><br>
                </div>    

            </div>        
    </aside>
<main>

    <div class="producto">
        <?php
        foreach ($productos as $producto) {
            echo '<div class="item">';
            echo '  <img src="' . htmlspecialchars($producto["img"] ?? 'img_logos/logo.jpg') . '" alt="' . htmlspecialchars($producto["alt"] ?? 'Producto') . '">';
            echo '  <article class="articulo">';
            echo '      <p>' . htmlspecialchars($producto["alt"] ?? 'Producto sin nombre') . ' <p1>' . htmlspecialchars($producto["marca"] ?? '') . '</p1></p>';
            echo '      <p>' . htmlspecialchars($producto["codigo"] ?? '') . '</p>';
            echo '      <h4>Peso</h4>';
            echo '      <h5>' . htmlspecialchars($producto["peso"] ?? '-') . ' kg</h5>';
            echo '  </article>';
            echo '  <article class="precio">';
            echo '      <h2>' . number_format($producto["precio"] ?? 0, 2, ',', '') . '€</h2>';
            echo '      <h5>*IVA incluido</h5>';
            echo '      <h4>En Stock</h4>';
            echo '      <article class="recuadro">';
            echo '          <p>ENVIO GRATIS A PARTIR DE 49€</p>';
            echo '          <h5>Entrega estimada entre mañana y pasado mañana</h5>';
            echo '      </article>';
            echo '      <article class="contenedor-boton">';
            echo '<button class="add-to-cart"
                    data-id="' . htmlspecialchars($producto['id']) . '"
                    data-codigo="' . htmlspecialchars($producto['codigo']) . '"
                    data-marca="'  . htmlspecialchars($producto['marca'])  . '"
                    data-precio="' . htmlspecialchars($producto['precio']) . '"
                    data-img="'    . htmlspecialchars($producto['img'])    . '">Añadir al carrito</button>';

            echo '      </article>';
            echo '  </article>';
            echo '</div>';
        }
        ?>
    </div>
</main>

</section>

<footer>
    <p>Por favor, consulta nuestra <a href="politica_proteccion.html">política de proteccion de datos personales</a></p>
</footer>

<script src="js/carrito.js"></script>

</body>
</html>
