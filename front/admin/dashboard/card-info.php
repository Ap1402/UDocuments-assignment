<?php
include 'back/conexion.php';

$sql_pendientes = "SELECT COUNT(*) FROM documentos WHERE (porcentaje < 100)";

$result_pendientes = mysqli_query($conexion, $sql_pendientes);
$row_pendientes = mysqli_fetch_assoc($result_pendientes);
$alumnos_pendientes = $row_pendientes['COUNT(*)'];

?>
<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-6 col-md-12 mb-4">
 <div class="card border-left-danger shadow h-100 py-2">
  <div class="card-body">
   <div class="row no-gutters align-items-center">
    <div class="col mr-2">
     <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Alumnos con documentos faltantes</div>
     <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$alumnos_pendientes?></div>
    </div>
    <div class="col-auto">
     <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
    </div>
   </div>
  </div>
 </div>
</div>

<?php
$ano_atras = date('Y-m-d', strtotime('-1 year'));
$dt_anoAux = explode("-", $ano_atras);
$dia = $dt_anoAux[2];
$mes = $dt_anoAux[1];
$ano = $dt_anoAux[0];

$fecha_ano_atras = '' . $ano . $mes . $dia . '';

$sql_sol_pendientes = "SELECT COUNT(*) FROM solicitudes WHERE (estadoSolicitud=0) AND (fechaCreacion>$fecha_ano_atras)";

$result_sol_pendientes = mysqli_query($conexion, $sql_sol_pendientes);
$row_sol_pendientes = mysqli_fetch_assoc($result_sol_pendientes);
$alumnos_sol_pendientes = $row_sol_pendientes['COUNT(*)'];

?>
<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-6 col-md-12 mb-4">
 <div class="card border-left-warning shadow h-100 py-2">
  <div class="card-body">
   <div class="row no-gutters align-items-center">
    <div class="col mr-2">
     <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Solicitudes pendientes (últimos 12 meses)</div>
     <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$alumnos_sol_pendientes?></div>
    </div>
    <div class="col-auto">
     <i class="fas fa-vote-yea fa-2x text-gray-300"></i>
    </div>
   </div>
  </div>
 </div>
</div>