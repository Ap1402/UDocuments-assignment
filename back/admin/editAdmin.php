<?php
include '../conexion.php';

session_start();

//Tomando datos y eliminado espacios en blanco final e inicio.
//$correo = filter_var($_POST['correo'], FILTER_SANITIZE_STRING);

$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
$idAdmin = filter_var($_POST['adminId'], FILTER_SANITIZE_STRING);

if ($_SESSION['id_admin'] != $idAdmin && $_SESSION['edicion_creacion_admin'] != 1) {
    return print_r(json_encode(['message' => 'No tiene los permisos necesarios para modificar otro admin', 'exito' => FALSE]));
} else {

    if (isset($_POST['rol_admin'])) {
        if ($_SESSION['edicion_creacion_admin'] == 1) {
            $rolInput = filter_var($_POST['rol_admin'], FILTER_SANITIZE_STRING);
        } else {
            return print_r(json_encode(['message' => 'No tiene los permisos necesarios para cambiar el rol de un admin', 'exito' => FALSE]));
        }
    }

    if (isset($_POST['estatus'])) {
        if ($_SESSION['edicion_creacion_admin'] == 1) {
            $estatus = filter_var($_POST['estatus'], FILTER_SANITIZE_STRING);
        } else {
            return print_r(json_encode(['message' => 'No tiene los permisos necesarios para cambiar el estatus de un admin', 'exito' => FALSE]));
        }
    }

    if (isset($_POST['contrasena']) && $_POST['contrasena'] != '' && isset($rolInput) && isset($estatus)) {

        $contrasena = filter_var($_POST['contrasena'], FILTER_SANITIZE_STRING);
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        $modificarUser = "UPDATE administradores SET contrasena='$contrasena', nombre='$nombre', rol='$rolInput', estatus='$estatus' WHERE id_admin='$idAdmin'";
        $result = mysqli_query($conexion, $modificarUser);
        return print_r(json_encode(['message' => 'Datos y contraseña modificado correctamente', 'exito' => TRUE]));
    } elseif (isset($rolInput) && isset($estatus)) {

        $modificarUser = "UPDATE administradores SET  nombre='$nombre', rol='$rolInput', estatus='$estatus' WHERE id_admin='$idAdmin'";
        $result = mysqli_query($conexion, $modificarUser);
        return print_r(json_encode(['message' => 'Datos modificados correctamente', 'exito' => TRUE]));
    } elseif (isset($_POST['contrasena']) && $_POST['contrasena'] != '') {
        $contrasena = filter_var($_POST['contrasena'], FILTER_SANITIZE_STRING);
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        $modificarUser = "UPDATE administradores SET contrasena='$contrasena', nombre='$nombre' WHERE id_admin='$idAdmin'";
        $result = mysqli_query($conexion, $modificarUser);
        return print_r(json_encode(['message' => 'Datos y contraseña modificado correctamente', 'exito' => TRUE]));
    } else {

        $modificarUser = "UPDATE administradores SET  nombre='$nombre' WHERE id_admin='$idAdmin'";
        $result = mysqli_query($conexion, $modificarUser);
        return print_r(json_encode(['message' => 'Datos modificados correctamente', 'exito' => TRUE]));
    }

    return print_r(json_encode(['message' => 'No se ha podido modificar el usuario', 'exito' => FALSE]));
}
