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

  <link href="css/jquery.datatable.min.css" rel="stylesheet">
  <link href="css/responsive.dataTables.min.css" rel="stylesheet">
  <link href="css/fixedHeader.css" rel="stylesheet">



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
                <table class="table table-bordered responsive no-wrap" id="adminTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th></th>

                      <th>Nombre de usuario</th>
                      <th>Nombres</th>
                      <th>Rol</th>
                      <th>Estatus</th>
                      <th>Editar</th>
                    </tr>
                  </thead>
                  <tbody>

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
                <div class="alert alert-success" role="alert" id="exitoCrear" style="display: none;"></div>

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


                <div class="alert alert-danger" role="alert" id="resultadoCrear" style="display: none;">
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

      <div class="modal fade" id="editarAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalEditarAdmin" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalEditarAdmin">Editar Admin</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form id="passEditForm" method="POST" class="user needs-validation" novalidate>

              <div class="modal-body">
                <div class="alert alert-success" role="alert" id="exito" style="display: none;"></div>
                <input type="hidden" id="adminId" name="adminId" value="">
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label class="pl-2"><small>Nombre</small></label><br>
                    <input type="text" id="nombreEdit" name="nombreEdit" class="form-control form-control-user" placeholder="Nombre" minlength="2" data-toggle="tooltip" data-placement="top" title="Nombre" required>
                    <div class="invalid-feedback">
                      Este campo debe tener al menos 2 caracteres.
                    </div>
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
                            <a id="show" onclick="mostrarContrasenaEdit()" class="btn btn-primary text-center align-middle">
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
                          <input type="password" id="contrasena2Edit" name="contrasena2Edit" minlength="4" class="form-control form-control-user" placeholder="Contraseña" data-toggle="tooltip" data-placement="top" title="Repetir contraseña" value="">
                          <div class="input-group-append">
                            <a id="show2" onclick="mostrarContrasenaEdit()" class="btn btn-primary text-center align-middle">
                              <i id="showpass2" class="fas fa-eye-slash"></i>
                            </a>
                          </div>
                        </div>
                        <div class="invalid-feedback">
                          Este campo debe tener al menos 4 caracteres.
                        </div>
                      </div>
                    </div>

                <div class="form-group">
                  <label class="pl-2"><small>Rol</small></label><br>
                  <select id="rol_adminEdit" name="rol_adminEdit" class="form-control" required>
                    <option value="1">Personal</option>
                    <option value="2">Asistente</option>
                    <option value="3">Administrador</option>
                  </select>
                  <div class="invalid-feedback">
                    Seleccione una opción.
                  </div>
                </div>

                <div class="form-group">

                  <label class="pl-2"><small>Estado</small></label><br>
                  <select id="estatus" name="estatus" class="form-control">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
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
                <label><button type="submit" id="editAdmin" class="btn btn-primary text-white">Guardar</button></label>
              </div>

            </form>
          </div>
        </div>
      </div>

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

  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.responsive.min.js"></script>
  <script src="vendor/datatables/dataTables.fixedHeader.min.js"></script>

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


    function mostrarContrasenaEdit() {
      var pass = document.getElementById("contrasenaEdit");
      var pass2 = document.getElementById("contrasena2Edit");
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
    var editor;

    $(document).ready(function() {


      tablaInicio();

      $(document).on('click', '#btnCrearAdmin', function() {
        $('#crearAdminModal').modal('toggle');
      });
    });
  </script>

  <script>
    var tablaInicio = function() {
      var table = $('#adminTable').DataTable({
        "destroy": true,
        "ajax": {
          "method": "POST",
          "url": "back/admin/tablaUtilidades/tabla_Admins.php"

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
        }],

        "columns": [{
            "data": ""
          }, // es la fila extra para el icono
          {
            "data": "usuario"
          },
          {
            "data": "nombre"
          },
          {
            "data": "rol_name"
          },
          {
            data: 'estatusNombre',

          },
          {
            data: null,
            className: "center",

            defaultContent: '<a  id="btnEditar" href="#"><i class="fas fa-user-cog"></i></a>'
          }
        ],
        "order": [
          [1, 'asc']
        ],
        "language": idioma
      });
      new $.fn.dataTable.FixedHeader( table );

      obtener_data_editar("#adminTable tbody", table);
    };

    var obtener_data_editar = function(tbody, table) {
      $(tbody).on("click", "#btnEditar", function() {
        $('#editarAdminModal').modal('toggle');
        var data = table.row($(this).parents("tr")).data();
        var idAdmin = $("#adminId").val(data.id_admin);
        $("#nombreEdit").val(data.nombre);
        $("#rol_adminEdit").val(data.rol);
        $("#estatus").val(data.estatusValor);


        $('#editarAdminModal').modal('toggle');

      });
    };

