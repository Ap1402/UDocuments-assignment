<?php

$conexion = new mysqli('localhost','admin','admin','controlest');
$conexion->set_charset("utf8");  // para que no tenga problemas con los acentos

if($conexion->connect_error){
    die('error en la conexion'. $conexion->connect_error);
}

?>