<?php
session_start();
?>
<!DOCtipo html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda de Recambios - Categorías</title>
    
     <link rel="stylesheet" href="css/style.css">
     <link rel="icon" href="img_logos/logo.jpg">
</head>

<body>
    <header class="cabecera">
        
        <h1>ENTREGA GRATIS EN PEDIDOS SUPERIORES DE 69€</h1>
        <span class="logo-nav">
            <img src="img_logos/logo.jpg" width="100" height="70" alt="Logo">
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
               
            </a>
        </div>
        
    </header>

    <section class="titulo">
        <h1>Bienvenidos a nuestra tienda de recambios</h1>
        <h3>Encuentra los mejores recambios para tu automóvil</h3>
    </section>

    <section class="contenedor">
    <!-- BARRA IZQUIERDA -->
<div class="barra-izquierda">
        <header class="cabecero">
            <h2>Piezas de motor <img src="img_logos/turbo.jpg" alt="Turbo" width="100"></h2><br><br>
        </header>
    <div>    
        <ul>
            <li><a href="categoria.php?cat=motor&tipo=inyector">Inyectores</a></li><br>
            <li><a href="categoria.php?cat=motor&tipo=baterias">Baterías</a></li><br>
            <li><a href="categoria.php?cat=motor&tipo=radiador">Radiador</a></li><br>
            <li><a href="categoria.php?cat=motor&tipo=soporte_motor">Soporte Motor</a></li><br>
            <li><a href="categoria.php?cat=motor&tipo=bujias">Bujías</a></li><br>
        </ul>
    </div>
        <header class="cabecero">
            <h2>Ópticas/Faros/Bombillas <img src="img_logos/faro.jpg" alt="Faro" width="100"></h2><br><br>
        </header>
    <div>    
        <ul>
            <li><a href="categoria.php?cat=optica&tipo=bombillas">Bombillas</a></li><br>
            <li><a href="categoria.php?cat=optica&tipo=bombillas_led">Bombillas LED</a></li><br>
            <li><a href="categoria.php?cat=optica&tipo=lampara">Lámpara Xenón</a></li><br>
            <li><a href="categoria.php?cat=optica&tipo=opticas">Faros</a></li><br>
            <li><a href="categoria.php?cat=optica&tipo=pilotos">Pilotos</a></li><br>
        </ul>
    </div>
        <header class="cabecero">
            <h2>Embrague/Baterías <img src="img_logos/embrague.jpg" alt="Embrague" width="100"></h2><br><br>
        </header>
    <div>    
        <ul>
            <li><a href="categoria.php?cat=embrague&tipo=embrague">Embragues</a></li><br>
            <li><a href="categoria.php?cat=embrague&tipo=cojinete">Cojinete Embrague</a></li><br>
            <li><a href="categoria.php?cat=embrague&tipo=volante_motor">Volante de motor</a></li><br>
            <li><a href="categoria.php?cat=embrague&tipo=disco_embrague">Disco embrague</a></li><br>
        </ul>
    </div>
</div>
    <!-- BARRA CENTRAL -->
<div class="barra-central">
        <header class="cabecero">
            <h2>Filtros y aceite <img src="img_logos/aceite.jpg" alt="Filtro" width="100"></h2><br><br>
        </header>
    <div>    
        <ul>
            <li><a href="categoria.php?cat=filtros&tipo=filtro_habitaculo">Filtro habitáculo</a></li><br>
            <li><a href="categoria.php?cat=filtros&tipo=filtro_aire">Filtro aire</a></li><br>
            <li><a href="categoria.php?cat=filtros&tipo=aceite">Aceites</a></li><br>
            <li><a href="categoria.php?cat=filtros&tipo=filtro_combustible">Filtro combustible</a></li><br>
            <li><a href="categoria.php?cat=filtros&tipo=filtro_aceite">Filtro aceite</a></li><br>
        </ul>
    </div>
        <header class="cabecero">
            <h2>Frenado <img src="img_logos/frenos.jpg" alt="Frenado" width="100"></h2><br><br>
        </header>
    <div>    
        <ul>
            <li><a href="categoria.php?cat=frenado&tipo=latiguillos">Latiguillos</a></li><br>
            <li><a href="categoria.php?cat=frenado&tipo=pastillas">Pastillas de freno</a></li><br>
            <li><a href="categoria.php?cat=frenado&tipo=discos">Discos de freno</a></li><br>
            <li><a href="categoria.php?cat=frenado&tipo=bomba_freno">Bomba de freno</a></li><br>
            <li><a href="categoria.php?cat=frenado&tipo=cables">Cables de freno</a></li><br>
        </ul>
    </div>
        <header class="cabecero">
            <h2>Distribución y Accesorios <img src="img_logos/distribucion.jpg" alt="Distribución" width="100"></h2><br><br>
        </header>
    <div>    
        <ul>
            <li><a href="categoria.php?cat=distribucion&tipo=correa">Correas</a></li><br>
            <li><a href="categoria.php?cat=distribucion&tipo=kit_correa">Kit correa distribución</a></li><br>
            <li><a href="categoria.php?cat=distribucion&tipo=kit_cadena">Kit cadena distribución</a></li><br>
            <li><a href="categoria.php?cat=distribucion&tipo=poleas">Poleas cigueñal</a></li><br>
            <li><a href="categoria.php?cat=distribucion&tipo=tensor">Tensores y guías</a></li><br>
        </ul>
    </div>
