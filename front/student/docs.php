<!-- DataTales Example -->
<div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="p-4">
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-4">Documentos del alumno</h1>
        </div>

        <select id="seleccion" name="seleccion" class="form-control">
          <option disabled selected value="">Elija el documento a subir</option>
          <option value="1">Cedula</option>
          <option value="2">Foto</option>
          <option value="3">Notas</option>
          <option value="4">Fondo</option>
          <option value="5">Rusnies</option>
          <option value="6">Partida</option>
          <option value="7">Método</option>


        </select>

        <form id="docsForm" method="POST" class="user needs-validation" novalidate>

          <br>
          <div class="alert alert-success" role="alert" id="exito" hidden></div>

          <!--
					Los archivos relacionados estan:
									*server.php
									*js/front/file-upload.js
				-->

          <!-- file -->
          <div class="wrapper-file">
            <br>
            <div class="text-center">
              <h5 class="text-gray-900">Cargar documento</h5>
            </div>
            <br>

            <div class="container-input">
              <div class="wrap-file">
                <div class="content-icon-camera">
                  <input type="file" id="file" name="file" accept="image/*" class="input-file" disabled="true">
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
          <br>
          <!-- <button type="submit" class="publish">Subir</button> -->
          <button id="enviarDocs" type="submit" class="btn btn-primary btn-user btn-block" disabled="true">
            Enviar Documentos
          </button>

          <br>
          <div class="alert alert-danger" role="alert" id="resultado" hidden></div>
          <br>
          <br>

        </form>

      </div>
    </div>
  </div>
</div>