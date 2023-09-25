<?php

$conexion = new mysqli("localhost", "root", "", "sistema");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$consulta = "SELECT nombre, imagen, precio, stock FROM productos";
$resultado = $conexion->query($consulta);

$productos = array();
while ($fila = $resultado->fetch_assoc()) {
    $productos[] = $fila;
}

// Devuelve los productos como JSON
header('Content-Type: application/json');
echo json_encode($productos);

// Cierra la conexión a la base de datos
$conexion->close();
?>





