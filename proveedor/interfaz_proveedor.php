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
      <li onclick="mostrar_formulario('proveedor_insertar')">Añadir</li>
      <li onclick="cargarNuevaPagina('mostrar_proveedor.php')">Mostrar</li>
      <li onclick="mostrar_formulario('proveedor_actualizar')">Actualizar</li>
      <li onclick="mostrar_formulario('proveedor_delete')">Eliminar</li>
    </ul>
  </nav>

  <!-- formulario para proveedores -->
  <div id="proveedor_insertar" class="Formulario">
    <h2>Formulario Informacion de Proveedores</h2>
    <form id="1">
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" id="nombre" /><br />

      <label for="direccion">Dirección:</label>
      <input type="text" name="direccion" id="direccion" /><br />

      <label for="telefono">Teléfono:</label>
      <input type="number" name="telefono" id="telefono" /><br />

      <label for="pagina_web">Página Web:</label>
      <input type="text" name="pagina_web" id="pagina_web" /><br />

      <!-- Agrega un botón para enviar el formulario -->
      <button type="submit">Enviar</button>
    </form>
  </div>


  <!-- formulario para actualizar proveedores -->
  <div id="proveedor_actualizar" class="Formulario">
    <h2>Formulario Proveedor Actualizar Datos</h2>

    <form id="2">
      <label for="id_proveedor">Seleccionar Proveedor:</label>
      <select id="id_proveedor1" name="id_proveedor" class="select">
        <option selected disabled class="option-default">
          [rut] - [nombre] - [direccion] - [telefono] - [pagina_web]
        </option>
        <?php
        $conexion = new mysqli("localhost", "root", "", "sistema");
        $consulta = "SELECT rut, nombre, direccion, telefono, pagina_web FROM proveedores";
        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetch_assoc()) {
          $rut_proveedor = $fila["rut"];
          $nombre_proveedor = $fila["nombre"];
          $direccion_proveedor = $fila["direccion"];
          $telefono_proveedor = $fila["telefono"];
          $pagina_web_proveedor = $fila["pagina_web"];
          echo "<option value='$rut_proveedor'> [$rut_proveedor] - [$nombre_proveedor] - [$direccion_proveedor] - [$telefono_proveedor] - [$pagina_web_proveedor] </option>";
        }
        $conexion->close();
        ?>
      </select><br /><br />

      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre_a" id="nombre1" /><br />

      <label for="direccion">Dirección:</label>
      <input type="text" name="direccion_a" id="direccion1" /><br />

      <label for="telefono">Teléfono:</label>
      <input type="number" name="telefono_a" id="telefono1" /><br />

      <label for="pagina_web">Página Web:</label>
      <input type="text" name="pagina_web_a" id="pagina_web1" /><br />

      <!-- Agrega un botón para enviar el formulario -->
      <button type="submit">Enviar</button>
    </form>
  </div>
  <div id="proveedor_delete" class="Formulario">
    <h2> Eliminar Proveedor</h2>

    <form id="3">
      <label for="id_proveedor">Seleccionar Proveedor:</label>
      <select id="id_proveedor2" name="id_proveedor" class="select">
        <option selected disabled class="option-default">
          [rut] - [nombre] - [direccion] - [telefono] - [pagina_web]
        </option>
        <?php
        $conexion = new mysqli("localhost", "root", "", "sistema");
        $consulta = "SELECT rut, nombre, direccion, telefono, pagina_web FROM proveedores";
        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetch_assoc()) {
          $rut_proveedor = $fila["rut"];
          $nombre_proveedor = $fila["nombre"];
          $direccion_proveedor = $fila["direccion"];
          $telefono_proveedor = $fila["telefono"];
          $pagina_web_proveedor = $fila["pagina_web"];
          echo "<option value='$rut_proveedor'> [$rut_proveedor] - [$nombre_proveedor] - [$direccion_proveedor] - [$telefono_proveedor] - [$pagina_web_proveedor] </option>";
        }
        $conexion->close();
        ?>
      </select><br /><br />

      <button type="submit">Enviar</button>
    </form>
  </div>
  <iframe id="miFrame" src="" style="display: none; width: 100%"></iframe>


  <!-- alert -->
  <div id="popup" class="popup">
  <div class="popup-content">
    <p> Tarea realizada correctamente</p>
  </div>
  </div>

  <script src="../css/opcion.js"> </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#1").submit(function(event) {
        event.preventDefault();
        var nombre = $("#nombre").val();
        var direccion = $("#direccion").val();
        var telefono = $("#telefono").val();
        var pagina_web = $("#pagina_web").val();

        // Crea un objeto de datos
        var datos = {
          nombre: nombre,
          direccion: direccion,
          telefono: telefono,
          pagina_web: pagina_web
        };

        $.ajax({
          type: "POST",
          url: "insertar_proveedor.php", // Actualiza la URL según tu archivo PHP
          data: datos,
          success: function(response) {
            // Muestra la ventana emergente
            $("#popup").fadeIn();
            // Cierra la ventana emergente
            setTimeout(function() {
              $("#popup").fadeOut();
            }, 2000);
            $("#1")[0].reset();
          },
        });
      });
    });

    $(document).ready(function() {
      $("#2").submit(function(event) {
        event.preventDefault();
        var id = $("#id_proveedor1").val();
        var nombre = $("#nombre1").val();
        var direccion = $("#direccion1").val();
        var telefono = $("#telefono1").val();
        var pagina_web = $("#pagina_web1").val();

        // Crea un objeto de datos
        var datos = {
          id: id,
          nombre: nombre,
          direccion: direccion,
          telefono: telefono,
          pagina_web: pagina_web
        };

        $.ajax({
          type: "POST",
          url: "actualizar_proveedor.php",
          data: datos,
          success: function(response) {
            // Muestra la ventana emergente
            $("#popup").fadeIn();
            // Cierra la ventana emergente
            setTimeout(function() {
              $("#popup").fadeOut();
            }, 2000);
            $("#2")[0].reset();
          },
        });
      });
    });

    $(document).ready(function() {
      $("#3").submit(function(event) {
        event.preventDefault();
        var id = $("#id_producto2").val();
        var datos = {
          id: id
        }; // Debe ser un objeto con una clave "id"


        $.ajax({
          type: "POST",
          url: "proveedor_delete.php",
          data: datos,
          success: function(response) {
            // Muestra la ventana emergente
            $("#popup").fadeIn();
            // Cierra la ventana emergente 
            setTimeout(function() {
              $("#popup").fadeOut();
            }, 2000);
            $("#3")[0].reset();

          },
        });
      });
    });
  </script>

</body>

</html>