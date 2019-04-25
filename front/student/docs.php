<!-- DataTales Example -->
<div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="p-4">
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-4">Documentos del alumno</h1>
        </div>
        <form id="docsForm" method="POST" class="user needs-validation" novalidate>

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
                  <input type="file" id="foto" name="foto[]" accept="image/*" class="input-file" >
                  <div class="icon-camera"></div>
                </div>
                <div id="preview-images-foto" class="preview-images">

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
                  <input type="file" id="cedula" name="cedula[]" accept="image/*" class="input-file" >
                  <div class="icon-camera"></div>
                </div>
                <div id="preview-images-cedula" class="preview-images">

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
                  <input type="file" id="fondo" name="fondo[]" accept="image/*" class="input-file" >
                  <div class="icon-camera"></div>
                </div>
                <div id="preview-images-fondo" class="preview-images">

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

                 </div>
               </div>
            
             </div>
             <div id="preload" class="preload">
               <img src="img/images/preload.gif" alt="preload" >
             </div>
             <h5 id="success-metodo" class="success text-center pt-1" data-upload="0"></h5>

           </div>
           <!-- End of Metodo de ingreso -->

           <br>
           <br>
          <!-- <button type="submit" class="publish">Subir</button> -->
          <button id="enviarDocs" type="submit" class="btn btn-primary btn-user btn-block">
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