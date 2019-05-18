<?php

$conexion = new mysqli('localhost', 'admin', 'admin', 'controlest');

if ($conexion->connect_error) {
    die('error en la conexion' . $conexion->connect_error);
}
;

$cedula = filter_var($_POST['cedula'], FILTER_SANITIZE_NUMBER_INT);


$consulta = "SELECT cedula, pregunta FROM alumnos
             WHERE cedula=$cedula";
$resultado = mysqli_query($conexion, $consulta);
if ($resultado->num_rows > 0) {
    $num_row = 1;
    $row = mysqli_fetch_assoc($resultado);
    $pregunta = $row['pregunta'];
}else {
    $num_row = 0;
};

if ($num_row == 1) {
   print_r(json_encode(
    [
        'cedula' => $cedula,
        'pregunta' => $pregunta,
        'exito' => true
    ]
    ));

}else{
    print_r(json_encode(
    [
        'message' => 'Cédula no registrada',
        'exito' => false
    ]
    ));

};

