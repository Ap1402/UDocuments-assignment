<?php
include 'conexion.php';

$errores = array();
$datos = array();

//Tomando datos y eliminado espacios en blanco final e inicio.
$p_nombre = filter_var($_POST['p_nombre'], FILTER_SANITIZE_STRING);
$s_nombre = trim($_POST['s_nombre']);
$p_apellido = trim($_POST['p_apellido']);
$s_apellido = trim($_POST['s_apellido']);
$cedula = trim($_POST['cedula']);
$correo = trim($_POST['correo']);
$estado_civil = filter_var($_POST['estado_civil'], FILTER_SANITIZE_NUMBER_INT);

//nacimiento
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$pais_nac = filter_var($_POST['pais'], FILTER_SANITIZE_STRING);
$estado_nac = filter_var($_POST['estado'], FILTER_SANITIZE_STRING);
$ciudad_nac = filter_var($_POST['ciudad'], FILTER_SANITIZE_STRING);
$municipio_nac = filter_var($_POST['municipio'], FILTER_SANITIZE_STRING);

//etnia
$p_nombre = filter_var($_POST['p_nombre'], FILTER_SANITIZE_STRING);
$p_nombre = filter_var($_POST['p_nombre'], FILTER_SANITIZE_STRING);


//turno y carrera
$turno = filter_var($_POST['turno'], FILTER_SANITIZE_NUMBER_INT);
$carrera = filter_var($_POST['carrera'], FILTER_SANITIZE_STRING);


//dirección hab
$postal = filter_var($_POST['nac_postal'], FILTER_SANITIZE_NUMBER_INT);
$estado = filter_var($_POST['nac_estado'], FILTER_SANITIZE_STRING);
$ciudad = filter_var($_POST['nac_ciudad'], FILTER_SANITIZE_STRING);
$municipio = filter_var($_POST['nac_municipio'], FILTER_SANITIZE_STRING);


// Telefono 

$hab_tel = filter_var($_POST['habitacion'], FILTER_SANITIZE_NUMBER_INT);
$mov_tel = filter_var($_POST['movil'], FILTER_SANITIZE_NUMBER_INT);
$trab_tel = filter_var($_POST['trabajo'], FILTER_SANITIZE_NUMBER_INT);


// 


$username = trim($_POST['username']);

$contrasena = trim($_POST['contrasena']);
$contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

// A decidir si se prohibira el registro a cedulas repetidas o a usuarios
$sql = "SELECT * FROM  alumnos WHERE cedula='$cedula'";
$result = mysqli_query($conexion, $sql);
$check = mysqli_num_rows($result);

if ($check == 1) {
    $errores['cedula'] = "Cedula ya registrada";
    $datos['errores'] = $errores;
}

if (empty($errores)) {
    $fecha= date("Y-m-d");

    $insertar = "INSERT INTO alumnos(username, contrasena,p_nombre,s_nombre,p_apellido,s_apellido,cedula,correo,ultActualizacion) VALUES ('$username','$contrasena','$p_nombre','$s_nombre','$p_apellido','$s_apellido','$cedula','$correo','$fecha')";
    $result = mysqli_query($conexion, $insertar);

    $datos['exito'] = true;
    $datos['mensaje'] = 'Usuario registrado correctamente';
} else {
    $datos['exito'] = false;
    $datos['errores'] = $errores;
}

//dar respuesta:
echo json_encode($datos);

?>