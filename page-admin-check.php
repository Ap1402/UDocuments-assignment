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
//----------------------------****************************** Documentos **********************
// ------------ Obtener la id del documento
    if (isset($_GET['idd'])) {
      $idd = $_GET['idd'];
      }

    $sql= "SELECT * FROM documentos WHERE id_documento='$idd'";
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
$check_certificado_s = $row['check_certificado_s'];


// -------- Porcentaje de Documentos

$porcentaje =  $row['porcentaje'];

// -------- /Porcentaje de Documentos

// Iniciando valores
$ci = $_GET['ci']; // cedula
$mi = $_GET['mi']; // metodo_ingreso
$ida = $_GET['ida']; // id_alumno

$sql_mi = "SELECT * FROM tipo_solicitud
            WHERE tipo='$mi'";
$result_mi = mysqli_query($conexion, $sql_mi);
$row_mi = mysqli_fetch_assoc($result_mi);

$sqlSolicitud = "SELECT * FROM solicitudes
            WHERE alumno='$ida'";
$resultSolicitud = mysqli_query($conexion, $sqlSolicitud);
$rowSolicitud = mysqli_fetch_assoc($resultSolicitud);

// ruta raiz de la imagen
$path_image = 'back/documentos/';

$ultActualizacion = date('Y-m-d');
$nombre_solicitud = $row_mi['nombre_solicitud'];

$check_solicitud = $rowSolicitud['estadoSolicitud']; //--------------------------------------------- Estado Solicitud ($row['check_solicitud'])

//----------------------------****************************** /.Documentos **********************


//----------------------------******************************=========== Datos **********************

$consulta = "SELECT * FROM `alumnos` WHERE cedula='" . $ci . "'";
$resultado = mysqli_query($conexion, $consulta);
$datos = mysqli_fetch_array($resultado);

$p_nombre = $datos['p_nombre'];
$s_nombre = $datos['s_nombre'];
$p_apellido = $datos['p_apellido'];
$s_apellido = $datos['s_apellido'];
$cedula = $datos['cedula'];
$correo = $datos['correo'];
$estado_civild = $datos['estado_civil'];

switch ($estado_civild) {
    case 1:
        $estado_civil_name = 'Casado';
        break;
    case 2:
        $estado_civil_name = 'Soltero';
        break;
    case 3:
        $estado_civil_name = 'Divorciado';
        break;
    case 4:
        $estado_civil_name = 'Viudo';
        break;
    default:
        $estado_civil_name = '';
        break;
};

$fecha_nacimiento = $datos['fecha_nacimiento'];

$metodo_ingreso = $datos['metodo_ingreso'];
$carrera = $datos['carrera'];
$pais = $datos['pais_nac'];
$estado = $datos['estado_nac'];
$ciudad = $datos['ciudad_nac'];
$municipio = $datos['municipio_nac'];
$e_nombre = $datos['parientename'];
$parentesco = $datos['parentesco'];
$discapacidad = $datos['discapacidad'];
$i_nombre = $datos['nombreInst'];
$i_egreso = $datos['anoEgreso'];
$i_codigo = $datos['codigoInst'];
$i_estado = $datos['estadoInst'];
$tipo_inst = $datos['tipoInst'];
$discapacidad = $datos['discapacidad'];

switch ($tipo_inst) {
    case 1:
        $tipo_inst_name = 'Privada';
        break;
    case 2:
        $tipo_inst_name = 'Pública';
        break;
    default:
        $tipo_inst_name = '';
        break;
};

$consulta2 = "SELECT * FROM `telefonos` WHERE alumno='" . $ida . "'";
$resultado2 = mysqli_query($conexion, $consulta2);
$datosTelf = mysqli_fetch_array($resultado2);

$movil = $datosTelf['num_movil'];
$habitacion = $datosTelf['num_habitacion'];
$trabajo = $datosTelf['num_trabajo'];
$e_local = $datosTelf['num_habitacion_pariente'];
$e_movil = $datosTelf['num_movil_pariente'];

