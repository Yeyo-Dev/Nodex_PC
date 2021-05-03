<?php
include ('conexion.php');

$almacen_id=$_POST['almacen_id'];
$almacen_nombre=$_POST['almacen_nombre'];
$almacen_foto = addslashes(file_get_contents($_FILES['almacen_foto']['tmp_name']));
$almacen_tipo=$_POST['almacen_tipo'];
$almacen_descripcion=$_POST['almacen_descripcion'];
$almacen_precioI=$_POST['almacen_precioI'];
$almacen_cantidad=$_POST['almacen_cantidad']; 
$almacen_precioM=$_POST['almacen_precioM'];

$query = "INSERT INTO almacen(almacen_id, almacen_nombre, almacen_foto, almacen_tipo, almacen_descripcion, almacen_precioI, almacen_cantidad, almacen_precioM) 
VALUES('$almacen_id','$almacen_nombre', '$almacen_foto', '$almacen_tipo', '$almacen_descripcion','$almacen_precioI','$almacen_cantidad','$almacen_precioM')";
$resultado=$mysqli->query($query);

if ($resultado>0){
    echo "Datos guardados correctamente";
}else{
    echo "Error al guardar los datos";
}