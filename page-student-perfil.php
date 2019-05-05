<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Perfil del alumno </title>

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
    <?php require 'front/general/sidebar.php';?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php require 'front/general/navbar.php';?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <!-- Contenido Variable - Todo lo demas es fijo -->

        <div id="page-student-perfil" class="container-fluid">

          <?php

           include 'back/conexion.php';

           // ------------ Obtener la id del alumno dependiendo la sesion
           if (isset($_GET['id'])) {
            $id = $_GET['id'];
           }elseif (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
           };
           // ------------ /.Obtener la id del alumno dependiendo la sesion


          $sql = "SELECT *, alumnos.cedula AS ci, documentos.cedula AS cedula, carreras.nombre AS carreraname FROM alumnos
                  INNER JOIN documentos ON alumnos.documento=documentos.id_documento
                  LEFT JOIN telefonos ON alumnos.id_alumno=telefonos.alumno
                  LEFT JOIN direcciones ON alumnos.id_alumno=direcciones.alumno
                  LEFT JOIN carreras ON alumnos.carrera=carreras.codigo
                  LEFT JOIN tipo_solicitud ON alumnos.metodo_ingreso=tipo_solicitud.tipo
                  WHERE alumnos.id_alumno = '$id';";

          $result = mysqli_query($conexion, $sql);
          if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
          }else{
            $mensaje = "Ocurrió un error al cargar el perfil";
            echo ($mensaje);
          };

          // -------- Porcentaje de Documentos

          $porcentaje = ($row['check_foto'] + $row['check_cedula'] + $row['check_fondo'] + $row['check_nota'] + $row['check_partida'] + $row['check_rusinies'] + $row['check_metodo']) * 100 / 7;
          $porcentaje = round($porcentaje, 0, PHP_ROUND_HALF_UP);

          // -------- /Porcentaje de Documentos          

          switch ($row['turno']) {
            case '1':
              $turno = 'Mañana';
              break;
            case '2':
              $turno = 'Tarde';
              break;
            case '3':
              $turno = 'Noche';
              break;
            default:
              $turno = '';
              break;
          };

          $path_image = 'back/documentos/'; // ruta raiz de los Documentos
          $id_documento = $row['id_documento']; // para hacer las consultas de cada tipo de Documento
          $admin = 1;

          ?>

          <!-- Título de página -->
          <div class="d-sm-flex col-sm-12 col-lg-10 align-items-center justify-content-between mb-4 mx-auto">
            <h1 class="h3 mb-0 text-gray-800">Perfil del alumno</h1>
            <!-- Boton para el alumno (Imprimir perfil) -->
            <?php if ($admin != 1) { ?>
            <a id="btnImprimirPerfil" class="d-sm-inline-block btn btn-sm btn-primary text-white shadow-sm">
              <i class="fas fa-download fa-sm"></i>
              Imprimir perfil
            </a>
            <?php }; ?>
            <!-- /.Boton para el alumno (Imprimir perfil) -->
            <!-- Boton para el admin (Ir a Validaciones) -->
            <?php if ($admin == 1) { ?>
            <a href="page-admin-check.php" class="d-sm-inline-block btn btn-sm btn-primary text-white shadow-sm">
              <i class="fas fa-clipboard-list fa-sm"></i>
              Ir a validaciones
            </a>
            <?php }; ?>
            <!-- /.Boton para el admin (Ir a Validaciones) -->
          </div>
          <!-- /.Título de página -->

          <!-- Perfil alumno -->
          <div id="imprimirPerfil" class="col-sm-12 col-lg-10 mx-auto">

            <!-- Header Status de Datos -->
            <div class="card border-left-primary py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center px-2">
                  <div class="col pr-2">
                    <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">Información del alumno</div>
                    <div class="row no-gutters align-items-center">
                      <div class="col-auto">
                        <div class="h5 mb-0 pr-3 font-weight-bold text-gray-800">Ultima actualización: </div>
                      </div>
                      <div class="col">
                        <?=$row['ultActualizacion']?>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <a href="page-student-edit-datos.php" data-toggle="tooltip" data-placement="top"
                      title="Editar información">
                      <i class="fas fa-user-edit fa-2x text-gray-300"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Header Status de Datos -->

            <!-- Tabla de Status de Datos -->
            <div class="card border-left-primary shadow mb-4">
              <div class="card-body">
                <div class="px-3 py-2">
                  <div class="form-group row">
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                      <label class="pl-2 pt-2">Primer nombre</label><br>
                      <input type="text" value="<?=$row['p_nombre']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                      <label class="pl-2 pt-2">Segundo nombre</label><br>
                      <input type="text" value="<?=$row['s_nombre']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                      <label class="pl-2 pt-2">Primer apellido</label><br>
                      <input type="text" value="<?=$row['p_apellido']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                      <label class="pl-2 pt-2">Segundo apellido</label><br>
                      <input type="text" value="<?=$row['s_apellido']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-8 col-xl-4">
                      <label class="pl-2 pt-2">Correo</label><br>
                      <input type="text" value="<?=$row['correo']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-8 col-xl-4">
                      <label class="pl-2 pt-2">Nombre de usuario</label><br>
                      <input type="text" value="<?=$row['username']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                      <label class="pl-2 pt-2">Cédula</label><br>
                      <input type="text" value="<?=$row['ci']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                      <label class="pl-2 pt-2">Estado civil</label><br>
                      <input type="text" value="<?=$row['estado_civil']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                      <label class="pl-2 pt-2">Fecha de nacimiento</label><br>
                      <input type="text" value="<?=$row['fecha_nacimiento']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                      <label class="pl-2 pt-2">Discapacidad</label><br>
                      <input type="text" value="<?=$row['discapacidad']?>" class="form-control"
                        disabled>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                      <label class="pl-2 pt-2">Teléfono habitación</label><br>
                      <input type="text" value="<?=$row['num_habitacion']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                      <label class="pl-2 pt-2">Teléfono móvil</label><br>
                      <input type="text" value="<?=$row['num_movil']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                      <label class="pl-2 pt-2">Teléfono trabajo</label><br>
                      <input type="text" value="<?=$row['num_trabajo']?>" class="form-control" disabled>
                    </div>

                  </div>


                  <br>
                  <div class="text-center">
                    <h5 class="text-gray-900 mb-4">Lugar de nacimiento</h5>
                  </div>
                  <hr class="sidebar-divider">

                  <div class="form-group row">
                    <div class="col-sm-12 col-md-6 col-xl-3">
                      <label class="pl-2 pt-2">País</label><br>
                      <input type="text" value="<?=$row['pais_nac']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                      <label class="pl-2 pt-2">Estado</label><br>
                      <input type="text" value="<?=$row['estado_nac']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                      <label class="pl-2 pt-2">Ciudad</label><br>
                      <input type="text" value="<?=$row['ciudad_nac']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                      <label class="pl-2 pt-2">Municipio</label><br>
                      <input type="text" value="<?=$row['municipio_nac']?>" class="form-control" disabled>
                    </div>
                  </div>


                  <br>
                  <div class="text-center">
                    <h5 class="text-gray-900 mb-4">Dirección de habitación</h5>
                  </div>
                  <hr class="sidebar-divider">

                  <div class="form-group row">
                    <div class="col-sm-12 col-md-6 col-xl-3">
                      <label class="pl-2 pt-2">Estado</label><br>
                      <input type="text" value="<?=$row['estado']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                      <label class="pl-2 pt-2">Ciudad</label><br>
                      <input type="text" value="<?=$row['ciudad']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                      <label class="pl-2 pt-2">Municipio</label><br>
                      <input type="text" value="<?=$row['municipio']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                      <label class="pl-2 pt-2">Zona postal</label><br>
                      <input type="text" value="<?=$row['postal']?>" class="form-control" disabled>
                    </div>
                  </div>

                  <br>
                  <div class="text-center">
                    <h5 class="text-gray-900 mb-4">Dirección de trabajo</h5>
                  </div>
                  <hr class="sidebar-divider">

                  <div class="form-group row">
                    <div class="col-sm-12 col-md-6 col-xl-3">
                      <label class="pl-2 pt-2">Estado</label><br>
                      <input type="text" value="<?=$row['estado_trabajo']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                      <label class="pl-2 pt-2">Ciudad</label><br>
                      <input type="text" value="<?=$row['ciudad_trabajo']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                      <label class="pl-2 pt-2">Municipio</label><br>
                      <input type="text" value="<?=$row['municipio_trabajo']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                      <label class="pl-2 pt-2">Zona postal</label><br>
                      <input type="text" value="<?=$row['postal_trabajo']?>" class="form-control" disabled>
                    </div>
                  </div>

                  <br>
                  <div class="text-center">
                    <h5 class="text-gray-900 mb-4">Contacto en caso de emergencia</h5>
                  </div>
                  <hr class="sidebar-divider">

                  <div class="form-group row">
                    <div class="col-sm-12 col-md-6 col-xl-3">
                      <label class="pl-2 pt-2">Nombre y apellido</label><br>
                      <input type="text" value="<?=$row['parientename']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                      <label class="pl-2 pt-2">Parentesco</label><br>
                      <input type="text" value="<?=$row['parentesco']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                      <label class="pl-2 pt-2">Teléfono local</label><br>
                      <input type="text" value="<?=$row['num_habitacion_pariente']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                      <label class="pl-2 pt-2">Teléfono móvil</label><br>
                      <input type="text" value="<?=$row['num_movil_pariente']?>" class="form-control" disabled>
                    </div>
                  </div>

                  <br>
                  <div class="text-center">
                    <h5 class="text-gray-900 mb-4">Datos título de bachiller</h5>
                  </div>
                  <hr class="sidebar-divider">

                  <div class="form-group row">
                    <div class="col-sm-12 col-md-12 col-lg-8">
                      <label class="pl-2 pt-2">Nombre de la institución (no abreviar)</label><br>
                      <input type="text" value="<?=$row['nombreInst']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                      <label class="pl-2 pt-2">Año de egreso</label><br>
                      <input type="text" value="<?=$row['anoEgreso']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                      <label class="pl-2 pt-2">Código de la institución</label><br>
                      <input type="text" value="<?=$row['codigoInst']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                      <label class="pl-2 pt-2">Estado</label><br>
                      <input type="text" value="<?=$row['estadoInst']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                      <label class="pl-2 pt-2">Tipo de institución</label><br>
                      <input type="text" value="<?=$row['tipoInst']?>" class="form-control" disabled>
                    </div>
                  </div>

                  <br>
                  <div class="text-center">
                    <h5 class="text-gray-900 mb-4">Carrera</h5>
                  </div>
                  <hr class="sidebar-divider">

                  <div class="form-group row">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                      <label class="pl-2 pt-2">Carrera</label><br>
                      <input type="text" value="<?=$row['carreraname']?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                      <label class="pl-2 pt-2">Turno</label><br>
                      <input type="text" value="<?=$turno?>" class="form-control" disabled>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                      <label class="pl-2 pt-2">Método de ingreso</label><br>
                      <input type="text" value="<?=$row['metodo_ingreso']?>" class="form-control" disabled>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <!-- /Tabla de Status de Datos -->

            <!-- Header Status de Documentos -->

            <div class="card border-left-info py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center px-2">
                  <div class="col pr-2">
                    <div class="text-sm font-weight-bold text-info text-uppercase mb-1">Estatus de Documentos</div>
                    <div class="row no-gutters align-items-center">
                      <div class="col-auto">
                        <div class="h5 mb-0 pr-3 font-weight-bold text-gray-800"><?=$porcentaje?>%</div>
                      </div>
                      <div class="col">
                        <div class="progress progress-sm mr-2">
                          <div class="progress-bar bg-info" role="progressbar" style="width: <?=$porcentaje?>%"
                            aria-valuenow="<?=$porcentaje?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <a href="page-student-edit-docs.php" data-toggle="tooltip" data-placement="top"
                      title="Editar documentos">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Header Status de Documentos -->


            <!-- Tabla de Status de Documentos -->
            <div class="card border-left-info shadow mb-4">
              <div class="card-body">
                <div class="px-3 py-2">
                  <!-- Foto -->
                  <div class="form-group row">

                    <div class="col-md-12 text-md-center col-lg-4 text-lg-left my-auto">
                      <h5 class="text-gray-900 row">
                        <div class="col-2"><i
                            class="fas fa-<?php echo ($row['check_foto'] == 0) ? 'minus-circle text-secondary' : 'check-circle text-success' ?> pr-3"></i>
                        </div>
                        <div class="col-10 text-justify">Foto reciente tipo carnet</div>
                      </h5>
                    </div>

                    <div class="text-sm-left col-md-12 text-md-center col-lg-8 text-lg-left my-auto">
                      <div id="preview-images-foto" class="preview-images">

                      <?php
                      if ($row['foto'] != '') {
                      ?>
                        <div class="thumbnail" style="background-image: url('<?=$path_image.$row['foto']?>')">
                          <div class="close-button-db">
                            <a href="<?=$path_image.$row['foto']?>" data-lightbox="galleryFoto" data-title="foto">
                              <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?=$path_image.$row['foto']?>" download="<?php echo ('foto' . $row['ci']) ?>">
                              <i class="fas fa-download"></i>
                            </a>
                          </div>
                        </div>
                    <?php
                    };
                    ?>              

                      </div>
                    </div>

                  </div>
                  <!-- End Foto -->

                  <hr class="sidebar-divider">
                  <br>

                  <!-- Cedula -->
                  <div class="form-group row">

                    <div class="col-md-12 text-md-center col-lg-4 text-lg-left my-auto">
                      <h5 class="text-gray-900 row">
                        <div class="col-2"><i
                            class="fas fa-<?php echo ($row['check_cedula'] == 0) ? 'minus-circle text-secondary' : 'check-circle text-success' ?> pr-3"></i>
                        </div>
                        <div class="col-10 text-justify">Cedula</div>
                      </h5>
                    </div>

                    <div class="text-sm-left col-md-12 text-md-center col-lg-8 text-lg-left my-auto">
                      <div id="preview-images-cedula" class="preview-images">

                        <?php
                        if ($row['cedula'] != '') {
                        ?>
                          <div class="thumbnail" style="background-image: url('<?=$path_image.$row['cedula']?>')">
                            <div class="close-button-db">
                              <a href="<?=$path_image.$row['cedula']?>" data-lightbox="galleryCedula" data-title="Cedula">
                                <i class="fas fa-eye"></i>
                              </a>
                              <a href="<?=$path_image.$row['cedula']?>" download="<?php echo ('cedula' . $row['ci']) ?>">
                                <i class="fas fa-download"></i>
                              </a>
                            </div>
                          </div>
                        <?php
                        };
                        ?> 

                      </div>
                    </div>

                  </div>
                  <!-- End Cedula -->

                  <hr class="sidebar-divider">
                  <br>


                  <!-- Notas -->
                  <div class="form-group row">

                    <div class="col-md-12 text-md-center col-lg-4 text-lg-left my-auto">
                      <h5 class="text-gray-900 row">
                        <div class="col-2"><i
                            class="fas fa-<?php echo ($row['check_nota'] == 0) ? 'minus-circle text-secondary' : 'check-circle text-success' ?> pr-3"></i>
                        </div>
                        <div class="col-10 text-justify">Notas certificadas de bachillerato (1er a 5to)</div>
                      </h5>
                    </div>

                    <div class="text-sm-left col-md-12 text-md-center col-lg-8 text-lg-left my-auto">
                      <div id="preview-images-Notas" class="preview-images">

                        <?php

                        $sql_notas = "SELECT * FROM notas
                                      WHERE documento = '$id_documento';";

                        $result_notas = mysqli_query($conexion, $sql_notas);

                        if ($result_notas->num_rows > 0) {
                          while ($row_notas = mysqli_fetch_assoc($result_notas)) {
                        ?>
                          <!-- Esto se repite por cada imagen de Notas -->
                          <div class="thumbnail" style="background-image: url('<?=$path_image.$row_notas['nota']?>')">
                            <div class="close-button-db">
                              <a href="<?=$path_image.$row_notas['nota']?>" data-lightbox="galleryNotas" data-title="Notas">
                                <i class="fas fa-eye"></i>
                              </a>
                              <a href="<?=$path_image.$row_notas['nota']?>" download="<?php echo ('notas' . $row['ci']) ?>">
                                <i class="fas fa-download"></i>
                              </a>
                            </div>
                          </div>
                          <!--  /Esto se repite por cada imagen de Notas -->
                        <?php
                          };
                        };
                        ?>

                      </div>
                    </div>

                  </div>
                  <!-- End Notas -->

                  <hr class="sidebar-divider">
                  <br>

                  <!-- Fondo -->
                  <div class="form-group row">

                    <div class="col-md-12 text-md-center col-lg-4 text-lg-left my-auto">
                      <h5 class="text-gray-900 row">
                        <div class="col-2"><i
                            class="fas fa-<?php echo ($row['check_fondo'] == 0) ? 'minus-circle text-secondary' : 'check-circle text-success' ?> pr-3"></i>
                        </div>
                        <div class="col-10 text-justify">Titulo de bachillerato autenticado</div>
                      </h5>
                    </div>

                    <div class="text-sm-left col-md-12 text-md-center col-lg-8 text-lg-left my-auto">
                      <div id="preview-images-fondo" class="preview-images">
                        <?php
                        if ($row['fondo'] != '') {
                        ?>
                          <div class="thumbnail" style="background-image: url('<?=$path_image.$row['fondo']?>')">
                            <div class="close-button-db">
                              <a href="<?=$path_image.$row['fondo']?>" data-lightbox="galleryFondo" data-title="Fondo">
                                <i class="fas fa-eye"></i>
                              </a>
                              <a href="<?=$path_image.$row['fondo']?>" download="<?php echo ('fondo' . $row['ci']) ?>">
                                <i class="fas fa-download"></i>
                              </a>
                            </div>
                          </div>
                        <?php
                        };
                        ?>
                      </div>
                    </div>

                  </div>
                  <!-- End Fondo -->

                  <hr class="sidebar-divider">
                  <br>

                  <!-- Rusnies -->
                  <div class="form-group row">

                    <div class="col-md-12 text-md-center col-lg-4 text-lg-left my-auto">
                      <h5 class="text-gray-900 row">
                        <div class="col-2"><i
                            class="fas fa-<?php echo ($row['check_rusinies'] == 0) ? 'minus-circle text-secondary' : 'check-circle text-success' ?> pr-3"></i>
                        </div>
                        <div class="col-10 text-justify">Resultado del RUSNIES</div>
                      </h5>
                    </div>

                    <div class="text-sm-left col-md-12 text-md-center col-lg-8 text-lg-left my-auto">
                      <div id="preview-images-rusnies" class="preview-images">

                        <?php
                        $sql_rusnies = "SELECT * FROM rusnies
                                        WHERE documento = '$id_documento';";

                        $result_rusnies = mysqli_query($conexion, $sql_rusnies);
                        if ($result_rusnies->num_rows > 0) {
                          while ($row_rusnies = mysqli_fetch_assoc($result_rusnies)) {
                        ?>
                          <!-- Esto se repite por cada imagen de Rusnies -->
                          <div class="thumbnail" style="background-image: url('<?=$path_image.$row_rusnies['rusnies']?>')">
                            <div class="close-button-db">
                              <a href="<?=$path_image.$row_rusnies['rusnies']?>" data-lightbox="galleryRusnies" data-title="Rusnies">
                                <i class="fas fa-eye"></i>
                              </a>
                              <a href="<?=$path_image.$row_rusnies['rusnies']?>" download="<?php echo ('rusnies' . $row['ci']) ?>">
                                <i class="fas fa-download"></i>
                              </a>
                            </div>
                          </div>
                          <!--  /Esto se repite por cada imagen de Rusnies -->
                        <?php
                          };
                        };
                        ?> 

                      </div>
                    </div>

                  </div>
                  <!-- End rusnies -->

                  <hr class="sidebar-divider">
                  <br>

                  <!-- Partida -->
                  <div class="form-group row">

                    <div class="col-md-12 text-md-center col-lg-4 text-lg-left my-auto">
                      <h5 class="text-gray-900 row">
                        <div class="col-2"><i
                            class="fas fa-<?php echo ($row['check_partida'] == 0) ? 'minus-circle text-secondary' : 'check-circle text-success' ?> pr-3"></i>
                        </div>
                        <div class="col-10 text-justify">Partida de nacimiento</div>
                      </h5>
                    </div>
                    <div class="text-sm-left col-md-12 text-md-center col-lg-8 text-lg-left my-auto">
                      <div id="preview-images-partida" class="preview-images">
                        <?php
                        if ($row['partida'] != '') {
                        ?>
                          <div class="thumbnail" style="background-image: url('<?=$path_image.$row['partida']?>')">
                            <div class="close-button-db">
                              <a href="<?=$path_image.$row['partida']?>" data-lightbox="galleryPartida" data-title="Partida">
                                <i class="fas fa-eye"></i>
                              </a>
                              <a href="<?=$path_image.$row['partida']?>" download="<?php echo ('partida' . $row['ci']) ?>">
                                <i class="fas fa-download"></i>
                              </a>
                            </div>
                          </div>
                        <?php
                        };
                        ?>
                      </div>
                    </div>

                  </div>
                  <!-- End Partida -->

                  <hr class="sidebar-divider">
                  <br>

                  <!-- Metodo -->
                  <div class="form-group row">

                    <div class="col-md-12 text-md-center col-lg-4 text-lg-left my-auto">
                      <h5 class="text-gray-900 row">
                        <div class="col-2"><i
                            class="fas fa-<?php echo ($row['check_metodo'] == 0) ? 'minus-circle text-secondary' : 'check-circle text-success' ?> pr-3"></i>
                        </div>
                        <div class="col-10 text-justify">Metodo de ingreso:
                          <small><?=$row['nombre_solicitud']?></small>
                        </div>
                      </h5>
                    </div>

                    <div class="text-sm-left col-md-12 text-md-center col-lg-8 text-lg-left my-auto">
                      <div id="preview-images-metodo" class="preview-images">

                        <?php
                        $sql_metodoing = "SELECT * FROM metodoing
                                          WHERE documento = '$id_documento';";

                        $result_metodoing = mysqli_query($conexion, $sql_metodoing);
                        if ($result_metodoing->num_rows > 0) {
                          while ($row_metodoing = mysqli_fetch_assoc($result_metodoing)) {
                        ?>
                          <!-- Esto se repite por cada imagen de Metodo -->
                          <div class="thumbnail" style="background-image: url('<?=$path_image.$row_metodoing['metodo']?>')">
                            <div class="close-button-db">
                              <a href="<?=$path_image.$row_metodoing['metodo']?>" data-lightbox="galleryMetodo" data-title="Metodo">
                                <i class="fas fa-eye"></i>
                              </a>
                              <a href="<?=$path_image.$row_metodoing['metodo']?>" download="<?php echo ('metodo' . $row['ci']) ?>">
                                <i class="fas fa-download"></i>
                              </a>
                            </div>
                          </div>
                          <!--  /Esto se repite por cada imagen de Metodo -->
                        <?php
                          };
                        };
                        ?> 

                      </div>
                    </div>

                  </div>
                  <!-- End Metodo -->

                </div>
              </div>
            </div>
            <!-- /Tabla de Status de Documentos -->

          </div>
          <!-- /.Perfil alumno -->

        </div>
        <!-- /.Contenido Variable - Todo lo demas es fijo -->
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php require 'front/general/footer.php';?>
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
  <?php require 'front/general/modal-logout.php';?>
  <!-- End of Logout Modal-->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages / carga automaticamente dashboard.php-->
  <script src="js/sb-admin-2.js"></script>

  <script src="js/lightbox-plus-jquery.js"></script>
  <!-- Imprimir Areas Especeficas -->
  <script>
    document.querySelector("#btnImprimirPerfil").addEventListener("click", function () {
      var div = document.querySelector("#imprimirPerfil");
      imprimirElemento(div);
    });

    function imprimirElemento(elemento) {
      var ventana = window.open('', 'PRINT', 'height=400,width=600');
      ventana.document.write('<html><head><title>' + document.title + '</title>');
      ventana.document.write(
        '<link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">'); //Aquí agregué la hoja de estilos
      ventana.document.write('<link rel="stylesheet" href="css/font.css">');
      ventana.document.write('<link rel="stylesheet" href="css/sb-admin-2.css">');
      ventana.document.write('<link rel="stylesheet" href="css/style.css">');
      ventana.document.write('<link rel="stylesheet" href="css/check.css">');

      ventana.document.write('</head><body >');
      ventana.document.write('<div class="container-fluid bg-white align-items-center text-center topbar mb-2 px-5">');
      ventana.document.write('<a class="navbar-brand align-items-center">');
      ventana.document.write(
        '<img src="img/varias/logo_ujap_peq.png" width="35" height="40" class="d-inline-block align-items-center">');
      ventana.document.write('<b class="pl-4">Control de estudios / Sistema de archivo digital</b>');
      ventana.document.write('</a>');
      ventana.document.write('</div>');

      ventana.document.write(elemento.innerHTML);
      ventana.document.write('</body></html>');
      ventana.document.close();
      ventana.focus();
      ventana.onload = function () {
        ventana.print();
        ventana.close();
      };
      return true;
    }
  </script>
<!-- /.Imprimir Areas Especeficas -->
</body>

</html>