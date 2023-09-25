<?php
$conexion = new mysqli("localhost", "root", "", "sistema");


$id_producto_actualizar = $_POST["id_producto_actualizar"];
$nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
$precio = mysqli_real_escape_string($conexion,$_POST["precio"]);
$stock = mysqli_real_escape_string($conexion,  $_POST["stock"]);
$rut_proveedor= mysqli_real_escape_string($conexion, $_POST["rut_proveedor"]);
$id_categoria= mysqli_real_escape_string($conexion,  $_POST["id_categoria"]);

/* productos(nombre,	,	stock,, id_categoria) */

if ($nombre && $precio && $stock && $rut_proveedor && $id_producto_actualizar  and $id_categoria != "") {
    $update_query = "UPDATE productos SET nombre='$nombre', precio='$precio', stock='$stock', rut_proveedor='$rut_proveedor' , id_categoria='$id_categoria' WHERE id='$id_producto_actualizar'";
    
    if ($conexion->query($update_query)) {
        echo 'Registro actualizado exitosamente.';
    } else {
        echo 'Error al actualizar el registro: ' . $conexion->error;
    }

    $conexion->close();
} else {
    // header("Location: interfaz.html");
    exit;
}
?>
