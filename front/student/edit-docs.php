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
$path_image = 'back/Documentos/'.$cedula.'/cedula_0_04-28-19001051.jpg';
$file_id = 'rusnies';

?>
<!-- Formulario Editar Documentos -->
<div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="p-4">
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-4">Editar - Documentos</h1>
        </div>

        <br>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <i class="fas fa-exclamation-triangle"></i>
          <strong>Advertencia!</strong>
          Todos los cambios realizados en este formulario se hacen de manera <strong>permanente!</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            &times;
          </button>
        </div>
        <br>

        <select id="seleccion" name="seleccion" class="form-control">
          <option disabled selected value="">Elija el documento a editar</option>
          <option <?php echo ($admin == 1 || $check_cedula == 0) ? '' : 'hidden' ?> value="1">Cedula</option>
          <option <?php echo ($admin == 1 || $check_foto == 0) ? '' : 'hidden' ?> value="2">Foto</option>
          <option <?php echo ($admin == 1 || $check_notas == 0) ? '' : 'hidden' ?> value="3">Notas</option>
          <option <?php echo ($admin == 1 || $check_fondo == 0) ? '' : 'hidden' ?> value="4">Fondo</option>
          <option <?php echo ($admin == 1 || $check_rusnies == 0) ? '' : 'hidden' ?> value="5">Rusnies</option>
          <option <?php echo ($admin == 1 || $check_partida == 0) ? '' : 'hidden' ?> value="6">Partida</option>
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

                  <div class="thumbnail" data-id="<?php echo (str_shuffle('AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_')) ?>"
                    style="background-image: url('<?php echo $path_image ?>')">
                    <div class="close-button-db">
                      <span data-path='<?php echo $path_image ?>' data-cedula='<?php echo $cedula ?>'>&times;</span>
                      <a href="<?php echo $path_image ?>" data-lightbox="gallery" data-title="<?php echo $file_id ?>">
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
          <br>
          <!-- <button type="submit" class="publish">Subir</button> -->
          <a data-toggle="modal" data-target="#cambiosModal">
            <button id="permisoModal" class="btn btn-primary btn-user btn-block">
              Guardar archivos nuevos
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