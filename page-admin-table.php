<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Tabla de alumnos </title>
	<?php require('back/admin/restriccionAcceso.php');?>

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/images/favicon.ico" type="image/x-icon">

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


          <!-- Título de página -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
            <h1 class="h3 mb-0 text-gray-800">Tabla de alumnos</h1>
            <a class="d-none d-sm-inline-block"><i class="fas fa-fw fa-table fa-2x text-gray-300"></i></a>
          </div>
          <!-- /.Título de página -->


          <!-- Tabla de alumnos -->
          <div class="card shadow mb-4">
            <div class="card-body">
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
                    include 'back/conexion.php';

                    $sql = "SELECT *, alumnos.cedula as ci, documentos.cedula as cedula FROM alumnos
                            INNER JOIN documentos ON alumnos.documento=documentos.id_documento;";

                    $result = mysqli_query($conexion, $sql);
                    if ($result->num_rows > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {

                        // -------- Porcentaje de Documentos

                        $porcentaje = ($row['check_foto'] + $row['check_cedula'] + $row['check_fondo'] + $row['check_nota'] + $row['check_partida'] + $row['check_rusinies'] + $row['check_metodo']) * 100 / 7;
                        $porcentaje = round($porcentaje, 0, PHP_ROUND_HALF_UP);

                        // -------- /.Porcentaje de Documentos
                    ?>

                    <tr>
                      <td><?=$row['ci']?></td>
                      <td><?=$row['p_nombre'].' '.$row['s_nombre']?></td>
                      <td><?=$row['p_apellido'].' '.$row['s_apellido']?></td>
                      <td><?=$porcentaje.' %' ?></td>
                      <td><?=$row['ultActualizacion']?></td>
                      <td><a href="<?='page-admin-check.php?id='.$row['id_documento'].'&ci='.$row['ci'].'&mi='.$row['metodo_ingreso']?>"><i class="fas fa-clipboard-list"></i></a> </td>
                      <td><a href="<?='page-student-perfil.php?id='.$row['id_alumno']?>"><i class="fas fa-id-card"></i></a> </td>
                    </tr>

                    <?php
                      };
                    };
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