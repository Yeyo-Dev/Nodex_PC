<?php
require_once ("conexion.php");

error_reporting(0);
$buscar = $_POST['buscar'];
$busqueda = "SELECT * FROM clientes WHERE clientes_id LIKE '%". $buscar. "%' OR clientes_nombre LIKE '%" . $buscar ."%' OR clientes_apellidoM LIKE '%" . $buscar ."%' OR clientes_direccion LIKE '%" . $buscar ."%' OR clientes_apellidoP LIKE '%" . $buscar ."%';";

if (empty($buscar) || $buscar=""){
	$sql = "SELECT * FROM clientes ORDER BY clientes_nombre ASC";
}else{
	$sql = $busqueda;
}

$res=$mysqli->query($sql);
$totCuentas = mysqli_num_rows($res);


if ($totCuentas>0) {

		while ($rowCunt = mysqli_fetch_array($res)) {
			echo '<div id="'.$rowCunt['clientes_id'].'" class="tarjeta">';
			echo '<p><b>Id: </b>'.$rowCunt['clientes_id'].'</p><br>	<h3>'.$rowCunt['clientes_nombre'].' '.$rowCunt['clientes_apellidoP'].' '.$rowCunt['clientes_apellidoM'].'</h3><br>	<p><b>Direccion: </b>'.$rowCunt['clientes_direccion'].'</p><br></td>	<tr><td><p><b>Email: </b>'.$rowCunt['clientes_email'].'</p><br>	<p><b>Telefono: </b>$'.$rowCunt['clientes_tel1'].'</p><br>	<p><b>Telefono secundario: </b>'.$rowCunt['clientes_tel2'].'</p><br>	<p><b>Fecha de nacimiento: </b>'.$rowCunt['clientes_fechaNacimiento'].'</p>';
			echo '<button>Modificar</button><button onclick="eliminar("clientes","clientes_id",'.$rowCunt['clientes_id'].')">Eliminar</button>';
			echo '</div>';
		}

		
} else {
	echo '<center><h1 class="NR">No se encontraron registros </h1></center>';
}

?>