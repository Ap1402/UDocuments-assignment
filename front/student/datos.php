<!-- Formulario Datos -->

<div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="p-4">
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-4">Datos del alumno<br>
            <small class="text-muted"> asegúrese de rellenar correctamente sus datos</small>
          </h1>
        </div>
        <form id="datosForm" method="POST" class="user needs-validation" novalidate>
          <div class="alert alert-success" role="alert" id="exito" hidden></div>
          <br>

          <div class="form-group row">
            <div class="col-sm-6 my-auto">
              <select id="estado_civil" name="estado_civil" class="form-control" required>
                <option disabled selected value="">Estado civil</option>
                <option value="1">Casado</option>
                <option value="2">Soltero</option>
                <option value="3">Divorciado</option>
                <option value="4">Viudo</option>
              </select>

            </div>
            <div class="col-sm-6 my-auto">
              <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control form-control-user"
                placeholder="Fecha nacimiento" min="1930-07-22" max="<?php echo date('Y-m-d');?>" required>
              <div class="invalid-feedback">
                Por favor introduzca un fecha de nacimiento válido.
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 col-md-6 col-lg-4 my-auto">
              <input type="number" id="habitacion" name="habitacion" class="form-control form-control-user"
                placeholder="Teléfono de habitación" min="2400000000">
              <div class="invalid-feedback">
                Por favor introduzca un teléfono de habitación válido.
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 my-auto">
              <input type="number" id="movil" name="movil" class="form-control form-control-user"
                placeholder="Teléfono móvil" min="4100000000" required>
              <div class="invalid-feedback">
                Por favor introduzca un teléfono móvil válido.
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 my-auto">
              <input type="number" id="trabajo" name="trabajo" class="form-control form-control-user"
                placeholder="Teléfono de trabajo" min="2400000000">
              <div class="invalid-feedback">
                Por favor introduzca un teléfono de trabajo válido.
              </div>
            </div>

          </div>

          <br>
          <div class="text-center">
            <h5 class="text-gray-900 mb-4">Discapacidad</h5>
          </div>
          <hr class="sidebar-divider">
          <br>

          <div class="form-group row">
            <div class="col-12 my-auto">
              <select id="discapacidad" name="discapacidad" class="form-control" required>
                <option value="1">No</option>
                <option value="2">Sí</option>
              </select>
              <div class="invalid-feedback">
                Por favor introduzca una opcion válida.
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-12 my-auto" id="tipo_disc" name="tipo_disc">

            </div>
          </div>


          <br>
          <div class="text-center">
            <h5 class="text-gray-900 mb-4">Lugar de nacimiento</h5>
          </div>
          <hr class="sidebar-divider">
          <br>

          <div class="form-group row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 my-auto">
              <input type="text" id="pais" name="pais" class="form-control form-control-user" placeholder="País"
                minlength="4" required>
              <div class="invalid-feedback">
                Por favor introduzca un País válido.
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 my-auto">
              <input type="text" id="estado" name="estado" class="form-control form-control-user" placeholder="Estado"
                minlength="4" required>
              <div class="invalid-feedback">
                Por favor introduzca un Estado válido.
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 my-auto">
              <input type="text" id="ciudad" name="ciudad" class="form-control form-control-user" placeholder="Ciudad"
                minlength="4" required>
              <div class="invalid-feedback">
                Por favor introduzca un ciudad válido.
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 my-auto">
              <input type="text" id="municipio" name="municipio" class="form-control form-control-user"
                placeholder="municipio" minlength="4" required>
              <div class="invalid-feedback">
                Por favor introduzca un municipio válido.
              </div>
            </div>
          </div>


          <br>
          <div class="text-center">
            <h5 class="text-gray-900 mb-4">Dirección de habitación</h5>
          </div>
          <hr class="sidebar-divider">
          <br>

          <div class="form-group row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 my-auto">
              <input type="text" id="nac_postal" name="nac_postal" class="form-control form-control-user"
                placeholder="Zona postal" minlength="4" required>
              <div class="invalid-feedback">
                Por favor introduzca una Zona postal válida.
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 my-auto">
              <input type="text" id="nac_estado" name="nac_estado" class="form-control form-control-user"
                placeholder="Estado" minlength="4" required>
              <div class="invalid-feedback">
                Por favor introduzca un Estado válido.
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 my-auto">
              <input type="text" id="nac_ciudad" name="nac_ciudad" class="form-control form-control-user"
                placeholder="Ciudad" minlength="4" required>
              <div class="invalid-feedback">
                Por favor introduzca un ciudad válido.
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 my-auto">
              <input type="text" id="nac_municipio" name="nac_municipio" class="form-control form-control-user"
                placeholder="municipio" minlength="4" required>
              <div class="invalid-feedback">
                Por favor introduzca un municipio válido.
              </div>
            </div>
          </div>


          <br>
          <div class="text-center">
            <h5 class="text-gray-900 mb-4">Dirección de trabajo</h5>
          </div>
          <hr class="sidebar-divider">
          <br>

          <div class="form-group row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 my-auto">
              <input type="text" id="t_postal" name="t_postal" class="form-control form-control-user"
                placeholder="Zona postal" minlength="4">
              <div class="invalid-feedback">
                Por favor introduzca una Zona postal válida.
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 my-auto">
              <input type="text" id="t_estado" name="t_estado" class="form-control form-control-user"
                placeholder="Estado" minlength="4">
              <div class="invalid-feedback">
                Por favor introduzca un Estado válido.
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 my-auto">
              <input type="text" id="t_ciudad" name="t_ciudad" class="form-control form-control-user"
                placeholder="Ciudad" minlength="4">
              <div class="invalid-feedback">
                Por favor introduzca un ciudad válido.
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 my-auto">
              <input type="text" id="t_municipio" name="t_municipio" class="form-control form-control-user"
                placeholder="municipio" minlength="4">
              <div class="invalid-feedback">
                Por favor introduzca un municipio válido.
              </div>
            </div>
          </div>


          <br>
          <div class="text-center">
            <h5 class="text-gray-900 mb-4">Contacto en caso de emergencia</h5>
          </div>
          <hr class="sidebar-divider">


          <div class="form-group row">
            <div class="col-sm-12 col-md-6 col-lg-6 pt-3">
              <input type="text" id="e_nombre" name="e_nombre" class="form-control form-control-user"
                placeholder="Nombre y apellido" minlength="8" required>
              <div class="invalid-feedback">
                Por favor introduzca un nombre válido.
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 pt-3">
              <input type="text" id="parentesco" name="parentesco" class="form-control form-control-user"
                placeholder="Parentesco" required>
              <div class="invalid-feedback">
                Por favor introduzca un Parentesco válido.
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 pt-3">
              <input type="number" id="e_local" name="e_local" class="form-control form-control-user"
                placeholder="Teléfono de local" min="2400000000">
              <div class="invalid-feedback">
                Por favor introduzca un teléfono de local válido.
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 pt-3">
              <input type="number" id="e_movil" name="e_movil" class="form-control form-control-user"
                placeholder="Teléfono móvil" min="4100000000" required>
              <div class="invalid-feedback">
                Por favor introduzca un teléfono móvil válido.
              </div>
            </div>
          </div>


          <br>
          <div class="text-center">
            <h5 class="text-gray-900 mb-4">Datos título de bachiller</h5>
          </div>
          <hr class="sidebar-divider">
          <br>


          <div class="form-group row">
            <div class="col">
              <input type="text" id="i_nombre" name="i_nombre" class="form-control form-control-user"
                placeholder="Nombre de la institución (no abreviar)" minlength="11">
              <div class="invalid-feedback">
                Por favor introduzca un nombre de institución válido.
              </div>
            </div>

          </div>

          <div class="form-group row">
            <div class="col-sm-6 my-auto">
              <input type="number" id="i_egreso" name="i_egreso" class="form-control" placeholder="Año de egreso"
                minlength="1930" max="<?php echo date('Y') ?>" required>
              <div class="invalid-feedback">
                Por favor introduzca un año de egreso válido.
              </div>
            </div>
            <div class="col-sm-6 my-auto">
              <input type="text" id="i_codigo" name="i_codigo" class="form-control form-control-user"
                placeholder="Código de la institución" minlength="6" required>
              <div class="invalid-feedback">
                Por favor introduzca un código válido.
              </div>
            </div>
          </div>

          <div class="form-group row">

            <div class="col-sm-6 my-auto">
              <input type="text" id="i_estado" name="i_estado" class="form-control form-control-user"
                placeholder="Estado" minlength="4">
              <div class="invalid-feedback">
                Por favor introduzca un Estado válido.
              </div>
            </div>
            <div class="col-sm-6 my-auto">
              <select id="tipo_inst" name="tipo_inst" class="form-control" required>
                <option disabled selected value="">Tipo de institución</option>
                <option value="1">Privada</option>
                <option value="2">Pública</option>
              </select>
            </div>
          </div>

          <div class="alert alert-danger" role="alert" id="resultado" hidden>
          </div>
          <br>

          <button id="enviarDat" type="submit" class="btn btn-primary btn-user btn-block">
            Guardar
          </button>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- Page level custom scripts -->
<script src="scripts/datos.js"></script>

<script>
  $(document).ready(function () {
    $("#discapacidad").change(function () {
      var selectedOpt = $(this).val();
      if (selectedOpt == 2) {
        var html =
          "<input type='text' id='tipo_discapacidad' name='tipo_discapacidad' class='form-control form-control-user' placeholder='Tipo discapacidad' minlength='4' required><div class='invalid-feedback'>Por favor introduzca un Tipo de discapacidad válida.</div>";
        $("#tipo_disc").prepend(html);
      } else {
        $("#tipo_discapacidad").remove();
      };
    });
  });
</script>