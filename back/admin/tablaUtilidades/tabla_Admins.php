
<?php
include '../../conexion.php';

$sql = "SELECT * FROM administradores LEFT JOIN rol_admin ON rol_admin.id = administradores.rol";
$result = mysqli_query($conexion, $sql);

if (mysqli_num_rows($result) == 0) {
    $arreglo["data"] = [];
    echo json_encode($arreglo);
}else {
    while ($data = mysqli_fetch_assoc($result)) {
        $data['estatusNombre']=($data['estatus'] == 1) ? 'Activo' : 'Inactivo';
        $data['estatusValor']=$data['estatus'];

        $arreglo["data"][] = $data;
    }
    echo json_encode($arreglo);
}

mysqli_free_result($result);
mysqli_close($conexion);
