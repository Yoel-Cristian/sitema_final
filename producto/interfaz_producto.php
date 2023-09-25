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
      <li onclick="mostrar_formulario('producto_insertar')">Añadir</li>
      <li onclick="cargarNuevaPagina('mostrar_producto.php')">Mostrar</li>
      <li onclick="mostrar_formulario('producto_actualizar')">Actualizar</li>
      <li onclick="mostrar_formulario('producto_delete')">Eliminar</li>
    </ul>
  </nav>




<!-- formulario para insertar prodcutos -->
  <div class="Formulario" id="producto_insertar">
    <h2>Formulario Informacion de Producto</h2>
    <form  class="miFormulario" id="1">

      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" id="nombre" /><br />

      <label for="precio">Precio:</label>
      <input type="number" step="0.01" name="precio" id="precio" /><br />

      <label for="stock">Stock:</label>
      <input type="number" name="stock" id="stock" min="0" /><br />

      <label for="rut_proveedor">RUT Proveedor:</label>
      <select id="rut_proveedor" name="rut_proveedor" class="select">
                        <option selected disabled class="option-default">
                          [rut] - [nombre] - [direccion] - [telefono] - [pagina_web]
                        </option>
                        <?php
                        $conexion = new mysqli("localhost", "root", "", "sistema");
                        $consulta = "SELECT rut,	nombre,	direccion,	telefono,	pagina_web	
                        FROM proveedores";
                        $resultado = $conexion->query($consulta);

                        while ($fila = $resultado->fetch_assoc()) {
                          $rut = $fila["rut"];
                          $nombre = $fila["nombre"];
                          $direccion = $fila["direccion"];
                          $telefono = $fila["telefono"];
                          $pagina_web = $fila["pagina_web"];

                          echo "<option value='$rut'> [$rut] - [$nombre] - [$direccion] - [$telefono] - [$pagina_web] </option>";
                        }
                        $conexion->close();
                        ?>
      </select><br /><br />

      <label for="id_categoria">Seleccionar Categoría:</label>
      <select id="id_categoria" name="id_categoria" class="select">
                          <option selected disabled class="option-default">
                            [id] - [nombre] - [descripcion]
                          </option>
                          <?php
                          $conexion = new mysqli("localhost", "root", "", "sistema");
                          $consulta = "SELECT id, nombre, descripcion FROM categorias";
                          $resultado = $conexion->query($consulta);

                          while ($fila = $resultado->fetch_assoc()) {
                            $id_categoria = $fila["id"];
                            $nombre_categoria = $fila["nombre"];
                            $descripcion_categoria = $fila["descripcion"];
                            echo "<option value='$id_categoria'> [$id_categoria] - [$nombre_categoria] - [$descripcion_categoria] </option>";
                          }
                          $conexion->close();
                          ?>
      </select><br /><br />

      <button type="submit">Enviar</button>
    </form>
  </div>



