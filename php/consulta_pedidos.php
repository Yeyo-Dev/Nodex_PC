<?php
require_once ("conexion.php");

error_reporting(0);
$buscar = $_POST['buscar'];
$busqueda = "SELECT * FROM pedidos WHERE pedido_folio LIKE '%". $buscar. "%' OR proveedor_id LIKE '%" . $buscar ."%' OR pedido_producto LIKE '%" . $buscar ."%' OR pedido_cantidad LIKE '%" . $buscar ."%' OR pedido_precio LIKE '%" . $buscar ."%';";
if (empty($buscar) || $buscar=""){
	$sql = "SELECT * FROM pedidos";
}else{
	$sql = $busqueda;
}

$res=$mysqli->query($sql);
$totCuentas = mysqli_num_rows($res);


if ($totCuentas>0) {
		while ($rowCunt = mysqli_fetch_array($res)) {
			echo '<div id="'.$rowCunt['pedido_folio'].'" class="tarjeta">';
			echo '<p><b>Folio: </b>'.$rowCunt['pedido_folio'].'</p><br>	<h3>Provedor:'.$rowCunt['proveedor_id'].'</h3><br>	<p><b>Producto: </b>'.$rowCunt['pedido_producto'].'<b>Cantidad: </b>'.$rowCunt['pedido_cantidad'].'</p><br>	<p><b>Precio Total: </b>$'.$rowCunt['producto_precio'].'</p><br><p><b>Fecha: </b>'.$rowCunt['pedido_fecha'].'</p>';
			echo '<button onclick="modificar( \'pedidos\', \''.$rowCunt['pedido_folio'].'\')" >Modificar</button><button onclick="eliminar(\'pedidos\',\'pedido_folio\',\''.$rowCunt['pedido_folio'].'\')">Eliminar</button>';
            echo '</div>';
		}

		
} else {
	echo '<center><h1 class="NR">No se encontraron registros </h1></center>';
}

?>