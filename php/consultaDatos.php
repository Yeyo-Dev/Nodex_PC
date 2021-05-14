<?php

require_once ("conexion.php");
$tabla = $_GET['t'];
try{
 $sql = "SELECT * FROM ". $tabla;

 $res=$mysqli->query($sql);
 $totCuentas = mysqli_num_rows($res);
 
 $row = array();
 if ($totCuentas>0) {
 
    while ($rowCunt = mysqli_fetch_array($res)) {
        $row['registros'][] = $rowCunt;
    }


 echo json_encode($row);
 }
else{
    echo "No se encontraron registros";
}
}catch(Throwable $e){
    echo "Captured Throwable: " . $e->getMessage() . PHP_EOL;
}
?>
