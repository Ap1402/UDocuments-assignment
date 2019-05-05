<?php
include '../conexion.php';

$errores = array();
$datos = array();

//Tomando datos y eliminado espacios en blanco final e inicio.
$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
$correo = filter_var($_POST['correo'], FILTER_SANITIZE_STRING);
$usuario = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$rol =1;
$contrasena = filter_var($_POST['contrasena'], FILTER_SANITIZE_STRING);

$contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

// A decidir si se prohibira el registro a cedulas repetidas o a usuarios
$sql = "SELECT * FROM  administradores WHERE usuario='$usuario'";
$result = mysqli_query($conexion, $sql);
$check = mysqli_num_rows($result);

if ($check == 1) {
    $errores['usuario'] = "Usuario ya registrado";
    $datos['errores'] = $errores;
}

if (empty($errores)) {

    $crearUser = "INSERT INTO administradores (usuario, contrasena, nombre, rol) VALUES('$usuario','$contrasena','$nombre','$rol')";
    $result = mysqli_query($conexion, $crearUser);
    $lastid = mysqli_insert_id($conexion); 

    $datos['exito'] = true;
    $datos['mensaje'] = 'Usuario registrado correctamente';
} else {
    $datos['exito'] = false;
    $datos['errores'] = $errores;
}

//dar respuesta:
echo json_encode($datos);

?>