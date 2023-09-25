<?php


$conexion = new mysqli("localhost", "root", "", "sistema");


$nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
$descripcion = mysqli_real_escape_string($conexion, $_POST["descripcion"]);

if ($nombre and $descripcion != "") {

    $sql = "INSERT INTO categorias(nombre,	descripcion) VALUES ('$nombre', '$descripcion')";

    $conexion->query($sql);
    $conexion->close();

} else {
    // echo '<script>alert("No se han introducido todos los datos");</script>';
    // header("Location: interfaz.html");
    exit;
}


?>

