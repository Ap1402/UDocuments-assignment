<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Datos del alumno </title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/images/favicon.ico" type="image/x-icon">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="css/font.css" rel="stylesheet">

  <!-- Custom styles for this template-->

  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="css/dash.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php require 'front/general/sidebar.php';?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php require 'front/general/navbar.php';?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <!-- Contenido Variable - Todo lo demas es fijo -->
        <div id="page-student-datos" class="container-fluid">

          <!-- Título de página -->
          <div class="d-sm-flex col-sm-12 col-md-10 col-lg-8 align-items-center justify-content-between mb-4 mx-auto">
            <h1 class="h3 mb-0 text-gray-800">Datos del alumno<br><small class="text-muted"> asegúrese de rellenar correctamente sus datos</small></h1>
            <a class="d-none d-sm-inline-block"><i class="fas fa-user-edit fa-2x text-gray-300"></i></a>
          </div>
          <!-- /.Título de página -->

          <!-- Formulario Datos -->
          <div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
            <div class="card shadow mb-4">
              <div class="card-body">
                <div class="p-4">
                  <form id="datosForm" method="POST" class="user needs-validation" novalidate>
                    <div class="alert alert-success" role="alert" id="exito" hidden></div>

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
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                          class="form-control form-control-user" placeholder="Fecha nacimiento" min="1930-07-22"
                          max="<?php echo date('Y-m-d'); ?>" required>
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
                        <input type="text" id="pais" name="pais" class="form-control form-control-user"
                          placeholder="País" minlength="4" required>
                        <div class="invalid-feedback">
                          Por favor introduzca un País válido.
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 my-auto">
                        <input type="text" id="estado" name="estado" class="form-control form-control-user"
                          placeholder="Estado" minlength="4" required>
                        <div class="invalid-feedback">
                          Por favor introduzca un Estado válido.
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 my-auto">
                        <input type="text" id="ciudad" name="ciudad" class="form-control form-control-user"
                          placeholder="Ciudad" minlength="4" required>
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
                        <input type="text" id="nac_municipio" name="nac_municipio"
                          class="form-control form-control-user" placeholder="municipio" minlength="4" required>
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
                        <input type="number" id="i_egreso" name="i_egreso" class="form-control"
                          placeholder="Año de egreso" minlength="1930" max="<?php echo date('Y') ?>" required>
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
          <!-- /.Formulario Datos -->

        </div>
        <!-- /.Contenido Variable - Todo lo demas es fijo -->
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php require 'front/general/footer.php';?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php require 'front/general/modal-logout.php';?>
  <!-- End of Logout Modal-->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages / carga automaticamente dashboard.php-->
  <script src="js/sb-admin-2.js"></script>

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

</body>

</html>