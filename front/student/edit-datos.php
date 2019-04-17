<!--
  Oye, sera que se puede mandar una variable que permita editar solo si no ha sido chequeado por control de estudios?
  porque hay veces que uno se equivoca y quiere modificar algunas cosas
  esto optimizaria tiempo, porque sino va a tener que estar diciendole al de control de estudios que se 
  equivoco en tal parte que si lo puede corregir o que se yo.
-->
<?php
$admin = 1; // probando que sea admin para restringir la edicion de algunos campos
$verificar_check = 1; // verificar si fue o no chequeado por control de estudios

// Iniciando valores
$cedula = '';

?>

<!-- Formulario Datos -->
<div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="p-4">
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-4">Datos del alumno<small class="text-muted"> asegúrate de rellenar
              correctamente
              tus datos</small></h1>
        </div>
        <form id="datosEditForm" method="POST" class="user needs-validation" novalidate>
          <br>

          <div class="alert alert-success" role="alert" id="exito" hidden></div>
          <br>


          <br>
          <div class="text-center">
            <h5 class="text-gray-900 mb-4">Datos personales</h5>
          </div>
          <hr class="sidebar-divider">
          <br>

          <div class="form-group row">
				<div class="col-sm-6">
					<input type="text" id="p_nombre" name="p_nombre" class="form-control form-control-user"
						placeholder="Primer nombre" minlength="2" 
            data-toggle="tooltip" data-placement="top" title="Primer nombre"
            value="<?php echo $p_nombre ?>"
            <?php echo ($admin == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
					<div class="invalid-feedback">
						Por favor introduzca un nombre válido.
					</div>
				</div>
				<div class="col-sm-6">
					<input type="text" id="s_nombre" name="s_nombre" class="form-control form-control-user"
						placeholder="Segundo nombre" 
            data-toggle="tooltip" data-placement="top" title="Segundo nombre"
            value="<?php echo $s_nombre ?>"
            <?php echo ($admin == 1 || $verificar_check == 0) ? '' : 'readonly disabled' ?>>
					<div class="invalid-feedback">
						Por favor introduzca un nombre válido.
					</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-6">
					<input type="text" id="p_apellido" name="p_apellido" class="form-control form-control-user"
						placeholder="Primer apellido" minlength="2" 
            data-toggle="tooltip" data-placement="top" title="Primer apellido"
            value="<?php echo $p_apellido ?>"
            <?php echo ($admin == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
					<div class="invalid-feedback">
						Por favor introduzca un apellido válido.
					</div>
				</div>
				<div class="col-sm-6">
					<input type="text" id="s_apellido" name="s_apellido" class="form-control form-control-user"
						placeholder="Segundo apellido" minlength="2" 
            data-toggle="tooltip" data-placement="top" title="Segundo apellido"
            value="<?php echo $s_apellido ?>"
            <?php echo ($admin == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
					<div class="invalid-feedback">
						Por favor introduzca un apellido válido.
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="email" id="correo" name="correo" class="form-control form-control-user" placeholder="Correo" 
          data-toggle="tooltip" data-placement="top" title="Correo"
          value="<?php echo $correo ?>"
					required>
				<div class="invalid-feedback">
					Por favor introduzca un correo válido.
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-6">
					<input type="text" id="username" name="username" class="form-control form-control-user"
						placeholder="Nombre de usuario" minlength="4" 
            data-toggle="tooltip" data-placement="top" title="Nombre de usuario"
            value="<?php echo $username ?>"
            <?php echo ($admin == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
					<div class="invalid-feedback">
						Por favor introduzca un nombre de usuario válido.
					</div>
				</div>
				<div class="col-sm-6">
					<input type="number" id="cedula" name="cedula" class="form-control" placeholder="Cédula" 
            data-toggle="tooltip" data-placement="top" title="Cédula"
						value="<?php echo $cedula ?>"
            <?php echo ($admin == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
					<div class="invalid-feedback">
						Por favor introduzca un número de cédula válido.
					</div>
				</div>
			</div>
			<div class="form-group row">
        <div class="col-sm-6 my-auto">
          <input type="password" id="contrasena" name="contrasena" class="form-control form-control-user"
            placeholder="Contraseña" 
            data-toggle="tooltip" data-placement="top" title="Contraseña"
            value="<?php echo $contrasena ?>"
            required>
          <div class="invalid-feedback">
            La contraseña debe tener al menos 8 carateres.
          </div>
        </div>
        <div class="col-sm-6 my-auto">
          <input type="password" id="contrasena2" name="contrasena2" class="form-control form-control-user"
            placeholder="Confirmar contraseña" 
            data-toggle="tooltip" data-placement="top" title="Confirmar contraseña"
            value="<?php echo $contrasena2 ?>"
            required>
          <div class="invalid-feedback">
            La contraseña debe tener al menos 8 carateres.
          </div>
        </div>
			</div>          

          <div class="form-group row">
            <div class="col-sm-6 my-auto">
                <select id="estado_civil" name="estado_civil" class="form-control" 
                data-toggle="tooltip" data-placement="top" title="Estado civil"
                 required>
                <option disabled selected
                value="<?php echo $estado_civil ?>">
                  <?php echo $estado_civil ?>
                </option>
                <option value="Casado">Casado</option>
                <option value="Soltero">Soltero</option>
                <option value="Divorciado">Divorciado</option>
                <option value="Viudo">Viudo</option>
              </select>

            </div>
            <div class="col-sm-6 my-auto">
              <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control form-control-user"
                data-toggle="tooltip" data-placement="top" title="Fecha de nacimiento"
                value="<?php echo $fecha_nacimiento ?>"
                min="1930-07-22"
                max="<?php echo date('Y-m-d') ?>"                
                <?php echo ($admin == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
              <div class="invalid-feedback">
                Por favor introduzca un fecha de nacimiento válido.
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
            <div class="col-sm-6 my-auto">
              <input type="text" id="pais" name="pais" class="form-control form-control-user" placeholder="País"
                minlength="4"
                data-toggle="tooltip" data-placement="top" title="País"
                value="<?php echo $pais ?>"
                <?php echo ($admin == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
              <div class="invalid-feedback">
                Por favor introduzca un País válido.
              </div>
            </div>
            <div class="col-sm-6 my-auto">
              <input type="text" id="estado" name="estado" class="form-control form-control-user" placeholder="Estado"
                minlength="4"
                data-toggle="tooltip" data-placement="top" title="Estado"
                value="<?php echo $estado ?>"
                <?php echo ($admin == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
              <div class="invalid-feedback">
                Por favor introduzca un Estado válido.
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-6 my-auto">
              <input type="text" id="ciudad" name="ciudad" class="form-control form-control-user" placeholder="Ciudad"
                minlength="4"
                data-toggle="tooltip" data-placement="top" title="Ciudad"
                value="<?php echo $ciudad ?>"
                <?php echo ($admin == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
              <div class="invalid-feedback">
                Por favor introduzca un ciudad válido.
              </div>
            </div>
            <div class="col-sm-6 my-auto">
              <input type="text" id="municipio" name="municipio" class="form-control form-control-user"
                placeholder="municipio" minlength="4"
                data-toggle="tooltip" data-placement="top" title="municipio"
                value="<?php echo $municipio ?>"
                <?php echo ($admin == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
              <div class="invalid-feedback">
                Por favor introduzca un municipio válido.
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
            <select id="discapacidad" name="discapacidad" class="form-control" 
            data-toggle="tooltip" data-placement="top" title="Discapacidad"
             required>
                <option disabled selected value="<?php echo $discapacidad ?>"><?php echo $discapacidad ?></option>
                <option value="No">No</option>
                <option value="Sí">Sí</option>
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
          <hr class="sidebar-divider">
          <br>
          <div class="form-group row">
            <div class="col-sm-6 my-auto" >
            <select id="carrera" name="carrera" class="form-control" 
            data-toggle="tooltip" data-placement="top" title="Carrera"
             <?php echo ($admin == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
            <option disabled selected value="<?php echo $carrera ?>"><?php echo $carrera ?></option>
            <?php 
              include '../../back/conexion.php';

              $sql = "SELECT * FROM carreras WHERE estatus=1";
              $result = mysqli_query($conexion, $sql);
              $resultArray = array();
              if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value=". $row["codigo"] .">".$row["nombre"]."</option>";
                $resultArray[]=array("codigo"=>$row["codigo"],"nombre"=>$row["nombre"],"manana"=>$row["manana"],"tarde"=>$row["tarde"],"noche"=>$row["noche"]);
                };
              
              };
            ?> 
            </select>
            </div>
            <div class="col-sm-6 my-auto">
            <select id="turno" name="turno" class="form-control" 
            data-toggle="tooltip" data-placement="top" title="Turno"
             <?php echo ($admin == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
            <option disabled="disabled" selected value="<?php echo $turno ?>"><?php echo $turno ?></option>

              </select>
              <div class="invalid-feedback">
                Por favor introduzca una opcion válida.
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
            <div class="col-sm-6 my-auto">
              <input type="text" id="nac_postal" name="nac_postal" class="form-control form-control-user"
                placeholder="Zona postal" minlength="4"
                data-toggle="tooltip" data-placement="top" title="Zona postal"
                value="<?php echo $nac_postal ?>" 
                required>
              <div class="invalid-feedback">
                Por favor introduzca una Zona postal válida.
              </div>
            </div>
            <div class="col-sm-6 my-auto">
              <input type="text" id="nac_estado" name="nac_estado" class="form-control form-control-user"
                placeholder="Estado" minlength="4"
                data-toggle="tooltip" data-placement="top" title="Estado"
                value="<?php echo $nac_estado ?>"
                required>
              <div class="invalid-feedback">
                Por favor introduzca un Estado válido.
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-6 my-auto">
              <input type="text" id="nac_ciudad" name="nac_ciudad" class="form-control form-control-user"
                placeholder="Ciudad" minlength="4"
                data-toggle="tooltip" data-placement="top" title="Ciudad"
                value="<?php echo $nac_ciudad ?>"
                required>
              <div class="invalid-feedback">
                Por favor introduzca un ciudad válido.
              </div>
            </div>
            <div class="col-sm-6 my-auto">
              <input type="text" id="nac_municipio" name="nac_municipio" class="form-control form-control-user"
                placeholder="Municipio" minlength="4"
                data-toggle="tooltip" data-placement="top" title="Municipio"
                value="<?php echo $nac_municipio ?>"
                required>
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
            <div class="col-sm-6 my-auto">
              <input type="text" id="habitacion" name="habitacion" class="form-control form-control-user"
                placeholder="Teléfono de habitación" minlength="11"
                data-toggle="tooltip" data-placement="top" title="Teléfono de habitación"
                value="<?php echo $habitacion ?>">
              <div class="invalid-feedback">
                Por favor introduzca un teléfono de habitación válido.
              </div>
            </div>
            <div class="col-sm-6 my-auto">
              <input type="text" id="movil" name="movil" class="form-control form-control-user"
                placeholder="Teléfono móvil" minlength="11"
                data-toggle="tooltip" data-placement="top" title="Teléfono móvil"
                value="<?php echo $movil ?>"
                required>
              <div class="invalid-feedback">
                Por favor introduzca un teléfono móvil válido.
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col my-auto">
              <input type="text" id="trabajo" name="trabajo" class="form-control form-control-user"
                placeholder="Teléfono de trabajo" minlength="11"
                data-toggle="tooltip" data-placement="top" title="Teléfono de trabajo"
                value="<?php echo $trabajo ?>">
              <div class="invalid-feedback">
                Por favor introduzca un teléfono de trabajo válido.
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
            <div class="col-sm-6 my-auto">
              <input type="text" id="t_postal" name="t_postal" class="form-control form-control-user"
                placeholder="Zona postal" minlength="4"
                data-toggle="tooltip" data-placement="top" title="Zona postal"
                value="<?php echo $t_postal ?>">
              <div class="invalid-feedback">
                Por favor introduzca una Zona postal válida.
              </div>
            </div>
            <div class="col-sm-6 my-auto">
              <input type="text" id="t_estado" name="t_estado" class="form-control form-control-user"
                placeholder="Estado" minlength="4"
                data-toggle="tooltip" data-placement="top" title="Estado"
                value="<?php echo $t_estado ?>">
              <div class="invalid-feedback">
                Por favor introduzca un Estado válido.
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-6 my-auto">
              <input type="text" id="t_ciudad" name="t_ciudad" class="form-control form-control-user"
                placeholder="Ciudad" minlength="4"
                data-toggle="tooltip" data-placement="top" title="Ciudad"
                value="<?php echo $t_ciudad ?>">
              <div class="invalid-feedback">
                Por favor introduzca un ciudad válido.
              </div>
            </div>
            <div class="col-sm-6 my-auto">
              <input type="text" id="t_municipio" name="t_municipio" class="form-control form-control-user"
                placeholder="Municipio" minlength="4"
                data-toggle="tooltip" data-placement="top" title="Municipio"
                value="<?php echo $t_municipio ?>">
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
            <div class="col-sm-6 my-auto">
              <input type="text" id="e_nombre" name="e_nombre" class="form-control form-control-user"
                placeholder="Nombre y apellido" minlength="8"
                data-toggle="tooltip" data-placement="top" title="Nombre y apellido"
                value="<?php echo $e_nombre ?>"
                required>
              <div class="invalid-feedback">
                Por favor introduzca un nombre válido.
              </div>
            </div>
          <div class="col-sm-6 my-auto">
              <input type="text" id="parentesco" name="parentesco" class="form-control form-control-user"
                placeholder="Parentesco"
                data-toggle="tooltip" data-placement="top" title="Parentesco"
                value="<?php echo $parentesco ?>"
                required>
              <div class="invalid-feedback">
                Por favor introduzca un Parentesco válido.
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-6 my-auto">
              <input type="text" id="e_local" name="e_local" class="form-control form-control-user"
                placeholder="Teléfono de local" minlength="11"
                data-toggle="tooltip" data-placement="top" title="Teléfono de local"
                value="<?php echo $e_local ?>">
              <div class="invalid-feedback">
                Por favor introduzca un teléfono de local válido.
              </div>
            </div>
            <div class="col-sm-6 my-auto">
              <input type="text" id="e_movil" name="e_movil" class="form-control form-control-user"
                placeholder="Teléfono móvil" minlength="11"
                data-toggle="tooltip" data-placement="top" title="Teléfono móvil"
                value="<?php echo $e_movil ?>"
                required>
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
                placeholder="Nombre de la institución (no abreviar)" minlength="11"
                data-toggle="tooltip" data-placement="top" title="Nombre de la institución (no abreviar)"
                value="<?php echo $i_nombre ?>"
                <?php echo ($admin == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
              <div class="invalid-feedback">
                Por favor introduzca un nombre de institución válido.
              </div>
            </div>

          </div>

          <div class="form-group row">
            <div class="col-sm-6 my-auto">
              <input type="number" id="i_egreso" name="i_egreso" class="form-control" placeholder="Año de egreso"
                min="1930" max="<?php echo date('Y') ?>"
                data-toggle="tooltip" data-placement="top" title="Año de egreso" 
                value="<?php echo $i_egreso ?>"
                <?php echo ($admin == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
              <div class="invalid-feedback">
                Por favor introduzca un año de egreso válido.
              </div>
            </div>
            <div class="col-sm-6 my-auto">
              <input type="text" id="i_codigo" name="i_codigo" class="form-control form-control-user"
                placeholder="Código de la institución" minlength="6"
                data-toggle="tooltip" data-placement="top" title="Código de la institución"
                value="<?php echo $i_codigo ?>"
                <?php echo ($admin == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
              <div class="invalid-feedback">
                Por favor introduzca un código válido.
              </div>
            </div>
          </div>

          <div class="form-group row">

            <div class="col-sm-6 my-auto">
              <input type="text" id="i_estado" name="i_estado" class="form-control form-control-user"
                placeholder="Estado" minlength="4"
                data-toggle="tooltip" data-placement="top" title="Estado" 
                value="<?php echo $i_estado ?>"
                <?php echo ($admin == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
              <div class="invalid-feedback">
                Por favor introduzca un Estado válido.
              </div>
            </div>
            <div class="col-sm-6 my-auto">
              <select id="tipo_inst" name="tipo_inst" class="form-control" 
              data-toggle="tooltip" data-placement="top" title="Tipo de institución"
               <?php echo ($admin == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
                <option disabled selected value="<?php echo $tipo_inst ?>"><?php echo $tipo_inst ?></option>
                <option value="Privada">Privada</option>
                <option value="Pública">Pública</option>
              </select>
            </div>
          </div>



          <br>

          <div class="alert alert-danger" role="alert" id="resultado" hidden>
          </div>
          <br>

          <button id="editDat" type="submit" class="btn btn-primary btn-user btn-block">
Guardar          
</button>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- Page level custom scripts -->
<script src="js/front/form-validation.js"></script>
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

<script>
$(document).ready(function () {

  var carreras = <?php echo json_encode($resultArray) ?>;

  $("#carrera").change(function(){

    var codigo = $("#carrera").val();
    var nuevasopciones="";

    console.log(carreras[codigo-1]);

    if(carreras[codigo-1]["manana"]==1){
      nuevasopciones+="<option value='1'>Mañana</option>";
    }
    if(carreras[codigo-1]["tarde"]==1){
      nuevasopciones+="<option value='2'>Tarde</option>";
    }
    if(carreras[codigo-1]["noche"]==1){
      nuevasopciones+="<option value='3'>Noche</option>";
    }

    $("select#turno").html(nuevasopciones);
  });
});

</script>