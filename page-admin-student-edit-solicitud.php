<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Editar - Solicitud de ingreso </title>

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

include 'back/conexion.php';

// ------------ Obtener la id del alumno dependiendo la sesion
if (isset($_GET['ida']) && ($rol > 0)) {
    $ida = $_GET['ida'];
};
// ------------ /.Obtener la id del alumno dependiendo la sesion

$sql_sol = "SELECT carrera, turno, solicitudes.tipo, tipo_solicitud.nombre_solicitud as nombreSolicitud, carreras.nombre as carreraNombre FROM solicitudes
          LEFT JOIN tipo_solicitud ON solicitudes.tipo=tipo_solicitud.tipo
          LEFT JOIN carreras ON carreras.codigo=solicitudes.carrera
              WHERE solicitudes.alumno = $ida;";

$result_sol = mysqli_query($conexion, $sql_sol);
if ($result_sol->num_rows > 0) {
    $row_sol = mysqli_fetch_assoc($result_sol);
    
    $carrera = $row_sol['carrera'];
    $tipo = $row_sol['tipo']; // metodo_ingreso
    $nombre_solicitud = $row_sol['nombreSolicitud'];
    $turno = $row_sol['turno'];
    $carreraNombre = $row_sol['carreraNombre'];
    $mensaje = '';
} else {
    $mensaje = "Este alumno no tiene ninguna solicitud";
    $carrera = '';
    $tipo = ''; // metodo_ingreso
    $nombre_solicitud = '';
    $turno = '';
    $carreraNombre = '';
};


switch ($turno) {
    case 1:
        $turno_name = 'Mañana';
        break;
    case 2:
        $turno_name = 'Tarde';
        break;
    case 3:
        $turno_name = 'Noche';
        break;
    default:
        $turno_name = '';
        break;
};

$verificar_check = 0; // verificar si fue o no chequeado por control de estudios

?>
<!-- Título de página -->
<div class="d-sm-flex col-sm-12 col-md-10 col-lg-8 align-items-center justify-content-between mb-4 mx-auto">
            <h1 class="h3 mb-0 text-gray-800">Editar - Solicitud de ingreso</h1>
            <a class="d-none d-sm-inline-block"><i class="fas fa-vote-yea fa-2x text-gray-300"></i></a>
          </div>
          <!-- /.Título de página -->

          <!-- Formulario Editar Solicitud -->
          <div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
            <div class="card shadow mb-4">
              <div class="card-body">
                <div class="p-4">
                  <form id="solicitudForm" method="POST" class="user needs-validation" novalidate>
                  <input id="idEstudiante" name="idEstudiante" value="<?php echo $ida?>" hidden>
                 <div class="alert alert-success" role="alert" id="exito" style="display: none;"></div> 
                  <?php
// ---------------Hacer si el alumno no tiene ninguna solicitud
if ($mensaje != '') {

    ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle"></i>
                    <strong>Advertencia!</strong>
                    Este alumno no tiene ninguna solicitud.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      &times;
                    </button>
                  </div>
  <?php
}
;
// --------------- /.Hacer si el alumno no tiene ninguna solicitud
?>                  

                    <div class="form-group row">
                      <div class="col-sm-6 my-auto">
                        <label class="pl-2"><small>Carrera</small></label><br>
                        <select id="carrera" name="carrera" class="form-control" data-toggle="tooltip"
                          data-placement="top" title="Carrera"
                          <?php echo ($verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
                          <option  value="<?php echo $carrera ?>"><?php echo $carreraNombre ?></option>
                            <?php 
                            include 'back/conexion.php';

                            $sql = "SELECT * FROM carreras WHERE estatus=1";
                            $result = mysqli_query($conexion, $sql);
                            $resultArray = array();
                            $i=1;
                            if ($result->num_rows > 0) {
                              while ($row = mysqli_fetch_assoc($result)) {
                              echo "<option data-id=".$i." value=". $row["codigo"] .">".$row["nombre"]."</option>";
                              $resultArray[]=array("codigo"=>$row["codigo"],"nombre"=>$row["nombre"],"manana"=>$row["manana"],"tarde"=>$row["tarde"],"noche"=>$row["noche"]);
                              $i++;
                              };                            
                            };
                          ?>
                        </select>
                        <div class="invalid-feedback">
                          Por favor seleccione una opción.
                        </div>
                      </div>
                      <div class="col-sm-6 my-auto">
                        <label class="pl-2"><small>Turno</small></label><br>
                        <select id="turno" name="turno" class="form-control" data-toggle="tooltip" data-placement="top"
                          title="Turno"
                          <?php echo ($verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
                          <option disabled="disabled" selected value="<?php echo $turno ?>"><?php echo $turno_name ?>
                          </option>

                        </select>
                        <div class="invalid-feedback">
                          Por favor seleccione una opción.
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col my-auto">
                        <label class="pl-2"><small>Método de ingreso</small></label><br>
                        <select id="nombre_solicitud" name="nombre_solicitud" class="form-control" data-toggle="tooltip"
                          data-placement="top" title="Método de ingreso"
                          <?php echo ($verificar_check == 0) ? 'required' : 'readonly disabled' ?>>
                          <option value="<?php echo $tipo ?>"><?php echo $nombre_solicitud ?></option>
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

                    <div class="alert alert-danger" role="alert" id="resultado" style="display: none;">
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

      var carreras = <?php echo json_encode($resultArray) ?> ;

      $("#carrera").change(function () {

        var codigo = $("#carrera option:selected").attr('data-id');        
        var nuevasopciones = "";

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
<script src="scripts/modificarSolicitudEstudiante.js"> </script>

</body>

</html>