
<?php


$conexion = new mysqli("localhost", "root", "", "sistema");
$id_venta = mysqli_real_escape_string($conexion, $_POST["id_venta"]);
$id_producto = mysqli_real_escape_string($conexion, $_POST["id_producto"]);
$cantidad = mysqli_real_escape_string($conexion, $_POST["cantidad"]);

if ($id_venta and $id_producto and $cantidad != "") {

$sql = "INSERT INTO detalle_ventas(id_venta, id_producto, cantidad) VALUES ( '$id_venta', '$id_producto', '$cantidad')
";

$conexion->query($sql);


$conexion->close();
}
?>
