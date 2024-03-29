<link rel="stylesheet" href="../css/estilos1.css">
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php
require_once ("../php/conexion.php");
$id = $_GET['id'];
$sql = "SELECT * FROM empleados WHERE empleado_id='$id';";

$res=$mysqli->query($sql);
$totCuentas = mysqli_num_rows($res);

$row = array();
if ($totCuentas >0) {

   while ($rowCunt = mysqli_fetch_array($res)) {
?> 
 <form class="form" action="" id="Pedir_Dat">
               <h1>Formulario Empleados</h1>
 
               <table><tr> <td>
               <input disabled onlyread value="<?php echo $rowCunt['empleado_id']?>" class="controls" type="text" name="empleado_id" id="empleado_id" placeholder="Inserte ID de empleado">
               <input class="controls" type="text" value="<?php echo $rowCunt['empleado_nombre'];?>" name="empleado_nombre" id="empleado_nombre" placeholder="Nombre del empleado">
               </td><td>
               <img alt="Foto" id="img-foto" src="data:image/jpg;base64,<?php echo  base64_encode($rowCunt['empleado_fotografia']); ?>" onclick="document.getElementById('empleado_fotografia').click()">
               </td></tr></table>
               <input value="<?php echo $rowCunt['empleado_fotografia'];?>" class="image" type="file" name="empleado_fotografia" id="empleado_fotografia" placeholder="Foto" hidden onchange="visualizarFoto()"><br>
               <input required value="<?php echo $rowCunt['empleado_apellidoP'];?>" class="controls" type="text" name="empleado_apellidoP" id="empleado_apellidoP" placeholder="Apellido Paterno">
               <input required value="<?php echo $rowCunt['empleado_apellidoM'];?>" class="controls" type="text" name="empleado_apellidoM" id="empleado_apellidoM" placeholder="Apellido Materno">
               <input required value="<?php echo $rowCunt['empleado_fechaNacimiento'];?>" class="controls" type="date" name="empleado_fechaNacimiento" id="empleado_fechaNacimiento" placeholder="Fecha de nacimiento">
               <input required value="<?php echo $rowCunt['empleado_direccion'];?>" class="controls" type="text" name="empleado_direccion" id="empleado_direccion" placeholder="Direccion">
               <input required value="<?php echo $rowCunt['empleado_telFijo'];?>" class="controls" type="text" name="empleado_telFijo" id="empleado_telFijo" placeholder="Telefono fijo">
               <input required value="<?php echo $rowCunt['empleado_telCel'];?>" class="controls" type="text" name="empleado_telCel" id="empleado_telCel" placeholder="Telefono celular">
               <input required value="<?php echo $rowCunt['empleado_email'];?>" class="controls" type="text" name="empleado_email" id="empleado_email" placeholder="Email">
               <input required value="<?php echo $rowCunt['empleado_cargo'];?>" class="controls" type="text" name="empleado_cargo" id="empleado_cargo" placeholder="Puesto">
               <input required value="<?php echo $rowCunt['empleado_usuario'];?>" class="controls" type="text" name="empleado_usuario" id="empleado_usuario" placeholder="Usuario">

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
                function visualizarFoto(){
                    let file = document.getElementById('almacen_foto').files[0];
                    console.log(file);
                    let img = URL.createObjectURL(file);
                    console.log(img);
                    document.getElementById('img-foto').setAttribute("src",img);
                }
            </script>
<script>
    document.getElementById("Pedir_Dat").addEventListener("submit",(e)=>{
    e.preventDefault();
    let data = new FormData(document.getElementById("Pedir_Dat"));
    data.append("tabla","empleados");
    data.append("id", document.getElementById("empleado_id").value);
    fetch('../php/modificar.php',{
        method: "POST",
        body: data
    })
    .then((res)=>{
        return res.text();
    })
    .then((res1)=>{
        swal.fire(res1)
        .then(()=> window.close())
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