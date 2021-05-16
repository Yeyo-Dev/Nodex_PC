<link rel="stylesheet" href="../css/estilos1.css">
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php
require_once ("../php/conexion.php");
$id = $_GET['id'];
$sql = "SELECT * FROM pedidos WHERE pedido_folio='$id';";

$res=$mysqli->query($sql);
$totCuentas = mysqli_num_rows($res);

$row = array();
if ($totCuentas >0) {

   while ($rowCunt = mysqli_fetch_array($res)) {
?> 
           <form class="form"  id="Pedir_Dat">
           <h1>Formulario Pedidos</h1>
               <input class="controls" onlyread disabled required value="<?php echo $rowCunt['pedido_folio']?>" type="text" name="pedido_folio" id="pedido_folio" placeholder="Inserte Folio">
               <input class="controls" required value="<?php echo $rowCunt['proveedor_id']?>" type="text" name="proveedor_id" id="proveedores_id" placeholder="Inserte ID de proveedor">
               <input class="controls" required value="<?php echo $rowCunt['pedido_producto']?>" type="text" name="pedido_producto" id="pedidos_producto" placeholder="Producto">
               <input class="controls" required value="<?php echo $rowCunt['pedido_cantidad']?>" type="text" name="pedido_cantidad" id="pedidos_cantidad" placeholder="Cantidad">
               <input class="controls" required value="<?php echo $rowCunt['pedido_precio']?>" type="text" name="pedido_precio" id="pedidos_precio" placeholder="Precio">
               <input class="controls" required value="<?php echo $rowCunt['pedido_fecha']?>" type="date" name="pedido_fecha" id="pedidos_fecha" placeholder="Fecha">

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