<?php
require_once ("conexion.php");

error_reporting(0);
$buscar = $_POST['buscar'];
$busqueda = "SELECT * FROM proveedor WHERE proveedor_id LIKE '%". $buscar. "%' OR proveedor_nombre LIKE '%" . $buscar ."%' OR proveedor_tipoProducto LIKE '%" . $buscar ."%';";

if (empty($buscar) || $buscar=""){
	$sql = "SELECT * FROM proveedor ORDER BY proveedor_nombre ASC";
}else{
	$sql = $busqueda;
}

$res=$mysqli->query($sql);
$totCuentas = mysqli_num_rows($res);


if ($totCuentas>0) {

		while ($rowCunt = mysqli_fetch_array($res)) {
			?>
<div id="<?php echo $rowCunt['proveedor_id'] ?>" class="tarjeta">
    <table>
        <tr>
            <td> <div class="img"><img src="data:image/jpg;base64,<?php echo  base64_encode($rowCunt['proveedor_fotografia']); ?>"
                    title="<?php echo $rowCunt['proveedor_nombre'] . ' '. $rowCunt['proveedor_apellidoP'] . ' '. $rowCunt['proveedor_apellidoM'];?>"></div>
			</td>
            <td>
                <p><b>Id: </b><?php echo $rowCunt['proveedor_id']; ?></p><br>
                <h3><?php echo echo $rowCunt['proveedor_nombre'] . ' '. $rowCunt['proveedor_apellidoP'] . ' '. $rowCunt['proveedor_apellidoM']; ?></h3><br>
                <p><b>tipo: </b><?php echo $rowCunt['proveedor_tipoProducto']; ?></p><br>
            </td>
        </tr>
	</table>
	<table>
        <tr>
            <td>
				<center>
                <p><b>Email: </b><?php echo $rowCunt['proveedor_email']; ?></p>
				</center>
            </td>
        </tr>
        <tr>
			<td><center><button>Modificar</button><button onclick="eliminar('proveedor','proveedor_id', '<?php echo $rowCunt['proveedor_id'];?>')">Eliminar</button></center></td>
		</tr>
    </table>
</div>
<?php
		}

		
} else {
	echo '<center><h1 class="NR">No se encontraron registros </h1></center>';
}

?>