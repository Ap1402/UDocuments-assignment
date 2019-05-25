<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Tabla de Solicitudes Alumno </title>
  <?php require 'back/admin/restriccionAcceso.php';?>

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
    <?php require_once 'front/general/sidebar.php';?>
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
        <div id="page-admin-table" class="container-fluid">


          <!-- Título de página -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
            <h1 class="h3 mb-0 text-gray-800">Tabla de Solicitudes Alumno</h1>
            <a class="d-none d-sm-inline-block"><i class="fas fa-fw fa-table fa-2x text-gray-300"></i> </a>
          </div>
          <!-- /.Título de página -->


          <!-- Tabla de Admin -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Cédula</th>
                      <th>Alumno</th>
                      <th>Fecha de creación</th>
                      <th>Estado de solicitud</th>
                      <th>Fecha de Atención</th>
                      <th>Tipo</th>
                      <th>Carrera</th>
                      <th>Turno</th>
                      <th>Personal de atención</th>
                      <th>Validar Docs</th>
                      <th>Ver perfil</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      include 'back/conexion.php';

                      $sql = "SELECT carreras.nombre as carreraNombre, id_alumno, alumno, cedula, p_nombre, p_apellido, documento, solicitudes.fechaCreacion, id_solicitud, estadoSolicitud, fechaAtencion, solicitudes.tipo, nombre_solicitud, solicitudes.carrera, alumnos.turno, personalAtencion FROM alumnos
                              INNER JOIN solicitudes ON alumnos.id_alumno = solicitudes.alumno
                              LEFT JOIN tipo_solicitud ON tipo_solicitud.tipo = solicitudes.tipo
                              LEFT JOIN carreras ON solicitudes.carrera = carreras.codigo";

                      $result = mysqli_query($conexion, $sql);
                      if ($result->num_rows > 0) {
                          while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <tr id="solicitudA-<?=$row['id_solicitud']?>">
                      
                      <td><?=$row['cedula']?></td>
                      <td><?=$row['p_nombre'].' '.$row['p_apellido']?></td>
                      <td><?=$row['fechaCreacion']?></td>

                      <td>

                        <?php if ($row['estadoSolicitud'] == 0) {?>

                        <small><a id="estadoSolicitud" class="toggle-modal" data-active="false" data-id="<?=$row['id_solicitud']?>"
                            data-role="update" data-prueba="<?=$row['id_alumno']?>"><i class="fas fa-minus-circle text-secondary"></i> Pendiente</a></small>

                        <?php } elseif ($row['estadoSolicitud'] == 1) {?>

                        <small><a id="estadoSolicitud" class="toggle-modal" data-active="true" data-id="<?=$row['id_solicitud']?>"
                            data-role="update" data-prueba="<?=$row['id_alumno']?>"><i class="fas fa-check-circle text-success"></i> Atendida</a></small>

                        <?php }?>

                      </td>

                      <td> <a id="fechaActualizacion" data-active="false" data-id="<?=$row['id_solicitud']?>"
                            data-role="update"><?=$row['fechaAtencion']?></a></td>                      
                      <td><?=$row['nombre_solicitud']?></td>
                      <td><?=$row['carreraNombre']?></td>
                      <td>
                      <?php
                      switch ($row['turno']) {
                        case 1:
                            $turno = 'Mañana';
                            break;
                        case 2:
                            $turno = 'Tarde';
                            break;
                        case 3:
                            $turno = 'Noche';
                            break;
                        default:
                            $turno = '';
                            break;
                    };
                    echo $turno;
                      ?>
                      </td>
                      <td><?=$row['personalAtencion']?></td>
                      <td><a href="<?='page-admin-check.php?idd='.$row['documento'].'&ida='.$row['id_alumno'].'&ci='.$row['cedula'].'&mi='.$row['tipo']?>"><i class="fas fa-clipboard-list"></i></a> </td>
                      <td><a href="<?='page-student-perfil.php?ida='.$row['id_alumno']?>"><i class="fas fa-id-card"></i></a> </td>

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

      <!-- Modal de advertencia de cambios -->
      <div class="modal fade" id="cambiosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Advertencia</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              Seleccione "Guardar cambios" a continuación si está seguro de continuar con la operación.<br>
              <b>Este cambio se hace de manera inmediata y puede ser revertido.</b>
              <input type="hidden" id="codigo">
              <input type="hidden" id="elemento">
              <input type="hidden" id="estado">
              <input type="hidden" id="id_alumno">
            </div>
            <div class="modal-footer">
              <label><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button></label>
              <label><a id="ejecutarCambioSolicitudA" class="btn btn-primary text-white">Guardar cambios</a></label>
            </div>
          </div>
        </div>
      </div>

      <!-- /.Modal de advertencia de cambios -->

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
  <?php require_once 'front/general/modal-logout.php';?>
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

<script>
    $(document).ready(function () {      
      $(document).on('click', 'a[data-role=update]', function () {
        var codigoCarrera = $(this).attr('data-id'); // data-id (row['codigo']) codigo de la carrera
        var idElemento = $(this).attr('id'); // id (estatus, manana,tarde,noche)
        var estadoElemento = $(this).attr('data-active');
        var id_alumno = $(this).attr('data-prueba') // data-active (row['idemento']) activo o no

        $('#codigo').val(codigoCarrera);
        $('#elemento').val(idElemento);
        $('#estado').val(estadoElemento);
        $('#id_alumno').val(id_alumno);

        $('#cambiosModal').modal('toggle');
      });

      $('#ejecutarCambioSolicitudA').on('click', ejecutarAjaxSolicitudA);


      function ejecutarAjaxSolicitudA(event) {
        var codigo = $('#codigo').val();
        var elemento = $('#elemento').val();
        var estado = $('#estado').val();
        var id_alumno = $('#id_alumno').val();

        var personalAtencion = $('span[id=usernameActual]').text();

        var datosEnviadosS = {
          'codigo': codigo,
          'elemento': elemento,
          'estado': estado,
          'id_alumno':id_alumno,
          'personalAtencion': personalAtencion
        };

        $.ajax({
            type: 'POST',
            url: './back/admin/backSolicitudAlumno.php',
            data: datosEnviadosS
          })
          .done(function (dataS) {
            var datosRecibidosS = $.parseJSON(dataS);
            if (datosRecibidosS.estado == 0) {
              $('#solicitudA-' + codigo + ' #' + elemento).attr('data-active', 'false');
              $('#solicitudA-' + codigo + ' #' + elemento).html(
                '<i class="fas fa-minus-circle text-secondary"></i> Pendiente</a>');
                var d = new Date();
              var strDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();
              $('#fechaAtencion-' + codigo + ' #' + elemento).html(strDate);
            } else if (datosRecibidosS.estado == 1) {
              var d = new Date();
              var strDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();
              $('#fechaAtencion-' + codigo + ' #' + elemento).html(strDate);

              $('#solicitudA-' + codigo + ' #' + elemento).attr('data-active', 'true');
              $('#solicitudA-' + codigo + ' #' + elemento).html(
                '<i class="fas fa-check-circle text-success"></i> Atendida</a>');
            }
            $('#cambiosModal').modal('toggle');
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