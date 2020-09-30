<form id="datosForm" method="POST" class="user needs-validation" novalidate>

  <div class="alert alert-success" role="alert" id="exito" style="display: none"></div>
  <?php
  if (!isset($_SESSION['cedula'])) { ?>

    <input type="hidden" id="ci" name="ci" value="<?=$_GET['ci']?>">
    <input type="hidden" id="ida" name="ida" value="<?=$_GET['ida']?>">
  <?php
      }
        ?>
  <div class="text-xl-right">
    <ul class="navbar-nav text-black-50 text-xs">
      <!-- Item - Ver todo -->
      <li class="nav-item active">
        <a id="ver-todo" href="#" class="nav-link">
          <i class="fas fa-bars"></i>
          <span>Ver todo</span></a>
      </li>
      <!-- Item - Ver secciones -->
      <li class="nav-item active">
        <a id="ver-secciones" href="#" class="nav-link">
          <i class="fas fa-tasks"></i>
          <span>Ver secciones</span></a>
      </li>
    </ul>
  </div>

  <div class="tabignore">

    <!-- One "tab" for each step in the form: -->
    <div class="tab">

      <br>
      <div class="text-center">
        <h5 class="text-gray-900 mb-4">Información básica</h5>
      </div>

      <div class="form-group row">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
          <label class="pl-2"><small>Estado civil <span class="text-xs text-danger"> *</span></small></label><br>
          <select id="estado_civil" name="estado_civil" class="form-control" required>
            <option disabled selected value="">Estado civil</option>
            <option value="1">Casado</option>
            <option value="2">Soltero</option>
            <option value="3">Divorciado</option>
            <option value="4">Viudo</option>
          </select>
          <div class="invalid-feedback">
            Por favor introduzca una opción.
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
          <label class="pl-2"><small>Fecha nacimiento <span class="text-xs text-danger"> *</span></small></label><br>
          <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" placeholder="Fecha nacimiento" min="<?php echo date('Y-m-d', strtotime('-150 year')) ?>" max="<?php echo date('Y-m-d', strtotime('-10 year')) ?>" required>
          <div class="invalid-feedback">
            Por favor introduzca una fecha de nacimiento válida.
          </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
          <label class="pl-2"><small>Discapacidad <span class="text-xs text-danger"> *</span></small></label><br>
          <select id="discapacidad" name="discapacidad" class="form-control" required>
            <option value="1">No</option>
            <option value="2">Sí</option>
          </select>
          <div class="invalid-feedback">
            Por favor introduzca una opción.
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
          <label class="pl-2"><small>Tipo de discapacidad <span class="text-xs text-danger"> *</span></small></label><br>
          <input type='text' id='tipo_discapacidad' name='tipo_discapacidad' class='form-control' placeholder='Tipo discapacidad' minlength='4' disabled>
          <div class='invalid-feedback'>
            Este campo debe tener al menos 4 caracteres.
          </div>
        </div>

      </div>

      <div class="form-group row">
        <div class="col-sm-12 col-md-6">
          <label class="pl-2"><small>Teléfono de habitación <span class="text-xs text-danger">
              </span></small></label><br>
          <input type="number" id="habitacion" name="habitacion" class="form-control" placeholder="Teléfono de habitación" min="2400000000" pattern="\d*.{11,13}">
          <div class="invalid-feedback">
            Este campo debe tener al menos 11 cifras.
          </div>
        </div>
        <div class="col-sm-12 col-md-6">
          <label class="pl-2"><small>Teléfono móvil <span class="text-xs text-danger"> *</span></small></label><br>
          <input type="number" id="movil" name="movil" class="form-control" placeholder="Teléfono móvil" min="4100000000" pattern="\d*.{11,13}" required>
          <div class="invalid-feedback">
            Este campo debe tener al menos 11 cifras.
          </div>
        </div>
      </div>

    </div>

    <div class="tab">

      <br>
      <div class="text-center">
        <h5 class="text-gray-900 mb-4">Lugar de nacimiento</h5>
      </div>

      <div class="form-group row">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
          <label class="pl-2"><small>País <span class="text-xs text-danger"> *</span></small></label><br>
          <input type="text" id="pais" name="pais" class="form-control" placeholder="País" minlength="4" required>
          <div class="invalid-feedback">
            Este campo debe tener al menos 4 caracteres.
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
          <label class="pl-2"><small>Estado <span class="text-xs text-danger"> *</span></small></label><br>
          <input type="text" id="estado" name="estado" class="form-control" placeholder="Estado" minlength="4" required>
          <div class="invalid-feedback">
            Este campo debe tener al menos 4 caracteres.
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
          <label class="pl-2"><small>Ciudad <span class="text-xs text-danger"> *</span></small></label><br>
          <input type="text" id="ciudad" name="ciudad" class="form-control" placeholder="Ciudad" minlength="4" required>
          <div class="invalid-feedback">
            Este campo debe tener al menos 4 caracteres.
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
          <label class="pl-2"><small>Municipio <span class="text-xs text-danger"> *</span></small></label><br>
          <input type="text" id="municipio" name="municipio" class="form-control" placeholder="Municipio" minlength="4" required>
          <div class="invalid-feedback">
            Este campo debe tener al menos 4 caracteres.
          </div>
        </div>
      </div>

    </div>

    <div class="tab">

      <br>
      <div class="text-center">
        <h5 class="text-gray-900 mb-4">Dirección de habitación</h5>
      </div>

      <div class="form-group row">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
          <label class="pl-2"><small>Zona postal <span class="text-xs text-danger"> *</span></small></label><br>
          <input type="text" id="nac_postal" name="nac_postal" class="form-control" placeholder="Zona postal" minlength="4" required>
          <div class="invalid-feedback">
            Este campo debe tener al menos 4 caracteres.
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
          <label class="pl-2"><small>Estado <span class="text-xs text-danger"> *</span></small></label><br>
          <input type="text" id="nac_estado" name="nac_estado" class="form-control" placeholder="Estado" minlength="4" required>
          <div class="invalid-feedback">
            Este campo debe tener al menos 4 caracteres.
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
          <label class="pl-2"><small>Ciudad <span class="text-xs text-danger"> *</span></small></label><br>
          <input type="text" id="nac_ciudad" name="nac_ciudad" class="form-control" placeholder="Ciudad" minlength="4" required>
          <div class="invalid-feedback">
            Este campo debe tener al menos 4 caracteres.
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
          <label class="pl-2"><small>Municipio <span class="text-xs text-danger"> *</span></small></label><br>
          <input type="text" id="nac_municipio" name="nac_municipio" class="form-control" placeholder="Municipio" minlength="4" required>
          <div class="invalid-feedback">
            Este campo debe tener al menos 4 caracteres.
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-12 col-md-6 col-lg-4">
          <label class="pl-2"><small>Urbanización <span class="text-xs text-danger"> *</span></small></label><br>
          <input type="text" id="nac_urbanizacion" name="nac_urbanizacion" class="form-control" placeholder="Urbanización" minlength="4" required>
          <div class="invalid-feedback">
            Este campo debe tener al menos 4 caracteres.
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
          <label class="pl-2"><small>Casa o Apartamento <span class="text-xs text-danger"> *</span></small></label><br>
          <input type="text" id="nac_aptcasa" name="nac_aptcasa" class="form-control" placeholder="Casa o Apartamento" minlength="1" required>
          <div class="invalid-feedback">
            Este campo debe tener al menos 1 caracter.
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4">
          <label class="pl-2"><small>Calle <span class="text-xs text-danger"> *</span></small></label><br>
          <input type="text" id="nac_calle" name="nac_calle" class="form-control" placeholder="Calle" minlength="1" required>
          <div class="invalid-feedback">
            Este campo debe tener al menos 1 caracter.
          </div>
        </div>
      </div>

    </div>

    <div class="tab">


      <br>
      <div class="text-center">
        <h5 class="text-gray-900 mb-4">Dirección de trabajo</h5>
      </div>


      <div class="form-group row">
        <div class="col-sm-12 col-md-6 col-lg-6">
          <label class="pl-2"><small>Zona postal <span class="text-xs text-danger"></span></small></label><br>
          <input type="text" id="t_postal" name="t_postal" class="form-control" placeholder="Zona postal" minlength="4">
          <div class="invalid-feedback">
            Este campo debe tener al menos 4 caracteres.
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
          <label class="pl-2"><small>Teléfono de trabajo <span class="text-xs text-danger">
              </span></small></label><br>
          <input type="number" id="trabajo" name="trabajo" class="form-control" placeholder="Teléfono de trabajo" min="2400000000" pattern="\d*.{11,13}">
          <div class="invalid-feedback">
            Este campo debe tener al menos 11 cifras.
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
          <label class="pl-2"><small>Estado <span class="text-xs text-danger"></span></small></label><br>
          <input type="text" id="t_estado" name="t_estado" class="form-control" placeholder="Estado" minlength="4">
          <div class="invalid-feedback">
            Este campo debe tener al menos 4 caracteres.
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
          <label class="pl-2"><small>Ciudad <span class="text-xs text-danger"></span></small></label><br>
          <input type="text" id="t_ciudad" name="t_ciudad" class="form-control" placeholder="Ciudad" minlength="4">
          <div class="invalid-feedback">
            Este campo debe tener al menos 4 caracteres.
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
          <label class="pl-2"><small>Municipio <span class="text-xs text-danger"></span></small></label><br>
          <input type="text" id="t_municipio" name="t_municipio" class="form-control" placeholder="Municipio" minlength="4">
          <div class="invalid-feedback">
            Este campo debe tener al menos 4 caracteres.
          </div>
        </div>
      </div>

    </div>

    <div class="tab">


      <br>
      <div class="text-center">
        <h5 class="text-gray-900 mb-4">Contacto en caso de emergencia</h5>
      </div>




      <div class="form-group row">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
          <label class="pl-2"><small>Nombre y apellido <span class="text-xs text-danger"> *</span></small></label><br>
          <input type="text" id="e_nombre" name="e_nombre" class="form-control" placeholder="Nombre y apellido" minlength="8" required>
          <div class="invalid-feedback">
            Este campo debe tener al menos 8 caracteres.
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
          <label class="pl-2"><small>Parentesco <span class="text-xs text-danger"> *</span></small></label><br>
          <input type="text" id="parentesco" name="parentesco" minlength="3" class="form-control" placeholder="Parentesco" required>
          <div class="invalid-feedback">
            Este campo debe tener al menos 3 caracteres.
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
          <label class="pl-2"><small>Teléfono local <span class="text-xs text-danger"></span></small></label><br>
          <input type="number" id="e_local" name="e_local" class="form-control" placeholder="Teléfono local" min="2400000000" pattern="\d*.{11,13}">
          <div class="invalid-feedback">
            Este campo debe tener al menos 11 cifras.
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
          <label class="pl-2"><small>Teléfono móvil <span class="text-xs text-danger"> *</span></small></label><br>
          <input type="number" id="e_movil" name="e_movil" class="form-control" placeholder="Teléfono móvil" min="4100000000" pattern="\d*.{11,13}" required>
          <div class="invalid-feedback">
            Este campo debe tener al menos 11 cifras.
          </div>
        </div>
      </div>


    </div>

    <div class="tab">

      <br>
      <div class="text-center">
        <h5 class="text-gray-900 mb-4">Datos título de bachiller</h5>
      </div>

      <div class="form-group row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
          <label class="pl-2"><small>Nombre de la institución (no abreviar) <span class="text-xs text-danger">
                *</span></small></label><br>
          <input type="text" id="i_nombre" name="i_nombre" class="form-control" placeholder="Nombre de la institución (no abreviar)" minlength="11" required>
          <div class="invalid-feedback">
            Este campo debe tener al menos 11 caracteres.
          </div>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
          <label class="pl-2"><small>Año de egreso <span class="text-xs text-danger"> *</span></small></label><br>
          <input type="number" id="i_egreso" name="i_egreso" class="form-control" placeholder="Año de egreso" min="1930" pattern="\d*.{4,4}" max="<?php echo date('Y') ?>" required>
          <div class="invalid-feedback">
            Este campo debe tener solo 4 cifras.
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
          <label class="pl-2"><small>Código de la institución <span class="text-xs text-danger">
                *</span></small></label><br>
          <input type="text" id="i_codigo" name="i_codigo" class="form-control" placeholder="Código de la institución" minlength="6" required>
          <div class="invalid-feedback">
            Este campo debe tener al menos 6 caracteres.
          </div>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
          <label class="pl-2"><small>Estado <span class="text-xs text-danger"> *</span></small></label><br>
          <input type="text" id="i_estado" name="i_estado" class="form-control" placeholder="Estado" minlength="4" required>
          <div class="invalid-feedback">
            Este campo debe tener al menos 4 caracteres.
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
          <label class="pl-2"><small>Tipo de institución <span class="text-xs text-danger"> *</span></small></label><br>
          <select id="tipo_inst" name="tipo_inst" class="form-control" required>
            <option disabled selected value="">Tipo de institución</option>
            <option value="1">Privada</option>
            <option value="2">Pública</option>
          </select>
          <div class="invalid-feedback">
            Por favor seleccione una opción.
          </div>
        </div>
      </div>

      <?php if (isset($_GET['ci'])) { ?>
        <input id="ciDatos" name="ciDatos" value="<?php echo $_GET['ci'] ?>" hidden>
      <?php } ?>

      <?php if (isset($_GET['ida'])) { ?>
        <input id="idaDatos" name="idaDatos" value="<?php echo $_GET['ida'] ?>" hidden>
      <?php } ?>

    </div>

  </div>

  <div class="alert alert-danger" role="alert" id="resultado" style="display: none"></div>
  <div id="preload" class="preload">
    <img src="../img/images/preload.gif" alt="preload">
  </div>

  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" class="btn btn-primary btn-user" onclick="nextPrev(-1)">Volver</button>
      <button type="button" id="nextBtn" class="btn btn-primary btn-user" onclick="nextPrev(1)">Siguiente</button>
    </div>
  </div>

  <!-- Circles which indicates the steps of the form: -->
  <div id="stepcircle" style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>

</form>