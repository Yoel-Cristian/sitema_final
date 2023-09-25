      var i = 1;
  var total_c = 0;
  var total_p = 0;
  var t3 = 0;

  var verdad = true;

  function listar(a, b, c) {
    verdad = true;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "obtener_precio.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    var data = "id_producto=" + encodeURIComponent(b);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var response = JSON.parse(xhr.responseText); // Analizar la respuesta JSON

        var precio = parseInt(response.precio);
        var stock = parseInt(response.stock);


        if (a && b && c != "") {
          if (stock > 0 && stock >= c) {
            document.getElementById("tablaVentas").style.display = "block";

            const tablaVentas = document.getElementById("datos_nuevos");
            const newRow = tablaVentas.insertRow(-1);
            const cell1 = newRow.insertCell(0);
            const cell2 = newRow.insertCell(1);
            const cell3 = newRow.insertCell(2);
            const cell4 = newRow.insertCell(3);
            const cell5 = newRow.insertCell(4);
            const cell6 = newRow.insertCell(5);

            cell1.innerHTML = i++;
            cell2.innerHTML = a;
            cell3.innerHTML = b;
            cell4.innerHTML = c;
            cell5.innerHTML = precio;
            cell6.innerHTML = precio * parseInt(c);
            total_c += parseInt(c);
            total_p += precio;
            t3 += precio * parseInt((c));
            document.getElementById("cantidad_t").textContent = total_c;
            document.getElementById("precio_t").textContent = total_p;
            document.getElementById("total_todo").textContent = t3;
            var stock_nuevo = stock - c;
            actual_stock(b, stock_nuevo);
            monto_final(a)
          } else {
            alert("error con el stock");
          }

        } else {
          alert("No se completaron Todos los datos");

        }
      }

    };
    xhr.send(data);
  }


  function guardar_venta() {
    verdad = false;
    var filas = document.getElementById("datos_nuevos");
    filas.innerHTML = "";
    i = 1;
    total_c = 0;
    total_p = 0;
    t3 = 0;
    document.getElementById("tablaVentas").style.display = "none";
    alert(volver());
    alert('volver()');

  }


  function actual_stock(id_producto, otroDato) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "actual_Stock.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Construir los datos que deseas enviar como parámetros POST
    var data = "id_producto=" + encodeURIComponent(id_producto) + "&otroDato=" + encodeURIComponent(otroDato);

    xhr.send(data);
  }

  function monto_final(id_venta) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "monto_totales.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    var data = "id_venta=" + encodeURIComponent(id_venta);

    xhr.send(data);
  }



  function actualizar_pagina() {
    $.ajax({
      url: "actualizar_stock.php",
      type: "POST",
      success: function(nuevoContenido) {
        $("#id_producto").html(nuevoContenido);
      }
    });

  }
//

function mostrar_formulario(divId) {
    // Obtén todos los elementos con la clase común a los divs
    var elementos = document.querySelectorAll(".Formulario");
    document.getElementById("miFrame").style.display = "none";
  
  
    elementos.forEach(function (elemento) {
      elemento.style.display = "none";
    });
  
    var div = document.getElementById(divId);
  
    if (div.style.display === "none") {
      div.style.display = "block";
    } else {
      div.style.display = "none";
    }
  }
  
  function cargarNuevaPagina(r) {
    var elementos = document.querySelectorAll(".Formulario");
  
    // Oculta todos los divs
    elementos.forEach(function (elemento) {
      elemento.style.display = "none";
    });
  
  
    
    var iframe = document.getElementById("miFrame");
    iframe.src = r;
    iframe.style.display = "block";
  }
  