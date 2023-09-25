<?php
$conexion = new mysqli("localhost", "root", "", "sistema");

$nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
$email = mysqli_real_escape_string($conexion, $_POST["email"]);
$contrasena = mysqli_real_escape_string($conexion, $_POST["contrasena"]);
$rol = mysqli_real_escape_string($conexion, $_POST["rol"]);

$contrasena_cifrada = md5($contrasena);




$sql ="INSERT INTO `usuarios` (`id`, `nombre`, `email`, `contrasena`, `rol`) VALUES (NULL, '$nombre', '$email', '$contrasena_cifrada', '$rol')";



    $conexion->query($sql);

    $conexion->close();

