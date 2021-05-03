<?php
session_start();
error_reporting(0);
$name = $_SESSION['nombre'];
    if($name == null || $name == '' || !$name){
        echo "false";
    }
    elseif($name)
    {
        echo "true";
    }
    else{
        echo "error";
    }
?>