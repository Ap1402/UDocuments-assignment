<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Tabla de Administradores </title>
  <?php require('back/admin/restriccionAcceso.php'); ?>

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/images/favicon.ico" type="image/x-icon">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="css/font.css" rel="stylesheet">

  <!-- Custom styles for this template-->

  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="css/dash.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">
  <link href="css/table.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php require_once('front/general/sidebar.php'); ?>
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
        <div id="page-admin-table" class="container-fluid">


          <!-- Título de página -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2 mx-auto">
            <h1 class="h3 mb-0 text-gray-800">Tabla Administradores</h1>
            <a id="btnCrearAdmin" href="#" class="d-sm-inline-block btn btn-sm btn-primary text-white shadow-sm">
              <i class="fas fa-user-cog fa-sm"></i>
              Registrar administrador
            </a>
          </div>
          <!-- /.Título de página -->


          <!-- Tabla de Admin -->
          <div class="card shadow mb-2">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre de usuario</th>
                      <th>Nombres</th>
                      <th>Rol</th>
                      <th>Estatus</th>
                      <th>Editar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include 'back/conexion.php';
                    $sql = "SELECT *
                            FROM administradores LEFT JOIN rol_admin ON rol_admin.id = administradores.rol";
<<<<<<< HEAD
=======

>>>>>>> 4ef5fbca593ac10f9df8894f5a0ddc6edaf6d9bf
                    $result = mysqli_query($conexion, $sql);
                    if ($result->num_rows > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                        <tr>
                          <td><?= $row['usuario'] ?></td>
                          <td><?= $row['nombre'] ?></td>
                          <td>
                            <?= $row['rol_name']?>
                          </td>
                          <td><?= ($row['estatus']) ? 'Activo' : 'Inactivo' ?></td>
                          <td><a href="<?= 'page-admin-edit-pass.php?id_admin=' . $row['id_admin'] ?>"><i class="fas fa-user-cog"></i></a> </td>
                        </tr>

                      <?php
                    };
                  };
                  ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.Tabla de Admin -->


        </div>
        <!-- /.Contenido Variable - Todo lo demas es fijo -->
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Modal CREAR ADMIN-->
      <div class="modal fade" id="crearAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCrearAdmin" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCrearAdmin">Registrar nuevo administrador</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form id="crearAdmin" method="POST" class="user needs-validation" novalidate>

              <div class="modal-body">
                <div class="alert alert-success" role="alert" id="exito" style="display: none;"></div>

                <div class="form-group row">
                  <div class="col-sm-6">
                    <label class="pl-2"><small>Nombre</small></label><br>
                    <input type="text" id="nombre" name="nombre" class="form-control form-control-user" placeholder="Nombre" minlength="2" data-toggle="tooltip" data-placement="top" title="Nombre" required>
                    <div class="invalid-feedback">
                      Este campo debe tener al menos 2 caracteres.
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label class="pl-2"><small>Nombre de ususario</small></label><br>
                    <input type="text" id="username" name="username" class="form-control form-control-user" placeholder="Nombre de usuario" minlength="4" data-toggle="tooltip" data-placement="top" title="Nombre de usuario" required>
                    <div class="invalid-feedback">
                      Este campo debe tener al menos 4 caracteres.
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="pl-2"><small>Contraseña</small></label><br>
                  <div class="input-group">
                    <input type="password" id="contrasena" name="contrasena" minlength="4" class="form-control form-control-user" placeholder="Contraseña" required>
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
                    <input type="password" id="contrasena2" name="contrasena2" minlength="4" class="form-control form-control-user" placeholder="Repetir contraseña" required>
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

                <div class="form-group">
                  <label class="pl-2"><small>Rol</small></label><br>
                  <select id="rol_admin" name="rol_admin" class="form-control" required>
                    <option value="1">Personal</option>
                    <option value="2">Asistente</option>
                    <option value="3">Administrador</option>
                  </select>
                  <div class="invalid-feedback">
                    Seleccione una opción.
                  </div>
                </div>


                <div class="alert alert-danger" role="alert" id="resultado" style="display: none;">
                </div>
                <br>
              </div>
              <div class="modal-footer">
                <label><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button></label>
                <label><button type="submit" id="registroAdmin" class="btn btn-primary text-white">Registrar</button></label>
              </div>

            </form>
          </div>
        </div>
      </div>
      <!-- /.Modal CREAR ADMIN-->
      <!-- /.Modal EDITAR ADMIN-->

                  

        <!-- /.Modal EDITAR ADMIN-->



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
  <?php require_once('front/general/modal-logout.php'); ?>
  <!-- End of Logout Modal-->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages / carga automaticamente dashboard.php-->
  <script src="js/sb-admin-2.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/front/table.js"></script>
  <script src="scripts/crearAdmin.js"></script>

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
    $(document).ready(function() {
<<<<<<< HEAD
=======

>>>>>>> 4ef5fbca593ac10f9df8894f5a0ddc6edaf6d9bf
      $(document).on('click', '#btnCrearAdmin', function() {
        $('#crearAdminModal').modal('toggle');
      });
    });
  </script>

</body>

</html>