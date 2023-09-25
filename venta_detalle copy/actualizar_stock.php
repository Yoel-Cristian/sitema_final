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