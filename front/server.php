<?php

$count = 0;

if ( !is_dir('./storage') ) mkdir('./storage');


foreach ($_FILES as $key => $file) {

	$path_info = pathinfo( './storage/' . $file['name'] );
	$photo_name = str_random($path_info);

	if ( !move_uploaded_file($file['tmp_name'], './storage/' . $photo_name) ) {
		return print_r(json_encode(['message' => 'No fue posible subir los archivos', 'status' => http_response_code(500)]));
	}

	$count++;

}

function str_random ($path_info) {
	$string = 'AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_';
	return str_shuffle($string) . '.' . $path_info['extension'];
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