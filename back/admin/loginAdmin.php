<?php
include '../conexion.php';

$usuario = filter_var($_POST['usernameAdmin'], FILTER_SANITIZE_STRING);
$contrasena = filter_var($_POST['contrasenaAdmin'], FILTER_SANITIZE_STRING);

$consulta = "SELECT * FROM `administradores` WHERE usuario='" . $usuario . "'";
$resultado = mysqli_query($conexion, $consulta);
$datos = mysqli_fetch_array($resultado);

$userBD = $datos['usuario'];
$passwordBD = $datos['contrasena'];

if ($usuario == $userBD and password_verify($contrasena, $passwordBD)) {
    session_start();
    $_SESSION['username'] = $usuario;
    $_SESSION['nombre']=$datos['nombre'];
    $_SESSION['estado'] = 1;
    $_SESSION['rol']=$datos['rol'];
    // $_SESSION['id_admin'] = $datos['id_admin']; //si puedes ponlo asi


    echo "1";
} else {
    echo "2";
}

?>