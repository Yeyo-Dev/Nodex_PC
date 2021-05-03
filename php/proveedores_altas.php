<?php
include ('conexion.php');

$proveedor_id=$_POST['proveedor_id'];
$proveedor_nombre=$_POST['proveedor_nombre'];
$proveedor_foto = addslashes(file_get_contents($_FILES['proveedor_foto']['tmp_name']));
$proveedor_apellidoP=$_POST['proveedor_apellidoP'];
$proveedor_apellidoM=$_POST['proveedor_apellidoM;'];
$proveedor_tipo_producto=$_POST['proveedor_tipo_producto'];
$proveedor_email=$_POST['proveedor_email']; 

$query = "INSERT INTO (proveedor_id, proveedor_nombre, proveedor_foto, proveedor_apellidoP, proveedor_apellidoM, proveedor_tipo_producto, proveedor_email) 
VALUES('$proveedor_id','$proveedor_nombre', '$proveedor_foto', '$proveedor_apellidoP', '$proveedor_apellidoM','$proveedor_tipo_producto','$proveedor_email')";
$resultado=$mysqli->query($query);
?>
<DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-1.0">
            <title>Guardado</title>
            <link rel="stylesheet" href="../css/estilos1.css">
        </head>
<body id="php">   
<div class="wrong">
    <center>
        <?php if ($resultado>0){ ?>
            <h1>Datos guardados correctamente</h1>
        <?php }else { ?>
        <h1>Error al guardar los datos</h1>
        <?php } ?>

        <img src="../img/wrong.gif" alt="Like"><br><br>
        <a id="link" href="../proveedores.html">Volver al formulario</a>       
    </center>
</div>
</body>
</html>