<?php
$conexion = new mysqli("localhost", "root", "", "sistema");

$id = $_POST["id"];
$fecha = mysqli_real_escape_string($conexion, $_POST["fecha"]);
$rut_cliente = mysqli_real_escape_string($conexion, $_POST["rut_cliente"]);
$descuento = mysqli_real_escape_string($conexion, $_POST["descuento"]);
$monto_final = mysqli_real_escape_string($conexion, $_POST["monto_final"]);
				

if ($fecha and $rut_cliente and $descuento and $monto_final != "") {
    $update_query = "UPDATE ventas SET fecha='$fecha', rut_cliente='$rut_cliente', descuento='$monto_final' WHERE id='$id'";
    
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
