
<?php
session_start();
error_reporting(0);
if($_SESSION['nombre']){
    require_once ("conexion.php");
    $sql = "SELECT empleados.empleado_nombre, empleados.empleado_fotografia FROM empleados INNER JOIN usuarios
    ON  usuarios.usuario_usuario = empleados.empleado_usuario AND usuarios.usuario_usuario='".$_SESSION['nombre']."';";
    $res=$mysqli->query($sql);
    $totCuentas = mysqli_num_rows($res);
    
    if ($totCuentas > 0) {
        while ($rowCunt = mysqli_fetch_array($res)) {
            $usuario = $rowCunt['empleado_nombre'];
            $foto = "data:image/jpg;base64,". base64_encode($rowCunt['empleado_fotografia']);
        }
        ?><p><?php echo $usuario; ?>&nbsp<img src="<?php
                if(!empty($rowCunt['empleado_fotografia'])){
                echo $foto;
                }else{
                echo "./img/none.jpg";
                }
                ?>" alt="<?php echo $usuario; ?>">
          </p>
        <?php
    }else{
    ?>
        <p><?php echo $_SESSION['nombre']; ?>
        <img src="./img/none.jpg"></td>
    </p>
    <?php
    }
}else{
    echo "Usuario no encontrado";
}

?>