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
			?>
<div id="<?php echo $rowCunt['almacen_id'] ?>" class="tarjeta">
    <table>
        <tr>
            <td> <div class="img"><img src="data:image/jpg;base64,<?php echo  base64_encode($rowCunt['almacen_foto']); ?>"
                    title="<?php echo $rowCunt['almacen_nombre'];?>"></div>
			</td>
            <td>
                <p><b>Id: </b><?php echo $rowCunt['almacen_id']; ?></p><br>
                <h3><?php echo $rowCunt['almacen_nombre']; ?></h3><br>
                <p><b>tipo: </b><?php echo $rowCunt['almacen_tipo']; ?></p><br>
            </td>
        </tr>
	</table>
	<table>
        <tr>
            <td>
				<center>
                <p><b>Descripcion: </b><?php echo $rowCunt['almacen_descripcion']; ?></p><br>
                <p><b>Precio Individual: </b>$<?php echo $rowCunt['almacen_precioI']; ?></p><br>
                <p><b>Cantidad: </b><?php echo $rowCunt['almacen_cantidad'];?></p><br>
                <p><b>Precio Mayoreo: </b> <?php echo $rowCunt['almacen_precioM']; ?></p>
				</center>
            </td>
        </tr>
        <tr>
			<td><center><button onclick="modificar( 'almacen', '<?php echo $rowCunt['almacen_id'];?>')">Modificar</button><button onclick="eliminar('almacen','almacen_id', '<?php echo $rowCunt['almacen_id'];?>')">Eliminar</button></center></td>
		</tr>
    </table>
</div>
<?php
		}

} else {
	echo '<center><h1 class="NR">No se encontraron registros </h1></center>';
}

?>