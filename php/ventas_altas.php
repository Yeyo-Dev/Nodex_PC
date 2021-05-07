<?php
require('conexion.php');

$venta_id = $_POST['venta_id'];
$almacen_id = $_POST['almacen_id'];
$empleado_id = $_POST['empleado_id'];
$cliente_id = $_POST['cliente_id'];
$venta_fecha = $_POST['venta_fecha'];
$almacen_cantidad = $_POST['almacen_cantidad']; 
$venta_precio = $_POST['venta_precio'];


$query = "INSERT INTO ventas(venta_folio, producto_id, empleado_id, cliente_id, venta_fecha, venta_cantidad, venta_precio) 
VALUES('$venta_id','$almacen_id', '$empleado_id', '$cliente_id', '$venta_fecha','$almacen_cantidad','$venta_precio');";
$resultado=$mysqli->query($query);

if ($resultado>0){ ?>
            <h1>Datos guardados correctamente</h1>
        <?php }else { ?>
        <h1>Error al guardar los datos</h1>
        <?php } ?>
