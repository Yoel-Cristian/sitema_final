<?php


$conexion = new mysqli("localhost", "root", "", "sistema");

$nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
$direccion = mysqli_real_escape_string($conexion, $_POST["direccion"]);
$telefono = mysqli_real_escape_string($conexion, $_POST["telefono"]);

if ($nombre and $direccion and $telefono  != "") {

    $sql = "INSERT INTO clientes(nombre,	direccion,	telefono) VALUES ('$nombre', '$direccion', '$telefono')";

    $conexion->query($sql);
    $conexion->close();

} else {
    // echo '<script>alert("No se han introducido todos los datos");</script>';
    // header("Location: interfaz.html");
    exit;
}


?>