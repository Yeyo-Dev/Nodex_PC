<?php
include ('conexion.php');

$servicios_folio=$_POST['servicios_folio'];
$servicios_tipo=$_POST['servicios_tipo'];
$servicios_fecha=$_POST['servicios_fecha'];
$servicios_hora=$_POST['servicios_hora'];
$clientes_id=$_POST['clientes_id'];
$servicios_precio=$_POST['servicios_precio']; 

$query = "INSERT INTO (servicios_folio, servicios_tipo, servicios_fecha, servicios_hora, clientes_id, servicios_precio) 
VALUES('$servicios_folio','$servicios_tipo', '$servicios_fecha', '$servicios_hora', '$clientes_id','$servicios_precio')";
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
        <a id="link" href="../servicios.html">Volver al formulario</a>       
    </center>
</div>
</body>
</html>