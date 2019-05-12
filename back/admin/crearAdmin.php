<?php
include '../conexion.php';


//Tomando datos y eliminado espacios en blanco final e inicio.
$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
//$correo = filter_var($_POST['correo'], FILTER_SANITIZE_STRING);
$usuario = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$rol =filter_var($_POST['rol_admin'], FILTER_SANITIZE_STRING);
$contrasena = filter_var($_POST['contrasena'], FILTER_SANITIZE_STRING);

$contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

// A decidir si se prohibira el registro a cedulas repetidas o a usuarios
$sql = "SELECT * FROM  administradores WHERE usuario='$usuario'";
$result = mysqli_query($conexion, $sql);
$check = mysqli_num_rows($result);

if ($check >0) {
    return print_r(json_encode(['message'=>'Usuario ya registrado', 'exito'=> FALSE]));
}


    $crearUser = "INSERT INTO administradores (usuario, contrasena, nombre, rol, estatus) VALUES('$usuario','$contrasena','$nombre','$rol','1')";
    $result = mysqli_query($conexion, $crearUser);

    return print_r(json_encode(['message'=>'Usuario registrado correctamente', 'exito'=> TRUE]));



//dar respuesta:

?>