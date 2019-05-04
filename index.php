<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Control de estudios / SAD - login</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/images/favicon.ico" type="image/x-icon">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="css/font.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

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

      <div class="col-xl-8 col-lg-10 col-md-8 mx-5 px-5">

        <div class="card o-hidden border-0 shadow-lg my-5">

          <div class="card-body p-0">

            <!-- Nested Row within Card Body -->
            <div id="page-login" class="row justify-content-center">

              <!-- Formulario Login -->
              <div class="col-lg-3 d-none d-lg-block bg-login-image"></div>
              <div class="col-sm-12 col-md-10 col-lg-9">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
                  </div>
                  <form id="loginForm" method="POST" class="user needs-validation" novalidate>

                    <!-- Username -->
                    <div class="form-group">
                      <input type="text" id="usernameLog" name="usernameLog" class="form-control form-control-user"
                        placeholder="Nombre usuario" minlength="4" required>
                      <div class="invalid-feedback">
                        Por favor introduzca un nombre de usuario válido.
                      </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                      <div class="input-group">
                        <input type="password" id="contrasenaLog" name="contrasenaLog" minlength="4"
                          class="form-control form-control-user" placeholder="Contraseña" required>
                        <div class="input-group-append">
                          <a id="show" onclick="mostrarPassword()" class="btn btn-primary text-center align-middle">
                            <i id="showpass" class="fas fa-eye-slash"></i>
                          </a>
                        </div>
                      </div>
                      <div class="invalid-feedback">
                        La contraseña debe tener al menos 4 caracteres.
                      </div>
                    </div>

                    <br>
                    <div class="alert alert-danger" role="alert" id="resultadoLog" hidden></div>
                    <!-- Sign up button -->
                    <button id="enviarLog" type="submit" class="btn btn-primary btn-user btn-block">
                      Iniciar sesión
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a href="page-access-forgot.php" class="small">¿Olvido la contraseña?</a>
                  </div>
                  <div class="text-center">
                    <a href="page-access-registro.php" class="small">Crear una cuenta!</a>
                  </div>
                </div>
              </div>
              <!-- /.Formulario Login -->

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

  <!-- Footer -->
  <?php require 'front/general/footer.php'; ?>
  <!-- End of Footer -->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <script src="scripts/login.js"></script>

  <script type="text/javascript">
    function mostrarPassword() {
      var pass = document.getElementById("contrasenaLog");
      if (pass.type == "password") {
        pass.type = "text";
        $('i#showpass').removeClass('fas fa-eye-slash').addClass('fas fa-eye');
      } else {
        pass.type = "password";
        $('i#showpass').removeClass('fas fa-eye').addClass('fas fa-eye-slash');
      }
    }
  </script>

</body>

</html>