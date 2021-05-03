<?php
require_once ("conexion.php");

error_reporting(0);
$buscar = $_POST['buscar'];
$busqueda = "SELECT * FROM almacen WHERE almacen_id LIKE '%". $buscar. "%' OR almacen_nombre LIKE '%" . $buscar ."%' OR almacen_tipo LIKE '%" . $buscar ."%';";

if (empty($buscar) || $buscar=""){
	$sql = "SELECT * FROM almacen ORDER BY almacen_nombre ASC";
}else{
	$sql = $busqueda;
}

$res=$mysqli->query($sql);
$totCuentas = mysqli_num_rows($res);


if ($totCuentas>0) {

		while ($rowCunt = mysqli_fetch_array($res)) {
			echo '<div id="'.$rowCunt['almacen_id'].'" class="tarjeta">';
			echo '<table><tr><td>	<img src="data:image/jpg;base64,'. base64_encode($rowCunt['almacen_foto']).'" alt="'.$rowCunt['almacen_nombre'].'"></td';
			echo '<td>	<p><b>Id: </b>'.$rowCunt['almacen_id'].'</p><br>	<h3>'.$rowCunt['almacen_nombre'].'</h3><br>	<p><b>tipo: </b>'.$rowCunt['almacen_tipo'].'</p><br></td>	<tr><td><p><b>Descripcion: </b>'.$rowCunt['almacen_descripcion'].'</p><br>	<p><b>Precio Individual: </b>$'.$rowCunt['almacen_precioI'].'</p><br>	<p><b>Cantidad: </b>'.$rowCunt['almacen_cantidad'].'</p><br>	<p><b>Precio Mayoreo: </b>'.$rowCunt['almacen_precioM'].'</p></td></tr>';
			echo '</table>';
			echo '<button>Modificar</button><button>Eliminar</button></div>';
		}

		
} else {
	echo '<h1 class="NR">No se encontraron registros </h1>';
}

?>