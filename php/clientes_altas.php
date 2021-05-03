<?php
include ('conexion.php');

$clientes_id=$_POST['clientes_id'];
$clientes_nombre=$_POST['clientes_nombre'];
$clientes_apellidoP=$_POST['clientes_apellidoP'];
$clientes_apellidoM=$_POST['clientes_apellidoM'];
$clientes_direccion=$_POST['clientes_direccion'];
$clientes_email=$_POST['clientes_email']; 
$clientes_tel1=$_POST['clientes_tel1'];
$clientes_tel2=$_POST['clientes_tel2'];
$clientes_nacimiento=$_POST['clientes_nacimiento'];

$query = "INSERT INTO (clientes_id, clientes_nombre, clientes_apellidoP, clientes_apellidoM, clientes_direccion, clientes_email, clientes_tel1, clientes_tel2, clientes_nacimiento) 
VALUES('$clientes_id','$clientes_nombre', '$clientes_apellidoP', '$clientes_apellidoM', '$clientes_direccion','$clientes_email','$clientes_tel1','$clientes_tel2','$clientes_nacimiento')";
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
        <a id="link" href="../clientes.html">Volver al formulario</a>       
    </center>
</div>
</body>
</html>