<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<link rel="stylesheet" href="../css/estilos1.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="../js/sesion.js"></script>
<?php
require_once ("../php/conexion.php");
$id = $_GET['id'];
$sql = "SELECT * FROM clientes WHERE clientes_id='" . $id."';";

$res=$mysqli->query($sql);
$totCuentas = mysqli_num_rows($res);

$row = array();
if ($totCuentas == 1) {

   while ($rowCunt = mysqli_fetch_array($res)) {
?> 
           <form class="form"  id="Pedir_Dat">
           <h1>Formulario Clientes</h1>
               <input class="controls" required onlyread disabled type="text" values="<?php echo $rowCunt['clientes_id'];?>" name="clientes_id" id="clientes_id" placeholder="Inserte ID de cliente">
               <input class="controls" required  type="text" values="<?php echo $rowCunt['clientes_nombre'];?>" name="clientes_nombre" id="clientes_nombre" placeholder="Nombre(s) del cliente">
               <input class="controls" required  type="text" values="<?php echo $rowCunt['clientes_apellidoP'];?>" name="clientes_apellidoP" id="clientes_apellidoP" placeholder="Apellido Paterno">
               <input class="controls" required  type="text" values="<?php echo $rowCunt['clientes_apellidoM'];?>" name="clientes_apellidoM" id="clientes_apellidoM" placeholder="Apellido Materno">
               <input class="controls" required  type="text" values="<?php echo $rowCunt['clientes_direccion'];?>" name="clientes_direccion" id="clientes_direccion" placeholder="Dirección">
               <input class="controls" required  type="text" values="<?php echo $rowCunt['clientes_email'];?>" name="clientes_email" id="clientes_email" placeholder="E-Mail">
               <input class="controls" required  type="text" values="<?php echo $rowCunt['clientes_tel1'];?>" name="clientes_tel1" id="clientes_tel1" placeholder="Telefono 1">
               <input class="controls" required  type="text" values="<?php echo $rowCunt['clientes_tel2'];?>" name="clientes_tel2" id="clientes_tel2" placeholder="Telefono 2">
               <input class="controls" required  type="text" values="<?php echo $rowCunt['clientes_nacimiento'];?>" name="clientes_nacimiento" id="clientes_nacimiento" placeholder="Fecha de nacimiento">

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
               data.append("tabla","clientes");
               data.append("id", document.getElementById("clientes_id").value);
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