<link rel="stylesheet" href="../css/estilos1.css">
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
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
               <h1>Formulario Servicios</h1>
               <input required onlyread disabled class="controls" type="text" value="<?php echo $rowCunt['servicio_folio'];?>" name="servicio_folio" id="servicio-folio" placeholder="Inserte folio">
               <input required class="controls" type="text" value="<?php echo $rowCunt['servicio_tipo'];?>" name="servicio_tipo" id="servicio_tipo" placeholder="Tipo de mantenimiento">
               <input required class="controls" type="date" value="<?php echo $rowCunt['servicio_fecha'];?>" name="servicio_fecha" id="servicio_fecha" placeholder="Fecha">
               <input required class="controls" type="text" value="<?php echo $rowCunt['servicio_hora'];?>" name="servicio_hora" id="servicio_hora" placeholder="Hora">
               <input required class="controls" type="text" value="<?php echo $rowCunt['cliente_id'];?>" name="servicio_id_cliente" id="servicio_id_cliente" placeholder="Inserte id de cliente">
               <input required class="controls" type="text" value="<?php echo $rowCunt['servicio_precio'];?>" name="servicio_precio" id="servicio_precio" placeholder="Precio total">
               
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
               data.append("tabla","apartado_servicios");
               data.append("id", document.getElementById("servicio_folio").value);
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