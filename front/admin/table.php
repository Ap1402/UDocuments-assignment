<?php

$check_foto = 1; // verificar si fue o no chequeado por control de estudios
$check_cedula = 0;
$check_fondo = 1;
$check_notas = 0;
$check_partida = 1;
$check_rusnies = 1;
$check_metodo = 0;

// -------- Porcentaje de Documentos

$porcentaje = ($check_foto + $check_cedula + $check_fondo + $check_notas + $check_partida + $check_rusnies + $check_metodo)*100/7;
$porcentaje = round($porcentaje , 0, PHP_ROUND_HALF_UP);

// -------- /Porcentaje de Documentos

// Iniciando valores
$cedula = '21217885';


// rura de la imagen (ruta completa ejemplo: back/Documentos/12345678/nirvana.jpg )
$path_image = 'back/documentos/'.$cedula.'/cedula_0_04-28-19001051.jpg';

$ultActualizacion = date('Y-m-d');

$p_nombre = 'Textotexto';
$s_nombre = 'Textotexto';
$p_apellido = 'Textotexto';
$s_apellido = 'Textotexto';

?>


<!-- Tabla de alumnos -->
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="text-center">
      <h1 class="h4 text-gray-900 mb-4">Tabla de alumnos</h1>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Cédula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>% Documentos</th>
            <th>Última Actualización</th>
            <th>Validar Docs</th>
            <th>Ver perfil</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Cédula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>% Documentos</th>
            <th>Última Actualización</th>
            <th>Validar Docs</th>
            <th>Ver perfil</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
for ($i = 0; $i <= 100; $i++) {
?>
          <tr>
            <td><?php echo $cedula ?></td>
            <td><?php echo $p_nombre.' '.$s_nombre ?></td>
            <td><?php echo $p_apellido.' '.$s_apellido ?></td>
            <td><?php echo $porcentaje ?></td>
            <td><?php echo $ultActualizacion ?></td>
            <td><a href="#"><i class="fas fa-clipboard-list"></i></a> </td>
            <td><a href="#"><i class="fas fa-id-card"></i></a> </td>
          </tr>
          <?php
}
?>
        </tbody>
      </table>
    </div>
  </div>
</div>