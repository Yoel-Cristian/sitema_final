<?php


$conexion = new mysqli("localhost", "root", "", "sistema");


$nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
$direccion = mysqli_real_escape_string($conexion, $_POST["direccion"]);
$telefono = mysqli_real_escape_string($conexion, $_POST["telefono"]);
$pagina_web = mysqli_real_escape_string($conexion, $_POST["pagina_web"]);
if ($nombre and $direccion and $telefono and $pagina_web != "") {

    $sql = "INSERT INTO proveedores(nombre,	direccion,	telefono,	pagina_web) VALUES ('$nombre', '$direccion', '$telefono', '$pagina_web')";

    $conexion->query($sql);
    $conexion->close();

} else {
    // echo '<script>alert("No se han introducido todos los datos");</script>';
    // header("Location: interfaz.html");
    exit;
}


?>

