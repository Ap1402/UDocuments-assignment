<?php
include '../conexion.php';


//Tomando datos y eliminado espacios en blanco final e inicio.
$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
//$correo = filter_var($_POST['correo'], FILTER_SANITIZE_STRING);
$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
$rolInput =filter_var($_POST['rol_admin'], FILTER_SANITIZE_STRING);
$estatus =filter_var($_POST['estatus'], FILTER_SANITIZE_STRING);
$idAdmin=filter_var($_POST['adminId'], FILTER_SANITIZE_STRING);

if (isset($_POST['contrasena'])&&$_POST['contrasena']!=''){
    $contrasena = filter_var($_POST['contrasena'], FILTER_SANITIZE_STRING);
    $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
    $modificarUser = "UPDATE administradores SET contrasena='$contrasena', nombre='$nombre', rol='$rolInput', estatus='$estatus' WHERE id_admin='$idAdmin'";
    $result = mysqli_query($conexion, $modificarUser);
    return print_r(json_encode(['message'=>'Datos y contraseña modificado correctamente', 'exito'=> TRUE]));


}else{

    $modificarUser = "UPDATE administradores SET  nombre='$nombre', rol='$rolInput', estatus='$estatus' WHERE id_admin='$idAdmin'";
    $result = mysqli_query($conexion, $modificarUser);
    return print_r(json_encode(['message'=>'Datos modificados correctamente', 'exito'=> TRUE]));

}




//dar respuesta:

?>