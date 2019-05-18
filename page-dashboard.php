<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Dashboard </title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/images/favicon.ico" type="image/x-icon">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="css/font.css" rel="stylesheet">

  <!-- Custom styles for this template-->

  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="css/dash.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php require('front/general/sidebar.php'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php require 'front/general/navbar.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <!-- Contenido Variable - Todo lo demas es fijo -->
        <div id="page-content" class="container-fluid">

          <!-- Título de página -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a id="respaldoDB" href="#" class="d-sm-inline-block btn btn-sm btn-primary text-white shadow-sm">
              <i class="fas fa-hdd fa-sm"></i>
              Respaldar base de datos
            </a>
          </div>
          <!-- /.Título de página -->

          <!-- Content Row -->
          <div id="card-info" class="row">
            <?php
  require 'front/admin/dashboard/card-info.php';
  ?>
          </div>



          <!-- Content Row -->

          <div id="charts" class="row">
            <?php
require 'front/admin/dashboard/charts.php';
?>
          </div>



          <?php
include 'back/conexion.php';
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
  $p_intro = round(($intro/$total)*100, 0, PHP_ROUND_HALF_UP);
}else{
  $p_intro = 0;
}

if ($total && $basic){
$p_basic = round(($basic/$total)*100, 0, PHP_ROUND_HALF_UP);
}else{
$p_basic = 0; 
}

if ($total && $admis){
$p_admis = round(($admis/$total)*100, 0, PHP_ROUND_HALF_UP);
}else{
$p_admis = 0;
}

if ($total && $direc){
$p_direc = round(($direc/$total)*100, 0, PHP_ROUND_HALF_UP);
}else{
$p_direc = 0;
}

if ($total && $equiv){
$p_equiv = round(($equiv/$total)*100, 0, PHP_ROUND_HALF_UP);
}else{
$p_equiv = 0;
}

if ($total && $reinc){
$p_reinc = round(($reinc/$total)*100, 0, PHP_ROUND_HALF_UP);
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
                    <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: <?=$p_intro?>%"
                      aria-valuenow="<?=$p_intro?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Inscripción Curso Básico <small>(<?=$basic?>)</small><span
                      class="float-right"><?=$p_basic?>%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: <?=$p_basic?>%"
                      aria-valuenow="<?=$p_basic?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Inscripción Prueba de Admisión <small>(<?=$admis?>)</small><span
                      class="float-right"><?=$p_admis?>%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$p_admis?>%"
                      aria-valuenow="<?=$p_admis?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Inscripción Ingreso Directo <small>(<?=$direc?>)</small><span
                      class="float-right"><?=$p_direc?>%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-gradient-info" role="progressbar" style="width: <?=$p_direc?>%"
                      aria-valuenow="<?=$p_direc?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Inscripción por Equivalencia <small>(<?=$equiv?>)</small><span
                      class="float-right"><?=$p_equiv?>%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-gradient-success" role="progressbar" style="width: <?=$p_equiv?>%"
                      aria-valuenow="<?=$p_equiv?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Reincorporación <small>(<?=$reinc?>)</small><span
                      class="float-right"><?=$p_reinc?>%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: <?=$p_reinc?>%"
                      aria-valuenow="<?=$p_reinc?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
              <!-- Project Card Solicitudes -->
            </div>

          </div>



          <!-- Content Row -->

          <div id="card-barras" class="row">

            <?php
require 'front/admin/dashboard/card-barras.php';
?>
          </div>



        </div>
        <!-- /.Contenido Variable - Todo lo demas es fijo -->
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Modal de advertencia de cambios -->
      <div class="modal fade" id="respaldoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalRespaldo"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalRespaldo">Respaldar base de datos</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form id="respaldoForm" method="POST" class="user needs-validation" novalidate>
              <div class="modal-body">
                Por favor introduzca su contraseña y seleccione "Respaldar" si está seguro de continuar con la
                operación.<br>
                <b>Se descargara un archivo con la base de datos junto a la carpeta de los documentos.</b><br><br>

                <div class="form-group">
                  <label class="pl-2"><small>Contraseña del administrador</small></label>
                  <div class="input-group">
                    <input type="password" id="contrasena" name="contrasena" minlength="4"
                      class="form-control form-control-user" placeholder="Contraseña" required>
                    <div class="input-group-append">
                      <a id="show" onclick="mostrarPassword()" class="btn btn-primary text-center align-middle">
                        <i id="showpass" class="fas fa-eye-slash"></i>
                      </a>
                    </div>
                  </div>
                  <div class="invalid-feedback">
                    Este campo debe tener al menos 4 caracteres.
                  </div>
                </div>
                <div class="alert alert-danger" role="alert" id="resultado" style="display: none"></div>

              </div>
              <div class="modal-footer">
                <label><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button></label>
                <label><button type="submit" id="ejecutarRespaldoDB"
                    class="btn btn-primary text-white">Respaldar</button></label>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.Modal de advertencia de cambios -->

      <!-- Footer -->
      <?php require 'front/general/footer.php'; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php require('front/general/modal-logout.php'); ?>
  <!-- End of Logout Modal-->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages / carga automaticamente dashboard.php-->
  <script src="js/sb-admin-2.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>

  <script type="text/javascript">
    function mostrarPassword() {
      var pass = document.getElementById("contrasena");
      if (pass.type == "password") {
        pass.type = "text";
        $('i#showpass').removeClass('fas fa-eye-slash').addClass('fas fa-eye');
      } else {
        pass.type = "password";
        $('i#showpass').removeClass('fas fa-eye').addClass('fas fa-eye-slash');
      }
    }
  </script>

  <script>
    $(document).ready(function () {

      $(document).on('click', '#respaldoDB', function () {
        $('#respaldoModal').modal('toggle');
      });

      // $('#ejecutarRespaldoDB').on('click', ejecutarAjaxRespaldo);

      // ----------------- Form Validation -------------------

      'use strict';

      $('#respaldoForm')[0].addEventListener('submit', function (event) {
        if ($('#respaldoForm')[0].checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        } else {
          ejecutarAjaxRespaldo(event);
        }
        $('#respaldoForm')[0].classList.add('was-validated');
      }, false);

      // ----------------- /Form Validation -------------------


      function ejecutarAjaxRespaldo(event) {
        var contrasena = $('#contrasena').val();
        var usuario = $('span[id=usernameActual]').text();

        var datosEnviadosS = {
          'contrasena': contrasena,
          'usuario': usuario
        };

        $.ajax({
            type: 'POST',
            url: './back/admin/backRespaldo.php',
            data: datosEnviadosS
          })
          .done(function (dataS) {
            var datos = $.parseJSON(dataS);
            if (!datos.exito) {

              $('#resultado').show();
              $('#resultado').text('La contraseña es incorrecta');
            } else {
              $('#respaldoModal').modal('toggle');
            }
          })
          .fail(function (err) {
            console.log(err);
          });

        event.preventDefault();
      };

    });
  </script>

</body>

</html>