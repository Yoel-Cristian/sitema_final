<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="http://localhost/sistema/css/formulario.css" />
</head>

<body>
  <nav>
    <ul>
      <li onclick="mostrar_formulario('insertar')">Añadir</li>
      <li onclick="cargarNuevaPagina('mostrar_detalle.php')">Mostrar </li>
      <!-- <li onclick="cargarNuevaPagina('actualizar')">Imprimir factura </li> -->
    </ul>
  </nav>


  <div class="detalles">
    <div id="insertar" class="Formulario">
      <h1>Formulario</h1>
      <label for="id_venta">Selecionar Venta:</label>
      <select id="id_venta" name="id_venta" class="select">
        <option selected disabled class="option-default">
          [id] - [fecha] - [cliente] - [descuento (%)]
        </option>
        <?php
        $conexion = new mysqli("localhost", "root", "", "sistema");
        $consulta = "SELECT id ,fecha ,rut_cliente, descuento  FROM ventas";
        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetch_assoc()) {
          $id_venta = $fila["id"];
          $fecha = $fila["fecha"];
          $rut_cliente = $fila["rut_cliente"];
          $descuento = $fila["descuento"];
          echo "<option value='$id_venta'> [$id_venta] - [$fecha] - [$rut_cliente] - [$descuento] </option>";
        }
        $conexion->close();
        ?>
      </select><br /><br />

      <form id="miFormulario">
        <label for="id_producto">Seleccionar Producto:</label>
        <select id="id_producto" name="id_producto" class="select">
          <option selected disabled class="option-default">
            [id] -
            [nombre] -
            [precio] -
            [stock]

          </option>
          <?php
          $conexion = new mysqli("localhost", "root", "", "sistema");
          $consulta = "SELECT id,
          nombre,
          precio,
          stock,
          rut_proveedor,
          id_categoria
           FROM productos";
          $resultado = $conexion->query($consulta);

          while ($fila = $resultado->fetch_assoc()) {
            $id = $fila['id'];
            $nombre = $fila['nombre'];

            $precio = $fila['precio'];
            $stock = $fila['stock'];

            echo "<option value='$id'>[$id] - [$nombre] - [$precio] - [$stock]</option>";
          }
          $conexion->close();
          ?>
        </select><br /><br />

        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" step="0.01" /><br /><br />

        <input type="submit" value="Registrar" />
        <input type="button" onclick="guardar_venta()" value="Guardar Recibo" />
      </form>
    </div>
  </div>



  <iframe id="miFrame" src="" style="display: none; width: 100%"></iframe>


  <br>
  <table id="tablaVentas">
    <thead>
      <tr>
        <th>Nro.</th>
        <th>ID de Venta</th>
        <th>ID de Producto</th>
        <th>Cantidad</th>
        <th>Precio Unitario (bs)</th>
        <th>Precio Total(bs)</th>
      </tr>
    </thead>

    <tbody id="datos_nuevos">
    </tbody>

    <tfoot>
      <tr>
        <th colspan="3">TOTAL </th>
        <th id="cantidad_t"></th>
        <th id="precio_t"></th>
        <th id="total_todo"></th>

      </tr>
    </tfoot>
  </table>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../css/detalle_ventas.js"></script>
  <script>
    $(document).ready(function() {
      $("#miFormulario").submit(function(event) {
        event.preventDefault();

        var id_venta = $("#id_venta").val();
        var id_producto = $("#id_producto").val();
        var cantidad = $("#cantidad").val();
        // Crea un objeto de datos
        var datos = {
          id_venta: id_venta,
          id_producto: id_producto,
          cantidad: cantidad
        };

        // 
        $.ajax({
          type: "POST",
          url: "insertar_detalle.php",
          data: datos,
          success: function(response) {
            // Limpia el formulario
            actualizar_pagina();
            $("#miFormulario")[0].reset();
            listar(id_venta, id_producto, cantidad);


          },
        });
      });


    });
</script>




</body>

</html>