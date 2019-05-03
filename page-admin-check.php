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
  <link rel="stylesheet" href="css/lightbox.css">
  <link href="css/check.css" rel="stylesheet">

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
        
        <div id="page-admin-check" class="container-fluid">

        <?php
        
$check_foto = 1; // verificar si fue o no chequeado por control de estudios
$check_cedula = 0;
$check_fondo = 1;
$check_notas = 0;
$check_partida = 1;
$check_rusnies = 1;
$check_metodo = 0;

// -------- Porcentaje de Documentos

$porcentaje = ($check_foto + $check_cedula + $check_fondo + $check_notas + $check_partida + $check_rusnies +
$check_metodo) * 100 / 7;
$porcentaje = round($porcentaje, 0, PHP_ROUND_HALF_UP);

// -------- /Porcentaje de Documentos

// Iniciando valores
$cedula = '21217885';

// rura de la imagen (ruta completa ejemplo: back/Documentos/12345678/nirvana.jpg )
$path_image = 'back/documentos/' . $cedula . '/partida_0_04-28-19001145.jpg';

$path_foto = $path_image;
$path_cedula = $path_image;
$path_fondo = $path_image;
$path_notas = $path_image;
$path_partida = $path_image;
$path_rusnies = $path_image;
$path_metodo = $path_image;

$ultActualizacion = date('Y-m-d');

$p_nombre = 'Textotexto';
$s_nombre = 'Textotexto';
$p_apellido = 'Textotexto';
$s_apellido = 'Textotexto';

$nombre_solicitud = "SolicitudSolicitud";

?>
<!-- Busqueda Check -->
<div id="prueba">
    <div class="col-sm-12 col-lg-10 mx-auto">
        <div class="card shadow mb-4 border-bottom-primary">
            <div class="card-body">

                <form action="index.php" onsubmit="return buscar()" class="mx-auto my-2 my-md-0 col-sm-12 col-md-6">
                    <div class="input-group">
                        <input type="text" id="q" name="q" onKeyUp="return buscar()"
                            class="form-control bg-light border-0 small" placeholder="Buscar alumno" aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button type="submit" value="Buscar" id="boton" class="btn btn-primary">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                    <div id="preload" class="preload">
                        <img src="img/images/preload.gif" alt="preload">
                    </div>
                </form>

                <div class="form-group row text-center">
                    <div class="col-sm-12 col-md-6">
                        <label class="pl-2 pt-2">
                            <b>Nombre:</b> <?php echo $p_nombre . ' ' . $s_nombre . ' ' . $p_apellido . ' ' . $s_apellido ?>
                        </label>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label class="pl-2 pt-2">
                            <b>Cedula:</b> <?php echo $cedula ?>
                        </label>
                    </div>
                </div>


                SELECT
                *
                FROM
                documentos d1
                INNER JOIN
                notas n ON d1.id_documento = n.documento
                INNER JOIN
                metodoing m ON d1.id_documento =m.documento
                INNER JOIN
                rusnies r ON d1.id_documento = r.documento;

                SELECT
                *
                FROM
                documentos d1
                INNER JOIN
                notas n ON d1.id_documento = n.documento
                INNER JOIN
                metodoing m ON d1.id_documento =m.documento
                INNER JOIN
                rusnies r ON d1.id_documento = r.documento
                WHERE id_documento='0';




            </div>

        </div>

    </div>

</div>
<!-- /.Busqueda Check -->


