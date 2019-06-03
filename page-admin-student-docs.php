<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Editar - Subir documentos admin </title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/images/favicon.ico" type="image/x-icon">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="css/font.css" rel="stylesheet">

  <!-- Custom styles for this template-->

  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="css/dash.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">
  <link href="css/file-upload.css" rel="stylesheet">

  <link rel="stylesheet" href="css/lightbox.css">


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
        <div id="page-student-edit-docs" class="container-fluid">

          <!--
  Oye, sera que se puede mandar una variable que permita editar solo si no ha sido chequeado por control de estudios?
  porque hay veces que uno se equivoca y quiere modificar algunas cosas
  esto optimizaria tiempo, porque sino va a tener que estar diciendole al de control de estudios que se
  equivoco en tal parte que si lo puede corregir o que se yo.
-->
          <?php
          
include 'back/conexion.php';

// ------------ Obtener la id del documento
if (isset($_SESSION['docId'])) {
  $ida = $_SESSION['id'];
    $idd = $_SESSION['docId'];
    $cedula = $_SESSION['cedula'];

}else{
  $ida = $_GET['ida'];
  $idd=$_GET['idd'];
  $cedula=$_GET['ci'];
}

$sqlSolicitud = "SELECT tipo_solicitud.tipo AS tipoSolicitud, solicitudes.tipo, carrera, nombre, nombre_solicitud, estadoSolicitud FROM solicitudes 
LEFT JOIN tipo_solicitud ON solicitudes.tipo=tipo_solicitud.tipo 
LEFT JOIN carreras ON solicitudes.carrera=carreras.codigo WHERE alumno='$ida'";
$resultSolicitud =  mysqli_query($conexion, $sqlSolicitud);

$solicitud = mysqli_fetch_assoc($resultSolicitud);

$sql = "SELECT * FROM documentos WHERE id_documento='$idd'";
$result = mysqli_query($conexion, $sql);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    $mensaje = "Ocurrió un error al cargar los documentos";
    echo ($mensaje);
};

$check_foto = $row['check_foto']; // verificar si fue o no chequeado por control de estudios
$check_cedula = $row['check_cedula'];
$check_fondo = $row['check_fondo'];
$check_notas = $row['check_nota'];
$check_partida = $row['check_partida'];
$check_rusnies = $row['check_rusinies'];
$check_metodo = $row['check_metodo'];
$check_certificado_s = $row['check_certificado_s'];


// -------- Porcentaje de Documentos

$porcentaje = $row['porcentaje'];

// -------- /Porcentaje de Documentos

// Iniciando valores
$path_general = 'back/documentos/';

$partida=$path_general.$row['partida'];
$foto= $path_general.$row['foto'];
$fondo= $path_general.$row['fondo'];
$cedulaFoto= $path_general.$row['cedula'];
$certificado= $path_general.$row['certificado_s'];



$sql = "SELECT * FROM metodoing WHERE documento='$idd'";
$result = mysqli_query($conexion, $sql);

$metodo= array();
while ($row = mysqli_fetch_assoc($result)) {
  array_push($metodo, $path_general.$row['metodo']);
};

$sql = "SELECT * FROM rusnies WHERE documento='$idd'";
$result = mysqli_query($conexion, $sql);

$rusnies= array();
while ($row = mysqli_fetch_assoc($result)) {
  array_push($rusnies, $path_general.$row['rusnies']);
};


$sql = "SELECT * FROM notas WHERE documento='$idd'";
$result = mysqli_query($conexion, $sql);

$notas= array();
while ($row = mysqli_fetch_assoc($result)) {
  array_push($notas, $path_general.$row['nota']);
};






// rura de la imagen (ruta completa ejemplo: back/Documentos/12345678/nirvana.jpg )






?>
          <!-- Título de página -->
          <div class="d-sm-flex col-sm-12 col-md-10 align-items-center justify-content-between mb-4 mx-auto">
            <h1 class="h3 mb-0 text-gray-800">Documentos del alumno</h1>
            <a class="d-none d-sm-inline-block"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></a>
          </div>
          <!-- /.Título de página -->

          <!-- Formulario Editar Documentos -->
          <div class="col-sm-12 col-md-10 mx-auto">
            <div class="card mb-4 py-1 border-bottom-primary">
              <div class="card-body">
                <div class="row justify-content-between px-4">

                  <div class="col-12">
                    <h5 class="font-weight-bolder">Indicaciones</h5>
                  </div>
                  <div class="col-12">
                    <b>Formatos permitidos:</b> .JPG y .PNG
                  </div>
                  <div class="col-auto">
                    <b>Tamaño máximo por imagen:</b> 3MB
                  </div>
                  <div class="col-12">
                    <b>Número máximo por tipo documento:</b>
                  </div>
                  <div class="col-auto flex-fill">
                    Cédula, Foto, Partida y Certificado de salud -> 1 foto.
                  </div>
                  <div class="col-auto flex-fill">
                    Notas, Rusnies y Método de ingreso -> 5 fotos.
                  </div>
                </div>
              </div>
            </div>
            <div class="card shadow mb-4">
              <div class="card-body">
                <div class="px-4 py-2">

                <?php
