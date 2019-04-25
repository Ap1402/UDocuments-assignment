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
	<link href="css/file-upload.css" rel="stylesheet">

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
        <?php require_once 'front/general/navbar.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <!-- Contenido Variable - Todo lo demas es fijo -->
        <div id="page-docs" class="container-fluid">

          <!-- front/student/documentos.php -->
          <?php require_once 'front/student/docs.php'; ?>


        </div>
        <!-- /.Contenido Variable - Todo lo demas es fijo -->
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php require_once 'front/general/footer.php'; ?>
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

  <!-- <script src="js/front/page-docs.js"></script> -->

  <script src="js/front/file-upload.js"></script>

<script>
$(document).ready(function () {

  $("#seleccion").change(function(){

    var num = $("#seleccion").val();
    var elemento = $("[name=file]");

    if(num==1){
      elemento.attr("id","cedula");
      var elem = $("[name=preview]");
      elem.attr("id","preview-images-cedula");

      var elem2 = $("[name=success]");
      elem2.attr("id","success-cedula");
      $("input").prop('multiple',false);

    }

    if(num==2){
      elemento.attr("id","foto");
      var elem = $("[name=preview]");
      elem.attr("id","preview-images-foto");

      var elem2 = $("[name=success]");
      elem2.attr("id","success-foto");

      $("input").prop('multiple',false);
    }
    if(num==3){
      elemento.attr("id","notas");
      var elem = $("[name=preview]");
      elem.attr("id","preview-images-notas");

      var elem2 = $("[name=success]");
      elem2.attr("id","success-notas");

      $("input").prop('multiple',true);

    }
    if(num==4){
      elemento.attr("id","fondo");
      var elem = $("[name=preview]");
      elem.attr("id","preview-images-fondo");

      var elem2 = $("[name=success]");
      elem2.attr("id","success-fondo");

      $("input").prop('multiple',false);
    }

    if(num==5){
      elemento.attr("id","rusnies");
      var elem = $("[name=preview]");
      elem.attr("id","preview-images-rusnies");

      var elem2 = $("[name=success]");
      elem2.attr("id","success-rusnies");

      $("input").prop('multiple',true);
    }

    if(num==6){
      elemento.attr("id","partida");
      var elem = $("[name=preview]");
      elem.attr("id","preview-images-partida");

      var elem2 = $("[name=success]");
      elem2.attr("id","success-partida");

      $("input").prop('multiple',false);
    }

    if(num==7){
      elemento.attr("id","metodo");
      var elem = $("[name=preview]");
      elem.attr("id","preview-images-metodo");

      var elem2 = $("[name=success]");
      elem2.attr("id","success-metodo");

      $("input").prop('multiple',true);
    }
  });
});

</script>

</body>

</html>