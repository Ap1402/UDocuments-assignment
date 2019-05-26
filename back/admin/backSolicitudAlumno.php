<?php

include '../conexion.php';



$codigo = $_POST['codigo'];
$elemento = $_POST['elemento'];
$estado = ($_POST['estado'] == 'true') ? 0 : 1;
$personalAtencion = $_POST['personalAtencion'];
$fecha = date("Y-m-d");
$alumno = $_POST['id_alumno'];

// guardando valores
// print_r($elemento);

$consulta = "UPDATE solicitudes SET `$elemento`=$estado, `personalAtencion`='$personalAtencion', fechaAtencion='$fecha'
             WHERE id_solicitud=$codigo";
$resultado = mysqli_query($conexion, $consulta);

$cambiarAlumno = "UPDATE alumnos t1, solicitudes t2 SET t1.carrera = t2.carrera WHERE t2.alumno=t1.id_alumno AND t2.id_solicitud=$codigo;";

$resultado = mysqli_query($conexion, $cambiarAlumno);

print_r(json_encode(
    [
        'message' => 'Cambios guardados',
        'estado' => $estado
    ]
));
