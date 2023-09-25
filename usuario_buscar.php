<?php
$conexion = new mysqli("localhost", "root", "", "sistema");

$email = mysqli_real_escape_string($conexion, $_POST["email"]);
$contrasena = mysqli_real_escape_string($conexion, $_POST["contrasena"]);


$contrasena_cifrada = md5($contrasena);




$verificar = "SELECT * FROM usuarios WHERE email = '$email' and contrasena = '$contrasena_cifrada'";
$result = $conexion->query($verificar);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row["rol"] == "cliente" || $row["rol"] == "CLIENTE" || $row["rol"] == "Cliente") {
        header("Location: index2.html");
        $conexion->close();
        exit;
    }else if($row["rol"] == "Empleado" || $row["rol"] == "EMPLEADO" || $row["rol"] == "Empleado") {
        header("Location: index1.html");
        $conexion->close();
        exit;
    }
} else {
    echo ("Usuario no encontrado");
}




$conexion->close();
