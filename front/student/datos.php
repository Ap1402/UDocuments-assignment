<!-- Formulario Datos -->

<div class="col-sm-12 col-md-8 col-lg-10 mx-auto">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="p-4">
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-4">Datos del alumno<small class="text-muted"> asegúrate de rellenar
              correctamente
              tus datos</small></h1>
        </div>
        <form id="datosForm" method="POST" class="user needs-validation" novalidate>
          <br>

          <div class="alert alert-success" role="alert" id="exito" hidden></div>
          <br>

          <div class="form-group row">
            <div class="col-sm-6 autocomplete">
              <input type="text" id="nacionalidad" name="nacionalidad" class="form-control form-control-user"
                placeholder="Nacionalidad" pattern="Venezolana | Extranjera" minlength="4" required>
              <div class="invalid-feedback">
                Por favor introduzca una nacionalidad válida.
              </div>
            </div>
            <div class="col-sm-6">
              <input type="number" id="cedula" name="cedula" class="form-control" placeholder="Cédula" step="1"
                min="3000000" max="99999999" required>
              <div class="invalid-feedback">
                Por favor introduzca un número de cédula válido.
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-6 mb-sm-0">
              <input type="text" id="p_nombre" name="p_nombre" class="form-control form-control-user"
                placeholder="Primer nombre" minlength="2" required>
              <div class="invalid-feedback">
                Por favor introduzca un nombre válido.
              </div>
            </div>
            <div class="col-sm-6">
              <input type="text" id="s_nombre" name="s_nombre" class="form-control form-control-user"
                placeholder="Segundo nombre" required>
              <div class="invalid-feedback">
                Por favor introduzca un nombre válido.
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-6 mb-sm-0">
              <input type="text" id="p_apellido" name="p_apellido" class="form-control form-control-user"
                placeholder="Primer apellido" minlength="2" required>
              <div class="invalid-feedback">
                Por favor introduzca un apellido válido.
              </div>
            </div>
            <div class="col-sm-6">
              <input type="text" id="s_apellido" name="s_apellido" class="form-control form-control-user"
                placeholder="Segundo apellido" minlength="2" required>
              <div class="invalid-feedback">
                Por favor introduzca un apellido válido.
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-6 mb-sm-0">
                <select id="estado_civil" name="estado_civil" class="form-control" required>
                <option value="1">Casado</option>
                <option value="2">Soltero</option>
                <option value="3">Divorciado</option>
                <option value="4">Viudo</option>
              </select>

            </div>
            <div class="col-sm-6">
              <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control form-control-user"
                placeholder="Fecha nacimiento" minlength="31/05/1920" required>
              <div class="invalid-feedback">
                Por favor introduzca un fecha_nacimiento válido.
              </div>
            </div>
          </div>

          <br>
          <div class="text-center">
            <h5 class="text-gray-900 mb-4">Lugar de nacimiento</h5>
          </div>
          <hr class="sidebar-divider">
          <br>

          <div class="form-group row">
            <div class="col-sm-6 autocomplete">
              <input type="text" id="pais" name="pais" class="form-control form-control-user" placeholder="País"
                minlength="4" required>
              <div class="invalid-feedback">
                Por favor introduzca un País válido.
              </div>
            </div>
            <div class="col-sm-6 autocomplete">
              <input type="text" id="estado" name="estado" class="form-control form-control-user" placeholder="Estado"
                minlength="4" required>
              <div class="invalid-feedback">
                Por favor introduzca un Estado válido.
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-6 autocomplete">
              <input type="text" id="ciudad" name="ciudad" class="form-control form-control-user" placeholder="Ciudad"
                minlength="4" required>
              <div class="invalid-feedback">
                Por favor introduzca un ciudad válido.
              </div>
            </div>
            <div class="col-sm-6 autocomplete">
              <input type="text" id="municipio" name="municipio" class="form-control form-control-user"
                placeholder="municipio" minlength="4" required>
              <div class="invalid-feedback">
                Por favor introduzca un municipio válido.
              </div>
            </div>
          </div>

          <br>
          <div class="text-center">
            <h5 class="text-gray-900 mb-4">Etnia</h5>
          </div>
          <hr class="sidebar-divider">
          <br>

          <div class="form-group row">
            <div class="col-sm-6 autocomplete">
            <select id="discapacidad" name="discapacidad" class="form-control" required>
                <option value="1">No</option>
                <option value="2">Sí</option>
              </select>
              <div class="invalid-feedback">
                Por favor introduzca una opcion válida.
              </div>
            </div>
            <div class="col-sm-6" id="tipo_disc" name="tipo_disc">

            </div>
          </div>
          <br>
          <hr class="sidebar-divider">
          <br>
          <div class="form-group row">
            <div class="col-sm-6">
            <select id="turno" name="turno" class="form-control" required>
                <option value="1">Mañana</option>
                <option value="2">Tarde</option>
                <option value="3">Noche</option>
              </select>
              <div class="invalid-feedback">
                Por favor introduzca una opcion válida.
              </div>
            </div>
            <div class="col-sm-6 autocomplete" >
              <input type="text" id="carrera" name="carrera" class="form-control form-control-user"
                placeholder="Carrera" minlength="4" required>
              <div class="invalid-feedback">
