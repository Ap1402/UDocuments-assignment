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
  <link href="css/file-upload.css" rel="stylesheet">

  <link rel="stylesheet" href="css/lightbox.css">

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
        <div id="page-student-docs" class="container-fluid">

          <?php

$num_foto = 0;
$num_cedula = 0;
$num_fondo = 0;
$num_notas = 0;
$num_partida = 0;
$num_rusnies = 0;
$num_metodo = 0;

$all = $num_foto > 0 && $num_cedula > 0 && $num_fondo > 0 && $num_notas > 0 && $num_partida > 0 && $num_rusnies > 0 &&
    $num_metodo;

// Hacer si todos los documentos se cargaron
if ($all) {
?>
          <!-- Modal -->
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Mensaje</h5>
              </div>
              <label for="continuar">
                <div class="modal-body">
                  Todos los documentos han sido cargados con exito!. Sera redirigido a su perfil.
                  <br>
                  Seleccione el boton "Continuar".
                </div>
              </label>
              <div class="modal-footer">
                <button type="button" id="continuar" class="btn btn-primary"
                  onclick="window.location.replace('page-student-perfil.php');">Continuar</button>
              </div>
            </div>
          </div>
          <?php
}
?>

          <!-- Formulario Documentos -->
          <div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
            <div class="card shadow mb-4">
              <div class="card-body">
                <div class="p-4">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Documentos del alumno</h1>
                  </div>


                  <select id="seleccion" name="seleccion" class="form-control">
                    <option disabled selected value="">Elija el documento a subir</option>
                    <?php echo ($num_cedula != 0) ? '' : '<option value="1">Cedula</option>' ?>
                    <?php echo ($num_foto != 0) ? '' : '<option value="2">Foto</option>' ?>
                    <?php echo ($num_notas != 0) ? '' : '<option value="3">Notas</option>' ?>
                    <?php echo ($num_fondo != 0) ? '' : '<option value="4">Fondo</option>' ?>
                    <?php echo ($num_rusnies != 0) ? '' : '<option value="5">Rusnies</option>' ?>
                    <?php echo ($num_partida != 0) ? '' : '<option value="6">Partida</option>' ?>
                    <?php echo ($num_metodo != 0) ? '' : '<option value="7">Método</option>' ?>

                  </select>

                  <form id="docsForm" method="POST" class="user needs-validation" novalidate>
                    <div class="alert alert-success" role="alert" id="exito" hidden></div>

                    <!--
					Los archivos relacionados estan:
									*server.php
									*js/front/file-upload.js
				-->

                    <!-- file -->
                    <div class="wrapper-file">
                      <br>
                      <div class="text-center">
                        <h5 class="text-gray-900">Cargar documento</h5>
                      </div>
                      <br>

                      <div class="container-input">
                        <div class="wrap-file">
                          <div class="content-icon-camera">
                            <input type="file" id="file" name="file" accept="image/*" class="input-file"
                              disabled="true">
                            <div class="icon-camera"></div>
                          </div>
                          <div id="preview-images" name="preview" class="preview-images">

                          </div>
                        </div>

                      </div>

                      <h5 id="success" name="success" class="success text-center pt-1"></h5>

                    </div>
                    <!-- End of file -->

                    <div id="preload" class="preload">
                      <img src="img/images/preload.gif" alt="preload">
                    </div>



                    <br>
                    <br>
                    <!-- <button type="submit" class="publish">Subir</button> -->
                    <button id="enviarDocs" type="submit" class="btn btn-primary btn-user btn-block" disabled="true">
                      Enviar Documentos
                    </button>

                    <br>
                    <div class="alert alert-danger" role="alert" id="resultado" hidden></div>
                    <br>

                  </form>

                </div>
              </div>
            </div>
          </div>
          <!-- /.Formulario Documentos -->


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
  <?php require('front/general/modal-logout.php'); ?>
  <!-- End of Logout Modal-->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages / carga automaticamente dashboard.php-->
  <script src="js/sb-admin-2.js"></script>

  <script src="js/lightbox-plus-jquery.js"></script>

  <script src="js/front/file-upload.js"></script>

  <!-- script de select-option esta en js/front/file-upload.js  -->

</body>

</html>