$consulta3 = "SELECT * FROM `direcciones` WHERE alumno='" . $ida . "'";
$resultado3 = mysqli_query($conexion, $consulta3);
$datosDirecc = mysqli_fetch_array($resultado3);

$nac_estado = $datosDirecc['estado'];
$nac_ciudad = $datosDirecc['ciudad'];
$nac_municipio = $datosDirecc['municipio'];
$nac_urbanizacion = $datosDirecc['urbanizacion'];
$nac_aptcasa = $datosDirecc['aptcasa'];
$nac_calle = $datosDirecc['calle'];
$t_postal = $datosDirecc['postal_trabajo'];
$t_estado = $datosDirecc['estado_trabajo'];
$t_municipio = $datosDirecc['municipio_trabajo'];
$t_ciudad = $datosDirecc['ciudad_trabajo'];
$nac_postal = $datosDirecc['postal_hab'];


//----------------------------******************************=========== /.Datos **********************


?>

<!-- Título de página -->
          <div class="d-sm-flex col-sm-12 col-xl-10 align-items-center justify-content-between mb-4 mx-auto">
            <h1 class="h3 mb-0 text-gray-800">Validaciones <small> / <b>Cédula:</b> <?=$ci?></small></h1>
            <!-- Boton para el admin (Ir a perfil) -->
            <a href="<?='page-student-perfil.php?ida='.$ida?>" class="d-sm-inline-block btn btn-sm btn-primary text-white shadow-sm">
              <i class="fas fa-user fa-sm"></i>
              Ir a perfil
            </a>
            <!-- /.Boton para el admin (Ir a perfil) -->
          </div>
          <!-- /.Título de página -->

          <!-- Datos del alumno (Editable) -->
          <div class="col-sm-12 col-xl-10 mx-auto">
          <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardDAE" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardDAE">
                  <h6 class="m-0 font-weight-bold text-primary">Datos del alumno</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardDAE" style="">
                  <div class="card-body">
                    
 <div class="px-4 py-2">
   <!-- Form Edit Datos (ADMIN) -->
   <?php require 'form-admin-student-edit-datos.php'; ?>
   <!-- End of Form Edit Datos (ADMIN) -->
 </div>



                  </div>
                </div>
              </div>
              </div>
              <!-- /.Datos del alumno (Editable) -->

<!-- Formulario Check Documentos -->
<div class="col-sm-12 col-xl-10 mx-auto">
  <div class="card shadow mb-4">
    <div class="card-body">

      <div class="pl-4 pr-3 py-2">

        <form id="checkForm" method="POST" class="user needs-validation" novalidate>
        <div class="alert alert-success" role="alert" id="exitoCheck" style="display: none"></div>
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

          
          <hr class="sidebar-divider">
          

          <!-- Cedula -->
          <div class="form-group row">

            <div class="col-md-12 col-lg-4 text-lg-left my-auto">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_cedula == 0) ? '' : 'checked' ?> class="custom-control-input" id="check_cedula">
                <label class="custom-control-label" for="check_cedula">
                  <h5 class="text-gray-900 text-justify pl-4">Cédula</h5>
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

          
          <hr class="sidebar-divider">
          


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
                                      WHERE documento = '$idd';";

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

          
          <hr class="sidebar-divider">
          

          <!-- Fondo -->
          <div class="form-group row">

            <div class="col-md-12 col-lg-4 text-lg-left my-auto">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_fondo == 0) ? '' : 'checked' ?> class="custom-control-input"
                  id="check_fondo">
                <label class="custom-control-label" for="check_fondo">
                  <h5 class="text-gray-900 text-justify pl-4">Título de bachillerato autenticado</h5>
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

          
          <hr class="sidebar-divider">
          

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
                                        WHERE documento = '$idd';";

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

          
          <hr class="sidebar-divider">
          

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

          
          <hr class="sidebar-divider">
          


          <!-- CERTICICADO SALUD -->
          <?php if($rowSolicitud['carrera']==10) { ?>
          <div class="form-group row">

            <div class="col-md-12 col-lg-4 text-lg-left my-auto">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_certificado_s == 0) ? '' : 'checked' ?> class="custom-control-input"
                  id="check_certificado_s">
                <label class="custom-control-label" for="check_certificado_s">
                  <h5 class="text-gray-900 text-justify pl-4">Certificado de salud (Solo odontologia)</h5>
                </label>
              </div>
            </div>
            <div class="col-md-12 text-md-center col-lg-8 text-lg-left pt-3 my-auto">

              <div id="preview-images-partida" class="preview-images">

                <?php 