/// AJAX-------------------------------------------------------------------------
    $('#passEditForm')[0].addEventListener('submit', function (event) {
        if ($('#passEditForm')[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            ejecutarAjaxLog(event);
        }
        $('#passEditForm')[0].classList.add('was-validated');
    }, false);

// ----------------- /Form Validation -------------------



    function ejecutarAjaxLog(event){

        var formData = new FormData(document.getElementById("passEditForm"));


        $.ajax({
            type: 'POST',
            url : './back/admin/editAdmin.php',
            data :formData,
            encode: true,
            cache: false,
            contentType: false,
            processData: false,
            dataType : 'json',

        })
        .done(function(datosRecibidos){
            if(!datosRecibidos.exito){
                $('#exito').hide();

                $('#resultado').show();
                $('#resultado').text(datosRecibidos.message);

            }else{
                $('#resultado').hide();

                $('#exito').show();
                $('#exito').text(datosRecibidos.message);
                $('html, body').animate( { scrollTop : 0 }, 800 );
                tablaInicio();
            }
            
        });

        event.preventDefault();
    };
    //_--------------------------------AJAXX FINAL

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


  <script >

$('#contrasena2').keyup(function(){
            var contrasena2= $('#contrasena2').val();
            var contrasena= $('#contrasena').val();
            if (contrasena2==contrasena){
                $('#registroAdmin').prop( "disabled", false);
                $('#resultadoCrear').hide();

            }else{
                $('#registroAdmin').prop( "disabled", true);
                $('#resultadoCrear').show();
                $('#resultadoCrear').text('Las contraseñas deben coincidir');
            }
        });

        $('#contrasena').keyup(function(){
            var contrasena2= $('#contrasena2').val();
            var contrasena= $('#contrasena').val();
            if (contrasena2==contrasena){
                $('#registroAdmin').prop( "disabled", false);
                $('#resultadoCrear').hide();

            }else{
                $('#registroAdmin').prop( "disabled", true);
                $('#resultadoCrear').show();
                $('#resultadoCrear').text('Las contraseñas deben coincidir');
            }
        });
        
        $('#crearAdmin')[0].addEventListener('submit', function (event) {
            if ($('#crearAdmin')[0].checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                ejecutarAjaxCrear(event);
            }
            $('#crearAdmin')[0].classList.add('was-validated');
        }, false);
    
        // ----------------- /Form Validation -------------------
    
    
    function ejecutarAjaxCrear(event){
    
        var formData = new FormData(document.getElementById("crearAdmin"));

        $.ajax({
            type: 'POST',
            url: './back/admin/crearAdmin.php',
            data: formData,
            encode: true,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
        })
        .done(function(datosRecibidos){
            if(datosRecibidos.exito){
                $('#resultadoCrear').hide();
                $('#exitoCrear').show();
                $('#exitoCrear').text(datosRecibidos.message);
                tablaInicio();

            }else{
                $('#exitoCrear').hide();
                $('#resultadoCrear').show();
                $('#resultadoCrear').text(datosRecibidos.message);
                tablaInicio();
            };
    });
    event.preventDefault();

};
     </script>

</body>

</html>