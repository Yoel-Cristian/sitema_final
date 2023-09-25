<?php


$conexion = new mysqli("localhost", "root", "", "sistema");


$nombre =       mysqli_real_escape_string($conexion, $_POST["nombre"]);
$precio =       mysqli_real_escape_string($conexion, $_POST["precio"]);
$stock =        mysqli_real_escape_string($conexion, $_POST["stock"]);
$rut_proveedor = mysqli_real_escape_string($conexion, $_POST["rut_proveedor"]);
$id_categoria = mysqli_real_escape_string($conexion, $_POST["id_categoria"]);


if ($nombre and $precio and $stock and $rut_proveedor and $id_categoria != "") {

    $sql = "INSERT INTO productos(nombre,	precio,	stock,rut_proveedor, id_categoria) VALUES ('$nombre', '$precio', '$stock', '$rut_proveedor','$id_categoria')";
    $conexion->query($sql);
    $conexion->close();
} else {
    // echo '<script>alert("No se han introducido todos los datos");</script>';
    // header("Location: interfaz.html");
    exit;
}
