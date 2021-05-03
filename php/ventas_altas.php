<?php
include ('conexion.php');

$venta_id=$_POST['venta_id'];
$almacen_id=$_POST['almacen_id'];
$empleado_id=$_POST['empleado_id'];
$cliente_id=$_POST['cliente_id'];
$venta_fecha=$_POST['venta_fecha'];
$almacen_cantidad=$_POST['almacen_cantidad']; 
$venta_precio=$_POST['venta_precio'];

$query = "INSERT INTO (venta_id, almacen_id, empleado_id, cliente_id, venta_fecha, almacen_cantidad, venta_precio) 
VALUES('$venta_id','$almacen_id', '$empleado_id', '$cliente_id', '$venta_fecha','$almacen_cantidad','$venta_precio')";
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
        <a id="link" href="../ventas.html">Volver al formulario</a>       
    </center>
</div>
</body>
</html>