<!-- Formulario para actualizar datos de los productos -->
  <div class="Formulario" id="producto_actualizar">
    <h2>Actualiza Datos Producto</h2>
    <form class="miFormulario" id="2">
      <label for="id_producto">Seleccionar Producto a Actualizar:</label>
      <select id="id_producto1" name="id_producto" class="select">
                <option selected disabled class="option-default">
                  [id] - [nombre] - [precio] - [stock] - [rut_proveedor] - [id_categoria]
                </option>
                <?php
                $conexion = new mysqli("localhost", "root", "", "sistema");
                $consulta = "SELECT id, nombre, precio, stock, rut_proveedor, id_categoria FROM productos";
                $resultado = $conexion->query($consulta);

                while ($fila = $resultado->fetch_assoc()) {
                  $id_producto = $fila["id"];
                  $nombre_producto = $fila["nombre"];
                  $precio_producto = $fila["precio"];
                  $stock_producto = $fila["stock"];
                  $rut_proveedor_producto = $fila["rut_proveedor"];
                  $id_categoria_producto = $fila["id_categoria"];
                  echo "<option value='$id_producto'> [$id_producto] - [$nombre_producto] - [$precio_producto] - [$stock_producto] - [$rut_proveedor_producto] - [$id_categoria_producto] </option>";
                }
                $conexion->close();
                ?>
      </select><br /><br />


      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" id="nombre1" /><br />

      <label for="precio">Precio:</label>
      <input type="number" step="0.01" name="precio1" id="precio1" /><br />

      <label for="stock">Stock:</label>
      <input type="number" name="stock" id="stock1" min="0" /><br />

      <label for="rut_proveedor">RUT Proveedor:</label>
      <select id="rut_proveedor1" name="rut_proveedor" class="select">
                  <option selected disabled class="option-default">
                    [rut] - [nombre] - [direccion] - [telefono] - [pagina_web]
                  </option>
                  <?php
                  $conexion = new mysqli("localhost", "root", "", "sistema");
                  $consulta = "SELECT rut,	nombre,	direccion,	telefono,	pagina_web	
                  FROM proveedores";
                  $resultado = $conexion->query($consulta);

                  while ($fila = $resultado->fetch_assoc()) {
                    $rut = $fila["rut"];
                    $nombre = $fila["nombre"];
                    $direccion = $fila["direccion"];
                    $telefono = $fila["telefono"];
                    $pagina_web = $fila["pagina_web"];

                    echo "<option value='$rut'> [$rut] - [$nombre] - [$direccion] - [$telefono] - [$pagina_web] </option>";
                  }
                  $conexion->close();
                  ?>
      </select><br /><br />

      <label for="id_categoria1">Seleccionar Categoría:</label>
      <select id="id_categoria1" name="id_categoria" class="select">
                    <option selected disabled class="option-default">
                      [id] - [nombre] - [descripcion]
                    </option>
                    <?php
                    $conexion = new mysqli("localhost", "root", "", "sistema");
                    $consulta = "SELECT id, nombre, descripcion FROM categorias";
                    $resultado = $conexion->query($consulta);

                    while ($fila = $resultado->fetch_assoc()) {
                      $id_categoria = $fila["id"];
                      $nombre_categoria = $fila["nombre"];
                      $descripcion_categoria = $fila["descripcion"];
                      echo "<option value='$id_categoria'> [$id_categoria] - [$nombre_categoria] - [$descripcion_categoria] </option>";
                    }
                    $conexion->close();
                    ?>
      </select><br /><br />
      <button type="submit">Enviar</button>
    </form>
  </div>




  <!-- Formulario para eliminar producto -->
  <div id="producto_delete" class="Formulario">
    <h2>Formulario Eliminar Datos</h2>

    <form id="3" class="miFormulario">
      <label for="id_producto2">Seleccionar Producto a Eliminar:</label>
      <select id="id_producto2" name="id_producto" class="select">
                    <option selected disabled class="option-default">
                      [id] - [nombre] - [precio] - [stock] - [rut_proveedor] - [id_categoria]
                    </option>
                    <?php
                    $conexion = new mysqli("localhost", "root", "", "sistema");
                    $consulta = "SELECT id, nombre, precio, stock, rut_proveedor, id_categoria FROM productos";
                    $resultado = $conexion->query($consulta);

                    while ($fila = $resultado->fetch_assoc()) {
                      $id_producto = $fila["id"];
                      $nombre_producto = $fila["nombre"];
                      $precio_producto = $fila["precio"];
                      $stock_producto = $fila["stock"];
                      $rut_proveedor_producto = $fila["rut_proveedor"];
                      $id_categoria_producto = $fila["id_categoria"];
                      echo "<option value='$id_producto'> [$id_producto] - [$nombre_producto] - [$precio_producto] - [$stock_producto] - [$rut_proveedor_producto] - [$id_categoria_producto] </option>";
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

  <!-- Frmae -->
  <iframe id="miFrame" src="" style="display: none; width: 100%"></iframe>


<!-- scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../css/opcion.js"> </script>
  <script>

    $(document).ready(function() {
      $("#1").submit(function(event) {
        event.preventDefault();
        var nombre = $("#nombre").val();
        var precio = $("#precio").val();
        var stock = $("#stock").val();
        var rut_proveedor = $("#rut_proveedor").val();
        var id_categoria = $("#id_categoria").val();
        // Crea un objeto de datos
        var datos = {
          nombre: nombre,
          precio: precio,
          stock: stock,
          rut_proveedor: rut_proveedor,
          id_categoria: id_categoria

        };
        $.ajax({
          type: "POST",
          url: "insertar_producto.php",
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
        var id_producto_actualizar=$("#id_producto1").val();
        var nombre = $("#nombre1").val();
        var precio = $("#precio1").val();
        var stock = $("#stock1").val();
        var rut_proveedor = $("#rut_proveedor1").val();
        var id_categoria = $("#id_categoria1").val();
        // Crea un objeto de datos
        var datos = {
          id_producto_actualizar: id_producto_actualizar,
          nombre: nombre,
          precio: precio,
          stock: stock,
          rut_proveedor: rut_proveedor,
          id_categoria: id_categoria

        };
        $.ajax({
          type: "POST",
          url: "actualizar_producto.php",
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
        var id=$("#id_producto2").val();
        var datos = { id: id }; // Debe ser un objeto con una clave "id"


        $.ajax({
          type: "POST",
          url: "producto_delete.php",
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