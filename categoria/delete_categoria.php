<?php
$conexion = new mysqli("localhost", "root", "", "sistema");

$id = mysqli_real_escape_string($conexion, $_POST["id"]);
if ($id != "") {
    $update_query = " DELETE FROM categorias WHERE id='$id'";
    
    if ($conexion->query($update_query)) {
        echo 'Tupla eliminada  exitosamente.';
    } else {
        echo 'Error al eliminar el registro: ' . $conexion->error;
    }

    $conexion->close();
} 
?>
