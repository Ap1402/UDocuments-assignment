<form id="datosEditForm" method="POST" class="user needs-validation" novalidate>
  <div class="alert alert-success" role="alert" id="exito" style="display: none"></div>

  <div class="form-group row">
    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>Primer nombre</small></label><br>
      <input type="text" id="p_nombre" name="p_nombre" class="form-control form-control-user"
        placeholder="Primer nombre" minlength="2" data-toggle="tooltip" data-placement="top" title="Primer nombre"
        value="<?php echo $p_nombre ?>" <?php echo 'required' ?>>
      <div class="invalid-feedback">
        Este campo debe tener al menos 2 caracteres.
      </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>Segundo nombre</small></label><br>
      <input type="text" id="s_nombre" name="s_nombre" class="form-control form-control-user"
        placeholder="Segundo nombre" data-toggle="tooltip" data-placement="top" title="Segundo nombre"
        value="<?php echo $s_nombre ?>" <?php echo '' ?>>
      <div class="invalid-feedback">
        Este campo debe tener al menos 2 caracteres.
      </div>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>Primer apellido</small></label><br>
      <input type="text" id="p_apellido" name="p_apellido" class="form-control form-control-user"
        placeholder="Primer apellido" minlength="2" data-toggle="tooltip" data-placement="top" title="Primer apellido"
        value="<?php echo $p_apellido ?>" <?php echo 'required' ?>>
      <div class="invalid-feedback">
        Este campo debe tener al menos 2 caracteres.
      </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>Segundo apellido</small></label><br>
      <input type="text" id="s_apellido" name="s_apellido" class="form-control form-control-user"
        placeholder="Segundo apellido" minlength="2" data-toggle="tooltip" data-placement="top" title="Segundo apellido"
        value="<?php echo $s_apellido ?>" <?php echo 'required' ?>>
      <div class="invalid-feedback">
        Este campo debe tener al menos 2 caracteres.
      </div>
    </div>
  </div>



  <div class="form-group row">
    <div class="col-sm-6">
      <label class="pl-2"><small>Estado civil</small></label><br>
      <select id="estado_civil" name="estado_civil" class="form-control" data-toggle="tooltip" data-placement="top"
        title="Estado civil" required>
        <option selected value="<?php echo $estado_civild ?>">
          <?php echo $estado_civil_name ?>
        </option>
        <option value="1">Casado</option>
        <option value="2">Soltero</option>
        <option value="3">Divorciado</option>
        <option value="4">Viudo</option>
      </select>
      <div class="invalid-feedback">
        Por favor seleccione una opción.
      </div>
    </div>
    <div class="col-sm-6">
      <label class="pl-2"><small>Fecha de nacimiento</small></label><br>
      <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" data-toggle="tooltip"
        data-placement="top" title="Fecha de nacimiento" value="<?php echo $fecha_nacimiento ?>"
        min="<?php echo date('Y-m-d', strtotime('-150 year')) ?>"
        max="<?php echo date('Y-m-d', strtotime('-10 year')) ?>" <?php echo 'required' ?>>
      <div class="invalid-feedback">
        Por favor introduzca una fecha de nacimiento válida.
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-6 col-md-6 col-lg-4">
      <label class="pl-2"><small>Teléfono habitación</small></label><br>
      <input type="number" id="habitacion" name="habitacion" class="form-control" placeholder="Teléfono de habitación"
        min="2400000000" pattern="\d*.{11,13}" data-toggle="tooltip" data-placement="top" title="Teléfono de habitación"
        value="<?php echo ($habitacion == 0) ? '' : $habitacion ?>">
      <div class="invalid-feedback">
        Este campo debe tener al menos 11 cifras.
      </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-4">
      <label class="pl-2"><small>Teléfono móvil</small></label><br>
      <input type="number" id="movil" name="movil" class="form-control" placeholder="Teléfono móvil" min="4100000000"
        pattern="\d*.{11,13}" data-toggle="tooltip" data-placement="top" title="Teléfono móvil"
        value="<?php echo $movil ?>" required>
      <div class="invalid-feedback">
        Este campo debe tener al menos 11 cifras.
      </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-4">
      <label class="pl-2"><small>Teléfono trabajo</small></label><br>
      <input type="number" id="trabajo" name="trabajo" class="form-control" placeholder="Teléfono de trabajo"
        min="2400000000" pattern="\d*.{11,13}" data-toggle="tooltip" data-placement="top" title="Teléfono de trabajo"
        value="<?php echo ($trabajo == 0) ? '' : $trabajo ?>">
      <div class="invalid-feedback">
        Este campo debe tener al menos 11 cifras.
      </div>
    </div>
  </div>

  <!-- DISCAPACIDAD ---->
  <?php if ($discapacidad != '0') {?>
  <br>

  <div class="text-center">
    <h5 class="text-gray-900 mb-4">Discapacidad</h5>
  </div>
  <hr class="sidebar-divider">

  <div class="form-group row">
    <div class="col-12" id="tipo_disc" name="tipo_disc">
      <input type='text' id='tipo_discapacidad' name='tipo_discapacidad' class='form-control form-control-user'
        placeholder='Tipo discapacidad' minlength='4' value="<?php echo $discapacidad ?>">
      <div class='invalid-feedback'>
        Este campo debe tener al menos 4 caracteres.
      </div>
    </div>
  </div>
  <?php }?>
  <br>
  <div class="text-center">
    <h5 class="text-gray-900 mb-4">Lugar de nacimiento</h5>
  </div>
  <hr class="sidebar-divider">

  <div class="form-group row">
    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>País</small></label><br>
      <input type="text" id="pais" name="pais" class="form-control form-control-user" placeholder="País" minlength="4"
        data-toggle="tooltip" data-placement="top" title="País" value="<?php echo $pais ?>" <?php echo 'required' ?>>
      <div class="invalid-feedback">
        Este campo debe tener al menos 4 caracteres.
      </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>Estado</small></label><br>
      <input type="text" id="estado" name="estado" class="form-control form-control-user" placeholder="Estado"
        minlength="4" data-toggle="tooltip" data-placement="top" title="Estado" value="<?php echo $estado ?>"
        <?php echo 'required' ?>>
      <div class="invalid-feedback">
        Este campo debe tener al menos 4 caracteres.
      </div>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>Ciudad</small></label><br>
      <input type="text" id="ciudad" name="ciudad" class="form-control form-control-user" placeholder="Ciudad"
        minlength="4" data-toggle="tooltip" data-placement="top" title="Ciudad" value="<?php echo $ciudad ?>"
        <?php echo 'required' ?>>
      <div class="invalid-feedback">
        Este campo debe tener al menos 4 caracteres.
      </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>Municipio</small></label><br>
      <input type="text" id="municipio" name="municipio" class="form-control form-control-user" placeholder="Municipio"
        minlength="4" data-toggle="tooltip" data-placement="top" title="Municipio" value="<?php echo $municipio ?>"
        <?php echo 'required' ?>>
      <div class="invalid-feedback">
        Este campo debe tener al menos 4 caracteres.
      </div>
    </div>
  </div>

  <br>
  <div class="text-center">
    <h5 class="text-gray-900 mb-4">Dirección de habitación</h5>
  </div>
  <hr class="sidebar-divider">

  <div class="form-group row">
    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>Zona postal</small></label><br>
      <input type="text" id="nac_postal" name="nac_postal" class="form-control form-control-user"
        placeholder="Zona postal" minlength="4" data-toggle="tooltip" data-placement="top" title="Zona postal"
        value="<?php echo $nac_postal ?>" required>
      <div class="invalid-feedback">
        Este campo debe tener al menos 4 caracteres.
      </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>Estado</small></label><br>
      <input type="text" id="nac_estado" name="nac_estado" class="form-control form-control-user" placeholder="Estado"
        minlength="4" data-toggle="tooltip" data-placement="top" title="Estado" value="<?php echo $nac_estado ?>"
        required>
      <div class="invalid-feedback">
        Este campo debe tener al menos 4 caracteres.
      </div>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>Ciudad</small></label><br>
      <input type="text" id="nac_ciudad" name="nac_ciudad" class="form-control form-control-user" placeholder="Ciudad"
        minlength="4" data-toggle="tooltip" data-placement="top" title="Ciudad" value="<?php echo $nac_ciudad ?>"
        required>
      <div class="invalid-feedback">
        Este campo debe tener al menos 4 caracteres.
      </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>Municipio</small></label><br>
      <input type="text" id="nac_municipio" name="nac_municipio" class="form-control form-control-user"
        placeholder="Municipio" minlength="4" data-toggle="tooltip" data-placement="top" title="Municipio"
        value="<?php echo $nac_municipio ?>" required>
      <div class="invalid-feedback">
        Este campo debe tener al menos 4 caracteres.
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-12 col-md-6 col-lg-4">
      <label class="pl-2"><small>Urbanización</small></label><br>
      <input type="text" id="nac_urbanizacion" name="nac_urbanizacion" class="form-control form-control-user"
        placeholder="Urbanización" minlength="4" value="<?php echo $nac_urbanizacion ?>" required>
      <div class="invalid-feedback">
        Este campo debe tener al menos 4 caracteres.
      </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4">
      <label class="pl-2"><small>Casa o Apartamento</small></label><br>
      <input type="text" id="nac_aptcasa" name="nac_aptcasa" class="form-control form-control-user"
        placeholder="Casa o Apartamento" minlength="4" value="<?php echo $nac_aptcasa ?>" required>
      <div class="invalid-feedback">
        Este campo debe tener al menos 4 caracteres.
      </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-4">
      <label class="pl-2"><small>Calle</small></label><br>
      <input type="text" id="nac_calle" name="nac_calle" class="form-control form-control-user" placeholder="Calle"
        minlength="4" value="<?php echo $nac_calle ?>" required>
      <div class="invalid-feedback">
        Este campo debe tener al menos 4 caracteres.
      </div>
    </div>
  </div>

  <br>
  <div class="text-center">
    <h5 class="text-gray-900 mb-4">Dirección de trabajo</h5>
  </div>
  <hr class="sidebar-divider">

  <div class="form-group row">
    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>Zona postal</small></label><br>
      <input type="text" id="t_postal" name="t_postal" class="form-control form-control-user" placeholder="Zona postal"
        minlength="4" data-toggle="tooltip" data-placement="top" title="Zona postal" value="<?php echo $t_postal ?>">
      <div class="invalid-feedback">
        Este campo debe tener al menos 4 caracteres.
      </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>Estado</small></label><br>
      <input type="text" id="t_estado" name="t_estado" class="form-control form-control-user" placeholder="Estado"
        minlength="4" data-toggle="tooltip" data-placement="top" title="Estado" value="<?php echo $t_estado ?>">
      <div class="invalid-feedback">
        Este campo debe tener al menos 4 caracteres.
      </div>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>Ciudad</small></label><br>
      <input type="text" id="t_ciudad" name="t_ciudad" class="form-control form-control-user" placeholder="Ciudad"
        minlength="4" data-toggle="tooltip" data-placement="top" title="Ciudad" value="<?php echo $t_ciudad ?>">
      <div class="invalid-feedback">
        Este campo debe tener al menos 4 caracteres.
      </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>Municipio</small></label><br>
      <input type="text" id="t_municipio" name="t_municipio" class="form-control form-control-user"
        placeholder="Municipio" minlength="4" data-toggle="tooltip" data-placement="top" title="Municipio"
        value="<?php echo $t_municipio ?>">
      <div class="invalid-feedback">
        Este campo debe tener al menos 4 caracteres.
      </div>
    </div>
  </div>


  <br>
  <div class="text-center">
    <h5 class="text-gray-900 mb-4">Contacto en caso de emergencia</h5>
  </div>
  <hr class="sidebar-divider">


  <div class="form-group row">
    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>Nombre y apellido</small></label><br>
      <input type="text" id="e_nombre" name="e_nombre" class="form-control form-control-user"
        placeholder="Nombre y apellido" minlength="8" data-toggle="tooltip" data-placement="top"
        title="Nombre y apellido" value="<?php echo $e_nombre ?>" required>
      <div class="invalid-feedback">
        Este campo debe tener al menos 8 caracteres.
      </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>Parentesco</small></label><br>
      <input type="text" id="parentesco" name="parentesco" class="form-control form-control-user"
        placeholder="Parentesco" data-toggle="tooltip" minlength="3" data-placement="top" title="Parentesco"
        value="<?php echo $parentesco ?>" required>
      <div class="invalid-feedback">
        Este campo debe tener al menos 3 caracteres.
      </div>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>Teléfono local</small></label><br>
      <input type="number" id="e_local" name="e_local" class="form-control" placeholder="Teléfono local"
        min="2400000000" pattern="\d*.{11,13}" data-toggle="tooltip" data-placement="top" title="Teléfono de local"
        value="<?php echo ($e_local == 0) ? '' : $e_local ?>">
      <div class="invalid-feedback">
        Este campo debe tener al menos 11 cifras.
      </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>Teléfono móvil</small></label><br>
      <input type="number" id="e_movil" name="e_movil" class="form-control" placeholder="Teléfono móvil"
        min="4100000000" pattern="\d*.{11,13}" data-toggle="tooltip" data-placement="top" title="Teléfono móvil"
        value="<?php echo $e_movil ?>" required>
      <div class="invalid-feedback">
        Este campo debe tener al menos 11 cifras.
      </div>
    </div>
  </div>





  <br>
  <div class="text-center">
    <h5 class="text-gray-900 mb-4">Datos título de bachiller</h5>
  </div>
  <hr class="sidebar-divider">


  <div class="form-group row">
    <div class="col">
      <label class="pl-2"><small>Nombre de la institución (no abreviar)</small></label><br>
      <input type="text" id="i_nombre" name="i_nombre" class="form-control form-control-user"
        placeholder="Nombre de la institución (no abreviar)" minlength="11" data-toggle="tooltip" data-placement="top"
        title="Nombre de la institución (no abreviar)" value="<?php echo $i_nombre ?>" <?php echo 'required' ?>>
      <div class="invalid-feedback">
        Este campo debe tener al menos 11 caracteres.
      </div>
    </div>

  </div>

  <div class="form-group row">
    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>Año de egreso</small></label><br>
      <input type="number" id="i_egreso" name="i_egreso" class="form-control" placeholder="Año de egreso" min="1930"
        max="<?php echo date('Y') ?>" pattern="\d*.{4,4}" data-toggle="tooltip" data-placement="top"
        title="Año de egreso" value="<?php echo $i_egreso ?>" <?php echo 'required' ?>>
      <div class="invalid-feedback">
        Este campo debe tener solo 4 cifras.
      </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>Código de la institución</small></label><br>
      <input type="text" id="i_codigo" name="i_codigo" class="form-control form-control-user"
        placeholder="Código de la institución" minlength="6" data-toggle="tooltip" data-placement="top"
        title="Código de la institución" value="<?php echo $i_codigo ?>" <?php echo 'required' ?>>
      <div class="invalid-feedback">
        Este campo debe tener al menos 6 caracteres.
      </div>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>Estado</small></label><br>
      <input type="text" id="i_estado" name="i_estado" class="form-control form-control-user" placeholder="Estado"
        minlength="4" data-toggle="tooltip" data-placement="top" title="Estado" value="<?php echo $i_estado ?>"
        <?php echo 'required' ?>>
      <div class="invalid-feedback">
        Este campo debe tener al menos 4 caracteres.
      </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-3">
      <label class="pl-2"><small>Tipo de institución</small></label><br>
      <select id="tipo_inst" name="tipo_inst" class="form-control" data-toggle="tooltip" data-placement="top"
        title="Tipo de institución" <?php echo 'required' ?>>
        <option selected value="<?php echo $tipo_inst ?>"><?php echo $tipo_inst_name ?>
        </option>
        <option value="1">Privada</option>
        <option value="2">Pública</option>
      </select>
      <div class="invalid-feedback">
        Por favor seleccione una opción.
      </div>
    </div>
  </div>

  <div class="alert alert-danger" role="alert" id="resultado" style="display: none;"></div>

  <br>
  <?php if (isset($_GET['ci'])) {?>
  <input id="ci " name="ci " value="<?php echo $_GET['ci'] ?>" hidden>
  <?php }?>

  <?php if (isset($_GET['ida'])) {?>
  <input id="ida" name="ida" value="<?php echo $_GET['ida'] ?>" hidden>
  <?php }?>

  <button id="editDat" type="submit" class="btn btn-primary btn-user btn-block">
    Guardar cambios
  </button>

</form>