if ($row['certificado_s'] != '') {
    ?>
                          <div class="thumbnail" style="background-image: url('<?=$path_image . $row['certificado_s']?>')">
                            <div class="close-button-db">
                              <a href="<?=$path_image . $row['certificado_s']?>" data-lightbox="galleryPartida" data-title="Partida">
                                <i class="fas fa-eye"></i>
                              </a>
                              <a href="<?=$path_image . $row['certificado_s']?>" download="<?php echo ('certificado_s' . $ci) ?>">
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


          <!-- Final SALUD -->

          
          <hr class="sidebar-divider">
          
          <?php } ?>

          <!-- Metodo -->
          <?php if($rowSolicitud['tipo']==4 || $rowSolicitud['tipo']==5) { ?>

          <div class="form-group row">

            <div class="col-md-12 col-lg-4 text-lg-left my-auto">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_metodo == 0) ? '' : 'checked' ?> class="custom-control-input"
                  id="check_metodo">
                <label class="custom-control-label" for="check_metodo">
                  <h5 class="text-gray-900 text-justify pl-4">Método de ingreso <br>
                  <small><?php echo $nombre_solicitud ?></small>
                  </h5>
                  
                </label>
              </div>
            </div>
            <div class="col-md-12 text-md-center col-lg-8 text-lg-left pt-3 my-auto">

              <div id="preview-images-metodo" class="preview-images">
              <?php
$sql_metodoing = "SELECT * FROM metodoing
                                          WHERE documento = '$idd';";

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

          
          <hr class="sidebar-divider">
          
<?php }?>

          <!-- Estado Solicitud -->
          <div class="form-group row">

            <div class="col-md-12 col-lg-4 text-lg-left my-auto">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_solicitud == 0) ? '' : 'checked' ?> class="custom-control-input"
                  id="check_solicitud">
                <label class="custom-control-label" for="check_solicitud">
                  <h5 class="text-gray-900 text-justify pl-4">Estado de solicitud <br>
                    <small><?php echo ($check_solicitud == 0) ? 'Pendiente' : 'Atendida' ?></small>
                  </h5>

                </label>
              </div>
            </div>
            <div class="col-md-12 text-md-center col-lg-8 text-lg-left pt-3 my-auto">

              <div id="preview-images-Estado Solicitud" class="preview-images">
                <div>Ejemplo:</div>
<small>                
                  <div class="custom-control custom-switch d-inline-flex">
                    <input type="checkbox" checked class="custom-control-input" readonly>
                    <label class="custom-control-label">
                      <h5 class="text-gray-900 text-justify pl-2">Atendida<br>
                      </h5>
                    </label>
                  </div>
                  <b class="px-2">|</b>
                  <div class="custom-control custom-switch d-inline-flex">
                    <input type="checkbox" class="custom-control-input" readonly>
                    <label class="custom-control-label">
                      <h5 class="text-gray-900 text-justify pl-2">Pendiente<br>
                      </h5>
                    </label>
                  </div>
