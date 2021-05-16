<link rel="stylesheet" href="../css/estilos1.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="../js/sesion.js"></script>
<?php
require_once ("../php/conexion.php");
$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE usuario_id=" . $id;

$res=$mysqli->query($sql);
$totCuentas = mysqli_num_rows($res);

$row = array();
if ($totCuentas == 1) {

   while ($rowCunt = mysqli_fetch_array($res)) {
?> 
           <form class="form"  id="Pedir_Dat">
           <h1>Formulario Ventas</h1>
               <input class="controls" onlyread disabled required value="<?php echo $rowCunt['venta_folio']?>" type="text" name="venta_folio" id="venta_folio" placeholder="Inserte Folio">
               <input class="controls" required value="<?php echo $rowCunt['almacen_id']?>" type="text" name="almacen_id" id="almacen_id" placeholder="Inserte ID de producto">
               <input class="controls" required value="<?php echo $rowCunt['empleado_id']?>" type="text" name="empleado_id" id="empleado_id" placeholder="Inserte ID de empleado">
               <input class="controls" required value="<?php echo $rowCunt['cliente_id']?>" type="text" name="cliente_id" id="cliente_id" placeholder="Inserte ID de cliente">
               <input class="controls" required value="<?php echo $rowCunt['venta_fecha']?>" type="date" name="venta_fecha" id="venta_fecha">
               <input class="controls" required value="<?php echo $rowCunt['venta_cantidad']?>" type="text" name="venta_cantidad" id="venta_cantidad" placeholder="Cantidad">
               <input class="controls" required value="<?php echo $rowCunt['venta_precio']?>" type="text" name="venta_precio" id="venta_precio" placeholder="Precio">
                  
               <center>
                   <table class="tabla">
                       <tr>
                           <td></td>
                           <td><input class="button" type="submit" value="Guardar"></td>
                           <td><a href="javascript:window.close();"><input class="button" type="button" value="Cerrar"></a></td>
                        </table>
                    </center>
            </form>
            
            <script>
            document.getElementById("Pedir_Dat").addEventListener("submit",(e)=>{
               e.preventDefault();
               let data = new FormData(document.getElementById("Pedir_Dat"));
               data.append("tabla","ventas");
               data.append("id", document.getElementById("venta_folio").value);
               fetch('../php/modificar.php',{
                  method: "POST",
                  body: data
               })
               .then((res)=>{
                  return res.text();
               })
               .then((res1)=>{
                  swal.fire(res1)
                  .then(()=>  window.close())
               })
               .catch((err)=>{
               console.log(err);
               });
            });
            </script>
            <?php
   }

}else{
    echo "Error";
}
?>