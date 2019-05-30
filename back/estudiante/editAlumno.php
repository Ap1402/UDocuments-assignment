<?php
include '../conexion.php';

session_start();
//Tomando datos y eliminado espacios en blanco final e inicio.
//$correo = filter_var($_POST['correoAlumnoBoth'], FILTER_SANITIZE_STRING);

$correo = $_POST['correoAlumnoBoth'];

if (isset($_POST['idaAlumnoBoth'])) {
    $id_alumno = filter_var($_POST['idaAlumnoBoth'], FILTER_SANITIZE_NUMBER_INT);
}else {
    $id_alumno = $_SESSION['id'];
}

if (isset($_POST['contrasenaEditBoth']) && $_POST['contrasenaEditBoth'] != '') {

    $contrasena = filter_var($_POST['contrasenaEditBoth'], FILTER_SANITIZE_STRING);
    $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
    $modificarUser = "UPDATE alumnos SET contrasena='$contrasena', correo='$correo' WHERE id_alumno=$id_alumno";
    $result = mysqli_query($conexion, $modificarUser);
    $_SESSION['correo'] = $correo;
    return print_r(json_encode(['message' => 'Correo y contraseña modificado correctamente', 'exito' => TRUE]));
} else {

    $modificarUser = "UPDATE alumnos SET correo='$correo' WHERE id_alumno=$id_alumno";
    $result = mysqli_query($conexion, $modificarUser);
    $_SESSION['correo'] = $correo;
    return print_r(json_encode(['message' => 'Correo modificado correctamente', 'exito' => TRUE]));
}

return print_r(json_encode(['message' => 'No se ha podido modificar el usuario', 'exito' => FALSE]));



//dar respuesta:
