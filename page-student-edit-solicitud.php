<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Dashboard </title>

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
    <?php require('front/general/sidebar.php'); ?>
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
        <div id="page-student-edit-solicitud" class="container-fluid">

          <?php
$admin = 1; // probando que sea admin para restringir la edicion de algunos campos
$verificar_check = 1; // verificar si fue o no chequeado por control de estudios

// Iniciando valores
$cedula = '';

?>

          <!-- Formulario Editar Solicitud -->
          <div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
            <div class="card shadow mb-4">
              <div class="card-body">
                <div class="p-4">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Editar - Solicitud de ingreso
                    </h1>
                  </div>
                  <form id="solicitudEditForm" method="POST" class="user needs-validation" novalidate>
                    <div class="alert alert-success" role="alert" id="exito" hidden></div>
                    <br>

                    <div class="form-group row">
                      <div class="col-sm-6 my-auto">
                        <select id="carrera" name="carrera" class="form-control" data-toggle="tooltip"
                          data-placement="top" title="Carrera"
                          <?php echo ($admin == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
                          <option disabled selected value="<?php echo $carrera ?>"><?php echo $carrera ?></option>
                          <?php
                            include 'back/conexion.php';

                            $sql = "SELECT * FROM carreras WHERE estatus=1";
                            $result = mysqli_query($conexion, $sql);
                            $resultArray = array();
                            if ($result->num_rows > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value=" . $row["codigo"] . ">" . $row["nombre"] . "</option>";
                                    $resultArray[] = array("codigo" => $row["codigo"], "nombre" => $row["nombre"], "manana" => $row["manana"], "tarde" => $row["tarde"], "noche" => $row["noche"]);
                                };

                            };
                          ?>
                        </select>
                        <div class="invalid-feedback">
                          Por favor seleccione una opción.
                        </div>
                      </div>
                      <div class="col-sm-6 my-auto">
                        <select id="turno" name="turno" class="form-control" data-toggle="tooltip" data-placement="top"
                          title="Turno"
                          <?php echo ($admin == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
                          <option disabled="disabled" selected value="<?php echo $turno ?>"><?php echo $turno ?>
                          </option>

                        </select>
                        <div class="invalid-feedback">
                          Por favor seleccione una opción.
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col my-auto">
                        <select id="nombre_solicitud" name="nombre_solicitud" class="form-control" data-toggle="tooltip"
                          data-placement="top" title="Método de ingreso"
                          <?php echo ($admin == 1 || $verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
                          <option disabled selected value="<?php echo $tipo ?>"><?php echo $nombre_solicitud ?></option>
                          <?php
                            $sql2 = "SELECT * FROM tipo_solicitud WHERE activa=1";
                            $result2 = mysqli_query($conexion, $sql2);

                            if ($result2->num_rows > 0) {
                              while ($row2 = mysqli_fetch_assoc($result2)) {
                          ?>
                                <option value="<?=$row2['tipo'];?>"> <?=$row2['nombre_solicitud'];?></option>

                          <?php
                              };
                            };
                          ?>
                        </select>
                        <div class="invalid-feedback">
                          Por favor seleccione una opción.
                        </div>
                      </div>
                    </div>

                    <br>
                    <div class="alert alert-danger" role="alert" id="resultado" hidden>
                    </div>
                    <br>

                    <button id="editSol" type="submit" class="btn btn-primary btn-user btn-block">
                      Guardar cambios
                    </button>

                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /.Formulario Editar Solicitud -->

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
  <?php require('front/general/modal-logout.php'); ?>
  <!-- End of Logout Modal-->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages / carga automaticamente dashboard.php-->
  <script src="js/sb-admin-2.js"></script>

  <script>
    $(document).ready(function () {

      var carreras = <?php echo json_encode($resultArray) ?>;

      $("#carrera").change(function () {

        var codigo = $("#carrera").val();
        var nuevasopciones = "";

        console.log(carreras[codigo - 1]);

        if (carreras[codigo - 1]["manana"] == 1) {
          nuevasopciones += "<option value='1'>Mañana</option>";
        }
        if (carreras[codigo - 1]["tarde"] == 1) {
          nuevasopciones += "<option value='2'>Tarde</option>";
        }
        if (carreras[codigo - 1]["noche"] == 1) {
          nuevasopciones += "<option value='3'>Noche</option>";
        }

        $("select#turno").html(nuevasopciones);
      });
    });
  </script>

</body>

</html>