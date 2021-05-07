<?php
require_once ("conexion.php");

error_reporting(0);
$buscar = $_POST['buscar'];
$busqueda = "SELECT * FROM empleados WHERE empleado_id LIKE '%". $buscar. "%' OR empleado_nombre LIKE '%" . $buscar ."%' OR empleado_cargo LIKE '%" . $buscar ."%' OR empleado_apellidoP LIKE '%" . $buscar ."%' OR empleado_apellidoM LIKE '%" . $buscar ."%';";

if (empty($buscar) || $buscar=""){
	$sql = "SELECT * FROM empleados ORDER BY empleado_nombre ASC";
}else{
	$sql = $busqueda;
}

$res=$mysqli->query($sql);
$totCuentas = mysqli_num_rows($res);


if ($totCuentas>0) {

		while ($rowCunt = mysqli_fetch_array($res)) {
			?>
<div id="<?php echo $rowCunt['empleado_id'] ?>" class="tarjeta">
    <table>
        <tr>
            <td> <div class="img"><img src="data:image/jpg;base64,<?php echo  base64_encode($rowCunt['empleado_fotografia']); ?>"
                    title="<?php echo $rowCunt['empleado_nombre'] . ' '. $rowCunt['empleado_apellidoP'] . ' '. $rowCunt['empleado_apellidoM'] ?>"></div>
			</td>
            <td>
                <p><b>Id: </b><?php echo $rowCunt['empleado_id']; ?></p><br>
                <h3><?php echo $rowCunt['empleado_nombre'] . ' '. $rowCunt['empleado_apellidoP'] . ' '. $rowCunt['empleado_apellidoM']; ?></h3><br>
              
            </td>
        </tr>
	</table>
	<table>
        <tr>
            <td>
				<center>
                <p><b>Fecha de nacimiento: </b><?php echo $rowCunt['empleado_fechaNacimiento']; ?></p><br>
                <p><b>Direccion: </b><?php echo $rowCunt['empleado_direccion']; ?></p><br>
                <p><b>Email: </b><?php echo $rowCunt['empleado_email']; ?></p><br>
                <p><b>Cargo: </b><?php echo $rowCunt['empleado_cargo']; ?></p><br>
                <p><b>Telefono fijo: </b><?php echo $rowCunt['empleado_telFijo']; ?></p><br>
                <p><b>Telefono celular: </b><?php echo $rowCunt['empleado_telCel']; ?></p><br>
            </td>
        </tr>
        <tr>
			<td><center><button>Modificar</button><button onclick="eliminar('empleados','empleado_id', '<?php echo $rowCunt['empleado_id'];?>')">Eliminar</button></center></td>
		</tr>
    </table>
</div>
<?php
		}

		
} else {
	echo '<center><h1 class="NR">No se encontraron registros </h1></center>';
}

?>