<!-- Formulario Check Documentos -->
<div class="col-sm-12 col-lg-10 mx-auto">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="pl-4 pr-3 py-4">
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-4">Validar documentos del alumno</h1>
          <div class="col-auto">
            <a href="page-student-perfil.php" data-toggle="tooltip" data-placement="top" title="Ver perfil del alumno">              
              <i class="fas fa-id-card text-gray-300">
               Ir a perfil 
              </i>
            </a>
          </div>
        </div>
        <form id="checkForm" method="POST" class="user needs-validation" novalidate>
          <div class="alert alert-success" role="alert" id="exito" hidden></div>
          <br>

          <!-- Foto -->
          <div class="form-group row">

            <div class="col-md-12 col-lg-4 text-lg-left my-auto">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_foto == 0) ? '' : 'checked' ?> class="custom-control-input"
                  id="check_foto">
                <label class="custom-control-label" for="check_foto">
                  <h5 class="text-gray-900 text-justify pl-4">Foto reciente tipo carnet</h5>
                </label>
              </div>
            </div>
            <div class="col-md-12 text-md-center col-lg-8 text-lg-left pt-3 my-auto">

              <div id="preview-images-foto" class="preview-images">

                <div class="thumbnail" style="background-image: url('<?php echo $path_foto ?>')">
                  <div class="close-button-db">
                    <a href="<?php echo $path_foto ?>" data-lightbox="galleryFoto" data-title="foto">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="<?php echo $path_foto ?>" download="<?php echo ('foto'.$cedula) ?>">
                      <i class="fas fa-download"></i>
                    </a>
                  </div>
                </div>

              </div>

            </div>

          </div>
          <!-- End Foto -->

          <br>
          <hr class="sidebar-divider">
          <br>

          <!-- Cedula -->
          <div class="form-group row">

            <div class="col-md-12 col-lg-4 text-lg-left my-auto">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_cedula == 0) ? '' : 'checked' ?> class="custom-control-input" id="check_cedula">
                <label class="custom-control-label" for="check_cedula">
                  <h5 class="text-gray-900 text-justify pl-4">Cedula</h5>
                </label>
              </div>
            </div>
            <div class="col-md-12 text-md-center col-lg-8 text-lg-left pt-3 my-auto">

              <div id="preview-images-cedula" class="preview-images">

                <div class="thumbnail" style="background-image: url('<?php echo $path_cedula ?>')">
                  <div class="close-button-db">
                    <a href="<?php echo $path_cedula ?>" data-lightbox="galleryCedula" data-title="Cedula">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="<?php echo $path_cedula ?>" download="<?php echo ('cedula'.$cedula) ?>">
                      <i class="fas fa-download"></i>
                    </a>
                  </div>
                </div>

              </div>

            </div>

          </div>
          <!-- End Cedula -->

          <br>
          <hr class="sidebar-divider">
          <br>


          <!-- Notas -->
          <div class="form-group row">

            <div class="col-md-12 col-lg-4 text-lg-left my-auto">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_notas == 0) ? '' : 'checked' ?> class="custom-control-input"
                  id="check_notas">
                <label class="custom-control-label" for="check_notas">
                  <h5 class="text-gray-900 text-justify pl-4">Notas certificadas de bachillerato (1er a 5to)</h5>
                </label>
              </div>
            </div>
            <div class="col-md-12 text-md-center col-lg-8 text-lg-left pt-3 my-auto">

              <div id="preview-images-Notas" class="preview-images">

                <!-- Esto se repite por cada imagen de Notas -->
                <div class="thumbnail" style="background-image: url('<?php echo $path_notas ?>')">
                  <div class="close-button-db">
                    <a href="<?php echo $path_notas ?>" data-lightbox="galleryNotas" data-title="Notas">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="<?php echo $path_notas ?>" download="<?php echo ('notas'.$cedula) ?>">
                      <i class="fas fa-download"></i>
                    </a>
                  </div>
                </div>
                <!--  /Esto se repite por cada imagen de Notas -->

              </div>

            </div>

          </div>
          <!-- End Notas -->

          <br>
          <hr class="sidebar-divider">
          <br>

          <!-- Fondo -->
          <div class="form-group row">

            <div class="col-md-12 col-lg-4 text-lg-left my-auto">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_fondo == 0) ? '' : 'checked' ?> class="custom-control-input"
                  id="check_fondo">
                <label class="custom-control-label" for="check_fondo">
                  <h5 class="text-gray-900 text-justify pl-4">Titulo de bachillerato autenticado</h5>
                </label>
              </div>
            </div>
            <div class="col-md-12 text-md-center col-lg-8 text-lg-left pt-3 my-auto">

              <div id="preview-images-fondo" class="preview-images">

                <!-- Esto se repite por cada imagen de Fondo de titulo -->
                <div class="thumbnail" style="background-image: url('<?php echo $path_fondo ?>')">
                  <div class="close-button-db">
                    <a href="<?php echo $path_fondo ?>" data-lightbox="galleryFondo" data-title="Fondo">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="<?php echo $path_fondo ?>" download="<?php echo ('fondo'.$cedula) ?>">
                      <i class="fas fa-download"></i>
                    </a>
                  </div>
                </div>
                <!--  /Esto se repite por cada imagen de Fondo de titulo -->

              </div>

            </div>

          </div>
          <!-- End Fondo -->

          <br>
          <hr class="sidebar-divider">
          <br>

          <!-- Rusnies -->
          <div class="form-group row">

            <div class="col-md-12 col-lg-4 text-lg-left my-auto">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_rusnies == 0) ? '' : 'checked' ?> class="custom-control-input"
                  id="check_rusnies">
                <label class="custom-control-label" for="check_rusnies">
                  <h5 class="text-gray-900 text-justify pl-4">Resultado del RUSNIES</h5>
                </label>
              </div>
            </div>
            <div class="col-md-12 text-md-center col-lg-8 text-lg-left pt-3 my-auto">

              <div id="preview-images-rusnies" class="preview-images">

                <!-- Esto se repite por cada imagen de Rusnies -->
                <div class="thumbnail" style="background-image: url('<?php echo $path_rusnies ?>')">
                  <div class="close-button-db">
                    <a href="<?php echo $path_rusnies ?>" data-lightbox="galleryRusnies" data-title="Rusnies">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="<?php echo $path_rusnies ?>" download="<?php echo ('rusnies'.$cedula) ?>">
                      <i class="fas fa-download"></i>
                    </a>
                  </div>
                </div>
                <!--  /Esto se repite por cada imagen de Rusnies -->

              </div>

            </div>

          </div>
          <!-- End rusnies -->

          <br>
          <hr class="sidebar-divider">
          <br>

          <!-- Partida -->
          <div class="form-group row">

            <div class="col-md-12 col-lg-4 text-lg-left my-auto">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_partida == 0) ? '' : 'checked' ?> class="custom-control-input"
                  id="check_partida">
                <label class="custom-control-label" for="check_partida">
                  <h5 class="text-gray-900 text-justify pl-4">Partida de nacimiento</h5>
                </label>
              </div>
            </div>
            <div class="col-md-12 text-md-center col-lg-8 text-lg-left pt-3 my-auto">

              <div id="preview-images-partida" class="preview-images">

                <div class="thumbnail" style="background-image: url('<?php echo $path_partida ?>')">
                  <div class="close-button-db">
                    <a href="<?php echo $path_partida ?>" data-lightbox="galleryPartida" data-title="Partida">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="<?php echo $path_partida ?>" download="<?php echo ('partida'.$cedula) ?>">
                      <i class="fas fa-download"></i>
                    </a>
                  </div>
                </div>

              </div>

            </div>

          </div>
          <!-- End Partida -->

          <br>
          <hr class="sidebar-divider">
          <br>

          <!-- Metodo -->
          <div class="form-group row">

            <div class="col-md-12 col-lg-4 text-lg-left my-auto">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_metodo == 0) ? '' : 'checked' ?> class="custom-control-input"
                  id="check_metodo">
                <label class="custom-control-label" for="check_metodo">
                  <h5 class="text-gray-900 text-justify pl-4">Metodo de ingreso <br>
                  <small><?php echo $nombre_solicitud ?></small>
                  </h5>
                  
                </label>
              </div>
            </div>
            <div class="col-md-12 text-md-center col-lg-8 text-lg-left pt-3 my-auto">

              <div id="preview-images-metodo" class="preview-images">

                <!-- Esto se repite por cada imagen de Metodo -->
                <div class="thumbnail" style="background-image: url('<?php echo $path_metodo ?>')">
                  <div class="close-button-db">
                    <a href="<?php echo $path_metodo ?>" data-lightbox="galleryMetodo" data-title="Metodo">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="<?php echo $path_metodo ?>" download="<?php echo ('metodo'.$cedula) ?>">
                      <i class="fas fa-download"></i>
                    </a>
                  </div>
                </div>
                <!--  /Esto se repite por cada imagen de Metodo -->

              </div>

            </div>

          </div>
          <!-- End Metodo -->

          <div class="alert alert-danger" role="alert" id="resultado" hidden>
          </div>
          <br>

          <button id="enviarCheck" type="submit" class="btn btn-primary btn-user btn-block">
            Guardar validaciones
          </button>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.Formulario Check Documentos -->





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

</body>

</html>