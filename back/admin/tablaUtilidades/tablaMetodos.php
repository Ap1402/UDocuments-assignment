<?php
include '../../conexion.php';

$sql = "SELECT * FROM tipo_solicitud";

$result = mysqli_query($conexion, $sql);

if (mysqli_num_rows($result) == 0) {
    $arreglo["data"] = [];
    echo json_encode($arreglo);
}else {
    while ($data = mysqli_fetch_assoc($result)) {
if ($data['activa'] == 0) {
    $data['estadoNombre'] = '<a id="activa" class="toggle-modal" data-active="false" data-id="'.$data['tipo'].'" data-role="update"><i class="fas fa-minus-circle"></i> Desactivada</a>';
    } elseif ($data['activa'] == 1) {
    $data['estadoNombre'] = '<a id="activa" class="toggle-modal" data-active="true" data-id="'.$data['tipo'].'" data-role="update"><i class="fas fa-check-circle"></i> Activa</a>';
    };

        $arreglo["data"][] = $data;
    }
    echo json_encode($arreglo);
}

mysqli_free_result($result);
mysqli_close($conexion);
