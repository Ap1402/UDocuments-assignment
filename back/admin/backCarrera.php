<?php 

$conexion = new mysqli('localhost','admin','admin','controlest');

if($conexion->connect_error){
    die('error en la conexion'. $conexion->connect_error);
};


$codigo = $_POST['codigo'];
$elemento = $_POST['elemento'];
$estado = ($_POST['estado']=='true') ? 0 : 1;

$consulta = "UPDATE carreras SET `$elemento`=$estado
             WHERE codigo=$codigo";
$resultado = mysqli_query($conexion, $consulta);

 print_r(json_encode(
     [
        'message' => 'Cambios guardados',
        'exito'=> TRUE,
        'estado' => $estado
    ]
    ));

?>