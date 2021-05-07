<?php
require_once ("conexion.php");

error_reporting(0);
$buscar = $_POST['buscar'];
$busqueda = "SELECT * FROM ventas WHERE venta_folio LIKE '%" . $buscar ."%' OR producto_id LIKE '%" . $buscar ."%' OR empleado_id LIKE '%" . $buscar ."%' OR cliente_id LIKE '%" . $buscar ."%' OR venta_fecha LIKE '%" . $buscar ."%' OR venta_cantidad LIKE '%" . $buscar ."%' OR venta_precio LIKE '%" . $buscar ."%';";

if (empty($buscar) || $buscar=""){
	$sql = "SELECT * FROM ventas ORDER BY venta_folio ASC";
}else{
	$sql = $busqueda;
}

$res=$mysqli->query($sql);
$totCuentas = mysqli_num_rows($res);


if ($totCuentas>0) {

		while ($rowCunt = mysqli_fetch_array($res)) {
			echo '<div id="'.$rowCunt['venta_folio'].'" class="tarjeta">';
			echo '<p><b>Folio: </b>'.$rowCunt['venta_folio'].'</p><br>	<h3>Producto: '.$rowCunt['producto_id'].'</h3><br>	<p><bEmpleado: </b>'.$rowCunt['empleado_id'].'</p>';
            echo '<p><b>Cliente: </b>'.$rowCunt['cliente_id'].'</p><br><p><b>Fecha: </b>'.$rowCunt['venta_fecha'].'</p><br><p><b>Cantidad: </b>'.$rowCunt['venta_cantidad'].'</p><br><p><b>Precio: </b>'.$rowCunt['venta_precio'].'</p><br>';
            ?><center><button>Modificar</button><button onclick="eliminar('ventas','venta_folio', '<?php echo $rowCunt['venta_folio'];?>')">Eliminar</button></center><?php
			echo '</div>';
		}

		
} else {
	echo '<center><h1 class="NR">No se encontraron registros </h1></center>';
}

?>