<?php
include ('conexion.php');

$pedidos_id=$_POST['pedidos_id'];
$proveedores_id=$_POST['proveedores_id'];
$pedidos_producto=$_POST['pedidos_producto'];
$pedidos_cantidad=$_POST['pedidos_cantidad'];
$pedidos_precio=$_POST['pedidos_precio'];
$pedidos_fecha=$_POST['pedidos_fecha']; 

$query = "INSERT INTO (pedidos_id, proveedores_id, pedidos_producto, pedidos_cantidad, pedidos_precio, pedidos_fecha) 
VALUES('$pedidos_id','$proveedores_id', '$pedidos_producto', '$pedidos_cantidad, '$pedidos_precio','$pedidos_fecha')";
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
        <a id="link" href="../pedidos.html">Volver al formulario</a>       
    </center>
</div>
</body>
</html>     