</div>
    <!-- BARRA DERECHA -->
<div class="barra-derecha">
        <header class="cabecero">
            <h2>Escape <img src="img_logos/escape.jpg" alt="Escape" width="50"></h2><br><br>
        </header>
    <div>
        <ul>
            <li><a href="categoria.php?cat=escape&tipo=egr">Válvula EGR</a></li><br>
            <li><a href="categoria.php?cat=escape&tipo=catalizadores">Catalizadores</a></li><br>
            <li><a href="categoria.php?cat=escape&tipo=silenciadores">Silenciadores</a></li><br>
            <li><a href="categoria.php?cat=escape&tipo=soporte_escape">Soporte de escape</a></li><br>
            <li><a href="categoria.php?cat=escape&tipo=filtro_particulas">Filtro de partículas</a></li><br>
        </ul>
    </div>
        <header class="cabecero">
            <h2>Dirección-Suspensión-Tren <img src="img_logos/suspension.jpg" alt="Suspensión" width="100"></h2><br><br>
        </header>
    <div>    
        <ul>
            <li><a href="categoria.php?cat=suspension&tipo=amortiguadores">Amortiguadores</a></li><br>
            <li><a href="categoria.php?cat=suspension&tipo=suspension">Suspensión</a></li><br>
            <li><a href="categoria.php?cat=suspension&tipo=rodamientos">Rodamientos</a></li><br>
            <li><a href="categoria.php?cat=suspension&tipo=transmision">Transmisión</a></li><br>
            <li><a href="categoria.php?cat=suspension&tipo=direccion">Dirección</a></li><br>
        </ul>
    </div>
        <header class="cabecero">
            <h2>Herramientas <img src="img_logos/Herramientas.jpg" alt="Herramientas" width="50"></h2><br><br>
        </header>
    <div>    
        <ul>
            <li><a href="categoria.php?cat=herramientas&tipo=herramientas_filtros">Cambios de aceite</a></li><br>
            <li><a href="categoria.php?cat=herramientas&tipo=herramientas_pinzas">Apriete y pinzas</a></li><br>
            <li><a href="categoria.php?cat=herramientas&tipo=herramientas_freno">Herramientas frenado</a></li><br>
            <li><a href="categoria.php?cat=herramientas&tipo=herramientas_bateria">Para baterías</a></li><br>
        </ul>
    </div>
</div>    
</section>

    <section class="contenedor1">
        <div class="container-datos">
            <article class="datos">
                <h1><img src="img_logos/logo.jpg" alt="logo" width="100" height="50"> Auto Parts</h1>
                <h3>Horario de atención al cliente:</h3>
                <h4>L-J: 9:00h - 18:00<br><br>V: 9:00 - 14:00</h4><br><br>
                <h2>Contacto / Ayuda</h2>
                <a href="categoria.php?cat=info&tipo=contacto">
                    <img src="img_logos/imagen_contac.jpg" alt="Contacto" width="100" height="50">
                </a>
            </article>
    </section>
           
    <footer>
        <p>Por favor, consulta nuestra 
            <a href="politica_proteccion.html">política de protección de datos personales</a>
        </p>
    </footer>
    
    
    <script src="js/carrito.js"></script>

</body>
</html>


