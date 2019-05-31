<?php
include '../../conexion.php';

$sql = "SELECT carreras.nombre as carreraNombre, documento, id_alumno, alumno, cedula, concat(concat(p_nombre,' '), concat(s_nombre,' '),concat(p_apellido,' '), s_apellido) as nombreCompleto, metodo_ingreso, solicitudes.fechaCreacion, id_solicitud, estadoSolicitud, fechaAtencion, solicitudes.tipo, nombre_solicitud as nombreSolicitud, solicitudes.carrera, alumnos.turno, personalAtencion FROM alumnos
        INNER JOIN solicitudes ON alumnos.id_alumno = solicitudes.alumno
        LEFT JOIN tipo_solicitud ON tipo_solicitud.tipo = solicitudes.tipo
        LEFT JOIN carreras ON solicitudes.carrera = carreras.codigo";


$result = mysqli_query($conexion, $sql);

if (mysqli_num_rows($result) == 0) {
    $arreglo["data"] = [];
    echo json_encode($arreglo);
}else {
    while ($data = mysqli_fetch_assoc($result)) {
        switch ($data['turno']) {
    case 1:
        $data["turnoNombre"] = 'Mañana';
        break;
    case 2:
        $data["turnoNombre"] = 'Tarde';
        break;
    case 3:
        $data["turnoNombre"] = 'Noche';
        break;
    default:
        $data["turnoNombre"] = '';
        break;
};

if ($data['estadoSolicitud'] == 0) {
    $data['estadoNombre'] = '<a id="estadoSolicitud" class="toggle-modal" data-active="false" data-id="'.$data['id_solicitud'].'" data-role="update" data-prueba="'.$data['id_alumno'].'"><i class="fas fa-minus-circle"></i> Pendiente</a>';
    } elseif ($data['estadoSolicitud'] == 1) {
    $data['estadoNombre'] = '<a id="estadoSolicitud" class="toggle-modal" data-active="true" data-id="'.$data['id_solicitud'].'" data-role="update" data-prueba="'.$data['id_alumno'].'"><i class="fas fa-check-circle"></i> Atendida</a>';
    };

        $data["irCheck"] = '<a href="page-admin-check.php?idd=' . $data['documento'] . '&ida=' . $data['id_alumno'] . '&ci=' . $data['cedula'] . '&mi=' . $data['metodo_ingreso'] . '"><i class="fas fa-clipboard-list"></i></a>';

        $data["irPerfil"] = '<a href="page-student-perfil.php?ida=' . $data['id_alumno'] . '"><i class="fas fa-id-card"></i></a>';

        $arreglo["data"][] = $data;
    }
    echo json_encode($arreglo);
}

mysqli_free_result($result);
mysqli_close($conexion);
