<?php
include '../conexion.php';
$username = trim($_POST['usernameLog']);
$contrasena = trim($_POST['contrasenaLog']);

$username = htmlspecialchars(mysqli_real_escape_string($conexion, $username));
$contrasena = htmlspecialchars(mysqli_real_escape_string($conexion, $contrasena));

$consulta = "SELECT * FROM `alumnos` WHERE username='" . $username . "'";
$resultado = mysqli_query($conexion, $consulta);
$datos = mysqli_fetch_array($resultado);

$userBD = $datos['username'];
$passwordBD = $datos['contrasena'];
$cedula = $datos['cedula'];

if ($datos['ultActualizacion'] == '0000-00-00') {
        $_SESSION['datosLlenados'] = 0;
    } else {
        $_SESSION['datosLlenados'] = 1;
    }

if ($username == $userBD and password_verify($contrasena, $passwordBD)) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['estado'] = 1;
    $_SESSION['cedula'] = $cedula;
    $_SESSION['id'] = $datos['id_alumno'];
    $_SESSION['rol'] = 0;
    $_SESSION['docId'] = $datos['documento'];
    $_SESSION['correo'] = $datos['correo'];
    
    return print_r(json_encode(['message' => 'Datos correctos', 'exito' => TRUE, 'datosLlenados' => $_SESSION['datosLlenados']]));
} else {
    return print_r(json_encode(['message' => 'Usuario o contraseña incorrecto', 'exito' => FALSE, 'datosLlenados' => $_SESSION['datosLlenados']]));
}
