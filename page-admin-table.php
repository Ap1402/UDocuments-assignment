<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Dashboard </title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="css/font.css" rel="stylesheet">

  <!-- Custom styles for this template-->

  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="css/dash.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">
  <link href="css/table.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php require_once('front/general/sidebar.php'); ?>
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
        <div id="page-admin-table" class="container-fluid">

          <?php

$check_foto = 1; // verificar si fue o no chequeado por control de estudios
$check_cedula = 0;
$check_fondo = 1;
$check_notas = 0;
$check_partida = 1;
$check_rusnies = 1;
$check_metodo = 0;

// -------- Porcentaje de Documentos

$porcentaje = ($check_foto + $check_cedula + $check_fondo + $check_notas + $check_partida + $check_rusnies + $check_metodo) * 100 / 7;
$porcentaje = round($porcentaje, 0, PHP_ROUND_HALF_UP);

// -------- /Porcentaje de Documentos

// Iniciando valores
$cedula = '21217885';

// rura de la imagen (ruta completa ejemplo: back/Documentos/12345678/nirvana.jpg )
$path_image = 'back/documentos/' . $cedula . '/cedula_0_04-28-19001051.jpg';

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
                      <td><?php echo $p_nombre . ' ' . $s_nombre ?></td>
                      <td><?php echo $p_apellido . ' ' . $s_apellido ?></td>
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
          <!-- /.Tabla de alumnos -->


        </div>
        <!-- /.Contenido Variable - Todo lo demas es fijo -->
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

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
  <?php require_once('front/general/modal-logout.php'); ?>
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

  <div id="enlaces-charts"></div>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/front/table.js"></script>

</body>

</html>