<?php
include '../../conexion.php';

$sql = "SELECT id_documento,id_alumno, metodo_ingreso, concat(concat(p_nombre,' '), s_nombre) as nombres, concat(concat(p_apellido,' '), s_apellido) as apellidos, alumnos.cedula, porcentaje, ultActualizacion FROM alumnos
INNER JOIN documentos ON alumnos.documento=documentos.id_documento;";

$result = mysqli_query($conexion, $sql);

if(!$result){
    die("Error");
}else{
    while($data = mysqli_fetch_assoc($result)){
        $data["irCheck"]='<a href="page-admin-check.php?idd='.$data['id_documento'].'&ida='.$data['id_alumno'].'&ci='.$data['cedula'].'&mi='.$data['metodo_ingreso'].'"><i class="fas fa-clipboard-list"></i></a>';
        
        $data["irPerfil"]='<a href="page-student-perfil.php?ida='.$data['id_alumno'].'"><i class="fas fa-id-card"></i></a>';

        $arreglo["data"][]=$data;

    }
    echo json_encode($arreglo);
}

mysqli_free_result($result);
mysqli_close($conexion);
?>