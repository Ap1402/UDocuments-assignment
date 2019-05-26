<?php
include '../conexion.php';

$usuario = filter_var($_POST['usernameAdmin'], FILTER_SANITIZE_STRING);
$contrasena = filter_var($_POST['contrasenaAdmin'], FILTER_SANITIZE_STRING);

$consulta = "SELECT *
            FROM administradores LEFT JOIN rol_admin ON rol_admin.id = administradores.rol
                WHERE administradores.usuario ='$usuario'";

$resultado = mysqli_query($conexion, $consulta);
$datos = mysqli_fetch_array($resultado);

$userBD = $datos['usuario'];
$passwordBD = $datos['contrasena'];

if ($usuario == $userBD and password_verify($contrasena, $passwordBD)) {
    session_start();
    $_SESSION['username'] = $usuario;
    $_SESSION['nombre'] = $datos['nombre'];
    $_SESSION['estado'] = 1;
    $_SESSION['rol'] = $datos['rol'];
    $_SESSION['id_admin'] = $datos['id_admin'];

    //Permisos 
    $_SESSION['validacion'] = $datos['validacion'];
    $_SESSION['ver_perfil_alumno'] = $datos['ver_perfil_alumno'];
    $_SESSION['crea_editar_alumno'] = $datos['crea_editar_alumno'];
    $_SESSION['subir_edicion_documentos'] = $datos['subir_edicion_documentos'];
    $_SESSION['crear_editar_solicitudes'] = $datos['crear_editar_solicitudes'];
    $_SESSION['edicion_creacion_admin'] = $datos['edicion_creacion_admin'];
    $_SESSION['metodos_ingreso'] = $datos['metodos_ingreso'];
    $_SESSION['edicion_carreras'] = $datos['edicion_carreras'];
    $_SESSION['editar_correoContra_alumno'] = $datos['editar_correoContra_alumno'];




    echo "1";
} else {
    echo "2";
}
