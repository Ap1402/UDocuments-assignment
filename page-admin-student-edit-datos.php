<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Editar - Datos del alumno </title>

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
    <?php require 'front/general/sidebar.php';?>
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
        <div id="page-student-edit-datos" class="container-fluid">

          <!--
  Oye, sera que se puede mandar una variable que permita editar solo si no ha sido chequeado por control de estudios?
  porque hay veces que uno se equivoca y quiere modificar algunas cosas
  esto optimizaria tiempo, porque sino va a tener que estar diciendole al de control de estudios que se
  equivoco en tal parte que si lo puede corregir o que se yo.
-->
          <?php
include 'back/conexion.php';

if (isset($_GET['ci'])) {
    $cedula = $_GET['ci'];
}
;

$consulta = "SELECT * FROM `alumnos` WHERE cedula='" . $cedula . "'";
$resultado = mysqli_query($conexion, $consulta);
$datos = mysqli_fetch_array($resultado);

$id = $datos['id_alumno'];
$p_nombre = $datos['p_nombre'];
$s_nombre = $datos['s_nombre'];
$p_apellido = $datos['p_apellido'];
$s_apellido = $datos['s_apellido'];
$cedula = $datos['cedula'];
$correo = $datos['correo'];
$estado_civild = $datos['estado_civil'];

switch ($estado_civild) {
    case 1:
        $estado_civil_name = 'Casado';
        break;
    case 2:
        $estado_civil_name = 'Soltero';
        break;
    case 3:
        $estado_civil_name = 'Divorciado';
        break;
    case 4:
        $estado_civil_name = 'Viudo';
        break;
    default:
        $estado_civil_name = '';
        break;
};

$fecha_nacimiento = $datos['fecha_nacimiento'];

$metodo_ingreso = $datos['metodo_ingreso'];
$carrera = $datos['carrera'];
$pais = $datos['pais_nac'];
$estado = $datos['estado_nac'];
$ciudad = $datos['ciudad_nac'];
$municipio = $datos['municipio_nac'];
$e_nombre = $datos['parientename'];
$parentesco = $datos['parentesco'];
$discapacidad = $datos['discapacidad'];
$i_nombre = $datos['nombreInst'];
$i_egreso = $datos['anoEgreso'];
$i_codigo = $datos['codigoInst'];
$i_estado = $datos['estadoInst'];
$tipo_inst = $datos['tipoInst'];
$discapacidad = $datos['discapacidad'];

switch ($tipo_inst) {
    case 1:
        $tipo_inst_name = 'Privada';
        break;
    case 2:
        $tipo_inst_name = 'Pública';
        break;
    default:
        $tipo_inst_name = '';
        break;
};

$consulta2 = "SELECT * FROM `telefonos` WHERE alumno='" . $id . "'";
$resultado2 = mysqli_query($conexion, $consulta2);
$datosTelf = mysqli_fetch_array($resultado2);

$movil = $datosTelf['num_movil'];
$habitacion = $datosTelf['num_habitacion'];
$trabajo = $datosTelf['num_trabajo'];
$e_local = $datosTelf['num_habitacion_pariente'];
$e_movil = $datosTelf['num_movil_pariente'];

$consulta3 = "SELECT * FROM `direcciones` WHERE alumno='" . $id . "'";
$resultado3 = mysqli_query($conexion, $consulta3);
$datosDirecc = mysqli_fetch_array($resultado3);

$nac_estado = $datosDirecc['estado'];
$nac_ciudad = $datosDirecc['ciudad'];
$nac_municipio = $datosDirecc['municipio'];
$nac_urbanizacion = $datosDirecc['urbanizacion'];
$nac_aptcasa = $datosDirecc['aptcasa'];
$nac_calle = $datosDirecc['calle'];
$t_postal = $datosDirecc['postal_trabajo'];
$t_estado = $datosDirecc['estado_trabajo'];
$t_municipio = $datosDirecc['municipio_trabajo'];
$t_ciudad = $datosDirecc['ciudad_trabajo'];
$nac_postal = $datosDirecc['postal_hab'];

// Iniciando valores

