<?php
session_start();
error_reporting(0);
$nivel = $_SESSION['nivel']; 
if ($nivel == 1 ) {
  echo "admin";
}elseif ($nivel == 2 ){
    echo "user";
}else{
    echo "error";
}
?>