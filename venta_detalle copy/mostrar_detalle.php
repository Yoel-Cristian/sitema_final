
<link rel="stylesheet" type="text/css" href="http://localhost/sistema/css/tablas.css">

<?php
$conexion = new mysqli("localhost", "root", "", "sistema");

$sql2 = "SELECT * FROM detalle_ventas";
$result = $conexion->query($sql2);


			
			

if ($result->num_rows > 0) {
    echo "<table class='tabla'>";
    echo "<tr><th>id_detalle</th><th>id_venta</th> <th>id_producto</th> <th> cantidad</th>   </tr>";
    				


    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id_detalle"] . "</td>";
        echo "<td>" . $row["id_venta"] . "</td>";
        echo "<td>" . $row["id_producto"] . "</td>";
        echo "<td>" . $row["cantidad"] . "</td>";
        // echo "<td>" . $row["subtotal"] . "</td>";


        echo "</tr>";
    }
    echo "</table>";
} 


?>