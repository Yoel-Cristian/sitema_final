

<?php
$conexion = new mysqli("localhost", "root", "", "sistema");

$id = $_POST["id_producto"];
$stock = mysqli_real_escape_string($conexion, $_POST["otroDato"]);




$update_query = "UPDATE productos SET stock='$stock' WHERE id='$id'";
$conexion->query($update_query);
$conexion->close();

?>
