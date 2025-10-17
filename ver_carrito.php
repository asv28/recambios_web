<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Carrito</title>
    <link rel="stylesheet" href="css/carrito.css">
</head>
<body>
    <header>
        <h1>Tu carrito de compras</h1>
        <a href="index.php">← Seguir comprando</a>
    </header>

    <main>
        <div id="carrito-container"></div>
        <div id="total"></div>
        
        <div class="acciones-carrito">
            <button onclick="vaciarCarrito()">🗑️ Vaciar carrito</button>
            <button onclick="irAFinalizar()">✅ Finalizar compra</button>
        </div>
    </main>

    <script>
    // Mostrar productos del carrito
    function mostrarCarrito() {
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        const container = document.getElementById('carrito-container');
        const totalElement = document.getElementById('total');
        container.innerHTML = '';
        let total = 0;

        if (carrito.length === 0) {
            container.innerHTML = '<p>🛒 El carrito está vacío.</p>';
            totalElement.innerHTML = '';
            return;
        }

        carrito.forEach((producto, index) => {
            const item = document.createElement('div');
            item.classList.add('carrito-item');

            const subtotal = producto.precio * producto.cantidad;

            item.innerHTML = `
                <img src="${producto.img}" alt="${producto.marca}" width="100">
                <p>${producto.marca} - ${producto.codigo}</p>
                <p>Precio unitario: ${producto.precio.toFixed(2)}€</p>
                <p>Cantidad: ${producto.cantidad}</p>
                <p>Subtotal: ${subtotal.toFixed(2)}€</p>
                <button onclick="eliminarProducto(${index})">Eliminar</button>`;

            container.appendChild(item);
            total += subtotal;
});


        totalElement.innerHTML = `<h3>Total: ${total.toFixed(2)}€</h3>`;
    }

    function eliminarProducto(index) {
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        carrito.splice(index, 1);
        localStorage.setItem('carrito', JSON.stringify(carrito));
        mostrarCarrito();
        actualizarContadorCarrito();
    }

    function vaciarCarrito() {
        if (confirm("¿Seguro que deseas vaciar el carrito?")) {
            localStorage.removeItem('carrito');
            mostrarCarrito();
            actualizarContadorCarrito();
        }
    }

    function irAFinalizar() {
        window.location.href = "finalizar.php";
    }

    function actualizarContadorCarrito() {
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        const contador = document.querySelector('.carrito-count');
        if (contador) contador.textContent = carrito.length;
    }

    document.addEventListener('DOMContentLoaded', mostrarCarrito);
    </script>
</body>
</html>
