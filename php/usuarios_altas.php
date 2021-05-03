<?php
include ('conexion.php');

$usuario_id=$_POST['usuario_id'];
$usuario_nombre=$_POST['usuario_nombre'];
$usuario_usuario=$_POST['usuario_usuario'];
$usuario_password=$_POST['usuario_password'];
$usuario_seguridad=$_POST['usuario_seguridad'];

$query = "INSERT INTO (usuario_id, usuario_nombre, usuario_nombre, usuario_password, usuario_seguridad) 
VALUES('$usuario_id','$usuario_nombre', '$usuario_usuario, '$usuario_password', '$usuario_seguridad')";
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
        <a id="link" href="../usuarios.html">Volver al formulario</a>       
    </center>
</div>
</body>
</html>