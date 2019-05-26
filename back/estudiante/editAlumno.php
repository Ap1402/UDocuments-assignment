<?php
include '../conexion.php';

session_start();
//Tomando datos y eliminado espacios en blanco final e inicio.
//$correo = filter_var($_POST['correo'], FILTER_SANITIZE_STRING);

$correo = filter_var($_POST['correo'], FILTER_SANITIZE_STRING);

if (isset($_POST['ida'])) {
    $id_alumno = filter_var($_POST['ida'], FILTER_SANITIZE_STRING);
} else {
    $id_alumno = filter_var($_SESSION['id'], FILTER_SANITIZE_STRING);
}

if (isset($_POST['contrasena']) && $_POST['contrasena'] != '') {

    $contrasena = filter_var($_POST['contrasena'], FILTER_SANITIZE_STRING);
    $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
    $modificarUser = "UPDATE alumnos SET contrasena='$contrasena', correo='$correo' WHERE id_alumno='$id_alumno'";
    $result = mysqli_query($conexion, $modificarUser);
    return print_r(json_encode(['message' => 'Correo y contraseña modificado correctamente', 'exito' => TRUE]));
} else {

    $modificarUser = "UPDATE alumnos SET  correo='$correo' WHERE id_alumno='$id_alumno'";
    $result = mysqli_query($conexion, $modificarUser);
    return print_r(json_encode(['message' => 'Correo modificado correctamente', 'exito' => TRUE]));
}

return print_r(json_encode(['message' => 'No se ha podido modificar el usuario', 'exito' => FALSE]));



//dar respuesta:
