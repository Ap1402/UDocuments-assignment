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
$cedula =$datos['cedula'];
if ($username == $userBD and password_verify($contrasena, $passwordBD)) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['estado'] = 1;
    $_SESSION['cedula'] = $cedula;
    $_SESSION['id'] = $datos['id_alumno'];

    echo "1";
} else {
    echo "$contrasena";
}

?>