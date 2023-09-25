<?php


$conexion = new mysqli("localhost", "root", "", "sistema");


$nombre_p =       mysqli_real_escape_string($conexion, $_POST["nombre"]);
$precio =       mysqli_real_escape_string($conexion, $_POST["precio"]);
$stock =        mysqli_real_escape_string($conexion, $_POST["stock"]);
$rut_proveedor = mysqli_real_escape_string($conexion, $_POST["rut_proveedor"]);
$id_categoria = mysqli_real_escape_string($conexion, $_POST["id_categoria"]);


$imagen = '';
$file = $_FILES["imagen"];
$nombre = $file["name"];
$tipo = $file["type"];
$ruta_provisional = $file["tmp_name"];
$size = $file["size"];
$dimensiones = getimagesize($ruta_provisional);
$width = $dimensiones[0];
$height = $dimensiones[1];
$carpeta = "../fotos/";
$src = $carpeta . $nombre;
move_uploaded_file($ruta_provisional, $src);
$imagen = "../fotos/" . $nombre;



    $sql = "INSERT INTO productos(nombre,	precio,	stock,rut_proveedor, id_categoria, imagen) VALUES ('$nombre_p', '$precio', '$stock', '$rut_proveedor','$id_categoria', '$imagen')";
    $conexion->query($sql);
    $conexion->close();
