<?php
include ('../../back/conexion.php');

session_start();

if (isset($_SESSION['cedula'])){
  $cedula=$_SESSION['cedula'];
};

$consulta = "SELECT id_alumno, cedula, correo FROM `alumnos` WHERE cedula='" . $cedula . "'";
$resultado = mysqli_query($conexion, $consulta);
$datos = mysqli_fetch_array($resultado);

$id=$datos['id_alumno'];
$cedula=$datos['cedula'];
$correo= $datos['correo'];


$_SESSION['nivel'] = 1; // probando que sea admin para restringir la edicion de algunos campos
$verificar_check = 1; // verificar si fue o no chequeado por control de estudios

// Iniciando valores


?>

<!-- Formulario Editar Correo y Contraseña -->
<div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="p-4">
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-4">Editar (Correo / Contraseña)<br>
          </h1>
        </div>
        <form id="passEditForm" method="POST" class="user needs-validation" novalidate>
          <div class="alert alert-success" role="alert" id="exito" hidden></div>
          <br>

          <div class="form-group">
            <input type="email" id="correo" name="correo" class="form-control form-control-user" placeholder="Correo"
              minlength="2" data-toggle="tooltip" data-placement="top" title="Correo" value="<?php echo $correo ?>"
              <?php echo ($_SESSION['nivel'] == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
            <div class="invalid-feedback">
              Por favor introduzca un correo válido.
            </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <input type="password" id="contrasena" name="contrasena" minlength="4" class="form-control form-control-user"
                placeholder="Contraseña" data-toggle="tooltip" data-placement="top" title="Contraseña"
                value="<?php echo $contrasena ?>"
                <?php echo ($_SESSION['nivel'] == 1 || $verificar_check == 0) ? '' : 'readonly disabled' ?>>
              <div class="input-group-append">
                <a id="show" onclick="mostrarPassword()" class="btn btn-primary text-center align-middle">
                  <i id="showpass" class="fas fa-eye-slash"></i>
                </a>
              </div>
            </div>
            <div class="invalid-feedback">
              Su contraseña debe tener al menos 4 caracteres.
            </div>
          </div>

          <br>

          <div class="alert alert-danger" role="alert" id="resultado" hidden>
          </div>
          <br>

          <button id="editPass" type="submit" class="btn btn-primary btn-user btn-block">
            Guardar cambios
          </button>

        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function mostrarPassword() {
    var pass = document.getElementById("contrasena");
    if (pass.type == "password") {
      pass.type = "text";
      $('i#showpass').removeClass('fas fa-eye-slash').addClass('fas fa-eye');
    } else {
      pass.type = "password";
      $('i#showpass').removeClass('fas fa-eye').addClass('fas fa-eye-slash');
    }
  }
</script>