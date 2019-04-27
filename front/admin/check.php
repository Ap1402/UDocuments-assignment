<!--
  Oye, sera que se puede mandar una variable que permita editar solo si no ha sido chequeado por control de estudios?
  porque hay veces que uno se equivoca y quiere modificar algunas cosas
  esto optimizaria tiempo, porque sino va a tener que estar diciendole al de control de estudios que se
  equivoco en tal parte que si lo puede corregir o que se yo.
-->
<?php
include ('../../back/admin/backCheck.php');

?>
<!-- Formulario Check Documentos -->

<div class="col-sm-12 col-lg-10 mx-auto">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="p-4">
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-4">Validar <small class="text-muted"> documentos del alumno</small></h1>
        </div>
        <form id="checkForm" method="POST" class="user needs-validation" novalidate>
          <br>

          <div class="alert alert-success" role="alert" id="exito" hidden></div>
          <br>

          <!-- Foto -->
          <div class="form-group row">

            <div class="col-md-12 text-md-center col-lg-4 text-lg-left my-auto pl-3">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_foto == 0) ? '' : 'checked' ?> class="custom-control-input"
                  id="check_foto">
                <label class="custom-control-label" for="check_foto">
                  <h5 class="text-gray-900 pl-3">Foto reciente tipo carnet</h5>
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

            <div class="col-md-12 text-md-center col-lg-4 text-lg-left my-auto pl-3">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_cedula == 0) ? '' : 'checked' ?> class="custom-control-input" id="check_cedula">
                <label class="custom-control-label" for="check_cedula">
                  <h5 class="text-gray-900 pl-3">Cedula</h5>
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

            <div class="col-md-12 text-md-center col-lg-4 text-lg-left my-auto pl-3">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_notas == 0) ? '' : 'checked' ?> class="custom-control-input"
                  id="check_notas">
                <label class="custom-control-label" for="check_notas">
                  <h5 class="text-gray-900 pl-3">Notas certificadas de bachillerato (1er a 5to)</h5>
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

            <div class="col-md-12 text-md-center col-lg-4 text-lg-left my-auto pl-3">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_fondo == 0) ? '' : 'checked' ?> class="custom-control-input"
                  id="check_fondo">
                <label class="custom-control-label" for="check_fondo">
                  <h5 class="text-gray-900 pl-3">Titulo de bachillerato autenticado</h5>
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

            <div class="col-md-12 text-md-center col-lg-4 text-lg-left my-auto pl-3">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_rusnies == 0) ? '' : 'checked' ?> class="custom-control-input"
                  id="check_rusnies">
                <label class="custom-control-label" for="check_rusnies">
                  <h5 class="text-gray-900 pl-3">Resultado del RUSNIES</h5>
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

            <div class="col-md-12 text-md-center col-lg-4 text-lg-left my-auto pl-3">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_partida == 0) ? '' : 'checked' ?> class="custom-control-input"
                  id="check_partida">
                <label class="custom-control-label" for="check_partida">
                  <h5 class="text-gray-900 pl-3">Partida de nacimiento</h5>
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

            <div class="col-md-12 text-md-center col-lg-4 text-lg-left my-auto pl-3">
              <div class="custom-control custom-switch">
                <input type="checkbox" <?php echo ($check_metodo == 0) ? '' : 'checked' ?> class="custom-control-input"
                  id="check_metodo">
                <label class="custom-control-label" for="check_metodo">
                  <h5 class="text-gray-900">Metodo de ingreso</h5>
                  <small>Aprobacion de ingreso directo, tramitacion de
                    equivalencias o certificado de salud (Solo odontologia)</small>
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

          <br>
          <hr class="sidebar-divider">
          <br>

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
<!-- Page level custom scripts -->
<script src="js/front/form-validation.js"></script>