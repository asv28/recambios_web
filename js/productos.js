// Función para cargar productos desde la API con filtros opcionales
function cargarProductos(categoria = "", fabricante = "") {
  let url = "/recambios_web1/api/productos.php";
  const params = new URLSearchParams();

  if (categoria) params.append("categoria", categoria);
  if (fabricante) params.append("fabricante", fabricante);

  if ([...params].length > 0) {
    url += "?" + params.toString();
  }

  fetch(url)
    .then(res => res.json())
    .then(data => {
      const contenedor = document.getElementById("contenedor-productos");
      contenedor.innerHTML = ""; // Limpiar contenedor

      if (!Array.isArray(data) || data.length === 0) {
        contenedor.innerHTML = "<p>No hay productos disponibles.</p>";
        return;
      }

      data.forEach(producto => {
        contenedor.innerHTML += `
          <div class="producto">
            <h3>${producto.nombre}</h3>
            <img src="${producto.imagen}" alt="${producto.nombre}" />
            <p>${producto.descripcion || ""}</p>
            <p>Precio: ${producto.precio} €</p>
            <button 
              class="add-to-cart" 
              data-codigo="${producto.id}" 
              data-marca="${producto.fabricante}" 
              data-precio="${producto.precio}" 
              data-img="${producto.imagen}">
              Añadir al carrito
            </button>
          </div>
        `;
      });

      // Agregar eventos a los botones recién renderizados
      document.querySelectorAll('.add-to-cart').forEach(boton => {
        boton.addEventListener('click', () => {
          const codigo = boton.dataset.codigo;
          const marca = boton.dataset.marca;
          const precio = parseFloat(boton.dataset.precio);
          const img = boton.dataset.img;

          const producto = { codigo, marca, precio, img, cantidad: 1 };
          agregarAlCarrito(producto);
        });
      });
    })
    .catch(error => {
      console.error("Error al cargar productos:", error);
    });
}

// Simula la lógica del carrito usando localStorage
function agregarAlCarrito(producto) {
  let carrito = JSON.parse(localStorage.getItem("carrito")) || [];

  const index = carrito.findIndex(p => p.codigo === producto.codigo);
  if (index !== -1) {
    carrito[index].cantidad += 1;
  } else {
    carrito.push(producto);
  }

  localStorage.setItem("carrito", JSON.stringify(carrito));
  actualizarContador();
}

function actualizarContador() {
  const carrito = JSON.parse(localStorage.getItem("carrito")) || [];
  const total = carrito.reduce((sum, item) => sum + item.cantidad, 0);
  const contador = document.getElementById("contador-carrito");
  if (contador) {
    contador.textContent = total;
  }
}

// Carga inicial
document.addEventListener("DOMContentLoaded", () => {
  cargarProductos(); // Puedes pasarle filtros si quieres
  actualizarContador();
});
