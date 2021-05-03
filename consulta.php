<?php

$tabla = $_GET['tabla'];
error_reporting(0);
$ruta = "./php/consulta_". $tabla .".php";

if(file_exists($ruta)) {
    require($ruta);
}else{ 
    echo "Error, tabla no localizada";
}

?>