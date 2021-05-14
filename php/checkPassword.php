<?php
session_start();
$password = $_POST['password'];

if ($_SESSION['password'] ==  $password){
    echo "true";
}else {
    echo "false";
}
?>