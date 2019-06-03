<?php
include '../conexion.php';

session_start();

include 'getDatosForm.php';

if (isset($_SESSION['cedula'])) {
    $id = $_SESSION['id'];
    $cedula = $_SESSION['cedula'];
    $isAdmin= 0;
} else {
    // ci= cedula / ida=id_alumnos
    $cedula = filter_var($_POST['ci'], FILTER_SANITIZE_NUMBER_INT);
    $id = filter_var($_POST['ida'], FILTER_SANITIZE_NUMBER_INT);
    $isAdmin= 1;
}

//Actualizacion de datos tabla alumno

$fecha = date("Y-m-d");

$sql = "UPDATE alumnos SET fecha_nacimiento='$fecha_nacimiento'," .
    "estado_civil='$estado_civil'," .
    "pais_nac='$pais_nac',ciudad_nac='$ciudad_nac'," .
    "estado_nac='$estado_nac', municipio_nac='$municipio_nac'," .
    "parientename='$e_nombre', parentesco='$parentesco'," .
    "ultActualizacion='$fecha', nombreInst='$i_nombre', anoEgreso='$i_egreso', codigoInst='$i_codigo', estadoInst='$i_estado', tipoInst='$tipo_inst' WHERE cedula='$cedula'";

$result = mysqli_query($conexion, $sql);

// ver si existen telefonos si existen se actualizan sino se crea en TABLA TELEFONOS
$actualizarTLF = "INSERT INTO telefonos (alumno, num_movil, num_habitacion, num_trabajo, num_habitacion_pariente, num_movil_pariente) VALUES('$id','$mov_tel','$hab_tel','$trab_tel','$e_hab_tel','$e_mov_tel') ON DUPLICATE KEY UPDATE num_movil='$mov_tel', num_habitacion='$hab_tel', num_trabajo='$trab_tel',num_movil_pariente='$e_mov_tel', num_habitacion_pariente='$e_hab_tel'";
$result = mysqli_query($conexion, $actualizarTLF);

// ver si existen direcciones si existen se actualizan sino se crea en TABLA DIRECCIONES
$actualizarDIREC = "INSERT INTO direcciones (alumno, estado, ciudad, municipio, postal_trabajo, estado_trabajo, municipio_trabajo, ciudad_trabajo, aptcasa,calle,postal_hab,urbanizacion)" .
    "VALUES('$id','$estado','$ciudad','$municipio','$postal_trabajo','$estado_trabajo','$municipio_trabajo','$ciudad_trabajo','$aptcasa','$calle','$postal_hab','$urbanizacion') ON DUPLICATE KEY UPDATE estado='$estado'," .
    "ciudad='$ciudad', municipio='$municipio',postal_trabajo='$postal_trabajo', estado_trabajo='$estado_trabajo'," .
    "municipio_trabajo='$municipio_trabajo',ciudad_trabajo='$ciudad_trabajo', postal_trabajo='$postal_trabajo', aptcasa='$aptcasa',calle='$calle',postal_hab='$postal_hab',urbanizacion='$urbanizacion'";

$result = mysqli_query($conexion, $actualizarDIREC);

$_SESSION['datosLlenados'] = 1;

return print_r(json_encode(
    [
        'message' => 'Datos guardados correctamente',
        'exito' => true,
        'admin'=> $isAdmin
    ]
));
