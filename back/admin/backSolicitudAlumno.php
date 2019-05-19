<?php 

$conexion = new mysqli('localhost','admin','admin','controlest');

if($conexion->connect_error){
    die('error en la conexion'. $conexion->connect_error);
};


$codigo = $_POST['codigo'];
$elemento = $_POST['elemento'];
$estado = ($_POST['estado']=='true') ? 0 : 1;
$personalAtencion = $_POST['personalAtencion'];
$fecha= date("Y-m-d");


// guardando valores
// print_r($elemento);

$consulta = "UPDATE solicitudes SET `$elemento`=$estado, `personalAtencion`='$personalAtencion', fechaAtencion='$fecha'
             WHERE id_solicitud=$codigo";
$resultado = mysqli_query($conexion, $consulta);

 print_r(json_encode(
     [
        'message' => 'Cambios guardados',
        'estado' => $estado
    ]
    ));

?>