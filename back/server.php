<?php

include './conexion.php';

session_start();

$count = 0;

if ( !is_dir('./Documentos') ) mkdir('./Documentos');

$path_alumno='./Documentos/'.$_SESSION['cedula'].'/';
if ( !is_dir($path_alumno) ) mkdir($path_alumno);


foreach ($_FILES as $key => $file) {

	$path_info = pathinfo( $path_alumno . $file['name'] );

 // te manda un array de cada uno de los tramos que los separa '_'
	$path_splitted = explode('_', $key);	

	if (($path_splitted[0] == 'foto') && isset($_FILES[$key]) ) {
  $photo_name= 'foto'.'_'.$count.'_'.date('m-d-yHis').'.'.$path_info['extension'];
 }
 
 if (($path_splitted[0] == 'notas') && isset($_FILES[$key])) {
  $photo_name = 'notas' . '_' . $count . '_' . date('m-d-yHis') . '.' . $path_info['extension'];
 }

 if (($path_splitted[0] == 'rusnies') && isset($_FILES[$key])) {
    $photo_name = 'rusnies' . '_' . $count . '_' . date('m-d-yHis') . '.' . $path_info['extension'];
}


	if (($path_splitted[0] == 'cedula') && isset($_FILES[$key])) {
    $photo_name = 'cedula' . '_' . $count . '_' . date('m-d-yHis') . '.' . $path_info['extension'];
}

	if (($path_splitted[0] == 'fondo') && isset($_FILES[$key])) {
    $photo_name = 'fondo' . '_' . $count . '_' . date('m-d-yHis') . '.' . $path_info['extension'];
}

	if (($path_splitted[0] == 'partida') && isset($_FILES[$key])) {
    $photo_name = 'partida' . '_' . $count . '_' . date('m-d-yHis') . '.' . $path_info['extension'];
}

if (($path_splitted[0] == 'metodo') && isset($_FILES[$key])) {
    $photo_name = 'metodo' . '_' . $count . '_' . date('m-d-yHis') . '.' . $path_info['extension'];
}

	// print_r(array_keys($_FILES)); // esto da un error porque se considera como respuesta al fetch y no esta en json

	if ( !move_uploaded_file($file['tmp_name'], $path_alumno. $photo_name) ) {
		return print_r(json_encode(['message' => 'No fue posible subir los archivos', 'status' => http_response_code(500)]));
	}

	$count++;

}


if ( $count == count( $_FILES ) ) {

	$message = ( $count > 1 ? 'Se subieron ' . $count . ' fotos con éxito' : 'Se subió ' . $count . ' foto con éxito' );

	return print_r(json_encode(
		[
			'message' => $message,
			'count' => $count,
			'status' => http_response_code(200)
			
		]
		));
}

?>