// ---------------Hacer si todos los documentos estan validados
if ($porcentaje == 100) {

    ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i>
                    <strong>Éxito!</strong>
                    Todos los documentos han sido validados. Si desea ver sus documentos dirijase a su perfil.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      &times;
                    </button>
                  </div>
  <?php
}
;
// --------------- /.Hacer si todos los documentos estan validados
?>

                  <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <?= ($solicitud['estadoSolicitud']==0 || $solicitud['estadoSolicitud']==null) ? '<i class="fas fa-minus-circle"></i>' : '<i class="fas fa-check-circle"></i>'?>
                    <strong>Solicitud: </strong> <?=$solicitud['nombre_solicitud'].' - '.$solicitud['nombre']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      &times;
                    </button>
                  </div>
                  <select id="seleccion" name="seleccion" class="form-control">
                    <option disabled selected value="">
                      <?php echo ($porcentaje == 100) ? 'Todos los ducumentos han sido validados' : 'Elija el documento a editar' ?>
                    </option>
                     <?php echo ($check_cedula == 0) ? '<option value="1">Cédula</option>' : '' ?>
                     <?php echo ($check_foto == 0) ? '<option value="2">Foto tipo carnet</option>' : '' ?>
                     <?php echo ($check_notas == 0) ? '<option value="3">Notas certificadas de bachillerato (1er a 5to)</option>' : '' ?>
                     <?php echo ($check_fondo == 0) ? '<option value="4">Título de bachillerato autenticado</option>' : '' ?>
                     <?php echo ($check_rusnies == 0) ? '<option value="5">Resultado del RUSNIES</option>' : '' ?>
                     <?php echo ($check_partida == 0) ? '<option value="6">Partida de nacimiento</option>' : '' ?>
                     <?php echo ($check_metodo == 0) ? '<option value="7">Método de ingreso</option>' : '' ?>
                     <?php echo ($check_certificado_s == 0) ? '<option value="8">Certificado de Salud</option>' : '' ?>
                  </select>
                  <form id="documentosEditForm" method="POST" class="user needs-validation" novalidate>
                    <div class="alert alert-success" role="alert" id="exito" hidden></div>
                    <!--
					Los archivos relacionados estan:
									*server.php
									*js/front/file-upload.js
				-->

                    <!-- Foto -->
                    <div class="wrapper-file">
                      <br>

                      <div class="container-input">
                        <div class="wrap-file">
                          <div class="content-icon-camera">
                            <input type="file" id="file" name="file" accept="image/*" class="input-file">
                            <div class="icon-camera"></div>
                          </div>
                          <div id="preview-images" class="preview-images">
                            <!-- Repetir con todas las rutas cargadas -->
                             
         

                          </div>
                        </div>

                      </div>

                      <h5 id="success" class="success text-center pt-1" data-upload="0"></h5>

                    </div>
                    <!-- End of Foto -->

                    <div id="preload" class="preload">
                      <img src="img/images/preload.gif" alt="preload">
                    </div>

                    <br>
                    <!-- <button type="submit" class="publish">Subir</button> -->
                    <a data-toggle="modal" data-target="#cambiosModal">
                      <button id="permisoModal" class="btn btn-primary btn-user btn-block">
                        Guardar archivos nuevos
                      </button>
                      <button id="enviarDocs" type="submit" hidden></button>
                    </a>

                    <?php if (isset($_GET['ci'])) {?>
                      <input id="cedulaCOD" name="cedulaCOD" value="<?php echo $_GET['ci'] ?>" hidden >
                    <?php }?>

                    <?php if (isset($_GET['idd'])) {?>
                      <input id="docId" name="docId" value="<?php echo $_GET['idd'] ?>" hidden >
                    <?php }?>

                    <div class="alert alert-danger" role="alert" id="resultado" hidden></div>


                  </form>
                </div>
              </div>
            </div>
          </div>
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
                  Seleccione "Guardar cambios" a continuación si está seguro de continuar con la operacion y guardar los
                  documentos nuevos.<br>
                  <b>Los archivos previamente eliminados no pueden ser restablecidos.</b>
                </div>
                <div class="modal-footer">
                  <label><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button></label>
                  <label class="text-white" for="enviarDocs"><a class="btn btn-primary">Guardar
                      cambios</a></label>
                </div>
              </div>
            </div>
          </div>
          <!-- /.Formulario Editar Documentos -->

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

  <script src="js/lightbox-plus-jquery.js"></script>





  <script src="js/front/file-upload-edit.js"></script>

  <script src="js/front/deleteImage.js"></script>
  <script src="scripts/editAdminPassSelf.js"></script>

