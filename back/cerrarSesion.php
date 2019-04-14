<?php

session_start();

require('conexion.php');

//Des-establecemos todas las sesiones
unset($_SESSION);

//Destruimos las sesiones
session_destroy();

//Cerramos la conexión con la base de datos
mysqli_close($conexion);

//Redireccionamos a el index
header("Location: ../index.php");
die();
?>