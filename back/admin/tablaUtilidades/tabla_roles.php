<?php
include '../../conexion.php';

$sql = "SELECT * FROM rol_admin";

$result = mysqli_query($conexion, $sql);

if (mysqli_num_rows($result) == 0) {
    $arreglo["data"] = [];
    echo json_encode($arreglo);
} else {
    while ($data = mysqli_fetch_assoc($result)) {

        if ($data['rolActivo'] == 1) {
            $data['rolActivoHTML'] = '<a id="rolActivo" class="toggle-modal" data-active="true" data-id="' . $data['id'] . '" data-role="update"><i class="fas fa-check-circle"></i> Activo</a>';

        } else {
            $data['rolActivoHTML'] = '<a id="rolActivo" class="toggle-modal" data-active="false" data-id="' . $data['id'] . '" data-role="update"><i class="fas fa-minus-circle"></i> Inactivo</a>';
        };

        if ($data['validacion'] == 1) {
            $data['validacionHTML'] = '<a id="validacion" class="toggle-modal" data-active="true" data-id="' . $data['id'] . '" data-role="update"><i class="fas fa-check-circle"></i> Activo</a>';

        } else {
            $data['validacionHTML'] = '<a id="validacion" class="toggle-modal" data-active="false" data-id="' . $data['id'] . '" data-role="update"><i class="fas fa-minus-circle"></i> Inactivo</a>';
        };

        if ($data['ver_perfil_alumno'] == 1) {
            $data['ver_perfil_alumnoHTML'] = '<a id="ver_perfil_alumno" class="toggle-modal" data-active="true" data-id="' . $data['id'] . '" data-role="update"><i class="fas fa-check-circle"></i> Activo</a>';

        } else {
            $data['ver_perfil_alumnoHTML'] = '<a id="ver_perfil_alumno" class="toggle-modal" data-active="false" data-id="' . $data['id'] . '" data-role="update"><i class="fas fa-minus-circle"></i> Inactivo</a>';
        };

        if ($data['crea_editar_alumno'] == 1) {
            $data['crea_editar_alumnoHTML'] = '<a id="crea_editar_alumno" class="toggle-modal" data-active="true" data-id="' . $data['id'] . '" data-role="update"><i class="fas fa-check-circle"></i> Activo</a>';

        } else {
            $data['crea_editar_alumnoHTML'] = '<a id="crea_editar_alumno" class="toggle-modal" data-active="false" data-id="' . $data['id'] . '" data-role="update"><i class="fas fa-minus-circle"></i> Inactivo</a>';
        };

        if ($data['subir_edicion_documentos'] == 1) {
            $data['subir_edicion_documentosHTML'] = '<a id="subir_edicion_documentos" class="toggle-modal" data-active="true" data-id="' . $data['id'] . '" data-role="update"><i class="fas fa-check-circle"></i> Activo</a>';

        } else {
            $data['subir_edicion_documentosHTML'] = '<a id="subir_edicion_documentos" class="toggle-modal" data-active="false" data-id="' . $data['id'] . '" data-role="update"><i class="fas fa-minus-circle"></i> Inactivo</a>';
        };

        if ($data['crear_editar_solicitudes'] == 1) {
            $data['crear_editar_solicitudesHTML'] = '<a id="crear_editar_solicitudes" class="toggle-modal" data-active="true" data-id="' . $data['id'] . '" data-role="update"><i class="fas fa-check-circle"></i> Activo</a>';

        } else {
            $data['crear_editar_solicitudesHTML'] = '<a id="crear_editar_solicitudes" class="toggle-modal" data-active="false" data-id="' . $data['id'] . '" data-role="update"><i class="fas fa-minus-circle"></i> Inactivo</a>';
        };

        if ($data['edicion_creacion_admin'] == 1) {
            $data['edicion_creacion_adminHTML'] = '<a id="edicion_creacion_admin" class="toggle-modal" data-active="true" data-id="' . $data['id'] . '" data-role="update"><i class="fas fa-check-circle"></i> Activo</a>';

        } else {
            $data['edicion_creacion_adminHTML'] = '<a id="edicion_creacion_admin" class="toggle-modal" data-active="false" data-id="' . $data['id'] . '" data-role="update"><i class="fas fa-minus-circle"></i> Inactivo</a>';
        };

        if ($data['metodos_ingreso'] == 1) {
            $data['metodos_ingresoHTML'] = '<a id="metodos_ingreso" class="toggle-modal" data-active="true" data-id="' . $data['id'] . '" data-role="update"><i class="fas fa-check-circle"></i> Activo</a>';

        } else {
            $data['metodos_ingresoHTML'] = '<a id="metodos_ingreso" class="toggle-modal" data-active="false" data-id="' . $data['id'] . '" data-role="update"><i class="fas fa-minus-circle"></i> Inactivo</a>';
        };

        if ($data['edicion_carreras'] == 1) {
            $data['edicion_carrerasHTML'] = '<a id="edicion_carreras" class="toggle-modal" data-active="true" data-id="' . $data['id'] . '" data-role="update"><i class="fas fa-check-circle"></i> Activo</a>';

        } else {
            $data['edicion_carrerasHTML'] = '<a id="edicion_carreras" class="toggle-modal" data-active="false" data-id="' . $data['id'] . '" data-role="update"><i class="fas fa-minus-circle"></i> Inactivo</a>';
        };

        if ($data['editar_correoContra_alumno'] == 1) {
            $data['editar_correoContra_alumnoHTML'] = '<a id="editar_correoContra_alumno" class="toggle-modal" data-active="true" data-id="' . $data['id'] . '" data-role="update"><i class="fas fa-check-circle"></i> Activo</a>';

        } else {
            $data['editar_correoContra_alumnoHTML'] = '<a id="editar_correoContra_alumno" class="toggle-modal" data-active="false" data-id="' . $data['id'] . '" data-role="update"><i class="fas fa-minus-circle"></i> Inactivo</a>';
        };

        $arreglo["data"][] = $data;
    }
    echo json_encode($arreglo);
}

mysqli_free_result($result);
mysqli_close($conexion);
