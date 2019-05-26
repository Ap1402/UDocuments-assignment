<?php

include '../conexion.php';

$codigo = $_POST['codigo'];
$estado = ($_POST['estado'] == 'true') ? 0 : 1;

// guardando valores
// print_r($elemento);

$consulta = "UPDATE tipo_solicitud SET activa=$estado
             WHERE tipo=$codigo";
$resultado = mysqli_query($conexion, $consulta);

print_r(json_encode(
    [
        'message' => 'Cambios guardados',
        'estado' => $estado
    ]
));
