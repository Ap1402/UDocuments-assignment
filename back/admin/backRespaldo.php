<?php

include '../conexion.php';

$usuario = trim($_POST['usuario']);
$contrasena = trim($_POST['contrasena']);

$usuario = htmlspecialchars(mysqli_real_escape_string($conexion, $usuario));
$contrasena = htmlspecialchars(mysqli_real_escape_string($conexion, $contrasena));

$consulta = "SELECT * FROM administradores WHERE usuario='$usuario'";
$resultado = mysqli_query($conexion, $consulta);
$datos = mysqli_fetch_array($resultado);

$userBD = $datos['usuario'];
$passwordBD = $datos['contrasena'];


if ($usuario == $userBD and password_verify($contrasena, $passwordBD)) {
    print_r(json_encode(
    [
        'message' => 'Contraseña correcta',
        'exito' => true,
    ]
    ));

} else {
   print_r(json_encode(
    [
        'message' => 'Contraseña incorrecta',
        'exito' => false,
    ]
    ));

};
