<!-- Control de sesion -->
<?php
include 'back/sessionController.php';
?>
<!-- End of Control de sesion -->

<?php
$rol = $_SESSION['rol']; // Limitar los enlaces del sidebar de acuerdo al rol

if ($rol > 0 && isset($_GET['ida'])) {
  $ida = $_GET['ida']; // id_alumno

  include 'back/conexion.php';
  $sql_alumno = "SELECT p_nombre, p_apellido, alumnos.cedula, documento, ultActualizacion, check_datos, porcentaje, estadoSolicitud FROM alumnos 
LEFT JOIN documentos ON alumnos.documento=documentos.id_documento 
LEFT JOIN solicitudes ON alumnos.id_alumno=solicitudes.alumno
                 WHERE id_alumno = '$ida';";

  $result_alumno = mysqli_query($conexion, $sql_alumno);
  if ($result_alumno->num_rows > 0) {
    $row_alumno = mysqli_fetch_assoc($result_alumno);
    $p_nombre = $row_alumno['p_nombre'];
    $p_apellido = $row_alumno['p_apellido'];
    $ci = $row_alumno['cedula'];
    $idd = $row_alumno['documento'];
    ($row_alumno['ultActualizacion'] == '0000-00-00') ? $datosLlenados = 0 : $datosLlenados = 1;
    $porcentaje = $row_alumno['porcentaje'];
    $check_datos = $row_alumno['check_datos'];
    $estadoSolicitud = $row_alumno['estadoSolicitud'];
  }
}
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a id="sidebar-brand-header" class="sidebar-brand d-flex align-items-center justify-content-center py-3">
    <div class="sidebar-brand-icon">
      <img src="img/varias/logo_ujap_peq.png" width="30%" height="10%" class="d-inline-block align-items-center" alt="">
    </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline mt-2">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

  <?php if ($rol > 0) { ?>

  <!-- ============================== Solo para ADMINISTRADORES ============================== -->

    <!-- ============================== Para TODOS los ADMINISTRADORES ============================== -->

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="page-dashboard.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>



  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Control
  </div>

  <?php if ($_SESSION['validacion'] ==1 ) {  ?>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
      <a id="sbtable" class="nav-link" href="page-admin-table.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Tabla alumnos</span></a>
    </li>

  <?php } ?>


  <!-- ============================== /.Para TODOS los ADMINISTRADORES ============================== -->

  <?php if (($_SESSION['crea_editar_alumno'] == 1 && isset($_GET['ida']) || $_SESSION['crea_editar_alumno'] == 1)) { 
    ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Students -->
    <div class="sidebar-heading">
      Alumnos
    </div>

  <?php } ?>

  <!-- ============================== Para los ADMINISTRADORES $rol='2' ============================== -->

  <?php if ($_SESSION['crea_editar_alumno'] == 1) { 
    ?>

    <!-- Nav Item - Crear Alumno -->
    <li class="nav-item">
      <a id="sdcrearAlumno" class="nav-link" href="page-admin-crear-alumno.php">
        <i class="fas fa-user"></i>
        <span>Registrar Alumno</span></a>
    </li>

  <?php } ?>

  <!-- ============================== /.Para los ADMINISTRADORES $rol='2' ============================== -->

  <!-- ============================== Para los ADMINISTRADORES $rol='1' ============================== -->

  <?php if ($_SESSION['crea_editar_alumno'] == 1 && isset($_GET['ida'])) { 
    ?>

    <!-- Divider -->
    <hr class="sidebar-divider bg-white">

    <!-- Students -->
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center text-white pt-2" href="page-student-perfil.php?ida=<?= $ida . '&ci=' . $ci . '&idd=' . $idd ?>">
      <div class="sidebar-brand-icon align-items-center">
        <i class="far fa-user-circle"></i>
      </div>
    </a>
    <div class="sidebar-heading text-center text-white pb-2">
      <b class="h6">Panel del Alumno</b><br>
      <span>
        <?= $p_nombre . ' ' . $p_apellido ?><br>
        <?= $ci ?>
      </span>
    </div>

  <?php } ?>

  <!-- ============================== /.Para los ADMINISTRADORES $rol='1' ============================== -->

  <!-- ============================== Para los ADMINISTRADORES $rol='2' ============================== -->

  <?php if ($_SESSION['crea_editar_alumno'] == 1 && isset($_GET['ida'])) { 
    ?>
    <!-- Nav Item - Datos -->
    <li class="nav-item">
      <a id="sddatosAlumno" class="nav-link" href="page-student-datos.php?ida=<?= $ida . '&ci=' . $ci . '&idd=' . $idd ?>">
        <i class="fas fa-file-alt"></i>
        <span>Datos</span></a>
    </li>

  <?php }; ?>


  <?php if ($_SESSION['subir_edicion_documentos'] == 1 && isset($_GET['ida'])) { 
    ?>

    <?php if ($datosLlenados == 0) { ?>

      <!-- Nav Item - Documentos -->
      <li class="nav-item">
        <a id="sddocsAlumno" class="nav-link" href="page-admin-student-docs.php?ida=<?= $ida . '&ci=' . $ci . '&idd=' . $idd ?>">
          <i class="far fa-folder-open"></i>
          <span>Documentos</span></a>
      </li>
    <?php }; ?>
  <?php }; ?>


  <!-- ============================== /.Para los ADMINISTRADORES $rol='2' ============================== -->

  <!-- ============================== Para los ADMINISTRADORES $rol='1' ============================== -->

  <?php if ($_SESSION['crear_editar_solicitudes'] == 1 && isset($_GET['ida'])) { 
    ?>
    <!-- Nav Item - Solicitud -->
    <li class="nav-item">
      <a id="sdsolicitud" class="nav-link" href="page-admin-student-solicitud.php?ida=<?= $ida . '&ci=' . $ci . '&idd=' . $idd ?>">
        <i class="fas fa-vote-yea"></i>
        <span>Crear Solicitud</span></a>
    </li>

  <?php } ?>

  <?php if ($rol >= 1 && isset($_GET['ida'])) { 
    ?>

    <!-- Nav Item - Edicion Datos/Documentos -->
    <li class="nav-item">
      <a href="#" class="nav-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <i class="fas fa-fw fa-cog"></i>
        <span>Modificar</span>
      </a>

      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">

          <?php if ($_SESSION['crea_editar_alumno'] == 1) { 
            ?>

            <a class="collapse-item" href="page-student-edit-datos.php?ida=<?= $ida . '&ci=' . $ci . '&idd=' . $idd ?>">Datos</a>
          <?php } ?>

          <?php if ($_SESSION['subir_edicion_documentos'] == 1) { 
            ?>
            <a class="collapse-item" href="page-admin-student-edit-docs.php?ida=<?= $ida . '&ci=' . $ci . '&idd=' . $idd ?>">Documentos</a>
          <?php } ?>
          

          <?php if ($_SESSION['crear_editar_solicitudes'] == 1) { ?>
          <a class="collapse-item" href="page-admin-student-edit-solicitud.php?ida=<?= $ida . '&ci=' . $ci . '&idd=' . $idd ?>">Solicitud</a>
          <?php } ?>
          <?php if ($_SESSION['editar_correoContra_alumno'] == 1) { ?>
          <a id="btnEditarBoth2" class="collapse-item" href="#">Correo / Contraseña</a>
            <?php } ?>

        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider bg-white">

  <?php } ?>


  <!-- ============================== /.Para los ADMINISTRADORES $rol='1' ============================== -->

  <!-- ============================== Para los ADMINISTRADORES $rol='3' ============================== -->

  <?php if ($_SESSION['metodos_ingreso'] == 1 || $_SESSION['edicion_carreras'] == 1 || $_SESSION['edicion_creacion_admin'] == 1) { 
    ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Students -->
    <div class="sidebar-heading">
      Admin
    </div>

    <?php if ($_SESSION['edicion_creacion_admin'] == 1) { ?>
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a id="sbtableAdmin" class="nav-link" href="page-admin-table-admin.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Tabla Admin</span></a>
      </li>
    <?php } ?>

    <!-- Nav Item - Edit Solicitudes -->
    <?php if ($_SESSION['metodos_ingreso'] == 1) { ?>

      <li class="nav-item">
        <a id="sdEditSolAdmin" class="nav-link" href="page-admin-edit-solicitud.php">
          <i class="fas fa-vote-yea"></i>
          <span>Editar solicitudes</span></a>
      </li>
    <?php } ?>

    <!-- Nav Item - Editar Turnos / Carreras -->
    <?php if ($_SESSION['edicion_carreras'] == 1) { ?>

      <li class="nav-item">
        <a id="sdEditCarAdmin" class="nav-link" href="page-admin-edit-solicitudes.php">
          <i class="fas fa-cogs"></i>
          <span>Herramientas admin</span></a>
      </li>
    <?php } ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

  <?php } ?>

  <!-- ============================== /.Para los ADMINISTRADORES $rol='3' ============================== -->
  <?php } ?>



  <!-- ============================== /.Solo para ADMINISTRADORES ============================== -->




  <!-- ============================== Solo para ALUMNOS ============================== -->

  <?php if ($rol == 0) {
    
if (isset($_SESSION['id'])) {
    $ida = $_SESSION['id']; // id_alumno

    include 'back/conexion.php';
    $sql_alumno = "SELECT alumnos.cedula, documento, ultActualizacion, check_datos, porcentaje, estadoSolicitud, ultActDoc FROM alumnos
LEFT JOIN documentos ON alumnos.documento=documentos.id_documento
LEFT JOIN solicitudes ON alumnos.id_alumno=solicitudes.alumno
                 WHERE id_alumno = '$ida';";

    $result_alumno = mysqli_query($conexion, $sql_alumno);
    if ($result_alumno->num_rows > 0) {
        $row_alumno = mysqli_fetch_assoc($result_alumno);
        $ci = $row_alumno['cedula'];
        $idd = $row_alumno['documento'];
        ($row_alumno['ultActualizacion'] == '0000-00-00') ? $datosLlenados = 0 : $datosLlenados = 1;
        $porcentaje = $row_alumno['porcentaje'];
        $check_datos = $row_alumno['check_datos'];
        $estadoSolicitud = $row_alumno['estadoSolicitud'];
        $ultActDoc = $row_alumno['ultActDoc'];
    }
}
 
    ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Students -->
    <!-- Nav Item - Datos -->
    <?php if ($_SESSION['datosLlenados'] == 0) {    ?>

      <li class="nav-item">
        <a id="sddatos" class="nav-link" href="page-student-datos.php">
          <i class="fas fa-file-alt"></i>
          <span>Llenar datos</span></a>
      </li>
    <?php } ?>

    <?php if ($_SESSION['datosLlenados'] == 1) {    ?>

      <?php if ($porcentaje != 100 && $estadoSolicitud != null && $ultActDoc=='0000-00-00') {    ?>
      <!-- Nav Item - Documentos -->
      <li class="nav-item">
        <a id="sdstudentDocs" class="nav-link" href="page-student-docs.php">
          <i class="far fa-folder-open"></i>
          <span>Cargar documentos</span></a>
      </li>
      <?php };?>

       <?php if ($estadoSolicitud == null) {    ?>
      <!-- Nav Item - Solicitud -->
      <li class="nav-item">
        <a id="sdstudentSolicitud" class="nav-link" href="page-student-solicitud.php">
          <i class="fas fa-vote-yea"></i>
          <span>Crear Solicitud</span></a>
      </li>
      <?php };?>

      <!-- Nav Item - Edicion Datos/Documentos -->
      <li class="nav-item">
        <a href="#" class="nav-link collapsed" data-toggle="collapse" data-target="#collapseStudentEdit" aria-expanded="true" aria-controls="collapseStudentEdit">
          <i class="fas fa-fw fa-cog"></i>
          <span>Modificar</span>
        </a>
        <div id="collapseStudentEdit" class="collapse" aria-labelledby="headingStudentEdit" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <?= ($check_datos != 1) ? '<a class="collapse-item" href="page-student-edit-datos.php">Datos</a>' : '' ?>
            <?= ($porcentaje != 100 && $estadoSolicitud != null) ? '<a class="collapse-item" href="page-student-edit-docs.php">Documentos</a>' : '' ?>
            <?= ($estadoSolicitud != 1 && $estadoSolicitud != null) ? '<a class="collapse-item" href="page-student-edit-solicitud.php">Solicitud</a>' : '' ?>
            <a id="btnEditarBoth3" class="collapse-item" href="#">Correo / Contraseña</a>
          </div>
        </div>
      </li>
    <?php } ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

  <?php } ?>

  <!-- ============================== /.Solo para ALUMNOS ============================== -->



  <!-- ====================== Para todos =================== -->

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Logout -->
  <li class="nav-item">
    <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-sign-out-alt"></i>
      <span>Cerrar Sesión</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
  <!-- ======================/.Para todos =================== -->
</ul>
<!-- End of Sidebar -->