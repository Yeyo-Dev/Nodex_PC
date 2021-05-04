<?php
include ('conexion.php');

$proveedor_id=$_POST['proveedor_id'];
$proveedor_nombre=$_POST['proveedor_nombre'];
$proveedor_foto = addslashes(file_get_contents($_FILES['proveedor_foto']['tmp_name']));
$proveedor_apellidoP=$_POST['proveedor_apellidoP'];
$proveedor_apellidoM=$_POST['proveedor_apellidoM;'];
$proveedor_tipo_producto=$_POST['proveedor_tipo_producto'];
$proveedor_email=$_POST['proveedor_email']; 

$query = "INSERT INTO (proveedor_id, proveedor_nombre, proveedor_foto, proveedor_apellidoP, proveedor_apellidoM, proveedor_tipo_producto, proveedor_email) 
VALUES('$proveedor_id','$proveedor_nombre', '$proveedor_foto', '$proveedor_apellidoP', '$proveedor_apellidoM','$proveedor_tipo_producto','$proveedor_email')";
$resultado=$mysqli->query($query);
if ($resultado>0){
    echo "Datos guardados correctamente";
    }else {
    echo"Error al guardar los datos";
} 
?>
