<?php 

$conexion = new mysqli('localhost','admin','admin','controlest');

if($conexion->connect_error){
    die('error en la conexion'. $conexion->connect_error);
};



$check_foto = 0; // verificar si fue o no chequeado por control de estudios
$check_cedula = 0;
$check_fondo = 1;
$check_notas = 0;
$check_partida = 1;
$check_rusnies = 0;
$check_metodo = 0;

// Iniciando valores
$cedula = '12369778';

$consulta = "SELECT documento FROM `alumnos` WHERE cedula='" . $cedula . "'";
$resultado = mysqli_query($conexion, $consulta);
$id_doc = mysqli_fetch_array($resultado);
$id_doc = $id_doc['documento'];

$consulta = "SELECT *FROM documentos d1 INNER JOIN notas n ON d1.id_documento = n.documento INNER JOIN metodoing m ON d1.id_documento =m.documento INNER JOIN rusnies r ON d1.id_documento = r.documento WHERE id_documento='" . $id_doc . "'";
$resultado = mysqli_query($conexion, $consulta);
$doc = mysqli_fetch_array($resultado);


print_r ($doc);


// rura de la imagen (ruta completa ejemplo: back/Documentos/12345678/nirvana.jpg )
$path_cedula = 'back/Documentos/'.$cedula.'/'.$doc['cedula'].'.jpg';
$path_notas = 'back/Documentos/'.$cedula.'/'.$doc['nota'].'.jpg';
$path_fondo= 'back/Documentos/'.$cedula.'/'.$doc['fondo'].'.jpg';
$path_rusnies = 'back/Documentos/'.$cedula.'/'.$doc['rusnies'].'.jpg';
$path_partida = 'back/Documentos/'.$cedula.'/'.$doc['partida'].'.jpg';
$path_metodo = 'back/Documentos/'.$cedula.'/'.$doc['metodo'].'.jpg';






?>