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
               <h1>Formulario Usuarios</h1>
               <input class="controls" onlyread disabled required value="<?php echo $rowCunt['usuario_id']?>" type="text" name="usuario_id" id="usuario_id" placeholder="Inserte ID de Usuario">
               <input class="controls" required value="<?php echo $rowCunt['usuario_nombre']?>" type="text" name="usuario_nombre" id="usuario_nombre" placeholder="nombre(s) del usuario">
               <input class="controls" required value="<?php echo $rowCunt['usuario_usuario']?>" type="text" name="usuario_usuario" id="usuario_usuario" placeholder="USUARIO">
               <input class="controls" required value="<?php echo $rowCunt['usuario_password']?>" type="text" name="usuario_password" id="usuario_password" placeholder="Password">
               <input class="controls" required value="<?php echo $rowCunt['usuario_nivel']?>" type="text" name="usuario_nivel" id="usuario_nivel" placeholder="Nivel de Seguridad">

               
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
               data.append("tabla","usuarios");
               data.append("id", document.getElementById("usuario_id").value);
               fetch('../php/modificar.php',{
                  method: "POST",
                  body: data
               })
               .then((res)=>{
                  return res.text();
               })
               .then((res1)=>{
                  swal.fire(res1)
                  .then(()=>  window.close())               })
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