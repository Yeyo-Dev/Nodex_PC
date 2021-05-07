<?php
require_once ("conexion.php");

error_reporting(0);
$buscar = $_POST['buscar'];
$busqueda = "SELECT * FROM apartado_servicios WHERE servicio_folio LIKE '%" . $buscar ."%' OR servicio_tipo LIKE '%" . $buscar ."%' OR servicio_fecha LIKE '%" . $buscar ."%' OR servicio_terminado LIKE '%" . $buscar ."%';";

if (empty($buscar) || $buscar=""){
	$sql = "SELECT * FROM apartado_servicios ORDER BY servicio_folio ASC";
}else{
	$sql = $busqueda;
}

$res=$mysqli->query($sql);
$totCuentas = mysqli_num_rows($res);

if ($totCuentas>0) {

		while ($rowCunt = mysqli_fetch_array($res)) {
			echo '<div id="'.$rowCunt['servicio_folio'].'" class="tarjeta">';
			echo '<p><b>Folio: </b>'.$rowCunt['servicio_folio'].'</p><br><p><b>Tipo: </b>'.$rowCunt['servicio_tipo'].'</p><br>	<p><b>Fecha: </b>'.$rowCunt['servicio_fecha'].'</p><br>	<p><b>Hora: </b>'.$rowCunt['servicio_hora'].'</p><br>	<p><b>Cliente: </b>'.$rowCunt['cliente_id'].'</p><br>	<p><b>Hora: </b>'.$rowCunt['servicio_hora'].'</p><br>	<p><b>Precio: </b>'.$rowCunt['servicio_precio'].'</p><br>	<p><b>Terminado: </b>'.$rowCunt['servicio_terminado'].'</p>';
			?><center><button>Modificar</button> <button onclick="eliminar('apartado_servicios','servicio_folio', '<?php echo $rowCunt['servicio_folio'];?>')">Eliminar</button></center><?php
			echo '</div>';
		}

		
} else {
	echo '<center><h1 class="NR">No se encontraron registros </h1></center>';
}

?>