<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Tabla de alumnos </title>
  <?php require 'back/admin/restriccionAcceso.php'; ?>

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/images/favicon.ico" type="image/x-icon">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="css/font.css" rel="stylesheet">

  <!-- Custom styles for this template-->

  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="css/dash.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">

  <link href="css/jquery.datatable.min.css" rel="stylesheet">

  <link href="css/responsive.dataTables.min.css" rel="stylesheet">
  <link href="css/tableShow.css" rel="stylesheet">



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
            <h1 class="h3 mb-0 text-gray-800">Tabla de alumnos</h1>
            <!-- Búsquedas específicas -->
            <div class="dropdown no-arrow">
              <a id="dropdownMenuButton" class="btn btn-primary text-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Busquedas especificas</a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start">
                <a id="docTodos" class="dropdown-item" href="#">Mostrar todos</a>
                <div class="dropdown-divider"></div>
                <div class="dropdown-header">Alumnos con:</div>
                <a id="docFaltante" class="dropdown-item" href="#">Documentos faltantes</a>
                <a id="docFaltante50" class="dropdown-item" href="#">Documentos faltantes mayor a 50%</a>
                <a id="docCompletos" class="dropdown-item" href="#">Documentos completos</a>
                <a id="mesActual" class="dropdown-item" href="#">Datos actualizados este mes</a>
              </div>
            </div>

            <!-- /.Búsquedas específicas -->
          </div>
          <!-- /.Título de página -->


          <!-- Tabla de alumnos -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered responsive no-wrap" id="tablaValidaciones" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th></th>

                      <th>Cédula</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>% Documentos</th>
                      <th>Última Actualización</th>
                      <th>Validar Docs</th>
                      <th>Ver perfil</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.Tabla de alumnos -->


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
  <!-- Edit Admin Self Modal-->
  <?php require 'front/general/modal-admin-edit-pass-self.php'; ?>
  <!-- End of Edit Admin Self Modal-->

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
  <script src="vendor/datatables/jquery.dataTables.responsive.min.js"></script>
  <script src="vendor/datatables/dataTables.fixedHeader.min.js"></script>
  <script src="scripts/editAdminPassSelf.js"></script>

  <script>
    // ---------------------- Sin conflictos con lightbox
    $(window).on("load", function() {
      $("#btnEditarSelf").on("click", function(e) {
        e.preventDefault();

        $("#editarAdminSelfModal").modal("toggle");
      });
      $("#btnEditarBoth").on("click", function(e) {
        e.preventDefault();

        $("#editarAlumnoBothModal").modal("toggle");
      });
      $("#btnEditarBoth2").on("click", function(e) {
        e.preventDefault();

        $("#editarAlumnoBothModal").modal("toggle");
      });
      $("#btnEditarBoth3").on("click", function(e) {
        e.preventDefault();

        $("#editarAlumnoBothModal").modal("toggle");
      });
    });
    // ---------------------- /.Sin conflictos con lightbox
  </script>


  <!-- Page level custom scripts -->

  <script>
    $(document).ready(function() {
      tablaInicio();
      $('#docCompletos').on('click', function() {
        tablaBuscarRango(100, 100);
      });
      $('#docFaltante50').on('click', function() {
        tablaBuscarRango(50, 99);
      });
      $('#docFaltante').on('click', function() {
        tablaBuscarRango(0, 99);
      });
      $('#docTodos').on('click', function() {
        tablaInicio();
      });
      $('#mesActual').on('click', function() {
        tablaBuscarEsteMes();
      });
    });

    var tablaInicio = function() {
      $('#tablaValidaciones').DataTable({
        "destroy": true,
        "ajax": {
          "method": "POST",
          "url": "back/admin/tablaUtilidades/tablaAdmin.php"

        },
        responsive: {
          details: {
            type: 'column',
            target: 'tr',
            renderer: function(api, rowIdx, columns) {
              var data = $.map(columns, function(col, i) {
                return col.hidden ?
                  '<tr data-dt-row="' + col.rowIndex + '" data-dt-column="' + col.columnIndex + '">' +
                  '<td>' + col.title + ':' + '</td> ' +
                  '<td>' + col.data + '</td>' +
                  '</tr>' :
                  '';
              }).join('');

              return data ?
                $('<table/>').append(data) :
                false;
            }
          }
        },
        "columnDefs": [{
            "defaultContent": "",
            className: 'control',
            orderable: false,
            targets: 0
          },

          {
            targets: 4,
            render: function(data, type, row, meta) {
              if (data >= 50 && data <= 99) {
                return `<div class="progress">
                      <div class="progress-bar bg-info progress-bar-striped" style="width:` + data + `%">` + data + `%</div>
              </div>`
              }
              if (data < 50 && data >= 40) {
                return `<div class="progress">
                      <div class="progress-bar bg-warning progress-bar-striped" style="width:` + data + `%">` + data + `%</div>
              </div>`
              }
              if (data < 40) {
                return `<div class="progress">
                      <div class="progress-bar bg-danger progress-bar-striped" style="width:` + data + `%">` + data + `%</div>
              </div>`
              } else {
                return `<div class="progress">
                      <div class="progress-bar bg-success progress-bar-striped" style="width:` + data + `%">` + data + `%</div>
              </div>`

              }

            }
          }
        ],
        "columns": [{
            "data": ""
          }, // es la fila extra para el icono
          {
            "data": "cedula"
          },
          {
            "data": "nombres"
          },
          {
            "data": "apellidos"
          },
          {
            "data": "porcentaje"
          },
          {
            "data": "ultActualizacion"
          },
          {
            "data": "irCheck"
          },
          {
            "data": "irPerfil"
          },
        ],
        "order": [
          [1, 'asc']
        ],
        "language": idioma
      });
    };




    var tablaBuscarRango = function(min, max) {
      $('#tablaValidaciones').DataTable({
        "destroy": true,
        "ajax": {
          "method": "POST",
          "data": {
            "min": min,
            "max": max
          },
          "url": "back/admin/tablaUtilidades/buscar.php"
        },
        responsive: {
          details: {
            type: 'column',
            target: 'tr',
            renderer: function(api, rowIdx, columns) {
              var data = $.map(columns, function(col, i) {
                return col.hidden ?
                  '<tr data-dt-row="' + col.rowIndex + '" data-dt-column="' + col.columnIndex + '">' +
                  '<td>' + col.title + ':' + '</td> ' +
                  '<td>' + col.data + '</td>' +
                  '</tr>' :
                  '';
              }).join('');

              return data ?
                $('<table/>').append(data) :
                false;
            }
          }
        },
        "columnDefs": [{
            "defaultContent": "",
            className: 'control',
            orderable: false,
            targets: 0
          },
          {
            targets: 4,
            render: function(data, type, row, meta) {
              if (data >= 50 && data <= 99) {
                return `<div class="progress">
                      <div class="progress-bar bg-info progress-bar-striped" style="width:` + data + `%">` + data + `%</div>
              </div>`
              }
              if (data < 50 && data >= 40) {
                return `<div class="progress">
                      <div class="progress-bar bg-warning progress-bar-striped" style="width:` + data + `%">` + data + `%</div>
              </div>`
              }
              if (data < 40) {
                return `<div class="progress">
                      <div class="progress-bar bg-danger progress-bar-striped" style="width:` + data + `%">` + data + `%</div>
              </div>`
              } else {
                return `<div class="progress">
                      <div class="progress-bar bg-success progress-bar-striped" style="width:` + data + `%">` + data + `%</div>
              </div>`

              }

            }
          }
        ],
        "columns": [{
            "data": ""
          }, // fila extra para el icono
          {
            "data": "cedula"
          },
          {
            "data": "nombres"
          },
          {
            "data": "apellidos"
          },
          {
            "data": "porcentaje"
          },
          {
            "data": "ultActualizacion"
          },
          {
            "data": "irCheck"
          },
          {
            "data": "irPerfil"
          },
        ],
        "order": [
          [1, 'asc']
        ],
        "language": idioma
      });
    };

    var tablaBuscarEsteMes = function() {
      $('#tablaValidaciones').DataTable({
        /// No tocar-------------------------------------
        "destroy": true,
        "ajax": {
          "method": "POST",
          "data": {
            "buscarActualMes": ''
          },
          "url": "back/admin/tablaUtilidades/buscar.php"
        }, ///-------------------------------------------

        responsive: {
          details: {
            type: 'column',
            target: 'tr', // Aquí se está estableciendo que TR es el que accionara mostrar la información oculta, también se agrega un icono en algunos casos PREGUNTARME.

            renderer: function(api, rowIdx, columns) {
              var data = $.map(columns, function(col, i) {
                return col.hidden ?
                  '<tr data-dt-row="' + col.rowIndex + '" data-dt-column="' + col.columnIndex + '">' +
                  '<td>' + col.title + ':' + '</td> ' +
                  '<td>' + col.data + '</td>' +
                  '</tr>' :
                  '';
              }).join('');

              return data ?
                $('<table/>').append(data) :
                false;
            }
          }
        },

        // inicio COLUMNSDEF
        "columnDefs": [{
            "defaultContent": "",
            className: 'control',
            orderable: false,
            targets: 0
          },

          {
            targets: 4, // Este es el numero de fila a escoger, empieza a contar desde 0 en este caso, siendo esta la 4ta fila.
            render: function(data, type, row, meta) { //funcion para definir cómo se mostrara la columna SIN OCULTAR 
              // DATA son los datos que contiene la fila, puede incluso contener objetos, por ejemplo data.hola data.prueba
              if (data >= 50 && data <= 99) {
                return `<div class="progress">
                          <div class="progress-bar bg-info progress-bar-striped" style="width:` + data + `%">` + data + `%</div>
                  </div>`
              }
              if (data < 50 && data >= 40) {
                return `<div class="progress">
                          <div class="progress-bar bg-warning progress-bar-striped" style="width:` + data + `%">` + data + `%</div>
                  </div>`
              }
              if (data < 40) {
                return `<div class="progress">
                          <div class="progress-bar bg-danger progress-bar-striped" style="width:` + data + `%">` + data + `%</div>
                  </div>`
              } else {
                return `<div class="progress">
                          <div class="progress-bar bg-success progress-bar-striped" style="width:` + data + `%">` + data + `%</div>
                  </div>`

              }
            }
          }, // Fin columna 4
        ], // Fin COLUMNSDEF

        "columns": [ /// Donde se define qué datos llevará cada columna segun el php, solo sigue el orden en el que están en el html.
          {
            "data": ""
          }, // fila extra para el icono
          {
            "data": "cedula"
          },
          {
            "data": "nombres"
          },
          {
            "data": "apellidos"
          },
          {
            "data": "porcentaje"
          },
          {
            "data": "ultActualizacion"
          },
          {
            "data": "irCheck"
          },
          {
            "data": "irPerfil"
          },
        ],
        "order": [
          [1, 'asc']
        ],
        "language": idioma
      });
    };

    var idioma = {
      "decimal": "",
      "emptyTable": "No hay información",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
      "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
      "infoFiltered": "(Filtrado de _MAX_ total entradas)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostrar _MENU_",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscar:",
      "zeroRecords": "Sin resultados encontrados",
      "paginate": {
        "first": "Primero",
        "last": "Ultimo",
        "next": "Siguiente",
        "previous": "Anterior"
      }
    }
  </script>

</body>

</html>