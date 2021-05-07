<?php
require("conexion.php");

$campo = $_POST['campo'];
$tabla = $_POST['tabla'];
$id = $_POST['id'];

$query= 'DELETE FROM '.$tabla.' WHERE '.$campo.'=\''.$id.'\';';

$resultado = $mysqli->query($query);

	if($resultado>0){
		echo "Registro Eliminado Permanentemente";
	}else{
		echo "Error al Eliminar Registro";			
	} 
?>