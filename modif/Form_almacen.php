<link rel="stylesheet" href="../css/estilos1.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="../js/sesion.js"></script>
<?php
require_once ("../php/conexion.php");
$id = $_GET['id'];
$sql = "SELECT * FROM almacen WHERE almacen_id='$id';";

$res=$mysqli->query($sql);
$totCuentas = mysqli_num_rows($res);

$row = array();
if ($totCuentas >0) {

   while ($rowCunt = mysqli_fetch_array($res)) {
?> 
 <form class="form" id="Pedir_Dat">
               <h1>Formulario Almacén</h1>
               <table><tr> <td>
               <input disabled onlyread value="<?php echo $rowCunt['almacen_id']?>" class="controls" type="text" name="almacen_id" id="almacen_id" placeholder="Inserte ID">
               <input required value="<?php echo $rowCunt['almacen_nombre'];?>" class="controls" type="text" name="almacen_nombre" id="almacen_nombre" placeholder="Nombre del producto">
               </td><td>
               <img alt="Foto" id="img-foto" src="data:image/jpg;base64,<?php echo  base64_encode($rowCunt['almacen_foto']); ?>" onclick="document.getElementById('almacen_foto').click()">
               </td></tr></table>
               <input value="" class="image" type="file" name="almacen_foto" id="almacen_foto" hidden onchange="visualizarFoto()" placeholder="Foto"><br>
               <input required value="<?php echo $rowCunt['almacen_tipo']?>" class="controls" type="text" name="almacen_tipo" id="almacen_tipo" placeholder="Tipo de producto">
               <input required value="<?php echo $rowCunt['almacen_descripcion']?>" class="controls" type="text" name="almacen_descripcion" id="almacen_descripcion" placeholder="Descripción">
               <input required value="<?php echo $rowCunt['almacen_precioI']?>" class="controls" type="text" name="almacen_precioI" id="almacen_precioI" placeholder="Precio individual">
               <input required value="<?php echo $rowCunt['almacen_cantidad']?>" class="controls" type="text" name="almacen_cantidad" id="almacen_cantidad" placeholder="Cantidad">
               <input required value="<?php echo $rowCunt['almacen_precioM']?>" class="controls" type="text" name="almacen_precioM" id="almacen_precioM" placeholder="Precio mayoreo">
               
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
    data.append("tabla","almacen");
    data.append("id", document.getElementById("almacen_id").value);
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