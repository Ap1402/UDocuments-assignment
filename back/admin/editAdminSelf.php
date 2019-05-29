<?php
include '../conexion.php';

session_start();

//Tomando datos y eliminado espacios en blanco final e inicio.
$nombre = filter_var($_POST['nombreAdminSelf'], FILTER_SANITIZE_STRING);

if (isset($_SESSION['id_admin']) && $_SESSION['id_admin'] == $_POST['adminIdSelf']) {
    $id_admin = filter_var($_SESSION['id_admin'], FILTER_SANITIZE_NUMBER_INT);
    if (isset($_POST['contrasenaEditSelf']) && $_POST['contrasenaEditSelf'] != '') {

        $contrasena = filter_var($_POST['contrasenaEditSelf'], FILTER_SANITIZE_STRING);
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        $modificarUser = "UPDATE administradores SET contrasena='$contrasena', nombre='$nombre' WHERE id_admin='$id_admin'";
        $result = mysqli_query($conexion, $modificarUser);
        return print_r(json_encode(['message' => 'Nombre y contraseña modificado correctamente', 'exito' => TRUE]));
    } else {

        $modificarUser = "UPDATE administradores SET  nombre='$nombre' WHERE id_admin='$id_admin'";
        $result = mysqli_query($conexion, $modificarUser);
        return print_r(json_encode(['message' => 'Nombre modificado correctamente', 'exito' => TRUE]));
    }
}else {
    return print_r(json_encode(['message' => 'No se ha podido modificar el usuario', 'exito' => FALSE]));
}







//dar respuesta:
