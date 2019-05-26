<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Tabla de Carreras / Solicitud </title>
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
          <div class="d-sm-flex align-items-center justify-content-between mb-2 mx-auto">
            <h1 class="h3 mb-0 text-gray-800">Tabla de Carreras</h1>
            <a class="d-none d-sm-inline-block"><i class="fas fa-fw fa-table fa-2x text-gray-300"></i> </a>
          </div>
          <!-- /.Título de página -->


          <!-- Tabla de Admin -->
          <div class="card shadow mb-2">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Carrera</th>
                      <th>Estatus</th>
                      <th>Mañana</th>
                      <th>Tarde</th>
                      <th>Noche</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
include 'back/conexion.php';

$sql = "SELECT * FROM carreras";

$result = mysqli_query($conexion, $sql);
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>

                    <tr id="carrera-<?=$row['codigo']?>">
                      <td><?=$row['codigo']?></td>
                      <td><?=$row['nombre']?></td>
                      <td>

                        <?php if ($row['estatus'] == 0) {?>

                        <small><a id="estatus" class="toggle-modal" data-active="false" data-id="<?=$row['codigo']?>"
                            data-role="update"><i class="fas fa-minus-circle text-secondary"></i> Desactivo</a></small>

                        <?php } elseif ($row['estatus'] == 1) {?>

                        <small><a id="estatus" class="toggle-modal" data-active="true" data-id="<?=$row['codigo']?>"
                            data-role="update"><i class="fas fa-check-circle text-success"></i> Activo</a></small>

                        <?php }?>

                      </td>
                      <td>

                        <?php if ($row['manana'] == 0) {?>

                        <small><a id="manana" class="toggle-modal" data-active="false" data-id="<?=$row['codigo']?>"
                            data-role="update"><i class="fas fa-minus-circle text-secondary"></i> Desactivo</a></small>

                        <?php } elseif ($row['manana'] == 1) {?>

                        <small><a id="manana" class="toggle-modal" data-active="true" data-id="<?=$row['codigo']?>"
                            data-role="update"><i class="fas fa-check-circle text-success"></i> Activo</a></small>

                        <?php }?>

                      </td>
                      <td>

                        <?php if ($row['tarde'] == 0) {?>

                        <small><a id="tarde" class="toggle-modal" data-active="false" data-id="<?=$row['codigo']?>"
                            data-role="update"><i class="fas fa-minus-circle text-secondary"></i> Desactivo</a></small>

                        <?php } elseif ($row['tarde'] == 1) {?>

                        <small><a id="tarde" class="toggle-modal" data-active="true" data-id="<?=$row['codigo']?>"
                            data-role="update"><i class="fas fa-check-circle text-success"></i> Activo</a></small>

                        <?php }?>

                      </td>
                      <td>

                        <?php if ($row['noche'] == 0) {?>

                        <small><a id="noche" class="toggle-modal" data-active="false" data-id="<?=$row['codigo']?>"
                            data-role="update"><i class="fas fa-minus-circle text-secondary"></i> Desactivo</a></small>

                        <?php } elseif ($row['noche'] == 1) {?>

                        <small><a id="noche" class="toggle-modal" data-active="true" data-id="<?=$row['codigo']?>"
                            data-role="update"><i class="fas fa-check-circle text-success"></i> Activo</a></small>

                        <?php }?>

                      </td>
                    </tr>

                    <?php
}
    ;
}
;
?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.Tabla de Admin -->

          <!-- Título de página -->
          <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-2 mx-auto">
            <h1 class="h3 mb-0 text-gray-800">Tabla de Solicitudes</h1>
            <a class="d-none d-sm-inline-block"><i class="fas fa-fw fa-table fa-2x text-gray-300"></i> </a>
          </div>
          <!-- /.Título de página -->

          <!-- Tabla de Admin -->
          <div class="card shadow mb-2">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre de solicitud</th>
                      <th>Estado de solicitud</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      include 'back/conexion.php';

                      $sql = "SELECT * FROM tipo_solicitud";

                      $result = mysqli_query($conexion, $sql);
                      if ($result->num_rows > 0) {
                          while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <tr id="solicitud-<?=$row['tipo']?>">

                      <td><?=$row['tipo']?></td>
                      <td><?=$row['nombre_solicitud']?></td>

                      <td>

                        <?php if ($row['activa'] == 0) {?>

                        <small><a id="activa" class="toggle-modal" data-active="false" data-id="<?=$row['tipo']?>"
                            data-role="update"><i class="fas fa-minus-circle text-secondary"></i> Desactiva</a></small>

                        <?php } elseif ($row['activa'] == 1) {?>

                        <small><a id="activa" class="toggle-modal" data-active="true" data-id="<?=$row['tipo']?>"
                            data-role="update"><i class="fas fa-check-circle text-success"></i> Activa</a></small>

                        <?php }?>

                      </td>

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
        <div class="modal-dialog modal-dialog-centered" role="document">
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
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary text-white" type="button" data-dismiss="modal">Cancelar</button>
              <a href="#" id="ejecutarCambioCarrera" data-do="" class="btn btn-primary text-white" hidden="false">Guardar
                cambios</a>
              <a href="#" id="ejecutarCambioSolicitud" class="btn btn-primary text-white" hidden="true">Guardar cambios</a>
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
      $(document).on('click', '#dataTable a', function () {
        $('#ejecutarCambioCarrera').removeAttr('hidden');
        $('#ejecutarCambioSolicitud').attr('hidden', 'true');
      });
      $(document).on('click', '#dataTable2 a', function () {
        $('#ejecutarCambioSolicitud').removeAttr('hidden');
        $('#ejecutarCambioCarrera').attr('hidden', 'true');
      });
      $(document).on('click', 'a[data-role=update]', function () {
        var codigoCarrera = $(this).attr('data-id'); // data-id (row['codigo']) codigo de la carrera
        var idElemento = $(this).attr('id'); // id (estatus, manana,tarde,noche)
        var estadoElemento = $(this).attr('data-active'); // data-active (row['idemento']) activo o no

        $('#codigo').val(codigoCarrera);
        $('#elemento').val(idElemento);
        $('#estado').val(estadoElemento);
        $('#cambiosModal').modal('toggle');
      });

      $('#ejecutarCambioCarrera').on('click', ejecutarAjaxCarerra);

      $('#ejecutarCambioSolicitud').on('click', ejecutarAjaxSolicitud);

      function ejecutarAjaxCarerra(event) {
        var codigo = $('#codigo').val();
        var elemento = $('#elemento').val();
        var estado = $('#estado').val();

        var datosEnviados = {
          'codigo': codigo,
          'elemento': elemento,
          'estado': estado
        };

        $.ajax({
            type: 'POST',
            url: './back/admin/backCarrera.php',
            data: datosEnviados
          })
          .done(function (data) {
            var datosRecibidos = $.parseJSON(data);
            if (datosRecibidos.estado == 0) {
              $('#carrera-' + codigo + ' #' + elemento).attr('data-active', 'false');
              $('#carrera-' + codigo + ' #' + elemento).html(
                '<i class="fas fa-minus-circle text-secondary"></i> Desactivo</a>');
            } else if (datosRecibidos.estado == 1) {
              $('#carrera-' + codigo + ' #' + elemento).attr('data-active', 'true');
              $('#carrera-' + codigo + ' #' + elemento).html(
                '<i class="fas fa-check-circle text-success"></i> Activo</a>');
            }
            $('#cambiosModal').modal('toggle');
          })
          .fail(function (err) {
            console.log(err);
          });

        event.preventDefault();
      };

      function ejecutarAjaxSolicitud(event) {
        var codigo = $('#codigo').val();
        var elemento = $('#elemento').val();
        var estado = $('#estado').val();

        var datosEnviadosS = {
          'codigo': codigo,
          'estado': estado
        };

        $.ajax({
            type: 'POST',
            url: './back/admin/backSolicitud.php',
            data: datosEnviadosS
          })
          .done(function (dataS) {
            var datosRecibidosS = $.parseJSON(dataS);
            if (datosRecibidosS.estado == 0) {
              $('#solicitud-' + codigo + ' #' + elemento).attr('data-active', 'false');
              $('#solicitud-' + codigo + ' #' + elemento).html(
                '<i class="fas fa-minus-circle text-secondary"></i> Desactivo</a>');
            } else if (datosRecibidosS.estado == 1) {
              $('#solicitud-' + codigo + ' #' + elemento).attr('data-active', 'true');
              $('#solicitud-' + codigo + ' #' + elemento).html(
                '<i class="fas fa-check-circle text-success"></i> Activo</a>');
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