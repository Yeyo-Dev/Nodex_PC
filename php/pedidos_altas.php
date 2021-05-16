<?php
include ('conexion.php');

$pedidos_id = $_POST['pedidos_id'];
$proveedores_id = $_POST['proveedores_id'];
$pedidos_producto = $_POST['pedidos_producto'];
$pedidos_cantidad = $_POST['pedidos_cantidad'];
$pedidos_precio = $_POST['pedidos_precio'];
$pedidos_fecha = $_POST['pedidos_fecha']; 

$query = "INSERT INTO pedidos(pedido_folio, proveedor_id, pedido_producto, pedido_cantidad, pedido_precio, pedido_fecha) 
VALUES('$pedidos_id','$proveedores_id', '$pedidos_producto', '$pedidos_cantidad', '$pedidos_precio','$pedidos_fecha');";
$resultado=$mysqli->query($query);

if ($resultado>0){
    echo "Datos guardados correctamente";
}else {
    echo "Error al guardar los datos";
}
?>