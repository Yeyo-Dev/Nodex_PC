<?php

$nombre = $_POST['nombre'];
$destinatario = $_POST['destinatario'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
$cabecera = "From: <$nombre>";

if (empty($nombre)) {
    echo "Falta nombre \n";    
}
if (empty($destinatario)) {
    echo "Falta destinatario \n";    
}
if (empty($asunto)) {
    echo "Falta asunto \n";    
}
if (empty($mensaje)) {
    echo "Falta mensaje \n";    
}
else {
    if(mail($destinatario, $asunto, $mensaje ,$cabecera)){
        echo "Mensaje enviado con exito";
    }else{
        echo "Ocurrio un error al intentar enviar el mensaje";
    }
}




?>