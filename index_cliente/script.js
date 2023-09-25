// script.js
window.onload = function() {
    // Realiza una solicitud AJAX para obtener los productos desde PHP
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Parsea los datos JSON recibidos
            var productos = JSON.parse(xhr.responseText);
            mostrarProductos(productos);
        }
    };
    xhr.open("GET", "obtener_productos.php", true);
    xhr.send();
};

function mostrarProductos(productos) {
    var menuTable = document.getElementById("menu");
    var rowCount = 0;
    var currentRow;

    productos.forEach(function(producto, index) {
        if (index % 4 === 0) {
            // Crea una nueva fila cada 4 productos
            currentRow = menuTable.insertRow(rowCount++);
        }

        var productoCell = currentRow.insertCell(index % 4);
        productoCell.classList.add("producto");

        var imagen = document.createElement("img");
        imagen.src = producto.imagen;

        var nombre = document.createElement("p");
        nombre.textContent = "Nombre: " + producto.nombre;

        var precio = document.createElement("p");
        precio.innerHTML = '<i class="fas fa-dollar-sign icon icon-price"></i> Precio: $' + producto.precio;

        var stock = document.createElement("p");
        stock.innerHTML = '<i class="fas fa-cubes icon icon-stock"></i> Stock: ' + producto.stock + " unidades";

        var botonCarrito = document.createElement("button");
        botonCarrito.textContent = "Añadir a carrito";
        botonCarrito.classList.add("btn-carrito");

        productoCell.appendChild(imagen);
        productoCell.appendChild(nombre);
        productoCell.appendChild(precio);
        productoCell.appendChild(stock);
        productoCell.appendChild(botonCarrito);
    });
}
