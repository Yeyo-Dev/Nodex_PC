<?php
require("conexion.php");

error_reporting(0);
$buscar = $_POST['buscar'];
$busqueda = "SELECT * FROM usuarios WHERE usuario_usuario LIKE '%" . $buscar ."%' OR usuario_nombre LIKE '%" . $buscar ."%';";

if (empty($buscar) || $buscar=""){
	$sql = "SELECT * FROM usuarios ORDER BY usuario_nombre ASC";
}else{
	$sql = $busqueda;
}

$res=$mysqli->query($sql);
$totCuentas = mysqli_num_rows($res);

if ($totCuentas>0) {

		while ($rowCunt = mysqli_fetch_array($res)) {
			echo '<div id="'.$rowCunt['usuario_id'].'" class="tarjeta">';
			echo '<p><b>Id: </b>'.$rowCunt['usuario_id'].'</p><br>	<h3>'.$rowCunt['usuario_nombre'].'</h3><br>	<p><b>nickname: </b>'.$rowCunt['usuario_usuario'].'</p>';
			?><center><button onclick="modificar('usuarios','<?php echo $rowCunt['usuario_id'];?>' )">Modificar</button><button onclick="eliminar('usuarios','usuario_id', '<?php echo $rowCunt['usuario_id'];?>')">Eliminar</button></center><?php
			echo '</div>';
		}

		
} else {
	echo '<center><h1 class="NR">No se encontraron registros </h1></center>';
}

?>