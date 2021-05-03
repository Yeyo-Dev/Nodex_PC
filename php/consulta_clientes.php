<?php
require_once ("conexion.php");

error_reporting(0);
$buscar = $_POST['buscar'];
$busqueda = "SELECT * FROM clientes WHERE id_clientes LIKE '%". $buscar. "%' OR nombre LIKE '%" . $buscar ."%' OR apellido_materno LIKE '%" . $buscar ."%' OR direccion LIKE '%" . $buscar ."%' OR apellido_paterno LIKE '%" . $buscar ."%';";

if (empty($buscar) || $buscar=""){
	$sql = "SELECT * FROM clientes ORDER BY nombre ASC";
}else{
	$sql = $busqueda;
}

$res=$mysqli->query($sql);
$totCuentas = mysqli_num_rows($res);


if ($totCuentas>0) {

		while ($rowCunt = mysqli_fetch_array($res)) {
			echo '<div id="'.$rowCunt['id_clientes'].'" class="tarjeta">';
			echo '<td>	<p><b>Id: </b>'.$rowCunt['id_clientes'].'</p><br>	<h3>'.$rowCunt['nombre'].' '.$rowCunt['apellido_paterno'].' '.$rowCunt['materno'].'</h3><br>	<p><b>Direccion: </b>'.$rowCunt['direccion'].'</p><br></td>	<tr><td><p><b>Email: </b>'.$rowCunt['email'].'</p><br>	<p><b>Telefono: </b>$'.$rowCunt['tel1'].'</p><br>	<p><b>Telefono secundario: </b>'.$rowCunt['tel2'].'</p><br>	<p><b>Fecha de nacimiento: </b>'.$rowCunt['fecha_nacimiento'].'</p>';
			echo '</div>';
		}

		
} else {
	echo '<h1 class="NR">No se encontraron registros </h1>';
}

?>