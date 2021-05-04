<?php
include ('conexion.php');

$servicios_folio=$_POST['servicios_folio'];
$servicios_tipo=$_POST['servicios_tipo'];
$servicios_fecha=$_POST['servicios_fecha'];
$servicios_hora=$_POST['servicios_hora'];
$clientes_id=$_POST['clientes_id'];
$servicios_precio=$_POST['servicios_precio']; 

$query = "INSERT INTO (servicios_folio, servicios_tipo, servicios_fecha, servicios_hora, clientes_id, servicios_precio) 
VALUES('$servicios_folio','$servicios_tipo', '$servicios_fecha', '$servicios_hora', '$clientes_id','$servicios_precio')";
$resultado=$mysqli->query($query);

if ($resultado>0){
    echo "Datos guardados correctamente";
}else{ 
    echo "Error al guardar los datos";
}
?>