<?php
$conexion = new mysqli("localhost", "root", "", "sistema");


$id_producto = $_POST["id_producto"];
$nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
$precio = mysqli_real_escape_string($conexion,$_POST["precio"]);
$stock = mysqli_real_escape_string($conexion,  $_POST["stock"]);
$rut_proveedor= mysqli_real_escape_string($conexion, $_POST["rut_proveedor"]);
$id_categoria= mysqli_real_escape_string($conexion,  $_POST["id_categoria"]);
$imagen='';
	if (isset($_FILES["imagen"])){
		$file = $_FILES["imagen"];
	    $nombre_i = $file["name"];
	    $tipo = $file["type"];
	    $ruta_provisional = $file["tmp_name"];
	    $size = $file["size"];
	    $dimensiones = getimagesize($ruta_provisional);
	    $width = $dimensiones[0];
	    $height = $dimensiones[1];
	    $carpeta = "../fotos/";
	   if ($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
	    {
            echo '<script>alert("Error, el archivo no es una imagen");</script>';
	    }
	    else if ($size > 3*1024*1024){
            echo '<script>alert(" Error, el tamaño máximo permitido es un 3MB  ");</script>';
	    }
	   else{
	        $src = $carpeta.$nombre_i;
	        move_uploaded_file($ruta_provisional, $src);
	        $imagen="../fotos/".$nombre_i;
	    }
}



    $update_query = "UPDATE productos SET nombre='$nombre', precio='$precio', stock='$stock', rut_proveedor='$rut_proveedor' , id_categoria='$id_categoria' , imagen='$imagen' WHERE id='$id_producto'";
    
    if ($conexion->query($update_query)) {
        echo 'Registro actualizado exitosamente.';
    } else {
        echo 'Error al actualizar el registro: ' . $conexion->error;
    }

    $conexion->close();

?>
