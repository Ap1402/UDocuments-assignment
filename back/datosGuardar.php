<?php
include 'conexion.php';

$errores = array();
$datos = array();

//Tomando datos y eliminado espacios en blanco final e inicio.
$cedula = trim($_POST['cedula']);
$estado_civil = filter_var($_POST['estado_civil'], FILTER_SANITIZE_NUMBER_INT);

//nacimiento
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$pais_nac = filter_var($_POST['pais'], FILTER_SANITIZE_STRING);
$estado_nac = filter_var($_POST['estado'], FILTER_SANITIZE_STRING);
$ciudad_nac = filter_var($_POST['ciudad'], FILTER_SANITIZE_STRING);
$municipio_nac = filter_var($_POST['municipio'], FILTER_SANITIZE_STRING);

//discapacidad
$discapacidad = filter_var($_POST['tipo_discapacidad'], FILTER_SANITIZE_STRING);

//turno y carrera

$turno = filter_var($_POST['turno'], FILTER_SANITIZE_NUMBER_INT);
$carrera = filter_var($_POST['carrera'], FILTER_SANITIZE_STRING);


//dirección hab
$postal = filter_var($_POST['nac_postal'], FILTER_SANITIZE_NUMBER_INT);
$estado = filter_var($_POST['nac_estado'], FILTER_SANITIZE_STRING);
$ciudad = filter_var($_POST['nac_ciudad'], FILTER_SANITIZE_STRING);
$municipio = filter_var($_POST['nac_municipio'], FILTER_SANITIZE_STRING);


// Telefono 

$hab_tel = filter_var($_POST['habitacion'], FILTER_SANITIZE_NUMBER_INT);
$mov_tel = filter_var($_POST['movil'], FILTER_SANITIZE_NUMBER_INT);
$trab_tel = filter_var($_POST['trabajo'], FILTER_SANITIZE_NUMBER_INT);


// Dirección trabajo

$postal_trabajo = filter_var($_POST['t_postal'], FILTER_SANITIZE_NUMBER_INT);
$estado_trabajo = filter_var($_POST['t_estado'], FILTER_SANITIZE_STRING);
$ciudad_trabajo = filter_var($_POST['t_ciudad'], FILTER_SANITIZE_STRING);
$municipio_trabajo = filter_var($_POST['t_municipio'], FILTER_SANITIZE_STRING);

// emergencia

$e_nombre = filter_var($_POST['e_nombre'], FILTER_SANITIZE_STRING);
$e_hab_tel = filter_var($_POST['e_local'], FILTER_SANITIZE_NUMBER_INT);
$e_mov_tel = filter_var($_POST['e_movil'], FILTER_SANITIZE_NUMBER_INT);
$parentesco = filter_var($_POST['parentesco'], FILTER_SANITIZE_STRING);

//Datos titulo
$i_nombre = filter_var($_POST['i_nombre'], FILTER_SANITIZE_STRING);
$i_egreso = filter_var($_POST['i_egreso'], FILTER_SANITIZE_NUMBER_INT);
$i_codigo = filter_var($_POST['i_codigo'], FILTER_SANITIZE_NUMBER_INT);
$i_estado = filter_var($_POST['i_estado'], FILTER_SANITIZE_STRING);
$tipo_inst = filter_var($_POST['tipo_inst'], FILTER_SANITIZE_NUMBER_INT);



// A decidir si se prohibira el registro a cedulas repetidas o a usuarios
$sql = "SELECT * FROM  alumnos WHERE cedula='$cedula'";
$result = mysqli_query($conexion, $sql);
$check = mysqli_num_rows($result);

if ($check == 1) {
    $errores['cedula'] = "Cedula ya registrada";
    $datos['errores'] = $errores;
}

if (empty($errores)) {
    $fecha= date("Y-m-d");

    $insertar = "INSERT INTO alumnos(username, contrasena,p_nombre,s_nombre,p_apellido,s_apellido,cedula,correo,ultActualizacion) VALUES ('$username','$contrasena','$p_nombre','$s_nombre','$p_apellido','$s_apellido','$cedula','$correo','$fecha')";
    $result = mysqli_query($conexion, $insertar);

    $datos['exito'] = true;
    $datos['mensaje'] = 'Usuario registrado correctamente';
} else {
    $datos['exito'] = false;
    $datos['errores'] = $errores;
}

//dar respuesta:
echo json_encode($datos);

?>