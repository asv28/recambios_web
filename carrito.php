<h2>Carrito de compras</h2>
<div id="contenido-carrito"></div>

<a href="#" onclick="volverACategoria()" class="boton">← Seguir comprando</a>
<link rel="stylesheet" href="css/carrito.css">


<script>
function volverACategoria() {
  const tipo = localStorage.getItem("ultimaCategoria") || "aceite"; // valor por defecto
  window.location.href = "categoria.php?tipo=" + tipo;
}
</script>

<button onclick="vaciarCarrito()">Vaciar carrito</button>
<p id="total-carrito">Total: 0 €</p>

<script>
function obtenerCarrito() {
    return JSON.parse(localStorage.getItem('carrito')) || [];
}

function guardarCarrito(carrito) {
    localStorage.setItem('carrito', JSON.stringify(carrito));
}

function renderizarCarrito() {
    const carrito = obtenerCarrito();
    const contenedor = document.getElementById("contenido-carrito");
    contenedor.innerHTML = "";

    if (carrito.length === 0) {
        contenedor.innerHTML = "<p>El carrito está vacío.</p>";
        document.getElementById("total-carrito").textContent = "Total: 0 €";
        return;
    }

    const tabla = document.createElement("table");
    tabla.innerHTML = `
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody></tbody>
    `;

    let total = 0;
    const tbody = tabla.querySelector("tbody");

    carrito.forEach((producto, index) => {
        const subtotal = producto.precio * producto.cantidad;
        total += subtotal;

        const fila = document.createElement("tr");
        fila.innerHTML = `
            <td><img src="${producto.img}" alt="${producto.codigo}" width="50"></td>
            <td>${producto.marca}<br><small>${producto.codigo}</small></td>
            <td>${producto.precio.toFixed(2)} €</td>
            <td>
                <input type="number" min="1" value="${producto.cantidad}" onchange="cambiarCantidad(${index}, this.value)">
            </td>
            <td>${subtotal.toFixed(2)} €</td>
            <td><button onclick="eliminarProducto(${index})">❌</button></td>
        `;
        tbody.appendChild(fila);
    });

    contenedor.appendChild(tabla);
    document.getElementById("total-carrito").textContent = `Total: ${total.toFixed(2)} €`;
}

function cambiarCantidad(index, nuevaCantidad) {
    const carrito = obtenerCarrito();
    carrito[index].cantidad = parseInt(nuevaCantidad);
    guardarCarrito(carrito);
    renderizarCarrito();
}

function eliminarProducto(index) {
    const carrito = obtenerCarrito();
    carrito.splice(index, 1);
    guardarCarrito(carrito);
    renderizarCarrito();
}

function vaciarCarrito() {
    localStorage.removeItem("carrito");
    renderizarCarrito();
}

document.addEventListener("DOMContentLoaded", renderizarCarrito);
</script>

<button onclick="irAFinalizar()">Finalizar pedido</button>

<script>
function irAFinalizar() {
    const carrito = obtenerCarrito();

    fetch("sincronizar_carrito.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ carrito })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            window.location.href = "finalizar.php";
        } else {
            alert("Error al preparar el pedido.");
        }
    });
}
</script>
