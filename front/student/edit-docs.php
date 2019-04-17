<!-- DataTales Example -->
<div class="col-sm-12 col-md-10 col-lg-6 mx-auto">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="p-4">
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-4">Documentos del alumno</h1>
        </div>
        <form id="documentosEditForm" method"POST" class="user needs-validation" novalidate>
          <br>
          <div class="alert alert-success" role="alert" id="exito" hidden></div>
          <br>

          <br>
          <div class="text-center">
            <h5 class="text-gray-900 mb-4">Foto tipo carnet</h5>
          </div>
          <br>

          <div class="form-group row">
            <div class="col">
              <input type="file" class="form-control form-control-user" id="foto"
                aria-describedby="inputGroupFileAddon01" required>
              <div class="invalid-feedback">
                Por favor seleccione un archivo.
              </div>
            </div>

          </div>

          <br>
          <div class="text-center">
            <h5 class="text-gray-900 mb-4">Cédula de identidad</h5>
          </div>
          <br>

          <div class="form-group row">
            <div class="col">
              <input type="file" class="form-control form-control-user" id="img_cedula"
                aria-describedby="inputGroupFileAddon02" required>
              <div class="invalid-feedback">
                Por favor seleccione un archivo.
              </div>
            </div>

          </div>

          <br>
          <div class="text-center">
            <h5 class="text-gray-900 mb-4">Título de bachiller autenticado</h5>
          </div>
          <br>

          <div class="form-group row">
            <div class="col">
              <input type="file" class="form-control form-control-user" id="img_titulo"
                aria-describedby="inputGroupFileAddon03" required>
              <div class="invalid-feedback">
                Por favor seleccione un archivo.
              </div>
            </div>

          </div>

          <br>
          <div class="text-center">
            <h5 class="text-gray-900 mb-4">Notas certificadas de bachillerato (1er a 5to)</h5>
          </div>
          <br>

          <div class="form-group row">
            <div class="col">
              <input type="file" class="form-control form-control-user" id="img_notas" multiple
                aria-describedby="inputGroupFileAddon04" required>
              <div class="invalid-feedback">
                Por favor seleccione un archivo.
              </div>
            </div>

          </div>

          <br>
          <div class="text-center">
            <h5 class="text-gray-900 mb-4">Partida de nacimiento</h5>
          </div>
          <br>

          <div class="form-group row">
            <div class="col">
              <input type="file" class="form-control form-control-user" id="img_partida"
                aria-describedby="inputGroupFileAddon05" required>
              <div class="invalid-feedback">
                Por favor seleccione un archivo.
              </div>
            </div>

          </div>

          <br>
          <div class="text-center">
            <h5 class="text-gray-900 mb-4">Resultado de RUSNIES</h5>
          </div>
          <br>

          <div class="form-group row">
            <div class="col">
              <input type="file" class="form-control form-control-user" id="img_rusnies"
                aria-describedby="inputGroupFileAddon06" required>
              <div class="invalid-feedback">
                Por favor seleccione un archivo.
              </div>
            </div>

          </div>

          <br>
          <div class="text-center">
            <h5 class="text-gray-900 mb-4">Aprobación de metodo de ingreso</h5>
          </div>
          <br>

          <div class="form-group row">
            <div class="col">
              <input type="text" id="metodo_ingreso" name="metodo_ingreso" class="form-control form-control-user"
                placeholder="Metodo de ingreso" minlength="4">
              <div class="invalid-feedback">
                Por favor introduzca un metodo de ingreso válida.
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col">
              <input type="file" class="form-control form-control-user" id="img_ingreso"
                aria-describedby="inputGroupFileAddon07" required>
              <div class="invalid-feedback">
                Por favor seleccione un archivo.
              </div>
            </div>

          </div>

          <br>
          <div class="alert alert-danger" role="alert" id="resultado" hidden></div>
          <br>

          <button id="editDoc" type="submit" class="btn btn-primary btn-user btn-block">
            Enviar datos
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Page level custom scripts -->
<script src="js/front/form-validation.js"></script>