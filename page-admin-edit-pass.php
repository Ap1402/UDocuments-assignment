<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Editar (Correo / Contraseña) </title>

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
    <?php require 'front/general/sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php require 'front/general/navbar.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <!-- Contenido Variable - Todo lo demas es fijo -->
        <div id="page-student-edit-pass" class="container-fluid">

          <?php
          include 'back/conexion.php';

          if (($_SESSION['edicion_creacion_admin'] == 1) && (isset($_GET['id_admin']))) {
            $id_admin = $_GET['id_admin'];
          } elseif ($_SESSION['edicion_creacion_admin'] == 1 && !(isset($_GET['id_admin']))) {
            $id_admin = $_SESSION['id_admin'];
          };

          $consulta = "SELECT *
            FROM administradores LEFT JOIN rol_admin ON rol_admin.id = administradores.rol
                WHERE administradores.id_admin ='$id_admin'";
          $resultado = mysqli_query($conexion, $consulta);
          $datos = mysqli_fetch_array($resultado);

          // Iniciando valores
          $nombre = $datos['nombre'];
          $contrasena = $datos['contrasena'];
          $estatus = $datos['estatus'];
          $rol_admin = $datos['rol']; // no usar $rol porque $rol = $_SESSION['rol]
          $rol_admin_name =  $datos['rol_name'];

          ?>

          <!-- Título de página -->
          <div class="d-sm-flex col-sm-12 col-md-10 col-lg-8 align-items-center justify-content-between mb-4 mx-auto">
            <h1 class="h3 mb-0 text-gray-800">Editar Admin</h1>
            <a class="d-none d-sm-inline-block"><i class="fas fa-user-lock fa-2x text-gray-300"></i></a>
          </div>
          <!-- /.Título de página -->

          <!-- Formulario Editar Correo y Contraseña -->
          <div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
            <div class="card shadow mb-4">
              <div class="card-body">
                <div class="p-4">
                  <form id="passEditForm" method="POST" class="user needs-validation" novalidate>

                    <div class="alert alert-success" role="alert" id="exito" style="display: none;"></div>
                    <input name="adminId" id="adminId" value="<?php echo $id_admin ?>" hidden>
                    <div class="form-group">
                      <label class="pl-2"><small>Nombre</small></label><br>
                      <input type="text" id="nombreEdit" name="nombreEdit" class="form-control form-control-user" placeholder="Nombre" minlength="2" data-toggle="tooltip" data-placement="top" title="Nombre" value="<?php echo $nombre ?>" required>
                      <div class="invalid-feedback">
                        Este campo debe tener al menos 2 caracteres.
                      </div>
                    </div>
                    <div class="form-group row pt-2">
                      <div class="col-11">
                        <label for="botonMostrarContrasena">
                          <h5 class="text-gray-900 pl-2">Modificar Contraseña</h5>
                        </label>
                      </div>
                      <div class="col-1 text-center">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="botonMostrarContrasena">
                          <label class="custom-control-label" for="botonMostrarContrasena">
                          </label>
                        </div>
                      </div>
                    </div>
                    <div id="contrasenaMostrar" style="display: none;">
                      <div class="form-group">
                        <label class="pl-2"><small>Contraseña</small></label><br>
                        <div class="input-group">
                          <input type="password" id="contrasenaEdit" name="contrasenaEdit" minlength="4" class="form-control form-control-user" placeholder="Contraseña" data-toggle="tooltip" data-placement="top" title="Contraseña" value="">
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
                        <label class="pl-2"><small>Repetir contraseña</small></label><br>
                        <div class="input-group">
                          <input type="password" id="contrasena2" name="contrasena2" minlength="4" class="form-control form-control-user" placeholder="Contraseña" data-toggle="tooltip" data-placement="top" title="Repetir contraseña" value="">
                          <div class="input-group-append">
                            <a id="show2" onclick="mostrarPassword()" class="btn btn-primary text-center align-middle">
                              <i id="showpass2" class="fas fa-eye-slash"></i>
                            </a>
                          </div>
                        </div>
                        <div class="invalid-feedback">
                          Este campo debe tener al menos 4 caracteres.
                        </div>
                      </div>
                    </div>
                    <?php if ($_SESSION['edicion_creacion_admin'] == 1 && isset($_GET['id_admin'])) { ?>
                      <div class="form-group">
                        <label class="pl-2"><small>Rol</small></label><br>
                        <select id="rol_admin" name="rol_admin" class="form-control">
                          <option selected value="<?php echo $rol_admin ?>"><?php echo $rol_admin_name ?></option>
                          <?php
                          $consulta = "SELECT id, rol_name FROM rol_admin";
                          $resultado = mysqli_query($conexion, $consulta);
                          if ($resultado->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($resultado)) {
                              echo "<option value=" . $row["id"] . ">" . $row["rol_name"] . "</option>";
                            };
                          };
                          ?>
                        </select>
                        <div class="invalid-feedback">
                          Seleccione una opción.
                        </div>
                      </div>
                    <?php }; ?>


                    <?php if ($_SESSION['edicion_creacion_admin'] == 1 && isset($_GET['id_admin'])) { ?>
                      <div class="form-group">

                        <label class="pl-2"><small>Estado</small></label><br>
                        <select id="estatus" name="estatus" class="form-control">
                          <option selected value="<?php echo $estatus ?>">
                            <?php echo (($estatus == 1) ? 'Activo' : 'Inactivo') ?></option>
                          <option value="1">Activo</option>
                          <option value="0">Inactivo</option>
                        </select>
                        <div class="invalid-feedback">
                          Seleccione una opción.
                        </div>
                      </div>
                    <?php }; ?>

                    <div class="alert alert-danger" role="alert" id="resultado" style="display: none;">
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
          <!-- /.Formulario Editar Correo y Contraseña -->

        </div>
        <!-- /.Contenido Variable - Todo lo demas es fijo -->
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php require 'front/general/footer.php'; ?>
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
  <?php require 'front/general/modal-logout.php'; ?>
  <!-- End of Logout Modal-->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="scripts/editAdmin.js"></script>


  <!-- Custom scripts for all pages / carga automaticamente dashboard.php-->
  <script src="js/sb-admin-2.js"></script>



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
  <script type="text/javascript">
    $("#botonMostrarContrasena").click(function() {
      if ($("#botonMostrarContrasena").is(':checked')) {
        $('#contrasenaMostrar').show();
        $('#contrasena').val('');
        $('#contrasena2').val('');

      } else {
        $('#contrasenaMostrar').hide();
        $('#contrasena').val('');
        $('#contrasena2').val('');

      }
    });
  </script>

</body>

</html>