?>

          <!-- Título de página -->
          <div class="d-sm-flex col-sm-12 col-xl-10 align-items-center justify-content-between mb-4 mx-auto">
            <h1 class="h3 mb-0 text-gray-800">Editar - Datos del alumno<br><small class="text-muted"> asegúrese de
                rellenar correctamente sus datos</small></h1>
            <a class="d-none d-sm-inline-block"><i class="fas fa-user-edit fa-2x text-gray-300"></i></a>
          </div>
          <!-- /.Título de página -->

          <!-- Formulario Editar Datos -->
          <div class="col-sm-12 col-xl-10 mx-auto">
            <div class="card shadow mb-4">
              <div class="card-body">
                <div class="px-4 py-2">
                  <!-- Form Edit Datos (ADMIN) -->
                  <?php require 'form-admin-student-edit-datos.php'; ?>
                  <!-- End of Form Edit Datos (ADMIN) -->
                </div>
              </div>
            </div>
          </div>
          <!-- /.Formulario Editar Datos -->


        </div>
        <!-- /.Contenido Variable - Todo lo demas es fijo -->
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

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
  <?php require 'front/general/modal-logout.php';?>
  <!-- End of Logout Modal-->
  <!-- Edit Admin Self Modal-->
  <?php require 'front/general/modal-admin-edit-pass-self.php'; ?>
  <!-- End of Edit Admin Self Modal-->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="scripts/editDatos.js"></script>

  <!-- Custom scripts for all pages / carga automaticamente dashboard.php-->
  <script src="js/sb-admin-2.js"></script>
  <script src="scripts/editAdminPassSelf.js"></script>

  <!-- Page level custom scripts -->
  <!-- Formulario STEPS -->
  <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    var currentTabAux = currentTab;
    showTab(currentTab); // Display the current tab

    function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
    } else {
    document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Enviar";   
    } else {
    document.getElementById("nextBtn").innerHTML = "Siguiente";
    $("#nextBtn").attr('type','button');
    }
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n)
    }

    function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form... :
    if (currentTab >= x.length) {
    //...the form gets submitted:
      $("#nextBtn").attr('type','submit');
    // document.getElementById("datosEditForm").submit();
    return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
    }

    function validateForm() {
    // This function deals with validation of the form fields
    var x, y, z, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    z = x[currentTab].getElementsByTagName("select");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < z.length; i++) { 
      // If a field is empty... 
      if (!z[i].validity.valid) {
          // and set the current valid status to false:
          valid=false;
          $('#datosEditForm')[0].classList.add('was-validated');   
    } 
  }
    for (i = 0; i < y.length; i++) { 
      // If a field is empty... 
      if (!y[i].validity.valid) {
          // and set the current valid status to false:
          valid=false;
          $('#datosEditForm')[0].classList.add('was-validated');   
    } 
  } 
      // If the valid status is true, mark the step as finished and valid: 
      if (valid) {
      document.getElementsByClassName("step")[currentTab].className +=" finish";
      $('#datosEditForm')[0].classList.remove('was-validated');
    } 
    return valid; // return the valid status 
  }
  
  function fixStepIndicator(n) { 
        // This function removes the "active" class of all steps... 
        var i, x=document.getElementsByClassName("step"); 
      for (i=0; i < x.length; i++) { 
        x[i].className=x[i].className.replace(" active", ""); 
      } 
      //... and adds the "active" class to the current step: 
      x[n].className +=" active"; 
    }
  </script>
<!-- /.Formulario STEPS -->

      <script>
        $(document).ready(function () {

          $('#ver-secciones').hide();

          $('#ver-todo').on('click', function (e) {
            var i, x = $(".tab"),
              y = $(".tabignore");
            
            for (i = 0; i < x.length; i++) {
              x[i].style.display = "block";
              x[i].className = x[i].className.replace("tab", "tabignore");
            }

            currentTabAux = currentTab;
            currentTab = 0;
            y[0].className = y[0].className.replace("tabignore", "tab");
            y[0].style.display = "block";
            document.getElementById("nextBtn").innerHTML = "Enviar";
            $("#prevBtn").hide();
            $("#stepcircle").hide();
            $('#ver-todo').hide();
            $('#ver-secciones').show();
            
            e.preventDefault();
          });

          $('#ver-secciones').on('click', function (e) {
            var i, x = $(".tabignore"),
              y = $(".tab");
        
            for (i = 0; i < x.length; i++) {
              x[i].style.display = "none";
              x[i].className = x[i].className.replace("tabignore", "tab");
            }

            currentTab = currentTabAux;
            x[currentTab].style.display = "block";

            if (currentTab > 0) $("#prevBtn").show();

            y[0].className = y[0].className.replace("tab", "tabignore");
            document.getElementById("nextBtn").innerHTML = "Siguiente";
            $("#stepcircle").show();
            $('#ver-todo').show();
            $('#ver-secciones').hide();

            e.preventDefault();
          });

        });
      </script>
</body>

</html>