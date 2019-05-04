<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Control de estudios / SAD - Forgot</title>

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

            <div id="page-forgot" class="row justify-content-center">

              <!-- Formulario Forgot -->
              <div class="col-lg-3 d-none d-lg-block bg-password-image"></div>
              <div class="col-sm-10 col-md-9 col-lg-9">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">¿Olvido la contraseña?</h1>
                    <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a
                      link to reset
                      your password!</p>
                  </div>
                  <form id="forgotForm" method="POST" class="user needs-validation" novalidate>
                    <div class="form-group">
                      <input type="email" id="pass_forgot" name="pass_forgot" class="form-control form-control-user"
                        placeholder="Correo" required>
                      <div class="invalid-feedback">
                        Por favor introduzca un correo válido.
                      </div>
                    </div>
                    <button id="enviarFor" type="submit" class="btn btn-primary btn-user btn-block">
                      Recuperar contraseña
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a href="page-access-registro.php" class="small">Crear una cuenta!</a>
                  </div>
                  <div class="text-center">
                    <a href="index.php" class="small">¿Ya tienes una cuenta? Iniciar sesión!</a>
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

</body>

</html>