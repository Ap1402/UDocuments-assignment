<?php

$check_foto = 1; // verificar si fue o no chequeado por control de estudios
$check_cedula = 0;
$check_fondo = 1;
$check_notas = 0;
$check_partida = 1;
$check_rusnies = 1;
$check_metodo = 0;

// -------- Porcentaje de Documentos

$porcentaje = ($check_foto + $check_cedula + $check_fondo + $check_notas + $check_partida + $check_rusnies + $check_metodo)*100/7;
$porcentaje = round($porcentaje , 0, PHP_ROUND_HALF_UP);

// -------- /Porcentaje de Documentos

// Iniciando valores
$cedula = '21217885';


// rura de la imagen (ruta completa ejemplo: back/Documentos/12345678/nirvana.jpg )
$path_image = 'back/documentos/'.$cedula.'/cedula_0_04-28-19001051.jpg';

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

<!-- Formulario Check Documentos -->
<div class="col-sm-12 col-lg-10 mx-auto">
  <!-- Header Status de Documentos -->
  <div class="card border-left-primary h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center px-2">
        <div class="col pr-2">
          <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">Información del alumno</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="h5 mb-0 pr-3 font-weight-bold text-gray-800">Ultima actualización: </div>
            </div>
            <div class="col">
              <?php echo $ultActualizacion ?>
            </div>
          </div>
        </div>
        <div class="col-auto">
          <a href="page-edit-datos.php" data-toggle="tooltip" data-placement="top" title="Editar información">
            <i class="fas fa-user-edit fa-2x text-gray-300"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- /Header Status de Documentos -->

  <!-- Tabla de Status de Documentos -->
  <div class="card border-left-primary shadow mb-4">
    <div class="card-body">
      <div class="p-4">

        <div class="form-group row">
          <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <label class="pl-2 pt-2">Primer nombre</label><br>
            <input type="text" value="<?php echo $p_nombre ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <label class="pl-2 pt-2">Segundo nombre</label><br>
            <input type="text" value="<?php echo $s_nombre ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <label class="pl-2 pt-2">Primer apellido</label><br>
            <input type="text" value="<?php echo $p_apellido ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <label class="pl-2 pt-2">Segundo apellido</label><br>
            <input type="text" value="<?php echo $s_apellido ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-8 col-xl-6">
            <label class="pl-2 pt-2">Correo</label><br>
            <input type="text" value="<?php echo $correo ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-8 col-xl-6">
            <label class="pl-2 pt-2">Nombre de usuario</label><br>
            <input type="text" value="<?php echo $username ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <label class="pl-2 pt-2">Cédula</label><br>
            <input type="text" value="<?php echo $cedula ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <label class="pl-2 pt-2">Estado civil</label><br>
            <input type="text" value="<?php echo $estado_civil ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <label class="pl-2 pt-2">Fecha de nacimiento</label><br>
            <input type="text" value="<?php echo $fecha_nacimiento ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <label class="pl-2 pt-2">Discapacidad</label><br>
            <input type="text" value="<?php echo $discapacidad.'/'.$tipo_disc ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-4">
            <label class="pl-2 pt-2">Teléfono de habitación</label><br>
            <input type="text" value="<?php echo $habitacion ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-4">
            <label class="pl-2 pt-2">Teléfono móvil</label><br>
            <input type="text" value="<?php echo $movil ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-4">
            <label class="pl-2 pt-2">Teléfono de trabajo</label><br>
            <input type="text" value="<?php echo $trabajo ?>" class="form-control" disabled>
          </div>

        </div>


        <br>
        <div class="text-center">
          <h5 class="text-gray-900 mb-4">Lugar de nacimiento</h5>
        </div>
        <hr class="sidebar-divider">
        <br>

        <div class="form-group row">
          <div class="col-sm-12 col-md-6 col-xl-3">
            <label class="pl-2 pt-2">País</label><br>
            <input type="text" value="<?php echo $pais ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6 col-xl-3">
            <label class="pl-2 pt-2">Estado</label><br>
            <input type="text" value="<?php echo $estado ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6 col-xl-3">
            <label class="pl-2 pt-2">Ciudad</label><br>
            <input type="text" value="<?php echo $ciudad ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6 col-xl-3">
            <label class="pl-2 pt-2">Municipio</label><br>
            <input type="text" value="<?php echo $municipio ?>" class="form-control" disabled>
          </div>
        </div>


        <br>
        <div class="text-center">
          <h5 class="text-gray-900 mb-4">Dirección de habitación</h5>
        </div>
        <hr class="sidebar-divider">
        <br>

        <div class="form-group row">
          <div class="col-sm-12 col-md-6 col-xl-3">
            <label class="pl-2 pt-2">Estado</label><br>
            <input type="text" value="<?php echo $nac_estado ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6 col-xl-3">
            <label class="pl-2 pt-2">Ciudad</label><br>
            <input type="text" value="<?php echo $nac_ciudad ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6 col-xl-3">
            <label class="pl-2 pt-2">Municipio</label><br>
            <input type="text" value="<?php echo $nac_municipio ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6 col-xl-3">
            <label class="pl-2 pt-2">Zona postal</label><br>
            <input type="text" value="<?php echo $nac_postal ?>" class="form-control" disabled>
          </div>
        </div>

        <br>
        <div class="text-center">
          <h5 class="text-gray-900 mb-4">Dirección de trabajo</h5>
        </div>
        <hr class="sidebar-divider">
        <br>

        <div class="form-group row">
          <div class="col-sm-12 col-md-6 col-xl-3">
            <label class="pl-2 pt-2">Estado</label><br>
            <input type="text" value="<?php echo $t_estado ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6 col-xl-3">
            <label class="pl-2 pt-2">Ciudad</label><br>
            <input type="text" value="<?php echo $t_ciudad ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6 col-xl-3">
            <label class="pl-2 pt-2">Municipio</label><br>
            <input type="text" value="<?php echo $t_municipio ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6 col-xl-3">
            <label class="pl-2 pt-2">Zona postal</label><br>
            <input type="text" value="<?php echo $t_postal ?>" class="form-control" disabled>
          </div>
        </div>

        <br>
        <div class="text-center">
          <h5 class="text-gray-900 mb-4">Contacto en caso de emergencia</h5>
        </div>
        <hr class="sidebar-divider">
        <br>

        <div class="form-group row">
          <div class="col-sm-12 col-md-6 col-xl-3">
            <label class="pl-2 pt-2">Nombre y apellido</label><br>
            <input type="text" value="<?php echo $e_nombre ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6 col-xl-3">
            <label class="pl-2 pt-2">Parentesco</label><br>
            <input type="text" value="<?php echo $parentesco ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6 col-xl-3">
            <label class="pl-2 pt-2">Teléfono local</label><br>
            <input type="text" value="<?php echo $e_local ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6 col-xl-3">
            <label class="pl-2 pt-2">Teléfono móvil</label><br>
            <input type="text" value="<?php echo $e_movil ?>" class="form-control" disabled>
          </div>
        </div>

        <br>
        <div class="text-center">
          <h5 class="text-gray-900 mb-4">Datos título de bachiller</h5>
        </div>
        <hr class="sidebar-divider">
        <br>

        <div class="form-group row">
          <div class="col-sm-12">
            <label class="pl-2 pt-2">Nombre de la institución (no abreviar)</label><br>
            <input type="text" value="<?php echo $i_nombre ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6">
            <label class="pl-2 pt-2">Año de egreso</label><br>
            <input type="text" value="<?php echo $i_egreso ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6">
            <label class="pl-2 pt-2">Código de la institución</label><br>
            <input type="text" value="<?php echo $i_codigo ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6">
            <label class="pl-2 pt-2">Estado</label><br>
            <input type="text" value="<?php echo $i_estado ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6">
            <label class="pl-2 pt-2">Tipo de institución</label><br>
            <input type="text" value="<?php echo $tipo_inst ?>" class="form-control" disabled>
          </div>
        </div>

        <br>
        <div class="text-center">
          <h5 class="text-gray-900 mb-4">Carrera</h5>
        </div>
        <hr class="sidebar-divider">
        <br>

        <div class="form-group row">
          <div class="col-sm-12 col-md-6">
            <label class="pl-2 pt-2">Carrera</label><br>
            <input type="text" value="<?php echo $carrera ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12 col-md-6">
            <label class="pl-2 pt-2">Turno</label><br>
            <input type="text" value="<?php echo $turno ?>" class="form-control" disabled>
          </div>
          <div class="col-sm-12">
            <label class="pl-2 pt-2">Método de ingreso</label><br>
            <input type="text" value="<?php echo $nombre_solicitud ?>" class="form-control" disabled>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- /Tabla de Status de Documentos -->

  <!-- Header Status de Documentos -->

  <div class="card border-left-info h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center px-2">
        <div class="col pr-2">
          <div class="text-sm font-weight-bold text-info text-uppercase mb-1">Estatus de Documentos</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="h5 mb-0 pr-3 font-weight-bold text-gray-800"><?php echo $porcentaje ?>%</div>
            </div>
            <div class="col">
              <div class="progress progress-sm mr-2">
                <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $porcentaje ?>%"
                  aria-valuenow="<?php echo $porcentaje ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-auto">
          <a href="page-edit-docs.php" data-toggle="tooltip" data-placement="top" title="Editar documentos">
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
                  class="fas fa-<?php echo ($check_foto == 0) ? 'minus-circle text-secondary' : 'check-circle text-success' ?> pr-3"></i>
              </div>
              <div class="col-10 text-justify">Foto reciente tipo carnet</div>
            </h5>
          </div>

          <div class="text-sm-left col-md-12 text-md-center col-lg-8 text-lg-left my-auto">
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

          <div class="col-md-12 text-md-center col-lg-4 text-lg-left my-auto">
            <h5 class="text-gray-900 row">
              <div class="col-2"><i
                  class="fas fa-<?php echo ($check_cedula == 0) ? 'minus-circle text-secondary' : 'check-circle text-success' ?> pr-3"></i>
              </div>
              <div class="col-10 text-justify">Cedula</div>
            </h5>
          </div>

          <div class="text-sm-left col-md-12 text-md-center col-lg-8 text-lg-left my-auto">
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

          <div class="col-md-12 text-md-center col-lg-4 text-lg-left my-auto">
            <h5 class="text-gray-900 row">
              <div class="col-2"><i
                  class="fas fa-<?php echo ($check_notas == 0) ? 'minus-circle text-secondary' : 'check-circle text-success' ?> pr-3"></i>
              </div>
              <div class="col-10 text-justify">Notas certificadas de bachillerato (1er a 5to)</div>
            </h5>
          </div>

          <div class="text-sm-left col-md-12 text-md-center col-lg-8 text-lg-left my-auto">
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

          <div class="col-md-12 text-md-center col-lg-4 text-lg-left my-auto">
            <h5 class="text-gray-900 row">
              <div class="col-2"><i
                  class="fas fa-<?php echo ($check_fondo == 0) ? 'minus-circle text-secondary' : 'check-circle text-success' ?> pr-3"></i>
              </div>
              <div class="col-10 text-justify">Titulo de bachillerato autenticado</div>
            </h5>
          </div>

          <div class="text-sm-left col-md-12 text-md-center col-lg-8 text-lg-left my-auto">
            <div id="preview-images-fondo" class="preview-images">

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

            </div>
          </div>

        </div>
        <!-- End Fondo -->

        <br>
        <hr class="sidebar-divider">
        <br>

        <!-- Rusnies -->
        <div class="form-group row">

          <div class="col-md-12 text-md-center col-lg-4 text-lg-left my-auto">
            <h5 class="text-gray-900 row">
              <div class="col-2"><i
                  class="fas fa-<?php echo ($check_rusnies == 0) ? 'minus-circle text-secondary' : 'check-circle text-success' ?> pr-3"></i>
              </div>
              <div class="col-10 text-justify">Resultado del RUSNIES</div>
            </h5>
          </div>

          <div class="text-sm-left col-md-12 text-md-center col-lg-8 text-lg-left my-auto">
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

          <div class="col-md-12 text-md-center col-lg-4 text-lg-left my-auto">
            <h5 class="text-gray-900 row">
              <div class="col-2"><i
                  class="fas fa-<?php echo ($check_partida == 0) ? 'minus-circle text-secondary' : 'check-circle text-success' ?> pr-3"></i>
              </div>
              <div class="col-10 text-justify">Partida de nacimiento</div>
            </h5>
          </div>
          <div class="text-sm-left col-md-12 text-md-center col-lg-8 text-lg-left my-auto">
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

          <div class="col-md-12 text-md-center col-lg-4 text-lg-left my-auto">
            <h5 class="text-gray-900 row">
              <div class="col-2"><i
                  class="fas fa-<?php echo ($check_metodo == 0) ? 'minus-circle text-secondary' : 'check-circle text-success' ?> pr-3"></i>
              </div>
              <div class="col-10 text-justify">Metodo de ingreso <br>
                <small><?php echo $nombre_solicitud ?></small>
                </div>
            </h5>
          </div>

          <div class="text-sm-left col-md-12 text-md-center col-lg-8 text-lg-left my-auto">
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

      </div>
    </div>
  </div>
  <!-- /Tabla de Status de Documentos -->

</div>