<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Control de estudios / SAD - Forgot - preguntas</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/images/favicon.ico" type="image/x-icon">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="css/font.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">

</head>

<body>

  <header class="m-0">
    <nav
      class="navbar navbar-expand navbar-light bg-white align-items-center justify-content-center topbar mb-4 px-5 static-top shadow">
      <a class="navbar-brand align-items-center" href="#">
        <img src="img/varias/logo_ujap_peq.png" width="35" height="40" class="d-inline-block align-items-center" alt="">
        <b>
          Control de estudios / SAD
        </b>
      </a>
    </nav>
  </header>


  <div class="container">



    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-8 col-lg-8 col-md-10 col-sm-12 mx-5 px-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">

            <!-- Nested Row within Card Body -->

            <?php 

            if (isset($_GET['ci'])&&isset($_GET['ask'])) {
              $cedula = $_GET['ci'];
              $pregunta = $_GET['ask'];        
            }else {
              $pregunta = '';
            }
            
            ?>


            <div id="page-forgot" class="row justify-content-center">

              <!-- Formulario Forgot -->
              <div class="col-sm-12">
                <div class="p-5">
                  <div class="text-center pb-4">
                    <h1 class="h4 text-gray-900 mb-2">Recuperación de contraseña</h1>
                  </div>
                  <form id="forgotForm" method="POST" class="user needs-validation" novalidate>

                    <div class="alert alert-success" role="alert" id="exito" style="display: none"></div>
                    <div class="form-group">
                      <input type="text" id="username" name="username" minlength="4" class="form-control form-control-user"
                        placeholder="Nombre de usuario" required>
                      <div class="invalid-feedback">
                        Este campo debe tener al menos 2 caracteres.
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-12 text-center">
                        <label for="respuesta">Pregunta de seguridad: <b><?='¿'.$pregunta.'?'?></b></label>
                      </div>
                      <div class="col-12">
                        <input type="text" id="respuesta" name="respuesta" minlength="2"
                          class="form-control form-control-user" placeholder="Respuesta" required>
                        <div class="invalid-feedback">
                          Este campo debe tener al menos 2 caracteres.
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <input type="password" id="contrasena" name="contrasena" minlength="4"
                          class="form-control form-control-user" placeholder="Nueva contraseña" required>
                        <div class="input-group-append">
                          <a id="show" onclick="mostrarPassword()" class="btn btn-primary text-center align-middle">
                            <i id="showpass" class="fas fa-eye-slash"></i>
                          </a>
                        </div>
                      </div>
                      <div class="invalid-feedback">
                        Este campo debe tener al menos 4 caracteres.
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <input type="password" id="contrasena2" name="contrasena2" minlength="4"
                          class="form-control form-control-user" placeholder="Repetir contraseña" required>
                        <div class="input-group-append">
                          <a id="show" onclick="mostrarPassword()" class="btn btn-primary text-center align-middle">
                            <i id="showpass2" class="fas fa-eye-slash"></i>
                          </a>
                        </div>
                      </div>
                      <div class="invalid-feedback">
                        Este campo debe tener al menos 4 caracteres.
                      </div>
                    </div>
                    <input id="cedula" name ="cedula" value="<?php echo $_GET['ci'] ?>" hidden>
                    <div id="preload" class="preload">
                      <img src="img/images/preload.gif" alt="preload" hidden>
                    </div>
                    <div class="alert alert-danger" role="alert" id="resultado" style="display: none"></div>
                    <button id="enviar" type="submit" class="btn btn-primary btn-user btn-block">
                      Cambiar contraseña
                    </button>

                  </form>
                  <hr>
                  <div class="text-center">
                    <a href="page-access-registro.php" class="small">Crear una cuenta</a>
                  </div>
                  <div class="text-center">
                    <a href="index.php" class="small">¿Ya tienes una cuenta? Iniciar sesión</a>
                  </div>
                </div>
              </div>
              <!-- /.Formulario Forgot -->

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

  <!-- Footer -->
  <?php require_once 'front/general/footer.php'; ?>
  <!-- End of Footer -->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <script type="text/javascript">
    function mostrarPassword() {
      var pass = document.getElementById("contrasena");
      var pass2 = document.getElementById("contrasena2");
      if (pass.type == "password") {
        pass.type = "text";
        pass2.type = "text";
        $('i#showpass,i#showpass2').removeClass('fas fa-eye-slash').addClass('fas fa-eye');
      } else {
        pass.type = "password";
        pass2.type = "password";
        $('i#showpass,i#showpass2').removeClass('fas fa-eye').addClass('fas fa-eye-slash');
      }
    }
  </script>

<script>
    $(document).ready(function () {      

      $('#enviar').on('click', ejecutarAjaxForgot);


      function ejecutarAjaxForgot(event) {
        preload.classList.add('activate-preload'); 

        var formData = new FormData(document.getElementById("forgotForm"));
        $.ajax({
            type: 'POST',
            url: './back/estudiante/forgotPassChange.php',
            data :formData,
            encode: true,
            cache: false,
            contentType: false,
            processData: false,
            dataType : 'json',
          })
          .done(function (datos) {
            preload.classList.remove('activate-preload'); 
            if (!datos.exito) {
              $('#exito').hide();

                $('#resultado').show();
                $('#resultado').text(datos.message);
            } else {
              $('#resultado').hide();
              $('#exito').show();

                $('#exito').text(datos.message);            
              }
          })
          .fail(function (err) {
            console.log(err);
          });

        event.preventDefault();
      };

    });
  </script>

</body>

</html>