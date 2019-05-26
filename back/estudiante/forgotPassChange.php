<?php

include '../conexion.php';

$cedula = filter_var($_POST['cedula'], FILTER_SANITIZE_NUMBER_INT);
$respuesta = filter_var($_POST['respuesta'], FILTER_SANITIZE_STRING);
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$contrasena = filter_var($_POST['contrasena'], FILTER_SANITIZE_STRING);


$consulta = "SELECT cedula, respuesta FROM alumnos
             WHERE cedula=$cedula AND username='$username'";

$resultado = mysqli_query($conexion, $consulta);
if ($resultado->num_rows > 0) {

    $row = mysqli_fetch_assoc($resultado);
    if ($row['respuesta'] == $respuesta) {
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        $update = "UPDATE alumnos SET contrasena='$contrasena' WHERE cedula=$cedula AND username='$username'";
        $resultado = mysqli_query($conexion, $update);

        print_r(json_encode(
            [
                'message' => 'Contraseña modificada correctamente',
                'exito' => true
            ]
        ));
    } else {
        print_r(json_encode(
            [
                'message' => 'Respuesta incorrecta',
                'exito' => false
            ]
        ));
    }
} else {
    print_r(json_encode(
        [
            'message' => 'La cedula no está registrada, por favor vuelve atrás y reingresala',
            'exito' => false
        ]
    ));
};
