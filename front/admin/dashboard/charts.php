<?php
include 'back/conexion.php';

$meses = [];
$reg_meses = [];

for ($i = 6; $i >= 0; $i--) {

    $dt_mesSiguiente = date('Y-m-d', strtotime('-' . ($i) . ' month')); // resto i mes

    $dt_exp1 = explode("-", $dt_mesSiguiente);
    $mes1 = $dt_exp1[1];
    $ano1 = $dt_exp1[0];

    $d1 = '' . $ano1 . $mes1 . '01';

    $dt_mesSiguiente = date('Y-m-d', strtotime('-' . ($i - 1) . ' month')); // resto i mes

    $dt_exp2 = explode("-", $dt_mesSiguiente);
    $mes2 = $dt_exp2[1];
    $ano2 = $dt_exp2[0];

    $d2 = '' . $ano2 . $mes2 . '01';

    $sql_reg = "SELECT COUNT(*) FROM alumnos
              WHERE (fechaCreacion >= $d1) AND (fechaCreacion < $d2)";

    $result_reg = mysqli_query($conexion, $sql_reg);
    $row_reg = mysqli_fetch_assoc($result_reg);
    $reg = $row_reg['COUNT(*)'];

    switch ($mes1) {
        case 1:
            $mes1 = 'Ene';
            break;
        case 2:
            $mes1 = 'Feb';
            break;
        case 3:
            $mes1 = 'Mar';
            break;
        case 4:
            $mes1 = 'Abr';
            break;
        case 5:
            $mes1 = 'May';
            break;
        case 6:
            $mes1 = 'Jun';
            break;
        case 7:
            $mes1 = 'Jul';
            break;
        case 8:
            $mes1 = 'Ago';
            break;
        case 9:
            $mes1 = 'Sep';
            break;
        case 10:
            $mes1 = 'Oct';
            break;
        case 11:
            $mes1 = 'Nov';
            break;
        case 12:
            $mes1 = 'Dic';
            break;
    }

    array_push($meses, $mes1);
    array_push($reg_meses, $reg);

};

?>

<script>
var arrayDataM = <?=json_encode($meses)?>;
var arrayData = <?=json_encode($reg_meses)?>;
</script>

<!-- Area Chart -->
<div id="area-chart" class="col-xl-8 col-lg-7">
 <div class="card shadow mb-4">
  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
   <h6 class="m-0 font-weight-bold text-primary">Registros de alumnos <small>(ultimos 6 meses)</small></h6>
<!-- 
   <div class="dropdown no-arrow">
    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
     aria-expanded="false">
     <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
     <div class="dropdown-header">Dropdown Header:</div>
     <a class="dropdown-item" href="#">Action</a>
     <a class="dropdown-item" href="#">Another action</a>
     <div class="dropdown-divider"></div>
     <a class="dropdown-item" href="#">Something else here</a>
    </div>
   </div>
    -->
  </div>
  <!-- Card Body -->
  <div class="card-body">
   <div class="chart-area">
    <canvas id="myAreaChart"></canvas>    
   </div>
  </div>
 </div>
</div>

<?php

$array_pendientes = [];

$sql_pendientes_100 = "SELECT COUNT(*) FROM documentos WHERE (porcentaje = 100)";

$result_pendientes_100 = mysqli_query($conexion, $sql_pendientes_100);
$row_pendientes_100 = mysqli_fetch_assoc($result_pendientes_100);
$alumnos_pendientes_100 = $row_pendientes_100['COUNT(*)'];
array_push($array_pendientes, $alumnos_pendientes_100);

$sql_pendientes_60 = "SELECT COUNT(*) FROM documentos WHERE (porcentaje >= 50) AND (porcentaje < 100)";

$result_pendientes_60 = mysqli_query($conexion, $sql_pendientes_60);
$row_pendientes_60 = mysqli_fetch_assoc($result_pendientes_60);
$alumnos_pendientes_60 = $row_pendientes_60['COUNT(*)'];
array_push($array_pendientes, $alumnos_pendientes_60);

$sql_pendientes_50 = "SELECT COUNT(*) FROM documentos WHERE (porcentaje > 0) AND (porcentaje < 50)";

$result_pendientes_50 = mysqli_query($conexion, $sql_pendientes_50);
$row_pendientes_50 = mysqli_fetch_assoc($result_pendientes_50);
$alumnos_pendientes_50 = $row_pendientes_50['COUNT(*)'];
array_push($array_pendientes, $alumnos_pendientes_50);

$sql_pendientes_0 = "SELECT COUNT(*) FROM documentos WHERE (porcentaje = 0)";

$result_pendientes_0 = mysqli_query($conexion, $sql_pendientes_0);
$row_pendientes_0 = mysqli_fetch_assoc($result_pendientes_0);
$alumnos_pendientes_0 = $row_pendientes_0['COUNT(*)'];
array_push($array_pendientes, $alumnos_pendientes_0);

?>

<script>
var arrayDataPendientes = <?=json_encode($array_pendientes)?>;
</script>

<!-- Pie Chart -->
<div id="pie-chart" class="col-xl-4 col-lg-5">
 <div class="card shadow mb-4">
  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
   <h6 class="m-0 font-weight-bold text-primary">Record de documentos cargados</h6>
<!-- 
   <div class="dropdown no-arrow">
    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
     aria-expanded="false">
     <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
     <div class="dropdown-header">Dropdown Header:</div>
     <a class="dropdown-item" href="#">Action</a>
     <a class="dropdown-item" href="#">Another action</a>
     <div class="dropdown-divider"></div>
     <a class="dropdown-item" href="#">Something else here</a>
    </div>
   </div>
    -->
  </div>
  <!-- Card Body -->
  <div class="card-body">
   <div class="chart-pie pt-4 pb-2">
    <canvas id="myPieChart"></canvas>
   </div>
   <div class="mt-4 text-center small">
    <span class="mr-2">
     <i class="fas fa-circle text-success"></i> 100%
    </span>
    <span class="mr-2">
     <i class="fas fa-circle text-info"></i> Más 50%
    </span>
    <span class="mr-2">
     <i class="fas fa-circle text-warning"></i> Menos 50%
    </span>
    <span class="mr-2">
     <i class="fas fa-circle text-danger"></i> 0%
    </span>
   </div>
  </div>
 </div>
</div>