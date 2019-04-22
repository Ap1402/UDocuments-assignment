<!--
  Oye, sera que se puede mandar una variable que permita editar solo si no ha sido chequeado por control de estudios?
  porque hay veces que uno se equivoca y quiere modificar algunas cosas
  esto optimizaria tiempo, porque sino va a tener que estar diciendole al de control de estudios que se 
  equivoco en tal parte que si lo puede corregir o que se yo.
-->
<?php
$admin = 0; // probando que sea admin para restringir la edicion de algunos campos
$check_foto = 1; // verificar si fue o no chequeado por control de estudios
$check_cedula = 1;
$check_fondo = 1;
$check_notas = 0;
$check_partida = 1;
$check_rusnies = 0;
$check_metodo = 1;

// Iniciando valores
$cedula = '';

?>
<!-- Formulario Editar Documentos -->
<div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="p-4">
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-4">Documentos del alumno</h1>
        </div>
        <form id="documentosEditForm" method"POST" class="user needs-validation" novalidate>

          <br>
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
                  <input type="file" id="foto" name="foto[]" accept="image/*" class="input-file">
                  <div class="icon-camera"></div>
                </div>
                <div id="preview-images-foto" class="preview-images">
                  <!-- Repetir con todas las rutas cargadas -->
                  <div class="thumbnail" data-id="<?php echo (str_shuffle('AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_')) ?>"
                    style="background-image: url('<?php echo $foto ?>')">
                    <div class="close-button"
                      <?php echo ($admin == 1 || $check_foto == 0) ? '' : 'hidden' ?>>
                      x
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <h5 id="success-foto" class="success text-center pt-1" data-upload="0"></h5>

          </div>
          <!-- End of Foto -->

          <!-- Cedula -->
          <div class="wrapper-file">
            <br>
            <div class="text-center">
              <h5 class="text-gray-900">Cedula</h5>
            </div>
            <br>
            <div class="container-input">
              <div class="wrap-file">
                <div class="content-icon-camera">
                  <input type="file" id="cedula" name="cedula[]" accept="image/*" class="input-file">
                  <div class="icon-camera"></div>
                </div>
                <div id="preview-images-cedula" class="preview-images">
                  <!-- Repetir con todas las rutas cargadas -->
                  <div class="thumbnail" data-id="<?php echo (str_shuffle('AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_')) ?>"
                    style="background-image: url('<?php echo $cedula ?>')">
                    <div class="close-button"
                      <?php echo ($admin == 1 || $check_cedula == 0) ? '' : 'hidden' ?>>
                      x
                    </div>
                  </div>

                </div>
              </div>

            </div>

            <h5 id="success-cedula" class="success text-center pt-1" data-upload="0"></h5>

          </div>
          <!-- End of Cedula -->

          <!-- Fondo -->
          <div class="wrapper-file">
            <br>
            <div class="text-center">
              <h5 class="text-gray-900">Fondo negro(titulo)</h5>
            </div>
            <br>

            <div class="container-input">
              <div class="wrap-file">
                <div class="content-icon-camera">
                  <input type="file" id="fondo" name="fondo[]" accept="image/*" class="input-file">
                  <div class="icon-camera"></div>
                </div>
                <div id="preview-images-fondo" class="preview-images">
                  <!-- Repetir con todas las rutas cargadas -->
                  <div class="thumbnail" data-id="<?php echo (str_shuffle('AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_')) ?>"
                    style="background-image: url('<?php echo $fondo ?>')">
                    <div class="close-button"
                      <?php echo ($admin == 1 || $check_fondo == 0) ? '' : 'hidden' ?>>
                      x
                    </div>
                  </div>

                </div>
              </div>

            </div>

            <h5 id="success-fondo" class="success text-center pt-1" data-upload="0"></h5>

          </div>
          <!-- End of Fondo -->


          <!-- Notas -->
          <div class="wrapper-file">
            <br>
            <div class="text-center">
              <h5 class="text-gray-900">Notas certificadas (1er a 5to)</h5>
            </div>

            <br>
            <div class="container-input">
              <div class="wrap-file">
                <div class="content-icon-camera">
                  <input type="file" id="notas" name="notas[]" accept="image/*" class="input-file" multiple>
                  <div class="icon-camera"></div>
                </div>
                <div id="preview-images-notas" class="preview-images">
                  <!-- Repetir con todas las rutas cargadas -->
                  <div class="thumbnail" data-id="<?php echo (str_shuffle('AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_')) ?>"
                    style="background-image: url('<?php echo $notas ?>')">
                    <div class="close-button"
                      <?php echo ($admin == 1 || $check_notas == 0) ? '' : 'hidden' ?>>
                      x
                    </div>
                  </div>

                </div>
              </div>

            </div>

            <h5 id="success-notas" class="success text-center pt-1" data-upload="0"></h5>

          </div>
          <!-- End of Notas -->

          <!-- Partida de nacimiento -->
          <div class="wrapper-file">
            <br>
            <div class="text-center">
              <h5 class="text-gray-900">Partida de nacimiento</h5>
            </div>
            <br>

            <div class="container-input">
              <div class="wrap-file">
                <div class="content-icon-camera">
                  <input type="file" id="partida" name="partida[]" accept="image/*" class="input-file" multiple>
                  <div class="icon-camera"></div>
                </div>
                <div id="preview-images-partida" class="preview-images">
                  <!-- Repetir con todas las rutas cargadas -->
                  <div class="thumbnail" data-id="<?php echo (str_shuffle('AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_')) ?>"
                    style="background-image: url('<?php echo $partida ?>')">
                    <div class="close-button"
                      <?php echo ($admin == 1 || $check_partida == 0) ? '' : 'hidden' ?>>
                      x
                    </div>
                  </div>

                </div>
              </div>

            </div>

            <h5 id="success-partida" class="success text-center pt-1" data-upload="0"></h5>

          </div>
          <!-- End of Partida de nacimiento -->

          <!-- Resultado Rusnies -->
          <div class="wrapper-file">
            <br>
            <div class="text-center">
              <h5 class="text-gray-900">Resultado RUSNIES</h5>
            </div>
            <br>

            <div class="container-input">
              <div class="wrap-file">
                <div class="content-icon-camera">
                  <input type="file" id="rusnies" name="rusnies[]" accept="image/*" class="input-file" multiple>
                  <div class="icon-camera"></div>
                </div>
                <div id="preview-images-rusnies" class="preview-images">
                  <!-- Repetir con todas las rutas cargadas -->
                  <div class="thumbnail" data-id="<?php echo (str_shuffle('AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_')) ?>"
                    style="background-image: url('<?php echo $rusnies ?>')">
                    <div class="close-button"
                      <?php echo ($admin == 1 || $check_rusnies == 0) ? '' : 'hidden' ?>>
                      x
                    </div>
                  </div>

                </div>
              </div>

            </div>

            <h5 id="success-rusnies" class="success text-center pt-1" data-upload="0"></h5>

          </div>
          <!-- End of Resultado Rusnies -->

          <!-- Metodo de ingreso -->
          <div class="wrapper-file">
            <br>
            <div class="text-center">
              <h5 class="text-gray-900">Metodo de ingreso</h5>
              <small>Aprobacion de ingreso directo, tramitacion de
                equivalencias o certificado de salud (Solo odontologia)</small>
            </div>
            <br>

            <div class="container-input">
              <div class="wrap-file">
                <div class="content-icon-camera">
                  <input type="file" id="metodo" name="metodo[]" accept="image/*" class="input-file" multiple>
                  <div class="icon-camera"></div>
                </div>
                <div id="preview-images-metodo" class="preview-images">
                  <!-- Repetir con todas las rutas cargadas -->
                  <div class="thumbnail" data-id="<?php echo (str_shuffle('AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_')) ?>"
                    style="background-image: url('<?php echo $foto ?>')">
                    <div class="close-button"
                      <?php echo ($admin == 1 || $check_metodo == 0) ? '' : 'hidden' ?>>
                      x
                    </div>
                  </div>

                </div>
              </div>

            </div>
            <div id="preload" class="preload">
              <img src="img/images/preload.gif" alt="preload">
            </div>
            <h5 id="success-metodo" class="success text-center pt-1" data-upload="0"></h5>

          </div>
          <!-- End of Metodo de ingreso -->

          <br>
          <br>
          <!-- <button type="submit" class="publish">Subir</button> -->
          <a data-toggle="modal" data-target="#cambiosModal">
            <button id="permisoModal" class="btn btn-primary btn-user btn-block">
            Guardar cambios
          </button>
          <button id="enviarDocs" type="submit" hidden></button>
          </a>
          

          <br>
          <div class="alert alert-danger" role="alert" id="resultado" hidden></div>
          <br>
          <br>


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
        Seleccione "Guardar cambios" a continuación si está seguro de continuar con la operacion.<br>
        <b>Los archivos eliminados no pueden ser restablecidos.</b>
      </div>
      <div class="modal-footer">
        <label><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button></label>
        <label class="text-white" for="enviarDocs"><a class="btn btn-primary">Guardar
            cambios</a></label>
      </div>
    </div>
  </div>
</div>
<!-- Page level custom scripts -->
<script src="js/front/form-validation.js"></script>