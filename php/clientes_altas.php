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

if ($resultado>0){ 
    echo "Datos guardados correctamente";
    }else {
    echo "Error al guardar los datos";
}
?>