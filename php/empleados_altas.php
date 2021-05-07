<?php
include ('conexion.php');

$empleado_id=$_POST['empleado_id'];
$empleado_nombre = $_POST['empleado_nombre'];
$empleado_foto = addslashes(file_get_contents($_FILES['empleado_foto']['tmp_name']));
$empleado_apellidoP=$_POST['empleado_apellidoP'];
$empleado_apellidoM=$_POST['empleado_apellidoM'];
$empleado_nacimiento=$_POST['empleado_nacimiento'];
$empleado_direccion=$_POST['empleado_direccion']; 
$empleado_tel_fijo=$_POST['empleado_tel_fijo'];
$empleado_tel_cel=$_POST['empleado_tel_cel'];
$empleado_puesto=$_POST['empleado_puesto'];
$empleado_usuario=$_POST['empleado_usuario'];

$query = "INSERT INTO empleados(empleado_id, empleado_nombre, empleado_fotografia, empleado_apellidoP, empleado_apellidoM, empleado_fechaNacimiento, empleado_direccion, empleado_telFijo, empleado_telCel, empleado_cargo, empleado_usuario) 
VALUES('$empleado_id','$empleado_nombre','$empleado_foto','$empleado_apellidoP','$empleado_apellidoM','$empleado_nacimiento','$empleado_direccion','$empleado_tel_fijo','$empleado_tel_cel','$empleado_puesto','$empleado_usuario')";
$resultado=$mysqli->query($query);
 if ($resultado>0){ 
     echo "Datos guardados correctamente";
 }else { 
     echo "Error al guardar los datos";
}
?>
