<?php
include '../conexion.php';

session_start();


include ('getDatosForm.php');

if(isset($_POST['p_nombre'])){
    $p_nombre=$_POST['p_nombre'];
}
if(isset($_POST['s_nombre'])){
    $s_nombre=$_POST['s_nombre'];
}

if(isset($_POST['p_apellido'])){
    $p_apellido=$_POST['p_apellido'];
}

if(isset($_POST['s_apellido'])){
    $s_apellido=$_POST['s_apellido'];
}
$postal_hab= $_POST['nac_postal'];
$urbanizacion=$_POST['nac_urbanizacion'];
$aptcasa=$_POST['nac_aptcasa'];
$calle=$_POST['nac_calle'];

$cedula = $_SESSION['cedula'];
$id = $_SESSION['id'];



 //Actualizacion de datos tabla alumno


    $fecha= date("Y-m-d");

    $sql = "UPDATE alumnos SET fecha_nacimiento='$fecha_nacimiento',".
    "estado_civil='$estado_civil',". 
    "pais_nac='$pais_nac',ciudad_nac='$ciudad_nac', p_nombre='$p_nombre', s_nombre='$s_nombre', p_apellido='$p_apellido', s_apellido='$s_apellido',". 
    "estado_nac='$estado_nac', municipio_nac='$municipio_nac',". 
    "parientename='$e_nombre', parentesco='$parentesco',". 
    "ultActualizacion='$fecha', nombreInst='$i_nombre', anoEgreso='$i_egreso', codigoInst='$i_codigo', estadoInst='$i_estado', tipoInst='$tipo_inst' WHERE id_alumno='$id'";

    $result = mysqli_query($conexion, $sql);

    if(mysqli_affected_rows($conexion)<1){
        return print_r(json_encode(['message' => 'Hubo un error al guardar los datos generales', 'status' => http_response_code(500)]));
    }

// ver si existen telefonos si existen se actualizan sino se crea en TABLA TELEFONOS
$actualizarTLF = "INSERT INTO telefonos (alumno, num_movil, num_habitacion, num_trabajo, num_habitacion_pariente, num_movil_pariente) VALUES('$id','$mov_tel','$hab_tel','$trab_tel','$e_hab_tel','$e_mov_tel') ON DUPLICATE KEY UPDATE num_movil='$mov_tel', num_habitacion='$hab_tel', num_trabajo='$trab_tel',num_movil_pariente='$e_mov_tel', num_habitacion_pariente='$e_hab_tel'";
$result = mysqli_query($conexion, $actualizarTLF); 

if(mysqli_affected_rows($conexion)<1){
    return print_r(json_encode(['message' => 'Hubo un error al guardar los numeros telefonicos', 'status' => http_response_code(500)]));
}

// ver si existen direcciones si existen se actualizan sino se crea en TABLA DIRECCIONES
$actualizarDIREC = "INSERT INTO direcciones (alumno, estado, ciudad, municipio, postal_trabajo, estado_trabajo, municipio_trabajo, ciudad_trabajo, aptcasa,calle,postal_hab,urbanizacion)". 
"VALUES('$id','$estado','$ciudad','$municipio','$postal_trabajo','$estado_trabajo','$municipio_trabajo','$ciudad_trabajo','$aptcasa','$calle','$postal_hab','$urbanizacion') ON DUPLICATE KEY UPDATE estado='$estado',".
"ciudad='$ciudad', municipio='$municipio',postal_trabajo='$postal_trabajo', estado_trabajo='$estado_trabajo',". 
"municipio_trabajo='$municipio_trabajo',ciudad_trabajo='$ciudad_trabajo', postal_trabajo='$postal_trabajo', aptcasa='$aptcasa',calle='$calle',postal_hab='$postal_hab',urbanizacion='$urbanizacion'";

$result = mysqli_query($conexion, $actualizarDIREC); 

if(mysqli_affected_rows($conexion)<1){
    return print_r(json_encode(['message' => 'Hubo un error al guardar las direcciones', 'status' => http_response_code(500)]));
}

echo(json_encode(['message' => 'Registros modificados con éxito', 'status' => http_response_code(200),
'exito'=>TRUE]));

/* if (empty($errores)) {
    $fecha= date("Y-m-d");

    $insertar = "INSERT INTO alumnos(username, contrasena,p_nombre,s_nombre,p_apellido,s_apellido,cedula,correo,ultActualizacion) VALUES ('$username','$contrasena','$p_nombre','$s_nombre','$p_apellido','$s_apellido','$cedula','$correo','$fecha')";
    $result = mysqli_query($conexion, $insertar);

    $datos['exito'] = true;
    $datos['mensaje'] = 'Usuario registrado correctamente';
} else {
    $datos['exito'] = false;
    $datos['errores'] = $errores;
} */

//dar respuesta:

?>