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
      <li onclick="cargarNuevaPagina('mostrar_categoria.php')">Mostrar</li>
      <li onclick="mostrar_formulario('actualizar')">Actualizar</li>
      <li onclick="mostrar_formulario('eliminar')">Eliminar</li>
    </ul>
  </nav>
  <div id="insertar" class="Formulario">
    <h2>Formulario Categoría</h2>
    <form id="1">
      <label for="nombre_categoria">Nombre:</label>
      <input type="text" name="nombre" id="nombre" /><br />
      <br />

      <label for="descripcion_categoria">Descripción:</label>
      <textarea name="descripcion" id="descripcion"></textarea><br />
      <button type="submit">Enviar</button>
    </form>
  </div>



  <!-- formulario actualizar categoria -->
  <div id="actualizar" class="Formulario">
    <h2>Actualizar Informacion De Categoria</h2>
    <form id="2">
      <label for="id">Seleccionar Cliente:</label>
      <select id="id" name="id_cliente" class="select">
        <option selected disabled class="option-default">
          [id] - [nombre] - [descripcion]
        </option>
        <?php
        $conexion = new mysqli("localhost", "root", "", "sistema");
        $consulta = "SELECT id, nombre, descripcion FROM categorias";
        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetch_assoc()) {
          $rut = $fila['id'];
          $nombre = $fila['nombre'];
          $descripcion = $fila['descripcion'];

          echo "<option value='$rut'>[$rut] - [$nombre] - [$descripcion] </option>";
        }
        $conexion->close();
        ?>
      </select><br /><br />
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" id="nombre1" /><br />
      <br />

      <label for="descripcion_categoria">Descripción:</label>
      <textarea name="descripcion" id="descripcion1"></textarea><br />
      <button type="submit">Enviar</button>
    </form>
  </div>


  <!-- formulario opara eliminar categoria -->
  <div id="eliminar" class="Formulario">
    <h2> Eliminar Categoria</h2>

    <form id="3">
      <label for="id">Seleccionar Cliente:</label>
      <select id="id1" name="id_cliente" class="select">
        <option selected disabled class="option-default">
          [id] - [nombre] - [descripcion]
        </option>
        <?php
        $conexion = new mysqli("localhost", "root", "", "sistema");
        $consulta = "SELECT id, nombre, descripcion FROM categorias";
        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetch_assoc()) {
          $rut = $fila['id'];
          $nombre = $fila['nombre'];
          $descripcion = $fila['descripcion'];

          echo "<option value='$rut'>[$rut] - [$nombre] - [$descripcion] </option>";
        }
        $conexion->close();
        ?>
      </select><br /><br />

      <button type="submit">Enviar</button>
    </form>
  </div>




  <iframe id="miFrame" src="" style="display: none; width: 100%"></iframe>
  <div id="popup" class="popup">
    <div class="popup-content">
      <p> Tarea realizada correctamente</p>
    </div>
  </div>





  <script src="../css/opcion.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#1").submit(function(event) {
        event.preventDefault();
        var nombre = $("#nombre").val();
        var descripcion = $("#descripcion").val();

        // Crea un objeto de datos
        var datos = {
          nombre: nombre,
          descripcion: descripcion
        };

        $.ajax({
          type: "POST",
          url: "insertar_categoria.php", // Actualiza la URL según tu archivo PHP
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
        var id = $("#id").val();
        var nombre = $("#nombre1").val();
        var descripcion = $("#descripcion1").val();
        // Crea un objeto de datos
        var datos = {
          id: id,
          nombre: nombre,
          descripcion: descripcion
   
        };

        $.ajax({
          type: "POST",
          url: "actualizar_categoria.php",
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
        var id = $("#id1").val();
        var datos = {
          id: id
        }; // Debe ser un objeto con una clave "id"


        $.ajax({
          type: "POST",
          url: "delete_categoria.php",
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