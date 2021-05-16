<link rel="stylesheet" href="../css/estilos1.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
           <h1>Formulario Pedidos</h1>
               <input class="controls" onlyread disabled required value="<?php echo $rowCunt['pedidos_folio']?>" type="text" name="pedidos_folio" id="pedidos_folio" placeholder="Inserte Folio">
               <input class="controls" required value="<?php echo $rowCunt['proveedores_id']?>" type="text" name="proveedores_id" id="proveedores_id" placeholder="Inserte ID de proveedor">
               <input class="controls" required value="<?php echo $rowCunt['pedidos_producto']?>" type="text" name="pedidos_producto" id="pedidos_producto" placeholder="Producto">
               <input class="controls" required value="<?php echo $rowCunt['pedidos_cantidad']?>" type="text" name="pedidos_cantidad" id="pedidos_cantidad" placeholder="Cantidad">
               <input class="controls" required value="<?php echo $rowCunt['pedidos_precio']?>" type="text" name="pedidos_precio" id="pedidos_precio" placeholder="Precio">
               <input class="controls" required value="<?php echo $rowCunt['pedidos_fecha']?>" type="text" name="pedidos_fecha" id="pedidos_fecha" placeholder="Fecha">

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
               data.append("tabla","pedidos");
               data.append("id", document.getElementById("pedido_folio").value);
               fetch('../php/modificar.php',{
                  method: "POST",
                  body: data
               })
               .then((res)=>{
                  return res.text();
               })
               .then((res1)=>{
                  swal.fire(res1);
                  window.close();
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