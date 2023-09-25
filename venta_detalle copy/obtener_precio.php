<?php
// Obtener el valor de 'b' desde la solicitud POST
$id_producto = $_POST["id_producto"];

// Realizar la consulta SQL para obtener el precio
$conexion = new mysqli("localhost", "root", "", "sistema");
$sql = "SELECT precio,stock FROM productos WHERE id = $id_producto";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {
  // Obtener el precio
  $row = $result->fetch_assoc();
  $precio = $row["precio"];
  $stock=$row["stock"];
  $response = array(
    "precio" => $precio,
    "stock" => $stock
);
echo json_encode($response);
}
?>
