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
      <li onclick="mostrar_formulario('cliente_insertar')">Añadir</li>
      <li onclick="cargarNuevaPagina('mostrar_cliente.php')">Mostrar</li>
      <li onclick="mostrar_formulario('cliente_actualizar')">Actualizar</li>
      <li onclick="mostrar_formulario('cliente_delete')">Eliminar</li>
    </ul>
  </nav>


  <!-- formulario para clientes -->
  <div id="cliente_insertar" class="Formulario">
    <h2>Formulario Informacion de Cliente</h2>
    <form class="miFormulario" id="1">
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" id="nombre" /><br />

      <label for="direccion">Dirección:</label>
      <input type="text" name="direccion" id="direccion" /><br />

      <label for="telefono">Teléfono:</label>
      <input type="number" name="telefono" id="telefono" /><br />
      <button type="submit">Enviar</button>
    </form>
  </div>




  <!-- formulario pra actualizar clientes -->
  <div id="cliente_actualizar" class="Formulario">
    <h2> Actualizar Datos De Clientes</h2>
    <form class="miFormulario" id="2">
      <label for="id_cliente">Seleccionar Cliente:</label>
      <select id="id_cliente1" name="id_cliente" class="select">
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

      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre_a" id="nombre1" /><br />

      <label for="direccion">Dirección:</label>
      <input type="text" name="direccion_a" id="direccion1" /><br />

      <label for="telefono">Teléfono:</label>
      <input type="number" name="telefono_a" id="telefono1" /><br />

      <button type="submit">Enviar</button>
    </form>
  </div>



  <!-- formulario para eliminar clientes -->
  <div id="cliente_delete" class="Formulario">
    <h2> Eliminar Clientes</h2>

    <form class="miFormulario" id="4">
      <label for="id_cliente">Seleccionar Cliente:</label>
      <select id="id_cliente2" name="id_cliente" class="select">
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

      <button type="submit">Enviar</button>
    </form>
  </div>


  <div id="popup" class="popup">
  <div class="popup-content">
    <p> Tarea realizada correctamente</p>
  </div>
  </div>

  <iframe id="miFrame" src="" style="display: none; width: 100%"></iframe>
  <script src="../css/opcion.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    $(document).ready(function() {
      $("#1").submit(function(event) {
        event.preventDefault();
        var nombre = $("#nombre").val();
        var direccion = $("#direccion").val();
        var telefono = $("#telefono").val();

        // Crea un objeto de datos
        var datos = {
          nombre: nombre,
          direccion: direccion,
          telefono: telefono
        };
        $.ajax({
          type: "POST",
          url: "insertar_cliente.php",
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
        var id = $("#id_cliente1").val();
        var nombre = $("#nombre1").val();
        var direccion = $("#direccion1").val();
        var telefono = $("#telefono1").val();

        // Crea un objeto de datos
        var datos = {
          id: id,
          nombre: nombre,
          direccion: direccion,
          telefono: telefono
        };
        $.ajax({
          type: "POST",
          url: "actualizar_cliente.php",
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
      $("#4").submit(function(event) {
        event.preventDefault();
        var id = $("#id_cliente2").val();
        var datos = {
          id: id
        }; 


        $.ajax({
          type: "POST",
          url: "cliente_delete.php",
          data: datos,
          success: function(response) {
            // Muestra la ventana emergente
            $("#popup").fadeIn();
            // Cierra la ventana emergente 
            setTimeout(function() {
              $("#popup").fadeOut();
            }, 2000);
            $("#4")[0].reset();

          },
        });
      });
    });
  </script>
</body>

</html>