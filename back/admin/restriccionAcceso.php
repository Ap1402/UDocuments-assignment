<?php

if (!isset($_SESSION)) {
	session_start();
}

if (!isset($_SESSION['usuario']) and $_SESSION['rol'] < 1) {
	header('Location: index.php');
} else {
	//$estado = $_SESSION['usuario'];
	$salir = 'back/cerrarSesion.php';
	//require('recursos/sesiones.php');
};
