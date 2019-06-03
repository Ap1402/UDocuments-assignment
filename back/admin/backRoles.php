<?php

$conexion = new mysqli('localhost', 'admin', 'admin', 'controlest');

if ($conexion->connect_error) {
    die('error en la conexion' . $conexion->connect_error);
};


$codigo = $_POST['codigo'];
$elemento = $_POST['elemento'];
$estado = ($_POST['estado'] == 'true') ? 0 : 1;

$consulta = "UPDATE rol_admin SET `$elemento`=$estado
             WHERE id=$codigo";
$resultado = mysqli_query($conexion, $consulta);

print_r(json_encode(
    [
        'message' => 'Cambios guardados',
        'exito' => TRUE,
        'estado' => $estado
    ]
));