<script>
// ---------------------- Evitando conflictos con lightbox
$(window).on("load", function () {
    $("#btnEditarSelf").on("click", function (e) {
        e.preventDefault();
        jQuery.noConflict();
        $("#editarAdminSelfModal").modal("toggle");
    });
    $("#btnEditarBoth").on("click", function (e) {
        e.preventDefault();
        jQuery.noConflict();
        $("#editarAlumnoBothModal").modal("toggle");
    });
    $("#btnEditarBoth2").on("click", function (e) {
        e.preventDefault();
        jQuery.noConflict();
        $("#editarAlumnoBothModal").modal("toggle");
    });
    $("#btnEditarBoth3").on("click", function (e) {
        e.preventDefault();
        jQuery.noConflict();
        $("#editarAlumnoBothModal").modal("toggle");
    });
});
// ---------------------- /.Evitando conflictos con lightbox
</script>

  <script> 
  $("#seleccion").change(function () {

// ------------ Funcion del select
var num = $("#seleccion").val();
var elemento = $("[name=file]");

if (num != "") {
  $("input").prop('disabled', false);

  $("#enviarDocs").prop('disabled', false);

}

if (num == 1) {

  var cedula = <?php echo json_encode($cedulaFoto) ?>;
  
  //var path = path.replace(/\//g, '/');
if (cedula!='back/documentos/'){
  $.get(cedula)
    .done(function() {
      var str = '<div class="thumbnail" data-id="<?php echo (str_shuffle("AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_"))?>"'+
  'style="background-image: url('+ cedula +')">'+
  '<div class="close-button-db"><span data-path="'+ cedula +'"'+
  'data-cedula="<?php echo $cedula ?>">&times;</span> <a href="'+ cedula +'" data-lightbox="gallery"'+ 
  'data-title="cedula"> <i class="fas fa-eye"></i> </a> <a href="'+ cedula +'" '+
  'download="<?php echo ($cedula.date("m-d-yHis")) ?>"> <i class="fas fa-download"></i> </a></div></div>';

  document.getElementById("preview-images").insertAdjacentHTML('beforeend', str);    
}).fail(function() { 
    });
  elemento.attr("data-id", "cedula");
  $("input").prop('multiple', false);
  }

}

if (num == 2) {

  var foto = <?php echo json_encode($foto) ?>;

    //var path = path.replace(/\//g, '/');
    if (foto!='back/documentos/'){
      $.get(foto)
    .done(function() {
var str = '<div class="thumbnail" data-id="<?php echo (str_shuffle("AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_"))?>"'+
 'style="background-image: url('+ foto +')">'+
 '<div class="close-button-db"><span data-path="'+ foto +'"'+
 'data-cedula="<?php echo $cedula ?>">&times;</span> <a href="'+ foto +'" data-lightbox="gallery"'+ 
 'data-title="foto"> <i class="fas fa-eye"></i> </a> <a href="'+ foto +'" '+
 'download="<?php echo ($cedula.date("m-d-yHis")) ?>"> <i class="fas fa-download"></i> </a></div></div>';

  document.getElementById("preview-images").insertAdjacentHTML('beforeend', str);
}).fail(function() { 
    });
  elemento.attr("data-id", "foto");

  $("input").prop('multiple', false);

    }
}




if (num == 3) {
  elemento.attr("data-id", "notas");

  $("input").prop('multiple', true);


  var notas = <?php echo json_encode($notas) ?>;
  if (notas!='back/documentos/'){

  notas.forEach(function(path, index){
    //var path = path.replace(/\//g, '/');
    
var str = '<div class="thumbnail" data-id="<?php echo (str_shuffle("AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_"))?>"'+
 'style="background-image: url('+ path +')">'+
 '<div class="close-button-db"><span data-path="'+ path +'"'+
 'data-cedula="<?php echo $cedula ?>">&times;</span> <a href="'+ path +'" data-lightbox="gallery"'+ 
 'data-title="notas"> <i class="fas fa-eye"></i> </a> <a href="'+ path +'" '+
 'download="<?php echo ($cedula.date("m-d-yHis")) ?>"> <i class="fas fa-download"></i> </a></div></div>';

  document.getElementById("preview-images").insertAdjacentHTML('beforeend', str);
    
  });  
}

}

if (num == 4) {

  var fondo = <?php echo json_encode($fondo) ?>;
  
    //var path = path.replace(/\//g, '/');
    if (fondo!='back/documentos/'){
      $.get(fondo)
    .done(function() {
var str = '<div class="thumbnail" data-id="<?php echo (str_shuffle("AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_"))?>"'+
 'style="background-image: url('+ fondo +')">'+
 '<div class="close-button-db"><span data-path="'+ fondo +'"'+
 'data-cedula="<?php echo $cedula ?>">&times;</span> <a href="'+ fondo +'" data-lightbox="gallery"'+ 
 'data-title="fondo"> <i class="fas fa-eye"></i> </a> <a href="'+ fondo +'" '+
 'download="<?php echo ($cedula.date("m-d-yHis")) ?>"> <i class="fas fa-download"></i> </a></div></div>';

  document.getElementById("preview-images").insertAdjacentHTML('beforeend', str);
}).fail(function() { 
    });

  elemento.attr("data-id", "fondo");

  $("input").prop('multiple', false);
    }
}


if (num == 5) {
  elemento.attr("data-id", "rusnies");

  $("input").prop('multiple', true);


  var rusnies = <?php echo json_encode($rusnies) ?>;
  if (rusnies!='back/documentos/'){

  rusnies.forEach(function(path, index){
    //var path = path.replace(/\//g, '/');

var str = '<div class="thumbnail" data-id="<?php echo (str_shuffle("AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_"))?>"'+
 'style="background-image: url('+ path +')">'+
 '<div class="close-button-db"><span data-path="'+ path +'"'+
 'data-cedula="<?php echo $cedula ?>">&times;</span> <a href="'+ path +'" data-lightbox="gallery"'+ 
 'data-title="rusnies"> <i class="fas fa-eye"></i> </a> <a href="'+ path +'" '+
 'download="<?php echo ($cedula.date("m-d-yHis")) ?>"> <i class="fas fa-download"></i> </a></div></div>';

  document.getElementById("preview-images").insertAdjacentHTML('beforeend', str);
  
  });
}
}

if (num == 6) {

  var partida = <?php echo json_encode($partida) ?>;
  
  //var path = path.replace(/\//g, '/');
  if (partida!='back/documentos/'){

var str = '<div class="thumbnail" data-id="<?php echo (str_shuffle("AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_"))?>"'+
'style="background-image: url('+ partida +')">'+
'<div class="close-button-db"><span data-path="'+ partida +'"'+
'data-cedula="<?php echo $cedula ?>">&times;</span> <a href="'+ partida +'" data-lightbox="gallery"'+ 
'data-title="partida"> <i class="fas fa-eye"></i> </a> <a href="'+ partida +'" '+
'download="<?php echo ($cedula.date("m-d-yHis")) ?>"> <i class="fas fa-download"></i> </a></div></div>';

document.getElementById("preview-images").insertAdjacentHTML('beforeend', str);

  elemento.attr("data-id", "partida");

  $("input").prop('multiple', false);

  }
}

if (num == 7) {

  elemento.attr("data-id", "metodo");

  $("input").prop('multiple', true);

  var metodoPrueba = <?php echo json_encode($metodo) ?>;
  if (cedula!='back/documentos/'){

  metodoPrueba.forEach(function(path, index){
    //var path = path.replace(/\//g, '/');

var str = '<div class="thumbnail" data-id="<?php echo (str_shuffle("AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_"))?>"'+
 'style="background-image: url('+ path +')">'+
 '<div class="close-button-db"><span data-path="'+ path +'"'+
 'data-cedula="<?php echo $cedula ?>">&times;</span> <a href="'+ path +'" data-lightbox="gallery"'+ 
 'data-title="metodo"> <i class="fas fa-eye"></i> </a> <a href="'+ path +'" '+
 'download="<?php echo ($cedula.date("m-d-yHis")) ?>"> <i class="fas fa-download"></i> </a></div></div>';

  document.getElementById("preview-images").insertAdjacentHTML('beforeend', str);

  });
}

}



if (num == 8) {

var certificado = <?php echo json_encode($certificado) ?>;

  //var path = path.replace(/\//g, '/');
  if (certificado!='back/documentos/'){
    $.get(certificado)
  .done(function() {
var str = '<div class="thumbnail" data-id="<?php echo (str_shuffle("AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_"))?>"'+
'style="background-image: url('+ certificado +')">'+
'<div class="close-button-db"><span data-path="'+ certificado +'"'+
'data-cedula="<?php echo $cedula ?>">&times;</span> <a href="'+ certificado +'" data-lightbox="gallery"'+ 
'data-title="certificado"> <i class="fas fa-eye"></i> </a> <a href="'+ certificado +'" '+
'download="<?php echo ($cedula.date("m-d-yHis")) ?>"> <i class="fas fa-download"></i> </a></div></div>';

document.getElementById("preview-images").insertAdjacentHTML('beforeend', str);
}).fail(function() { 
  });

elemento.attr("data-id", "certificado");

$("input").prop('multiple', false);
  }
}
// ------------ fin Funcion del select

});



    

      </script>
  
</body>

</html>