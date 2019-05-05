<?php

include './conexion.php';

session_start();

$count = 0;

if ( !is_dir('./Documentos') ) mkdir('./Documentos');


$cedula= $_SESSION['cedula'].'/';
$idDoc=$_SESSION['docId'];

$path_alumno='./Documentos/'.$cedula.'/';

if ( !is_dir($path_alumno) ) mkdir($path_alumno);


foreach ($_FILES as $key => $file) {

	$path_info = pathinfo( $path_alumno . $file['name'] );

 // te manda un array de cada uno de los tramos que los separa '_'
	$path_splitted = explode('_', $key);	

	if (($path_splitted[0] == 'foto') && isset($_FILES[$key]) ) {
  		$photo_name= 'foto'.'_'.$count.'_'.date('m-d-yHis').'.'.$path_info['extension'];
  		$consult = "SELECT IF(foto IS NULL or foto = '', 'empty', foto) as foto from documentos WHERE id_documento='".$idDoc."'";
  		$result = mysqli_query($conexion, $consult);
  		$datos = mysqli_fetch_array($result);

	  	if ($datos['foto']!='empty'){
			return print_r(json_encode(['message' => 'Ya ha subido la cantidad máxima de archivos para fotos, por favor dirigirse a modificación para cambiar este archivo', 'status' => http_response_code(500)]));

	  	}else{
		  	$direccion = $cedula.$photo_name;
		  	$insertarDoc = "UPDATE documentos SET foto='$direccion' WHERE id_documento=$idDoc";
		  	$result = mysqli_query($conexion, $insertarDoc);
	  	}
 }
 
 if (($path_splitted[0] == 'notas') && isset($_FILES[$key])) {
  $photo_name = 'notas' . '_' . $count . '_' . date('m-d-yHis') . '.' . $path_info['extension'];
  $consulta="SELECT COUNT(*) AS `count` FROM `notas` WHERE documento=$idDoc";
  $result = mysqli_query($conexion, $consulta);
  $datos = mysqli_fetch_array($result);

  if ($datos['count']>=5){
	  return print_r(json_encode(['message' => 'Ya ha subido la cantidad máxima de archivos para notas, dirigirse a Modificación para hacer cambios', 'status' => http_response_code(500)]));

  }else{

	  $direccion = $cedula.$photo_name;
	  $insertarDoc = "INSERT INTO notas(nota,documento) VALUES ('$direccion','$idDoc')";
	  $result = mysqli_query($conexion, $insertarDoc);
  	}
 }

 if (($path_splitted[0] == 'rusnies') && isset($_FILES[$key])) {
	$photo_name = 'rusnies' . '_' . $count . '_' . date('m-d-yHis') . '.' . $path_info['extension'];
	$consulta="SELECT COUNT(*) AS `count` FROM `rusnies` WHERE documento=$idDoc";
	$result = mysqli_query($conexion, $consulta);
	$datos = mysqli_fetch_array($result);

	if ($datos['count']>=5){
		return print_r(json_encode(['message' => 'Ya ha subido la cantidad máxima de archivos para rusnies, dirigirse a Modificación para hacer cambios o eliminar', 'status' => http_response_code(500)]));

	}else{
		$direccion = $cedula.$photo_name;
		$insertarDoc = "INSERT INTO rusnies (rusnies,documento) VALUES ('$direccion','$idDoc')";
		$result = mysqli_query($conexion, $insertarDoc);
	}
}

	if (($path_splitted[0] == 'cedula') && isset($_FILES[$key])) {

	$photo_name = 'cedula' . '_' . $count . '_' . date('m-d-yHis') . '.' . $path_info['extension'];
	$consult = "SELECT IF(cedula IS NULL or cedula = '', 'empty', cedula) as cedula from documentos WHERE id_documento='".$idDoc."'";
	$result = mysqli_query($conexion, $consult);
	$datos = mysqli_fetch_array($result);

		if ($datos['cedula']!='empty'){
			return print_r(json_encode(['message' => 'Ya ha subido un documento de cedula, por favor dirigirse a modificación para cambiar este archivo', 'status' => http_response_code(500)]));

		}else{
			$direccion = $cedula.$photo_name;
			$insertarDoc = "UPDATE documentos SET cedula='$direccion' WHERE id_documento=$idDoc";
			$result = mysqli_query($conexion, $insertarDoc);
		}
}

	if (($path_splitted[0] == 'fondo') && isset($_FILES[$key])) {
	$photo_name = 'fondo' . '_' . $count . '_' . date('m-d-yHis') . '.' . $path_info['extension'];
	$consult = "SELECT IF(fondo IS NULL or fondo = '', 'empty', fondo) as fondo from documentos WHERE id_documento='".$idDoc."'";
	$result = mysqli_query($conexion, $consult);
	$datos = mysqli_fetch_array($result);

		if ($datos['fondo']!='empty'){
			return print_r(json_encode(['message' => 'Ya ha subido la cantidad máxima de archivos de fondo negro, por favor dirigirse a modificación para cambiar este archivo', 'status' => http_response_code(500)]));

		}else{
			$direccion = $cedula.$photo_name;
			$insertarDoc = "UPDATE documentos SET fondo='$direccion' WHERE id_documento=$idDoc";
			$result = mysqli_query($conexion, $insertarDoc);
		}
}

	if (($path_splitted[0] == 'partida') && isset($_FILES[$key])) {
	$photo_name = 'partida' . '_' . $count . '_' . date('m-d-yHis') . '.' . $path_info['extension'];
	$consult = "SELECT IF(partida IS NULL or partida = '', 'empty', partida) as partida from documentos WHERE id_documento='".$idDoc."'";
	$result = mysqli_query($conexion, $consult);
	$datos = mysqli_fetch_array($result);

		if ($datos['partida']!='empty'){
			return print_r(json_encode(['message' => 'Ya ha subido la cantidad máxima de archivos de partida, por favor dirigirse a modificación para cambiar este archivo', 'status' => http_response_code(500)]));

		}else{
			$direccion = $cedula.$photo_name;
			$insertarDoc = "UPDATE documentos SET partida='$direccion' WHERE id_documento=$idDoc";
			$result = mysqli_query($conexion, $insertarDoc);
		}
}

if (($path_splitted[0] == 'metodo') && isset($_FILES[$key])) {
	$photo_name = 'metodo' . '_' . $count . '_' . date('m-d-yHis') . '.' . $path_info['extension'];
	$consulta="SELECT COUNT(*) AS `count` FROM `metodoing` WHERE documento=$idDoc";
	$result = mysqli_query($conexion, $consulta);
	$datos = mysqli_fetch_array($result);

	if ($datos['count']>=5){
		return print_r(json_encode(['message' => 'Ya ha subido la cantidad máxima de archivos para metodo de ingreso, dirigirse a Modificación para hacer cambios o eliminar', 'status' => http_response_code(500)]));

	}else{
		$direccion = $cedula.$photo_name;
		$insertarDoc = "INSERT INTO metodoing (metodo,documento) VALUES ('$direccion','$idDoc')";
		$result = mysqli_query($conexion, $insertarDoc);
	}

}

	// print_r(array_keys($_FILES)); // esto da un error porque se considera como respuesta al fetch y no esta en json

	if ( !move_uploaded_file($file['tmp_name'], $path_alumno. $photo_name) ) {
		return print_r(json_encode(['message' => 'No fue posible subir los archivos', 'status' => http_response_code(500)]));
	}
	$count++;

}


if ( $count == count( $_FILES ) ) {

	$message = ( $count > 1 ? 'Se subieron ' . $count . ' archivos con éxito' : 'Se subió ' . $count . ' foto con éxito' );

	return print_r(json_encode(
		[
			'message' => $message,
			'count' => $count,
			'status' => http_response_code(200)
			
		]
		));
}

?>