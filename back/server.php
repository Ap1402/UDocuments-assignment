<?php

include './conexion.php';

session_start();

$count = 0;

if ( !is_dir('./Documentos') ) mkdir('./Documentos');

$path_alumno='./Documentos/'.$_SESSION['cedula'].'/';
if ( !is_dir($path_alumno) ) mkdir($path_alumno);


foreach ($_FILES as $key => $file) {

	$path_info = pathinfo( $path_alumno . $file['name'] );
	
	if(isset($_FILES['foto'])){
		$photo_name= 'foto'.'_'.date('m-d-yHis').'.'.$path_info['extension'];


	}
	if(isset($_FILES['notas'])){
		$photo_name= 'notas'.'_'.date('m-d-yHis').'.'.$path_info['extension'];

	}
	if(isset($_FILES['rusnies'])){
		$photo_name= 'rusnies'.'_'.date('m-d-yHis').'.'.$path_info['extension'];


	}
	if(isset($_FILES['cedula'])){
		$photo_name= 'cedula'.'_'.date('m-d-yHis').'.'.$path_info['extension'];


	}
	if(isset($_FILES['fondo'])){
		$photo_name= 'fondo'.'_'.date('m-d-yHis').'.'.$path_info['extension'];


	}
	if(isset($_FILES['partida'])){
		$photo_name= 'partida'.'_'.date('m-d-yHis').'.'.$path_info['extension'];
	
	}


	if(isset($_FILES['metodo'])){
		$photo_name= 'metodo'.'_'.date('m-d-yHis').'.'.$path_info['extension'];


	}

	

	print_r(array_keys($_FILES));

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