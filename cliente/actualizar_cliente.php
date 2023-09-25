<?php
$conexion = new mysqli("localhost", "root", "", "sistema");

$id = $_POST["id_cliente"];
$nombre = mysqli_real_escape_string($conexion, $_POST["nombre_a"]);
$direccion = mysqli_real_escape_string($conexion, $_POST["direccion_a"]);
$telefono = mysqli_real_escape_string($conexion, $_POST["telefono_a"]);


if ($nombre && $direccion && $telefono  && $id != "") {
    $update_query = "UPDATE clientes SET nombre='$nombre', direccion='$direccion', telefono='$telefono'  WHERE rut='$id'";
    
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
