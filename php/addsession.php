<?php
require ("conexion.php");
$nombre = $_POST['user'];
$contrasena = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE usuario_usuario = '". $nombre . "' AND usuario_password = '" . $contrasena ."';";
$res = $mysqli->query($sql);

$totCuentas = mysqli_num_rows($res);
if($totCuentas>0){
    session_start();
    $_SESSION['nombre'] =  $nombre;
    // if (isset($_COOKIE[$nombre])) {
    //     $cont = $_COOKIE[$nombre];
    //     setcookie($nombre,1,time() + 3600);
    // }else {
    //     setcookie($nombre,1,time() + 3600);
    // }
    // if ($_SESSION['nombre'] == $nombre) {
    //    echo "Si se creo sesion";
    // }else{
    //     echo "No sesion";
    // }

    echo "Usuario encontrado";
}else {
    echo "Usuario no encontrado";
}

?>