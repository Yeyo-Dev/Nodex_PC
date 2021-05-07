<?php
include ('conexion.php');

$servicio_folio=$_POST['servicio_folio'];
$servicio_tipo=$_POST['servicio_tipo'];
$servicio_fecha=$_POST['servicio_fecha'];
$servicio_hora=$_POST['servicio_hora'];
$cliente_id=$_POST['servicio_id_cliente'];
$servicio_precio=$_POST['servicio_precio']; 

$query = "INSERT INTO apartado_servicios(servicio_folio, servicio_tipo, servicio_fecha, servicio_hora, cliente_id, servicio_precio) 
VALUES('$servicio_folio','$servicio_tipo', '$servicio_fecha', '$servicio_hora', '$cliente_id','$servicio_precio')";
$resultado=$mysqli->query($query);

if ($resultado>0){
    echo "Datos guardados correctamente";
}else{ 
    echo "Error al guardar los datos";
}
?>