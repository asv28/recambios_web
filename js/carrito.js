console.log("carrito.js cargado correctamente");

document.addEventListener('DOMContentLoaded', () => {
    const botones = document.querySelectorAll('.add-to-cart');

    botones.forEach(boton => {
        boton.addEventListener('click', () => {
            const id = parseInt(boton.dataset.id);
            const codigo = boton.dataset.codigo;
            const marca = boton.dataset.marca;
            const precio = parseFloat(boton.dataset.precio);
            const img = boton.dataset.img;

            const producto = { id, codigo, marca, precio, img, cantidad: 1 };
            agregarAlCarrito(producto);
        });
    });

    actualizarContador();
});

function obtenerCarrito() {
    return JSON.parse(localStorage.getItem('carrito')) || [];
}

function guardarCarrito(carrito) {
    localStorage.setItem('carrito', JSON.stringify(carrito));
}

function agregarAlCarrito(producto) {
    let carrito = obtenerCarrito();
    const index = carrito.findIndex(item => item.codigo === producto.codigo);

    if (index !== -1) {
        carrito[index].cantidad += 1;
    } else {
        carrito.push(producto);
    }

    guardarCarrito(carrito);
    actualizarContador();
}

function actualizarContador() {
    const carrito = obtenerCarrito();
    const total = carrito.reduce((sum, item) => sum + item.cantidad, 0);
    const contador = document.getElementById('contador-carrito');
    if (contador) {
        contador.textContent = total;
    }
}

