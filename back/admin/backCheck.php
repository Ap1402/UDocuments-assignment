<?php 

$conexion = new mysqli('localhost','admin','admin','controlest');

if($conexion->connect_error){
    die('error en la conexion'. $conexion->connect_error);
};



$check_foto = ($_POST['check_foto']=='true') ? 1 : 0; // verificar si fue o no chequeado por control de estudios
$check_cedula = ($_POST['check_cedula']=='true') ? 1:0;
$check_fondo = ($_POST['check_fondo']=='true') ? 1 : 0;
$check_notas = ($_POST['check_notas']=='true') ? 1 : 0;
$check_partida = ($_POST['check_partida']=='true') ? 1 : 0;
$check_rusnies = ($_POST['check_rusnies']=='true') ? 1 : 0;
$check_metodo = ($_POST['check_metodo']=='true') ? 1 : 0; 
$id_doc=$_POST['idDoc'];

$porcentaje = ($check_foto + $check_cedula + $check_fondo + $check_notas + $check_partida + $check_rusnies +
$check_metodo) * 100 / 7;
$porcentaje = round($porcentaje, 0, PHP_ROUND_HALF_UP);
// guardando valores

$consulta = "UPDATE documentos SET check_foto='$check_foto',check_cedula='$check_cedula', check_fondo='$check_fondo', check_nota='$check_notas', check_partida='$check_partida', check_rusinies='$check_rusnies', check_metodo='$check_metodo', porcentaje='$porcentaje'  WHERE id_documento=$id_doc";
$resultado = mysqli_query($conexion, $consulta);

 print_r(json_encode(['message' => 'Archivos validados con éxito']));

?>