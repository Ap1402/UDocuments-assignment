<?php
//Reanudamos la sesión

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


//Comprobamos si el usario está logueado
//Si no lo está, se le redirecciona al index
//Si lo está, definimos el botón de cerrar sesión y la duración de la sesión
if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 1) {
	header('Location: index.php');
} else {
	//$estado = $_SESSION['usuario'];
	$salir = 'back/cerrarSesion.php';
	//require('recursos/sesiones.php');
};
?>