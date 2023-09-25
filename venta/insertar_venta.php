<?php


$conexion = new mysqli("localhost", "root", "", "sistema");


$fecha = mysqli_real_escape_string($conexion, $_POST["fecha"]);
$rut_cliente = mysqli_real_escape_string($conexion, $_POST["rut_cliente"]);
$descuento = mysqli_real_escape_string($conexion, $_POST["descuento"]);
$monto_final = mysqli_real_escape_string($conexion, $_POST["monto_final"]);

if ($fecha and $rut_cliente and $descuento and $monto_final != "") {

    $sql = "INSERT INTO ventas(fecha	,rut_cliente,	descuento,	monto_final	
    ) VALUES ('$fecha', '$rut_cliente', '$descuento', '$monto_final')";

    $conexion->query($sql);
    $conexion->close();

} else {
    // echo '<script>alert("No se han introducido todos los datos");</script>';
    // header("Location: interfaz.html");
    exit;
}


?>

