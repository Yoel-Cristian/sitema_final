<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="http://localhost/sistema_2/css/formulario.css" />
</head>

<body>
  <nav>
    <ul>
      <li onclick="mostrar_formulario('insertar')">Añadir</li>
      <li onclick="cargarNuevaPagina('mostrar_venta.php')">Mostrar</li>
      <li onclick="mostrar_formulario('actualizar')">Actualizar</li>
      <li onclick="mostrar_formulario('eliminar')">Eliminar</li>
    </ul>
  </nav>






  <!-- formulario para registrar venta -->
  <div id="insertar" class="Formulario">
    <h1>Registrar Ventas</h1>
    <form  action="insertar_venta.php"  method="post" id="1">
      <label for="fecha">Fecha:</label>
      <input type="date" id="fecha" name="fecha" /><br /><br />

      <label for="rut_cliente">Cliente:</label>
      <select id="rut_cliente" name="rut_cliente">
        <option selected disabled>Seleccione Usuario</option>
        <?php
        $conexion = new mysqli("localhost", "root", "", "sistema");
        $consulta = "SELECT rut	, nombre	, direccion	,telefono	FROM clientes";
        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetch_assoc()) {
          $id = $fila['rut'];
          $nombre = $fila['nombre'];
          $direccion = $fila['direccion'];
          $telefono = $fila['telefono'];

          echo "<option value='$id'> $id - $nombre - $direccion - $telefono</option>";
        }

        $conexion->close();
        ?>
      </select><br /><br />



      <label for="descuento">Descuento (%):</label>
      <input type="number" id="descuento" name="descuento" step="0.01" /><br /><br />

      <label for="monto_final">Monto Final:</label>
      <input type="number" id="monto_final" name="monto_final" step="0.01" value="0" /><br /><br />

      <input type="submit" value="Guardar" />
    </form>
  </div>






  <!-- formulario para actualizar -->
  <div id="actualizar" class="Formulario">
    <h2>Actualizar Informacion de Categorias</h2>
    <form  action="actualizar_venta.php" method="post"  id="2">


      <label for="id_venta">Seleccionar Venta:</label>
      <select id="id_venta1" name="id" class="select">
        <option selected disabled class="option-default">
          [ID] - [Fecha] - [Cliente] - [Descuento] - [Monto Final]
        </option>
        <?php
        $conexion = new mysqli("localhost", "root", "", "sistema");
        $consulta = "SELECT id, fecha, rut_cliente, descuento, monto_final FROM ventas";
        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetch_assoc()) {
          $id_venta = $fila["id"];
          $fecha_venta = $fila["fecha"];
          $rut_cliente = $fila["rut_cliente"];
          $descuento = $fila["descuento"];
          $monto_final = $fila["monto_final"];

          echo "<option value='$id_venta'> [$id_venta] - [$fecha_venta] - [$rut_cliente] - [$descuento] - [$monto_final] </option>";
        }
        $conexion->close();
        ?>
      </select><br /><br />



      <label for="fecha">Fecha:</label>
      <input type="date" id="fecha1" name="fecha" /><br /><br />

      <label for="id_cliente">Seleccionar Cliente:</label>
      <select id="rut_cliente1" name="rut_cliente" class="select">
        <option selected disabled class="option-default">
          [rut] - [nombre] - [direccion] - [telefono]
        </option>
        <?php
        $conexion = new mysqli("localhost", "root", "", "sistema");
        $consulta = "SELECT rut, nombre, direccion, telefono FROM clientes";
        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetch_assoc()) {
          $rut = $fila['rut'];
          $nombre = $fila['nombre'];
          $direccion = $fila['direccion'];
          $telefono = $fila['telefono'];

          echo "<option value='$rut'>[$rut] - [$nombre] - [$direccion] - [$telefono]</option>";
        }
        $conexion->close();
        ?>
      </select><br /><br />





      <label for="descuento">Descuento (%):</label>
      <input type="number" id="descuento1" name="descuento" step="0.01" /><br /><br />

      <label for="monto_final">Monto Final:</label>
      <input type="number" id="monto_final1" name="monto_final" step="0.01" value="0" /><br /><br />

      <input type="submit" value="Guardar" />
    </form>
  </div>



  <!-- formulario para borrar -->
  <div id="eliminar" class="Formulario">
    <h2>eliminar Venta</h2>

    <form action="delete_venta.php" method="post" id="3">
      <label for="id_venta2">Seleccionar Venta:</label>
      <select id="id_venta2" name="id_delete" class="select">
        <option selected disabled class="option-default">
          [ID] - [Fecha] - [Cliente] - [Descuento] - [Monto Final]
        </option>
        <?php
        $conexion = new mysqli("localhost", "root", "", "sistema");
        $consulta = "SELECT id, fecha, rut_cliente, descuento, monto_final FROM ventas";
        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetch_assoc()) {
          $id_venta = $fila["id"];
          $fecha_venta = $fila["fecha"];
          $rut_cliente = $fila["rut_cliente"];
          $descuento = $fila["descuento"];
          $monto_final = $fila["monto_final"];

          echo "<option value='$id_venta'> [$id_venta] - [$fecha_venta] - [$rut_cliente] - [$descuento] - [$monto_final] </option>";
        }
        $conexion->close();
        ?>
      </select><br /><br />
      <button type="submit">Enviar</button>
    </form>
  </div>

  <!-- ventana -->
  <div id="popup" class="popup">
    <div class="popup-content">
      <p> Tarea realizada correctamente</p>
    </div>
  </div>

  <iframe id="miFrame" src="" style="display: none; width: 100%"></iframe>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="opcion.js"></script>
  <script>
    // $(document).ready(function() {
    //   $("#1").submit(function(event) {
    //     event.preventDefault();
    //     var fecha = $("#fecha").val();
    //     var rut_cliente = $("#rut_cliente").val();
    //     var descuento = $("#descuento").val();
    //     var monto_final = $("#monto_final").val();

    //     // Crea un objeto de datos
    //     var datos = {
    //       fecha: fecha,
    //       rut_cliente: rut_cliente,
    //       descuento: descuento,
    //       monto_final: monto_final

    //     };

    //     $.ajax({
    //       type: "POST",
    //       url: "insertar_venta.php", // Actualiza la URL según tu archivo PHP
    //       data: datos,
    //       success: function(response) {
    //         // Muestra la ventana emergente
    //         $("#popup").fadeIn();
    //         // Cierra la ventana emergente
    //         setTimeout(function() {
    //           $("#popup").fadeOut();
    //         }, 2000);
    //         $("#1")[0].reset();
    //       },
    //     });
    //   });
    // });




    // $(document).ready(function() {
    //   $("#2").submit(function(event) {
    //     event.preventDefault();
    //     var id_ve = $("#id_venta1").val();
    //     var fecha = $("#fecha1").val();
    //     var id_c = $("#rut_cliente1").val();
    //     var descuento = $("#descuento1").val();
    //     var monto = $("#monto_final1").val();

    //     // Crea un objeto de datos
    //     var datos = {
    //       id: id_ve,
    //       fecha: fecha,
    //       rut_cliente: id_c,
    //       descuento: descuento,
    //       monto_final: monto

    //     };
    //     $.ajax({
    //       type: "POST",
    //       url: "actualizar_venta.php",
    //       data: datos,
    //       success: function(response) {
    //         // Muestra la ventana emergente
    //         $("#popup").fadeIn();
    //         // Cierra la ventana emergente
    //         setTimeout(function() {
    //           $("#popup").fadeOut();
    //         }, 2000);
    //         $("#2")[0].reset();
    //       },
    //     });
    //   });
    // });

    // $(document).ready(function() {
    //   $("#3").submit(function(event) {
    //     event.preventDefault();
    //     var id = $("#id_venta2").val();
    //     var datos = {
    //       id_delete: id
    //     }; // Debe ser un objeto con una clave "id"


    //     $.ajax({
    //       type: "POST",
    //       url: "delete_venta.php",
    //       data: datos,
    //       success: function(response) {
    //         // Muestra la ventana emergente
    //         $("#popup").fadeIn();
    //         // Cierra la ventana emergente 
    //         setTimeout(function() {
    //           $("#popup").fadeOut();
    //         }, 2000);
    //         $("#3")[0].reset();

    //       },
    //     });
    //   });
    // });
  </script>



</body>

</html>