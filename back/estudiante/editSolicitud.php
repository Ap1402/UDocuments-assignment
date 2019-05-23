<?php
include '../conexion.php';

session_start();

$carreraSolicitud = filter_var($_POST['carrera'], FILTER_SANITIZE_STRING);
$turnoSolicitud = filter_var($_POST['turno'], FILTER_SANITIZE_STRING);
$tipoSolicitud = filter_var($_POST['nombre_solicitud'], FILTER_SANITIZE_STRING);

if (isset($_POST['idEstudiante'])){
    $ida =$_POST['idEstudiante'];
}else{
    $ida = $_SESSION['id'];
}


$sql = "SELECT 1 FROM solicitudes WHERE alumno='$ida' AND estadoSolicitud=0 LIMIT 1";
$result = mysqli_query($conexion, $sql);

if (mysqli_num_rows($result)==0) {
    return print_r(json_encode(['message'=>'No hay solicitudes creadas para este alumno', 'exito'=>FALSE]));
}

$modificarSQL = "UPDATE solicitudes SET  estadoSolicitud=0, tipo= $tipoSolicitud, carrera =$carreraSolicitud, turno =$turnoSolicitud WHERE alumno=$ida";

$result = mysqli_query($conexion, $modificarSQL);


return print_r(json_encode(['message'=>'Solicitud modificada correctamente para este alumno', 'exito'=>TRUE]));

?>