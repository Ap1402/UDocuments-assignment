<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
      class="fas fa-download fa-sm text-white-50"></i>
    Generate Report</a>
</div>

<!-- Content Row -->
<div id="card-info" class="row">

</div>

<!-- Content Row -->

<div id="charts" class="row">

</div>

<?php
include '../../back/conexion.php';
$sql_total = "SELECT COUNT(*) FROM alumnos
        LEFT JOIN tipo_solicitud ON alumnos.metodo_ingreso=tipo_solicitud.tipo;";

$result_total = mysqli_query($conexion, $sql_total);
$row_total = mysqli_fetch_assoc($result_total);
$total = $row_total['COUNT(*)'];


$sql_intro = "SELECT COUNT(*) FROM alumnos
              LEFT JOIN tipo_solicitud ON alumnos.metodo_ingreso=tipo_solicitud.tipo
              WHERE tipo_solicitud.tipo=1;";

$result_intro = mysqli_query($conexion, $sql_intro);
$row_intro = mysqli_fetch_assoc($result_intro);
$intro = $row_intro['COUNT(*)'];

$sql_basic = "SELECT COUNT(*) FROM alumnos
LEFT JOIN tipo_solicitud ON alumnos.metodo_ingreso=tipo_solicitud.tipo
WHERE tipo_solicitud.tipo=2;";

$result_basic = mysqli_query($conexion, $sql_basic);
$row_basic = mysqli_fetch_assoc($result_basic);
$basic = $row_basic['COUNT(*)'];

$sql_admis = "SELECT COUNT(*) FROM alumnos
LEFT JOIN tipo_solicitud ON alumnos.metodo_ingreso=tipo_solicitud.tipo
WHERE tipo_solicitud.tipo=3;";

$result_admis = mysqli_query($conexion, $sql_admis);
$row_admis = mysqli_fetch_assoc($result_admis);
$admis = $row_admis['COUNT(*)'];

$sql_direc = "SELECT COUNT(*) FROM alumnos
LEFT JOIN tipo_solicitud ON alumnos.metodo_ingreso=tipo_solicitud.tipo
WHERE tipo_solicitud.tipo=4;";

$result_direc = mysqli_query($conexion, $sql_direc);
$row_direc = mysqli_fetch_assoc($result_direc);
$direc = $row_direc['COUNT(*)'];

$sql_equiv = "SELECT COUNT(*) FROM alumnos
LEFT JOIN tipo_solicitud ON alumnos.metodo_ingreso=tipo_solicitud.tipo
WHERE tipo_solicitud.tipo=5;";

$result_equiv = mysqli_query($conexion, $sql_equiv);
$row_equiv = mysqli_fetch_assoc($result_equiv);
$equiv = $row_equiv['COUNT(*)'];

$sql_reinc = "SELECT COUNT(*) FROM alumnos
LEFT JOIN tipo_solicitud ON alumnos.metodo_ingreso=tipo_solicitud.tipo
WHERE tipo_solicitud.tipo=6;";

$result_reinc = mysqli_query($conexion, $sql_reinc);
$row_reinc = mysqli_fetch_assoc($result_reinc);
$reinc = $row_reinc['COUNT(*)'];

if ($total && $intro){
  $p_intro = ($intro/$total)*100;
}else{
  $p_intro = 0;
}

if ($total && $basic){
$p_basic = ($basic/$total)*100;
}else{
$p_basic = 0;
}

if ($total && $admis){
$p_admis = ($admis/$total)*100;
}else{
$p_admis = 0;
}

if ($total && $direc){
$p_direc = ($direc/$total)*100;
}else{
$p_direc = 0;
}

if ($total && $equiv){
$p_equiv = ($equiv/$total)*100;
}else{
$p_equiv = 0;
}

if ($total && $reinc){
$p_reinc = ($reinc/$total)*100;
}else{
$p_reinc = 0;
}

?>

<div id="porcentajeSol" class="row">
  
  <div class="col-12 mb-4">
    <!-- Project Card Solicitudes -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Solicitudes <small>(<?=$total?>)</small></h6>
      </div>
      <div class="card-body">
        <h4 class="small font-weight-bold">Inscripción Curso Introductorio <small>(<?=$intro?>)</small> <span
            class="float-right"><?=$p_intro?>%</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: <?=$p_intro?>%" aria-valuenow="<?=$p_intro?>" aria-valuemin="0"
            aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold">Inscripción Curso Básico <small>(<?=$basic?>)</small><span class="float-right"><?=$p_basic?>%</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: <?=$p_basic?>%" aria-valuenow="<?=$p_basic?>"
            aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold">Inscripción Prueba de Admisión <small>(<?=$admis?>)</small><span class="float-right"><?=$p_admis?>%</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$p_admis?>%" aria-valuenow="<?=$p_admis?>"
            aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold">Inscripción Ingreso Directo <small>(<?=$direc?>)</small><span class="float-right"><?=$p_direc?>%</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-gradient-info" role="progressbar" style="width: <?=$p_direc?>%" aria-valuenow="<?=$p_direc?>" aria-valuemin="0"
            aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold">Inscripción por Equivalencia <small>(<?=$equiv?>)</small><span class="float-right"><?=$p_equiv?>%</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-gradient-success" role="progressbar" style="width: <?=$p_equiv?>%" aria-valuenow="<?=$p_equiv?>"
            aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold">Reincorporación <small>(<?=$reinc?>)</small><span class="float-right"><?=$p_reinc?>%</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: <?=$p_reinc?>%" aria-valuenow="<?=$p_reinc?>"
            aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
    </div>
    <!-- Project Card Solicitudes -->
  </div>

</div>



<!-- Content Row -->

<div id="card-progress-illustrations" class="row">

</div>

<!-- script dashboard -->
<script src="js/front/dashboard.js"></script>