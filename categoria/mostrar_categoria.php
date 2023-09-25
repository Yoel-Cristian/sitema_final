
<link rel="stylesheet" type="text/css" href="http://localhost/sistema/css/tablas.css">

<?php
$conexion = new mysqli("localhost", "root", "", "sistema");

$sql2 = "SELECT * FROM categorias";
$result = $conexion->query($sql2);
if ($result->num_rows > 0) {
    echo "<table class='tabla'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Descripcion</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["descripcion"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

?>