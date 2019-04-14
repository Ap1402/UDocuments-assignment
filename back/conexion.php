<?php

$conexion = new mysqli('localhost','admin','admin','controlest');

if($conexion->connect_error){
    die('error en la conexion'. $conexion->connect_error);
}

?>