</small>
              </div>

            </div>

          </div>
          <!-- End Estado Solicitud -->

          
          <br>
          <input type="hidden" id="idDoc" value="<?php echo $idd?>">
          <input type="hidden" id="tipoSolicitud" value="<?php echo $rowSolicitud['tipo']?>">
          <input type="hidden" id="carrera" value="<?php echo $rowSolicitud['carrera'] ?>">
          <input type="hidden" id="ida" value="<?php echo $ida ?>">

          <div class="alert alert-info" role="alert" id="resultadoCheck" style="display: none"></div>

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
  <script src="scripts/editDatos.js"></script>
  <script src="scripts/checkAdmin.js"></script>

    <!-- Formulario STEPS -->
  <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    var currentTabAux = currentTab;
    showTab(currentTab); // Display the current tab

    function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
    } else {
    document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Enviar";   
    } else {
    document.getElementById("nextBtn").innerHTML = "Siguiente";
    $("#nextBtn").attr('type','button');
    }
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n)
    }

    function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form... :
    if (currentTab >= x.length) {
    //...the form gets submitted:
      $("#nextBtn").attr('type','submit');
    // document.getElementById("datosEditForm").submit();
    return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
    }

    function validateForm() {
    // This function deals with validation of the form fields
    var x, y, z, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    z = x[currentTab].getElementsByTagName("select");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < z.length; i++) { 
      // If a field is empty... 
      if (!z[i].validity.valid) {
          // and set the current valid status to false:
          valid=false;
          $('#datosEditForm')[0].classList.add('was-validated');   
    } 
  }
    for (i = 0; i < y.length; i++) { 
      // If a field is empty... 
      if (!y[i].validity.valid) {
          // and set the current valid status to false:
          valid=false;
          $('#datosEditForm')[0].classList.add('was-validated');   
    } 
  } 
      // If the valid status is true, mark the step as finished and valid: 
      if (valid) {
      document.getElementsByClassName("step")[currentTab].className +=" finish";
      $('#datosEditForm')[0].classList.remove('was-validated');
    } 
    return valid; // return the valid status 
  }
  
  function fixStepIndicator(n) { 
        // This function removes the "active" class of all steps... 
        var i, x=document.getElementsByClassName("step"); 
      for (i=0; i < x.length; i++) { 
        x[i].className=x[i].className.replace(" active", ""); 
      } 
      //... and adds the "active" class to the current step: 
      x[n].className +=" active"; 
    }
  </script>
<!-- /.Formulario STEPS -->

<script>
  $(document).ready(function () {

    $('#ver-secciones').hide();    

    $('#ver-todo').on('click', function (e) {
      var i, x = $(".tab"),
        y = $(".tabignore");
      console.log(x);
      console.log(x.length);
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "block";
        x[i].className = x[i].className.replace("tab", "tabignore");
      }
      currentTabAux = currentTab;
      currentTab = 0;
      y[0].className = y[0].className.replace("tabignore", "tab");
      y[0].style.display = "block";
      document.getElementById("nextBtn").innerHTML = "Enviar";
      $("#prevBtn").hide();
      $("#stepcircle").hide();
      $('#ver-todo').hide();
      $('#ver-secciones').show();
      e.preventDefault();
    });

    $('#ver-secciones').on('click', function (e) {
      var i, x = $(".tabignore"),
        y = $(".tab");
      console.log(x);
      console.log(x.length);
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
        x[i].className = x[i].className.replace("tabignore", "tab");
      }
      currentTab = currentTabAux;
      x[currentTab].style.display = "block";
      if (currentTab > 0) $("#prevBtn").show();;
      y[0].className = y[0].className.replace("tab", "tabignore");
      document.getElementById("nextBtn").innerHTML = "Siguiente";
      $("#stepcircle").show();
      $('#ver-todo').show();
      $('#ver-secciones').hide();
      e.preventDefault();
    });
    
  });
</script>

</body>

</html>