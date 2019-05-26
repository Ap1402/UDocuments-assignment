<?php

include '../conexion.php';

session_start();



$check_foto = ($_POST['check_foto'] == 'true') ? 1 : 0; // verificar si fue o no chequeado por control de estudios
$check_cedula = ($_POST['check_cedula'] == 'true') ? 1 : 0;
$check_fondo = ($_POST['check_fondo'] == 'true') ? 1 : 0;
$check_notas = ($_POST['check_notas'] == 'true') ? 1 : 0;
$check_partida = ($_POST['check_partida'] == 'true') ? 1 : 0;
$check_rusnies = ($_POST['check_rusnies'] == 'true') ? 1 : 0;
$check_metodo = ($_POST['check_metodo'] == 'true') ? 1 : 0;
$check_certificado_s = ($_POST['check_certificado_s'] == 'true') ? 1 : 0;

$id_doc = $_POST['idDoc'];
$tipo = $_POST['tipoSolicitud'];
$carrera = $_POST['carrera'];
$ida = $_POST['ida'];


if (($tipo == 5 || $tipo == 4)) {
    $porcentaje = ($check_foto + $check_cedula + $check_fondo + $check_notas + $check_partida + $check_rusnies + $check_metodo);
    if ($carrera == 10) {
        $porcentaje = ($porcentaje + $check_certificado_s) * 100 / 8;
    } else {
        $porcentaje = $porcentaje * 100 / 7;
    }
    $porcentaje = round($porcentaje, 0, PHP_ROUND_HALF_UP);
}
if (!($tipo == 5 || $tipo == 4)) {
    $porcentaje = ($check_foto + $check_cedula + $check_fondo + $check_notas + $check_partida + $check_rusnies);
    if ($carrera == 10) {
        $porcentaje = ($porcentaje + $check_certificado_s) * 100 / 7;
    } else {
        $porcentaje = $porcentaje * 100 / 6;
    }
    $porcentaje = round($porcentaje, 0, PHP_ROUND_HALF_UP);
}

// guardando valores

$consulta = "UPDATE documentos SET check_foto='$check_foto',check_cedula='$check_cedula', check_fondo='$check_fondo', check_nota='$check_notas', check_partida='$check_partida', check_rusinies='$check_rusnies', check_metodo='$check_metodo', porcentaje='$porcentaje', check_certificado_s='$check_certificado_s'  WHERE id_documento=$id_doc";
$resultado = mysqli_query($conexion, $consulta);


$estado = ($_POST['check_solicitud'] == 'true') ? 1 : 0;

$personalAtencion = $_SESSION['nombre'];
$fecha = date("Y-m-d");


$consulta = "UPDATE solicitudes SET estadoSolicitud=$estado, `personalAtencion`='$personalAtencion', fechaAtencion='$fecha' WHERE alumno=$ida";
$resultado = mysqli_query($conexion, $consulta);

$cambiarAlumno = "UPDATE alumnos t1, solicitudes t2 SET t1.carrera = t2.carrera, t1.metodo_ingreso=t2.tipo, t1.turno=t2.turno WHERE t2.alumno=t1.id_alumno AND t2.alumno=$ida;";

$resultado = mysqli_query($conexion, $cambiarAlumno);

if ($estado == 1) {
    print_r(json_encode(['message' => 'Archivos validados con éxito y solicitud marcada como atendida', 'exito' => TRUE]));
} else {
    print_r(json_encode(['message' => 'Archivos validados con éxito y solicitud marcada como no atendida', 'exito' => FALSE]));
}
