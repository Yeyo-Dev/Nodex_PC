<?php
include ('conexion.php');

$usuario_id=$_POST['usuario_id'];
$usuario_nombre=$_POST['usuario_nombre'];
$usuario_usuario=$_POST['usuario_usuario'];
$usuario_password=$_POST['usuario_password'];
$usuario_seguridad=$_POST['usuario_seguridad'];

$query = "INSERT INTO usuarios(usuario_id, usuario_nombre, usuario_usuario, usuario_password, usuario_nivel) 
VALUES('$usuario_id','$usuario_nombre', '$usuario_usuario', '$usuario_password', '$usuario_seguridad');";

$resultado=$mysqli->query($query);

if ($resultado>0){
    echo "Datos guardados correctamente";
}else {
    echo "Error al guardar los datos";
}
 ?>
