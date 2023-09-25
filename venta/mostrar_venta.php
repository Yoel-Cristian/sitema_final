
<link rel="stylesheet" type="text/css" href="http://localhost/sistema/css/tablas.css">

<?php
$conexion = new mysqli("localhost", "root", "", "sistema");

$sql2 = "SELECT * FROM ventas";
$result = $conexion->query($sql2);



if ($result->num_rows > 0) {
    echo "<table class='tabla'>";
    echo "<tr><th>ID</th><th>Fecha</th><th>Rut Cliente</th> <th>Descuento</th> <th>Monto Final</th></tr>";
    				


    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["fecha"] . "</td>";
        echo "<td>" . $row["rut_cliente"] . "</td>";
        echo "<td>" . $row["descuento"] . "</td>";
        echo "<td>" . $row["monto_final"] . "</td>";


        echo "</tr>";
    }
    echo "</table>";
} 
?>