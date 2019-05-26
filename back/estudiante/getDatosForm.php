<?php

//$cedula = trim($_POST['cedula']);

$estado_civil = filter_var($_POST['estado_civil'], FILTER_SANITIZE_NUMBER_INT);
if ($estado_civil < 1 or $estado_civil > 4) {
    $errores['estado'] = "Error en el estado civil";
};





//nacimiento

$fecha_nacimiento = $_POST['fecha_nacimiento'];
$pais_nac = filter_var($_POST['pais'], FILTER_SANITIZE_STRING);
$estado_nac = filter_var($_POST['estado'], FILTER_SANITIZE_STRING);
$ciudad_nac = filter_var($_POST['ciudad'], FILTER_SANITIZE_STRING);
$municipio_nac = filter_var($_POST['municipio'], FILTER_SANITIZE_STRING);

//discapacidad

//$discapacidad = filter_var($_POST['tipo_discapacidad'], FILTER_SANITIZE_STRING);



//dirección hab

$postal = filter_var($_POST['nac_postal'], FILTER_SANITIZE_NUMBER_INT);
$estado = filter_var($_POST['nac_estado'], FILTER_SANITIZE_STRING);
$ciudad = filter_var($_POST['nac_ciudad'], FILTER_SANITIZE_STRING);
$municipio = filter_var($_POST['nac_municipio'], FILTER_SANITIZE_STRING);
$postal_hab = filter_var($_POST['nac_postal'], FILTER_SANITIZE_STRING);
$urbanizacion = filter_var($_POST['nac_urbanizacion'], FILTER_SANITIZE_STRING);
$aptcasa = filter_var($_POST['nac_aptcasa'], FILTER_SANITIZE_STRING);
$calle = filter_var($_POST['nac_calle'], FILTER_SANITIZE_STRING);


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
$i_codigo = filter_var($_POST['i_codigo'], FILTER_SANITIZE_STRING);
$i_estado = filter_var($_POST['i_estado'], FILTER_SANITIZE_STRING);
$tipo_inst = filter_var($_POST['tipo_inst'], FILTER_SANITIZE_NUMBER_INT);
