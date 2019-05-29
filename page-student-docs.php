<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Documentos del alumno </title>

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
        <div id="page-student-docs" class="container-fluid">

          <?php

include 'back/conexion.php';

// ------------ Obtener la id del documento
if (isset($_SESSION['docId'])) {
    $idd = $_SESSION['docId'];
    $alumno=$_SESSION['id'];
}

$sql = "SELECT check_foto,check_cedula,check_fondo,check_nota,check_partida,check_rusinies,check_metodo,check_certificado_s,porcentaje FROM documentos WHERE id_documento='$idd'";
$result = mysqli_query($conexion, $sql);

$sqlSolicitud = "SELECT tipo, carrera FROM solicitudes WHERE alumno='$alumno'";
$resultSolicitud =  mysqli_query($conexion, $sqlSolicitud);

$solicitud = mysqli_fetch_assoc($resultSolicitud);


if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    $mensaje = "Ocurrió un error al cargar los documentos";
    echo ($mensaje);
};

$check_foto = $row['check_foto']; // verificar si fue o no chequeado por control de estudios
$check_cedula = $row['check_cedula'];
$check_fondo = $row['check_fondo'];
$check_notas = $row['check_nota'];
$check_partida = $row['check_partida'];
$check_rusnies = $row['check_rusinies'];
$check_metodo = $row['check_metodo'];
$check_certificado_s = $row['check_certificado_s'];


// -------- Porcentaje de Documentos

$porcentaje = $row['porcentaje'];


// -------- /Porcentaje de Documentos


// Hacer si todos los documentos estan validados
if ($porcentaje == 100) {
?>
          <!-- Modal -->
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-check-circle"></i>
                  <strong>Éxito!</strong></h5>
              </div>
              <label for="continuar">
                <div class="modal-body">
                  Todos los documentos han sido validados con éxito!.
                  <br>
                  Para ver los documentos dirijase al perfil, seleccionando el botón "Ir a perfil".
                </div>
              </label>
              <div class="modal-footer">
                <button type="button" id="continuar" class="btn btn-primary"
                  onclick="window.location.replace('page-student-perfil.php');">Ir a perfil</button>
              </div>
            </div>
          </div>
          <?php
}
?>

          <!-- Título de página -->
          <div class="d-sm-flex col-sm-12 col-md-10 align-items-center justify-content-between mb-4 mx-auto">
            <h1 class="h3 mb-0 text-gray-800">Documentos del alumno</h1>
            <a class="d-none d-sm-inline-block"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></a>
          </div>
          <!-- /.Título de página -->

          <!-- Formulario Documentos -->
          <div class="col-sm-12 col-md-10 mx-auto">
            <div class="card mb-4 py-1 border-bottom-primary">
              <div class="card-body">
                <div class="row justify-content-between px-4">

                <div class="col-12">
                  <h5 class="font-weight-bolder">Indicaciones</h5>
                </div>
                <div class="col-12">
                  <b>Formatos permitidos:</b> .JPG y .PNG
                </div>
                <div class="col-auto">
                  <b>Tamaño máximo por imagen:</b> 3MB
                </div>
                <div class="col-12">
                  <b>Número máximo por tipo documento:</b>
                </div>
                <div class="col-auto flex-fill">
                  Cédula, Foto, Partida y Certificado de salud -> 1 foto.
                </div>
                <div class="col-auto flex-fill">
                  Notas, Rusnies y Método de ingreso -> 5 fotos.
                </div>
                 </div>
              </div>
            </div>
            <div class="card shadow mb-4">
              <div class="card-body">
                <div class="px-4 py-2">

                  <select id="seleccion" name="seleccion" class="form-control">
                    <option disabled selected value="">Elija el documento a subir</option>
                    <option value="1">Cédula</option>
                    <option value="2">Foto tipo carnet</option>
                    <option value="3">Notas certificadas de bachillerato (1er a 5to)</option>
                    <option value="4">Título de bachillerato autenticado</option>
                    <option value="5">Resultado del RUSNIES</option>
                    <option value="6">Partida de nacimiento</option>

                    <?php 
                  if (isset($solicitud)){
                  
                  if($solicitud['tipo']==4 or $solicitud['tipo']==5 ){?>
                    <option value="7">Método de ingreso</option>
                    <?php } ?>

                    <?php if($solicitud['carrera']==10){?>

                    <option value="8">Certificado de salud</option>

                    <?php }} ?>


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
                    <button id="enviarDocs" type="submit" class="btn btn-primary btn-user btn-block" disabled="true">
                      Enviar Documentos
                    </button>

                    <div class="alert alert-danger" role="alert" id="resultado" hidden></div>

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
  <?php require 'front/general/modal-logout.php'; ?>
  <!-- End of Logout Modal-->
  <!-- Edit Admin Self Modal-->
  <?php require 'front/general/modal-admin-edit-pass-self.php'; ?>
  <!-- End of Edit Admin Self Modal-->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages / carga automaticamente dashboard.php-->
  <script src="js/sb-admin-2.js"></script>

  <script src="js/lightbox-plus-jquery.js"></script>

  <script src="js/front/file-upload.js"></script>
  <script src="scripts/editAdminPassSelf.js"></script>

  <!-- script de select-option esta en js/front/file-upload.js  -->

</body>

</html>