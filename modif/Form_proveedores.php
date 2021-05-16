<link rel="stylesheet" href="../css/estilos1.css">
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="../js/sesion.js"></script>
<?php
require_once ("../php/conexion.php");
$id = $_GET['id'];
$sql = "SELECT * FROM proveedores WHERE proveedor_id='$id';";

$res=$mysqli->query($sql);
$totCuentas = mysqli_num_rows($res);

$row = array();
if ($totCuentas >0) {

   while ($rowCunt = mysqli_fetch_array($res)) {
?> 
 <form class="form" id="Pedir_Dat">


 <h1>Formulario Proveedores</h1>
               <table><tr> <td>
               <input disabled onlyread value="<?php echo $rowCunt['proveedor_id']?>" class="controls" type="text" name="proveedor_id" id="proveedor_id" placeholder="Inserte ID de Proveedor">
               <input class="controls"value="<?php echo $rowCunt['proveedor_nombre'];?>" type="text" name="proveedor_nombre" id="proveedor_nombre" placeholder="Nombre(s) del proveedor">
               </td><td>
               <img alt="Foto" id="img-foto" src="data:image/jpg;base64,<?php echo  base64_encode($rowCunt['proveedor_fotografia']); ?>" onclick="document.getElementById('proveedor_fotografia').click()">
               </td></tr></table>
               <input  hidden class="image" type="file" name="proveedor_fotografia" id="proveedor_fotografia" placeholder="Foto" onchange="visualizarFoto()"><br>
               <input required value="<?php echo $rowCunt['proveedor_apellidoP']?>" class="controls" type="text" name="proveedor_apellidoP" id="proveedor_apellidoP" placeholder="Apellido Paterno">
               <input required value="<?php echo $rowCunt['proveedor_apellidoM']?>" class="controls" type="text" name="proveedor_apellidoM" id="proveedor_apellidoM" placeholder="Apellido Materno">
               <input required value="<?php echo $rowCunt['proveedor_tipoProducto']?>" class="controls" type="text" name="proveedor_tipoProducto" id="proveedor_tipoProducto" placeholder="Tipo de producto">
               <input required value="<?php echo $rowCunt['proveedor_email']?>" class="controls" type="text" name="proveedor_email" id="proveedor_email" placeholder="E-mail">

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
                    let file = document.getElementById('almacen_foto').files[0]
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
    data.append("tabla","proveedores");
    data.append("id", document.getElementById("proveedor_id").value);
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