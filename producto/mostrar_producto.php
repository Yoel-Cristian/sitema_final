<link rel="stylesheet" type="text/css" href="http://localhost/sistema/css/tablas.css">


<?php
$conexion = new mysqli("localhost", "root", "", "sistema");

$sql2 = "SELECT * FROM productos";
$result = $conexion->query($sql2);

					

if ($result->num_rows > 0) {
    echo "<table class='tabla'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Stock</th><th>Rut_Proveedor</th><th>ID_Categoría</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["precio"] . "</td>";
        echo "<td>" . $row["stock"] . "</td>";
        echo "<td>" . $row["rut_proveedor"] . "</td>";
        echo "<td>" . $row["id_categoria"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} 
?>