Por favor introduzca una carrera valida             
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
            <div class="col-sm-6">
              <input type="text" id="nac_postal" name="nac_postal" class="form-control form-control-user"
                placeholder="Zona postal" minlength="4" required>
              <div class="invalid-feedback">
                Por favor introduzca una Zona postal válida.
              </div>
            </div>
            <div class="col-sm-6 autocomplete">
              <input type="text" id="nac_estado" name="nac_estado" class="form-control form-control-user"
                placeholder="Estado" minlength="4" required>
              <div class="invalid-feedback">
                Por favor introduzca un Estado válido.
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-6 autocomplete">
              <input type="text" id="nac_ciudad" name="nac_ciudad" class="form-control form-control-user"
                placeholder="Ciudad" minlength="4" required>
              <div class="invalid-feedback">
                Por favor introduzca un ciudad válido.
              </div>
            </div>
            <div class="col-sm-6 autocomplete">
              <input type="text" id="nac_municipio" name="nac_municipio" class="form-control form-control-user"
                placeholder="municipio" minlength="4" required>
              <div class="invalid-feedback">
                Por favor introduzca un municipio válido.
              </div>
            </div>
          </div>


          <br>
          <div class="text-center">
            <h5 class="text-gray-900 mb-4">Teléfonos</h5>
          </div>
          <hr class="sidebar-divider">
          <br>

          <div class="form-group row">
            <div class="col-sm-6 mb-sm-0">
              <input type="text" id="habitacion" name="habitacion" class="form-control form-control-user"
                placeholder="Teléfono de habitación" minlength="11">
              <div class="invalid-feedback">
                Por favor introduzca un teléfono de habitación válido.
              </div>
            </div>
            <div class="col-sm-6 mb-sm-0">
              <input type="text" id="movil" name="movil" class="form-control form-control-user"
                placeholder="Teléfono móvil" minlength="11" required>
              <div class="invalid-feedback">
                Por favor introduzca un teléfono móvil válido.
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-6 mb-sm-0">
              <input type="text" id="trabajo" name="trabajo" class="form-control form-control-user"
                placeholder="Teléfono de trabajo" minlength="11">
              <div class="invalid-feedback">
                Por favor introduzca un teléfono de trabajo válido.
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col">
            <input type="email" id="correo" name="correo" class="form-control form-control-user" placeholder="Correo"
              required>
            <div class="invalid-feedback">
              Por favor introduzca un correo válido.
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
            <div class="col-sm-6">
              <input type="text" id="t_postal" name="t_postal" class="form-control form-control-user"
                placeholder="Zona postal" minlength="4">
              <div class="invalid-feedback">
                Por favor introduzca una Zona postal válida.
              </div>
            </div>
            <div class="col-sm-6 autocomplete">
              <input type="text" id="t_estado" name="t_estado" class="form-control form-control-user"
                placeholder="Estado" minlength="4">
              <div class="invalid-feedback">
                Por favor introduzca un Estado válido.
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-6 autocomplete">
              <input type="text" id="t_ciudad" name="t_ciudad" class="form-control form-control-user"
                placeholder="Ciudad" minlength="4">
              <div class="invalid-feedback">
                Por favor introduzca un ciudad válido.
              </div>
            </div>
            <div class="col-sm-6 autocomplete">
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
          <br>


          <div class="form-group row">
            <div class="col-sm-6 mb-sm-0">
              <input type="text" id="e_nombre" name="e_nombre" class="form-control form-control-user"
                placeholder="Nombre y apellido" minlength="8" required>
              <div class="invalid-feedback">
                Por favor introduzca un nombre válido.
              </div>
            </div>
            <div class="col-sm-6">
              <input type="text" id="parentesco" name="parentesco" class="form-control form-control-user"
                placeholder="Parentesco" required>
              <div class="invalid-feedback">
                Por favor introduzca un Parentesco válido.
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-6 mb-sm-0">
              <input type="text" id="e_local" name="e_local" class="form-control form-control-user"
                placeholder="Teléfono de local" minlength="11">
              <div class="invalid-feedback">
                Por favor introduzca un teléfono de local válido.
              </div>
            </div>
            <div class="col-sm-6 mb-sm-0">
              <input type="text" id="e_movil" name="e_movil" class="form-control form-control-user"
                placeholder="Teléfono móvil" minlength="11" required>
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
            <div class="col-sm-6">
              <input type="number" id="i_egreso" name="i_egreso" class="form-control" placeholder="Año de egreso"
                minlength="1930" required>
              <div class="invalid-feedback">
                Por favor introduzca un año de egreso válido.
              </div>
            </div>
            <div class="col-sm-6 mb-sm-0">
              <input type="text" id="i_codigo" name="i_codigo" class="form-control form-control-user"
                placeholder="Código de la institución" minlength="6" required>
              <div class="invalid-feedback">
                Por favor introduzca un código válido.
              </div>
            </div>
          </div>

          <div class="form-group row">

            <div class="col-sm-6 autocomplete">
              <input type="text" id="i_estado" name="i_estado" class="form-control form-control-user"
                placeholder="Estado" minlength="4">
              <div class="invalid-feedback">
                Por favor introduzca un Estado válido.
              </div>
            </div>
            <div class="col-sm-6 autocomplete">
            <select id="tipo_inst" name="tipo_inst" class="form-control" required>
                <option value="1">Privada</option>
                <option value="2">Pública</option>
                </select>
            </div>
          </div>



          <br>

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
<script src="js/front/form-validation.js"></script>
<script src="js/front/autocomplete.js"></script>
<script src="scripts/datos.js"></script>



<script> 
$(document).ready(function () {
$("#discapacidad").change(function(){
        var selectedOpt = $(this).val();
        if(selectedOpt==2){
          var html="<input type='text' id='tipo_discapacidad' name='tipo_discapacidad' class='form-control form-control-user' placeholder='Tipo discapacidad' minlength='4' required><div class='invalid-feedback'>Por favor introduzca un Tipo de discapacidad válida.</div>";
          $("#tipo_disc").prepend(html);
        }else{
          $("#tipo_discapacidad").remove();
        };
    });
});


</script>