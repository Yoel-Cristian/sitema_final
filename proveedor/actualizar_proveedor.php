<?php
$conexion = new mysqli("localhost", "root", "", "sistema");

$id = $_POST["id"];
$nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
$direccion = mysqli_real_escape_string($conexion, $_POST["direccion"]);
$telefono = mysqli_real_escape_string($conexion, $_POST["telefono"]);
$pagina_web = mysqli_real_escape_string($conexion, $_POST["pagina_web"]);

if ($nombre && $direccion && $telefono && $pagina_web && $id != "") {
    $update_query = "UPDATE proveedores SET nombre='$nombre', direccion='$direccion', telefono='$telefono', pagina_web='$pagina_web' WHERE rut='$id'";
    
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
