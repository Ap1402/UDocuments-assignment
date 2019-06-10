<?php
include '../conexion.php';

$errores = array();
$datos = array();

//Tomando datos y eliminado espacios en blanco final e inicio.
$p_nombre = trim($_POST['p_nombre']);
$s_nombre = trim($_POST['s_nombre']);
$p_apellido = trim($_POST['p_apellido']);
$s_apellido = trim($_POST['s_apellido']);
$cedula = trim($_POST['cedula']);
$correo = $_POST['correo'];
$username = trim($_POST['username']);
$pregunta = trim($_POST['pregunta']);
$respuesta = trim($_POST['respuesta']);

$contrasena = trim($_POST['contrasena']);
$contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

// A decidir si se prohibira el registro a cedulas repetidas o a usuarios
$sql = "SELECT * FROM  alumnos WHERE cedula='$cedula'";
$result = mysqli_query($conexion, $sql);
$check = mysqli_num_rows($result);

if ($check >0) {
    $errores['message'] = "Cedula ya registrada";
    $datos['errores'] = $errores;
}


$sql = "SELECT * FROM  alumnos WHERE username='$username'";
$result = mysqli_query($conexion, $sql);
$check = mysqli_num_rows($result);

if ($check >0 ) {
    $errores['message'] = "Usuario ya registrado";
    $datos['errores'] = $errores;
}

if (empty($errores)) {
    $fecha = date("Y-m-d");


    $instDoc = "INSERT INTO documentos (foto) VALUES('')";
    $result = mysqli_query($conexion, $instDoc);
    $lastid = mysqli_insert_id($conexion);

    $instAlumn = "INSERT INTO alumnos(username, contrasena,p_nombre,s_nombre,p_apellido,s_apellido,cedula,correo,fechacreacion,documento,pregunta,respuesta) VALUES ('$username','$contrasena','$p_nombre','$s_nombre','$p_apellido','$s_apellido','$cedula','$correo','$fecha','$lastid','$pregunta','$respuesta')";
    $result = mysqli_query($conexion, $instAlumn);


    $datos['exito'] = true;
    $datos['message'] = 'Usuario registrado correctamente';
} else {
    $datos['exito'] = false;
    $datos['errores'] = $errores;
}

//dar respuesta:
echo json_encode($datos);
