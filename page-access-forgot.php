<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Control de estudios / SAD - Recuperación de contraseña</title>

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

      <div class="col-xl-8 col-lg-10 col-md-10 mx-5 px-3">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">

            <!-- Nested Row within Card Body -->

            <div id="page-forgot" class="row justify-content-center">

              <!-- Formulario Forgot -->
              <div class="col-lg-2 d-none d-lg-block bg-password-image"></div>
              <div class="col-sm-10 col-md-9 col-lg-10">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">¿Olvidó la contraseña?</h1>
                    <p class="mb-4">Por favor escriba su cédula</p>
                  </div>
                  <form id="forgotForm" method="POST" class="user needs-validation" novalidate>
                    <div class="form-group">
                      <input type="number" id="cedula" name="cedula" class="form-control"
                        placeholder="Cédula" pattern="\d*.{7,11}" required>
                      <div class="invalid-feedback">
                        Este campo debe tener al menos 7 cifras.
                      </div>
                    </div>

                    <div class="alert alert-danger" role="alert" id="resultado" style="display: none"></div>
                    
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

  <script>
    $(document).ready(function () {      

      $('#enviarFor').on('click', ejecutarAjaxForgot);


      function ejecutarAjaxForgot(event) {
        var formData = new FormData(document.getElementById("forgotForm"));

        $.ajax({
            type: 'POST',
            url: './back/estudiante/forgot.php',
            data :formData,
            encode: true,
            cache: false,
            contentType: false,
            processData: false,
            dataType : 'json',
          })
          .done(function (datos) {
            if (!datos.exito) {

                $('#resultado').show();
                $('#resultado').text('Algo salio mal, Cédula no registrada');
            } else {
                window.location.href = 'page-access-forgot-preguntas.php?ci='+datos.cedula+'&ask='+datos.pregunta;
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