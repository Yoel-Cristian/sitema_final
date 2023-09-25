<?php
$conexion = new mysqli("localhost", "root", "", "sistema");

$id = $_POST["id"];

$nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
$descripcion = mysqli_real_escape_string($conexion, $_POST["descripcion"]);
if ($nombre && $descripcion and $id != "") {
    $update_query = "UPDATE categorias SET nombre='$nombre', descripcion='$descripcion' WHERE id='$id'";
    
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
