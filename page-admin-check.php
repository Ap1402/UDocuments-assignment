<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Validar documentos </title>
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


include 'back/conexion.php';

// ------------ Obtener la id del alumno dependiendo la sesion
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      }

    $sql= "SELECT * FROM documentos WHERE id_documento='$id'";
    $result = mysqli_query($conexion, $sql);

    if ($result->num_rows > 0) {
      $row = mysqli_fetch_assoc($result);
    }else{
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

// -------- Porcentaje de Documentos

$porcentaje = ($check_foto + $check_cedula + $check_fondo + $check_notas + $check_partida + $check_rusnies +
$check_metodo) * 100 / 7;
$porcentaje = round($porcentaje, 0, PHP_ROUND_HALF_UP);

// -------- /Porcentaje de Documentos

// Iniciando valores
$ci = $_GET['ci']; // cedula
$mi = $_GET['mi']; // metodo_ingreso

$sql_mi = "SELECT * FROM tipo_solicitud
            WHERE tipo='$mi'";
$result_mi = mysqli_query($conexion, $sql_mi);
$row_mi = mysqli_fetch_assoc($result_mi);


// ruta raiz de la imagen
$path_image = 'back/documentos/';

$ultActualizacion = date('Y-m-d');
$nombre_solicitud = $row_mi['nombre_solicitud'];

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
                    <div class="col">
                        <label class="pl-2 pt-2">
                            <b>Cedula:</b> <?php echo $ci ?>
                        </label>
                    </div>
                </div>


            </div>

        </div>

    </div>

</div>
<!-- /.Busqueda Check -->


<!-- Título de página -->
          <div class="d-sm-flex col-sm-12 col-lg-10 align-items-center justify-content-between mb-4 mx-auto">
            <h1 class="h3 mb-0 text-gray-800">Validar documentos</h1>
            <!-- Boton para el admin (Ir a perfil) -->
            <a href="page-student-perfil.php" class="d-sm-inline-block btn btn-sm btn-primary text-white shadow-sm">
              <i class="fas fa-user fa-sm"></i>
              Ir a perfil
            </a>
            <!-- /.Boton para el admin (Ir a perfil) -->
          </div>
          <!-- /.Título de página -->

<!-- Formulario Check Documentos -->
<div class="col-sm-12 col-lg-10 mx-auto">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="pl-4 pr-3 py-4">

        <form id="checkForm" method="POST" class="user needs-validation" novalidate>
          <div class="alert alert-success" role="alert" id="exito" hidden></div>

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

                                      <?php
if ($row['foto'] != '') {
    ?>
                        <div class="thumbnail" style="background-image: url('<?=$path_image . $row['foto']?>')">
                          <div class="close-button-db">
                            <a href="<?=$path_image . $row['foto']?>" data-lightbox="galleryFoto" data-title="foto">
                              <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?=$path_image . $row['foto']?>" download="<?php echo ('foto' . $ci) ?>">
                              <i class="fas fa-download"></i>
                            </a>
                          </div>
                        </div>
                    <?php
}
;
?>              

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

                <?php
if ($row['cedula'] != '') {
    ?>
                          <div class="thumbnail" style="background-image: url('<?=$path_image . $row['cedula']?>')">
                            <div class="close-button-db">
                              <a href="<?=$path_image . $row['cedula']?>" data-lightbox="galleryCedula" data-title="Cedula">
                                <i class="fas fa-eye"></i>
                              </a>
                              <a href="<?=$path_image . $row['cedula']?>" download="<?php echo ('cedula' . $ci) ?>">
                                <i class="fas fa-download"></i>
                              </a>
                            </div>
                          </div>
                        <?php
}
;
?>

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

              <?php

$sql_notas = "SELECT * FROM notas
                                      WHERE documento = '$id';";

$result_notas = mysqli_query($conexion, $sql_notas);

if ($result_notas->num_rows > 0) {
    while ($row_notas = mysqli_fetch_assoc($result_notas)) {
        ?>
                          <!-- Esto se repite por cada imagen de Notas -->
                          <div class="thumbnail" style="background-image: url('<?=$path_image . $row_notas['nota']?>')">
                            <div class="close-button-db">
                              <a href="<?=$path_image . $row_notas['nota']?>" data-lightbox="galleryNotas" data-title="Notas">
                                <i class="fas fa-eye"></i>
                              </a>
                              <a href="<?=$path_image . $row_notas['nota']?>" download="<?php echo ('notas' . $ci) ?>">
                                <i class="fas fa-download"></i>
                              </a>
                            </div>
                          </div>
                          <!--  /Esto se repite por cada imagen de Notas -->
                        <?php
}
    ;
}
;
?>
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

               <?php
if ($row['fondo'] != '') {
    ?>
                          <div class="thumbnail" style="background-image: url('<?=$path_image . $row['fondo']?>')">
                            <div class="close-button-db">
                              <a href="<?=$path_image . $row['fondo']?>" data-lightbox="galleryFondo" data-title="Fondo">
                                <i class="fas fa-eye"></i>
                              </a>
                              <a href="<?=$path_image . $row['fondo']?>" download="<?php echo ('fondo' . $ci) ?>">
                                <i class="fas fa-download"></i>
                              </a>
                            </div>
                          </div>
                        <?php
}
;
?>

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
             <?php
$sql_rusnies = "SELECT * FROM rusnies
                                        WHERE documento = '$id';";

$result_rusnies = mysqli_query($conexion, $sql_rusnies);
if ($result_rusnies->num_rows > 0) {
    while ($row_rusnies = mysqli_fetch_assoc($result_rusnies)) {
        ?>
                          <!-- Esto se repite por cada imagen de Rusnies -->
                          <div class="thumbnail" style="background-image: url('<?=$path_image . $row_rusnies['rusnies']?>')">
                            <div class="close-button-db">
                              <a href="<?=$path_image . $row_rusnies['rusnies']?>" data-lightbox="galleryRusnies" data-title="Rusnies">
                                <i class="fas fa-eye"></i>
                              </a>
                              <a href="<?=$path_image . $row_rusnies['rusnies']?>" download="<?php echo ('rusnies' . $ci) ?>">
                                <i class="fas fa-download"></i>
                              </a>
                            </div>
                          </div>
                          <!--  /Esto se repite por cada imagen de Rusnies -->
                        <?php
}
    ;
}
;
?>
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

                <?php
if ($row['partida'] != '') {
    ?>
                          <div class="thumbnail" style="background-image: url('<?=$path_image . $row['partida']?>')">
                            <div class="close-button-db">
                              <a href="<?=$path_image . $row['partida']?>" data-lightbox="galleryPartida" data-title="Partida">
                                <i class="fas fa-eye"></i>
                              </a>
                              <a href="<?=$path_image . $row['partida']?>" download="<?php echo ('partida' . $ci) ?>">
                                <i class="fas fa-download"></i>
                              </a>
                            </div>
                          </div>
                        <?php
}
;
?>

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
              <?php
$sql_metodoing = "SELECT * FROM metodoing
                                          WHERE documento = '$id';";

$result_metodoing = mysqli_query($conexion, $sql_metodoing);
if ($result_metodoing->num_rows > 0) {
    while ($row_metodoing = mysqli_fetch_assoc($result_metodoing)) {
        ?>
                          <!-- Esto se repite por cada imagen de Metodo -->
                          <div class="thumbnail" style="background-image: url('<?=$path_image . $row_metodoing['metodo']?>')">
                            <div class="close-button-db">
                              <a href="<?=$path_image . $row_metodoing['metodo']?>" data-lightbox="galleryMetodo" data-title="Metodo">
                                <i class="fas fa-eye"></i>
                              </a>
                              <a href="<?=$path_image . $row_metodoing['metodo']?>" download="<?php echo ('metodo' . $ci) ?>">
                                <i class="fas fa-download"></i>
                              </a>
                            </div>
                          </div>
                          <!--  /Esto se repite por cada imagen de Metodo -->
                        <?php
}
    ;
}
;
?>
              </div>

            </div>

          </div>
          <!-- End Metodo -->

          <div class="alert alert-danger" role="alert" id="resultado" hidden>
          </div>
          <br>
          <input type="text" id="idDoc" value=<?php echo $id ?> hidden>
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
  <script src="scripts/checkAdmin.js"></script>


</body>

</html>