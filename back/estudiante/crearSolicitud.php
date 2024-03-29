<?php
include '../conexion.php';

session_start();

$carreraSolicitud = filter_var($_POST['carrera'], FILTER_SANITIZE_STRING);
$turnoSolicitud = filter_var($_POST['turno'], FILTER_SANITIZE_STRING);
$tipoSolicitud = filter_var($_POST['nombre_solicitud'], FILTER_SANITIZE_STRING);

if (isset($_POST['idEstudiante'])) {
    $ida = $_POST['idEstudiante'];
    $isAdmin= 1;

} else {
    $ida = $_SESSION['id'];
    $isAdmin= 0;
}

$sql = "SELECT 1 FROM solicitudes WHERE alumno='$ida' AND estadoSolicitud=0 LIMIT 1";
$result = mysqli_query($conexion, $sql);

if (mysqli_num_rows($result)) {
    return print_r(json_encode(['message' => 'Ya hay una solicitud pendiente de atender ingresada para este alumno', 'exito' => FALSE]));
}

$fecha = date('Y-m-d');
$crearSQL = "INSERT INTO solicitudes (alumno, fechaCreacion, estadoSolicitud, tipo, carrera, turno) 
VALUES('$ida','$fecha','0','$tipoSolicitud','$carreraSolicitud','$turnoSolicitud')";

$result = mysqli_query($conexion, $crearSQL);


return print_r(json_encode(['message' => 'Solicitud creada correctamente para este alumno', 'exito' => TRUE, 'admin'=>$isAdmin]));
