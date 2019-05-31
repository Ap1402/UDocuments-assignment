<?php
include '../../conexion.php';

$sql = "SELECT * FROM carreras";


$result = mysqli_query($conexion, $sql);

if (mysqli_num_rows($result) == 0) {
    $arreglo["data"] = [];
    echo json_encode($arreglo);
}else {
    while ($data = mysqli_fetch_assoc($result)) {
        if($data['estatus']==1){
            $data['estadoHTML']= '<a id="estatus" class="toggle-modal" data-active="true" data-id="'.$data['codigo'].'" data-role="update"><i class="fas fa-check-circle text-success"></i> Activo</a>';


        }else{
            $data['estadoHTML']= '<a id="estatus" class="toggle-modal" data-active="false" data-id="'.$data['codigo'].'" data-role="update"><i class="fas fa-minus-circle text-secondary"></i> Inactivo</a>';
        }

        if($data['manana']==1){
            $data['mananaHTML']= '<a id="manana" class="toggle-modal" data-active="true" data-id="'.$data['codigo'].'" data-role="update"><i class="fas fa-check-circle text-success"></i> Activo</a>';


        }else{
            $data['mananaHTML']= '<a id="manana" class="toggle-modal" data-active="false" data-id="'.$data['codigo'].'" data-role="update"><i class="fas fa-minus-circle text-secondary"></i> Inactivo</a>';
        }

        if($data['tarde']==1){
            $data['tardeHTML']= '<a id="tarde" class="toggle-modal" data-active="true" data-id="'.$data['codigo'].'" data-role="update"><i class="fas fa-check-circle text-success"></i> Activo</a>';


        }else{
            $data['tardeHTML']= '<a id="tarde" class="toggle-modal" data-active="false" data-id="'.$data['codigo'].'" data-role="update"><i class="fas fa-minus-circle text-secondary"></i> Inactivo</a>';
        }

        if($data['noche']==1){
            $data['nocheHTML']= '<a id="noche" class="toggle-modal" data-active="true" data-id="'.$data['codigo'].'" data-role="update"><i class="fas fa-check-circle text-success"></i> Activo</a>';


        }else{
            $data['nocheHTML']= '<a id="noche" class="toggle-modal" data-active="false" data-id="'.$data['codigo'].'" data-role="update"><i class="fas fa-minus-circle text-secondary"></i> Inactivo</a>';
        }

        $arreglo["data"][] = $data;
    }
    echo json_encode($arreglo);
}

mysqli_free_result($result);
mysqli_close($conexion);
