<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Editar - Documentos </title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/images/favicon.ico" type="image/x-icon">

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
        <div id="page-student-edit-docs" class="container-fluid">

          <!--
  Oye, sera que se puede mandar una variable que permita editar solo si no ha sido chequeado por control de estudios?
  porque hay veces que uno se equivoca y quiere modificar algunas cosas
  esto optimizaria tiempo, porque sino va a tener que estar diciendole al de control de estudios que se
  equivoco en tal parte que si lo puede corregir o que se yo.
-->
          <?php
$admin = 0; // probando que sea admin para restringir la edicion de algunos campos
$check_foto = 0; // verificar si fue o no chequeado por control de estudios
$check_cedula = 0;
$check_fondo = 1;
$check_notas = 0;
$check_partida = 1;
$check_rusnies = 0;
$check_metodo = 0;

// Iniciando valores
$cedula = '21217885';
// rura de la imagen (ruta completa ejemplo: back/Documentos/12345678/nirvana.jpg )
$path_image = 'back/documentos/'.$cedula.'/partida_0_04-28-19001145.jpg';
$file_id = 'rusnies';

?>
          <!-- Título de página -->
          <div class="d-sm-flex col-sm-12 col-md-10 col-lg-8 align-items-center justify-content-between mb-4 mx-auto">
            <h1 class="h3 mb-0 text-gray-800">Editar - Documentos</h1>
            <a class="d-none d-sm-inline-block"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></a>
          </div>
          <!-- /.Título de página -->

          <!-- Formulario Editar Documentos -->
          <div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
            <div class="card shadow mb-4">
              <div class="card-body">
                <div class="p-4">

                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle"></i>
                    <strong>Advertencia!</strong>
                    Todos los cambios realizados en este formulario se hacen de manera <strong>permanente!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      &times;
                    </button>
                  </div>

                  <select id="seleccion" name="seleccion" class="form-control">
                    <option disabled selected value="">Elija el documento a editar</option>
                    <option <?php echo ($admin == 1 || $check_cedula == 0) ? '' : 'hidden' ?> value="1">Cedula</option>
                    <option <?php echo ($admin == 1 || $check_foto == 0) ? '' : 'hidden' ?> value="2">Foto</option>
                    <option <?php echo ($admin == 1 || $check_notas == 0) ? '' : 'hidden' ?> value="3">Notas</option>
                    <option <?php echo ($admin == 1 || $check_fondo == 0) ? '' : 'hidden' ?> value="4">Fondo</option>
                    <option <?php echo ($admin == 1 || $check_rusnies == 0) ? '' : 'hidden' ?> value="5">Rusnies
                    </option>
                    <option <?php echo ($admin == 1 || $check_partida == 0) ? '' : 'hidden' ?> value="6">Partida
                    </option>
                    <option <?php echo ($admin == 1 || $check_metodo == 0) ? '' : 'hidden' ?> value="7">Método</option>
                  </select>

                  <form id="documentosEditForm" method="POST" class="user needs-validation" novalidate>
                    <div class="alert alert-success" role="alert" id="exito" hidden></div>
                    <!--
					Los archivos relacionados estan:
									*server.php
									*js/front/file-upload.js
				-->

                    <!-- Foto -->
                    <div class="wrapper-file">
                      <br>
                      <div class="text-center">
                        <h5 class="text-gray-900">Foto tipo carnet</h5>
                      </div>
                      <br>

                      <div class="container-input">
                        <div class="wrap-file">
                          <div class="content-icon-camera">
                            <input type="file" id="file" name="file" accept="image/*" class="input-file"
                              data-id="<?php echo $file_id ?>">
                            <div class="icon-camera"></div>
                          </div>
                          <div id="preview-images" class="preview-images">
                            <!-- Repetir con todas las rutas cargadas -->

                            <div class="thumbnail"
                              data-id="<?php echo (str_shuffle('AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_')) ?>"
                              style="background-image: url('<?php echo $path_image ?>')">
                              <div class="close-button-db">
                                <span data-path='<?php echo $path_image ?>'
                                  data-cedula='<?php echo $cedula ?>'>&times;</span>
                                <a href="<?php echo $path_image ?>" data-lightbox="gallery"
                                  data-title="<?php echo $file_id ?>">
                                  <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?php echo $path_image ?>" download="<?php echo ($cedula.date('m-d-yHis')) ?>">
                                  <i class="fas fa-download"></i>
                                </a>
                              </div>
                            </div>

                          </div>
                        </div>

                      </div>

                      <h5 id="success" class="success text-center pt-1" data-upload="0"></h5>

                    </div>
                    <!-- End of Foto -->

                    <div id="preload" class="preload">
                      <img src="img/images/preload.gif" alt="preload">
                    </div>

                    <br>
                    <!-- <button type="submit" class="publish">Subir</button> -->
                    <a data-toggle="modal" data-target="#cambiosModal">
                      <button id="permisoModal" class="btn btn-primary btn-user btn-block">
                        Guardar archivos nuevos
                      </button>
                      <button id="enviarDocs" type="submit" hidden></button>
                    </a>

                    <div class="alert alert-danger" role="alert" id="resultado" hidden></div>


                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="cambiosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Advertencia</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  Seleccione "Guardar cambios" a continuación si está seguro de continuar con la operacion y guardar los
                  documentos nuevos.<br>
                  <b>Los archivos previamente eliminados no pueden ser restablecidos.</b>
                </div>
                <div class="modal-footer">
                  <label><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button></label>
                  <label class="text-white" for="enviarDocs"><a class="btn btn-primary">Guardar
                      cambios</a></label>
                </div>
              </div>
            </div>
          </div>
          <!-- /.Formulario Editar Documentos -->

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

  <script src="js/front/file-upload-edit.js"></script>

  <script src="js/front/deleteImage.js"></script>

</body>

</html>