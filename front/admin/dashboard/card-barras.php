<?php

$array_carreras = [];
$reg_carreras = [];
$name_carreras = [];
$var_mes = 6;

$dt_mesAntes = date('Y-m-d', strtotime('-' . ($var_mes) . ' month')); // resto var_mes mes
$dt_mesAux = explode("-", $dt_mesAntes);
$dia = $dt_mesAux[2];
$mes = $dt_mesAux[1];
$ano = $dt_mesAux[0];

$fecha_car = '' . $ano . $mes . $dia . '';


$sql_cerreraa = "SELECT * FROM carreras WHERE (estatus = 1)";

$result_cerreraa = mysqli_query($conexion, $sql_cerreraa);
if ($result_cerreraa->num_rows > 0) {
    while ($row_cerreraa = mysqli_fetch_assoc($result_cerreraa)) {
      array_push($array_carreras, $row_cerreraa['codigo']);
      array_push($name_carreras, $row_cerreraa['nombre']);
  };
};

foreach ($array_carreras as $key => $value) {

  $sql_reg_car = "SELECT COUNT(*) FROM alumnos LEFT JOIN carreras ON alumnos.carrera = carreras.nombre WHERE (codigo = $value) AND (fechaCreacion > '$fecha_car')";

  $result_reg_car = mysqli_query($conexion, $sql_reg_car);
  $row_reg_car = mysqli_fetch_assoc($result_reg_car);
  array_push($reg_carreras, $row_reg_car['COUNT(*)']);

};


?>

<script>
  var arrayDataCarerras = <?= json_encode($array_carreras) ?> ;
  var arrayDataRegCar = <?= json_encode($reg_carreras) ?> ;
</script>

  <div class="col-12 mb-4">

    <!-- Project Card Facultades -->
     <div class="card shadow mb-4">
       <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Registro por carreras <small>(últimos 6 meses)</small></h6>
       </div>
       <div class="card-body">
         <div class="chart-bar">
           <canvas id="myBarChart"></canvas>
         </div>
         <hr>
         <div class="text-justufy">

         <?php foreach ($name_carreras as $key => $value) { ?>

          <label class="text-xs text-uppercase px-2"><?='<b>'.$array_carreras[$key].'</b>: '.$value?></label>

          <?php }; ?>

         </div>
       </div>
     </div>  
    <!-- Project Card Facultades -->
  </div>