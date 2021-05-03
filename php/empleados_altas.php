<?php
include ('conexion.php');

$empleado_id=$_POST['empleado_id'];
$empleado_nombre=$_POST['empleado_nombre'];
$empleado_foto = addslashes(file_get_contents($_FILES['empleado_foto']['tmp_name']));
$empleado_apellidoP=$_POST['empleado_apellidoP'];
$empleado_apellidoM$_POST['empleado_apellidoM'];
$empleado_nacimiento=$_POST['empleado_nacimiento'];
$empleado_direccion=$_POST['empleado_direccion']; 
$empleado_tel_fijo=$_POST['empleado_tel_fijo'];
$empleado_tel_cel=$_POST['empleado_tel_cel'];
$empleado_puesto=$_POST['empleado_puesto'];
$empleado_contraseña=$_POST['empleado_contraseña'];

$query = "INSERT INTO (empleado_id, empleado_nombre, empleado_foto, empleado_apellidoP, empleado_apellidoM, empleado_nacimiento, empleado_direccion, empleado_tel_fijo, empleado_tel_cel, empleado_puesto, empleado_contraseña) 
VALUES('$empleado_id','$empleado_nombre','$empleado_foto','$empleado_apellidoP','$empleado_apellidoM','$empleado_nacimiento','$empleado_direccion','$empleado_tel_fijo','$empleado_tel_cel','$empleado_puesto','$empleado_contraseña')";
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
        <a id="link" href="../empleados.html">Volver al formulario</a>       
    </center>
</div>
</body>
</html>