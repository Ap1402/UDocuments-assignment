<!-- Control de sesion -->
<?php
include 'back/sessionController.php';
?>
<!-- End of Control de sesion -->

<?php
$rol = $_SESSION['rol']; // Limitar los enlaces del sidebar de acuerdo al rol

if ( $rol > 0 && isset($_GET['ida']) ) {
  $ida=$_GET['ida']; // id_alumno

  include 'back/conexion.php';
  $sql_alumno = "SELECT p_nombre, p_apellido, cedula, documento FROM alumnos
                 WHERE id_alumno = '$ida';";

  $result_alumno = mysqli_query($conexion, $sql_alumno);
  if ($result_alumno->num_rows > 0) {
  $row_alumno = mysqli_fetch_assoc($result_alumno);
  $p_nombre = $row_alumno['p_nombre'];
  $p_apellido = $row_alumno['p_apellido'];
  $ci = $row_alumno['cedula'];
  $idd = $row_alumno['documento'];
  }

}
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center py-5">
    <div class="sidebar-brand-icon">
      <img src="img/varias/logo_ujap_peq.png" width="40%" height="20%" class="d-inline-block align-items-center" alt="">
    </div>
  </a>

  <!-- ============================== Solo para ADMINISTRADORES ============================== -->

  <?php if ($rol > 0) { // Mostrar solo para administradores ?>

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

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a id="sbtable" class="nav-link" href="page-admin-table.php">
      <i class="fas fa-fw fa-table"></i>
      <span>Tabla alumnos</span></a>
  </li>

  <?php }?>

  <!-- ============================== /.Para TODOS los ADMINISTRADORES ============================== -->

  <?php if (($rol >= 1 && isset($_GET['ida']) || $rol >= 2)) { // Mostrar solo para admin $rol='1' ?>
  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Students -->
  <div class="sidebar-heading">
    Alumnos
  </div>

  <?php }?>

  <!-- ============================== Para los ADMINISTRADORES $rol='2' ============================== -->

  <?php if ($rol >= 2) { // Mostrar solo para administradores $rol='2' ?>

  <!-- Nav Item - Crear Alumno -->
  <li class="nav-item">
    <a id="sdcrearAlumno" class="nav-link" href="page-admin-crear-alumno.php">
      <i class="fas fa-user"></i>
      <span>Registrar Alumno</span></a>
  </li>

  <?php }?>

  <!-- ============================== /.Para los ADMINISTRADORES $rol='2' ============================== -->

  <!-- ============================== Para los ADMINISTRADORES $rol='1' ============================== -->

  <?php if ($rol >= 1 && isset($_GET['ida'])) { // Mostrar solo para admin $rol='1' ?>

  <!-- Divider -->
  <hr class="sidebar-divider bg-white">

  <!-- Students -->
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center text-white pt-2"
    href="page-student-perfil.php?ida=<?=$ida . '&ci=' . $ci . '&idd=' . $idd?>">
    <div class="sidebar-brand-icon align-items-center">
      <i class="far fa-user-circle"></i>
    </div>
  </a>
  <div class="sidebar-heading text-center text-white pb-2">
    <b class="h6">Panel del Alumno</b><br>
    <span>
      <?=$p_nombre . ' ' . $p_apellido?><br>
      <?=$ci?>
    </span>
  </div>

  <?php }?>

  <!-- ============================== /.Para los ADMINISTRADORES $rol='1' ============================== -->

  <!-- ============================== Para los ADMINISTRADORES $rol='2' ============================== -->

  <?php if ($rol >= 2 && isset($_GET['ida'])) { // Mostrar solo para admin $rol='2' ?>
    <!-- Nav Item - Datos -->
    <li class="nav-item">
      <a id="sddatosAlumno" class="nav-link" href="page-student-datos.php?ida=<?=$ida . '&ci=' . $ci . '&idd=' . $idd?>">
        <i class="fas fa-file-alt"></i>
        <span>Datos</span></a>
    </li>
  <!-- Nav Item - Documentos -->
  <li class="nav-item">
    <a id="sddocsAlumno" class="nav-link" href="page-admin-student-docs.php?ida=<?=$ida . '&ci=' . $ci . '&idd=' . $idd?>">
      <i class="far fa-folder-open"></i>
      <span>Documentos</span></a>
  </li>
  <?php }?>

  <!-- ============================== /.Para los ADMINISTRADORES $rol='2' ============================== -->

  <!-- ============================== Para los ADMINISTRADORES $rol='1' ============================== -->

  <?php if ($rol >= 1 && isset($_GET['ida'])) { // Mostrar solo para admin $rol='1' ?>
  <!-- Nav Item - Solicitud -->
  <li class="nav-item">
    <a id="sdsolicitud" class="nav-link" href="page-admin-student-solicitud.php?ida=<?=$ida . '&ci=' . $ci . '&idd=' . $idd?>">
      <i class="fas fa-vote-yea"></i>
      <span>Solicitud</span></a>
  </li>


  <!-- Nav Item - Edicion Datos/Documentos -->
  <li class="nav-item">
    <a href="#" class="nav-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
      aria-controls="collapseOne">
      <i class="fas fa-fw fa-cog"></i>
      <span>Modificar</span>
    </a>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item"
          href="page-admin-student-edit-datos.php?ida=<?=$ida . '&ci=' . $ci . '&idd=' . $idd?>">Datos</a>
        <?php if ($rol >= 2) { // Mostrar solo para admin $rol='2' ?>
        <a class="collapse-item"
          href="page-admin-student-edit-docs.php?ida=<?=$ida . '&ci=' . $ci . '&idd=' . $idd?>">Documentos</a>
        <?php }?>
        <a class="collapse-item"
          href="page-admin-student-edit-solicitud.php?ida=<?=$ida . '&ci=' . $ci . '&idd=' . $idd?>">Solicitud</a>
        <a class="collapse-item" href="page-admin-student-edit-pass.php?ida=<?=$ida . '&ci=' . $ci . '&idd=' . $idd?>">Correo /
          Contraseña</a>
      </div>
    </div>
  </li>

 <!-- Divider -->
  <hr class="sidebar-divider bg-white">

  <?php }?>


  <!-- ============================== /.Para los ADMINISTRADORES $rol='1' ============================== -->

  <!-- ============================== Para los ADMINISTRADORES $rol='3' ============================== -->

  <?php if ($rol >= 3) { // Mostrar solo para administradores $rol='3' ?>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Students -->
  <div class="sidebar-heading">
    Admin
  </div>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a id="sbtableAdmin" class="nav-link" href="page-admin-table-admin.php">
      <i class="fas fa-fw fa-table"></i>
      <span>Tabla Admin</span></a>
  </li>

  <!-- Nav Item - Crear Admin -->
  <li class="nav-item">
    <a id="sdAdmin" class="nav-link" href="page-admin-crear-admin.php">
      <i class="fas fa-user-cog"></i>
      <span>Registrar Admin</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

 <?php }?>

  <!-- ============================== /.Para los ADMINISTRADORES $rol='3' ============================== -->

 

  <!-- ============================== /.Solo para ADMINISTRADORES ============================== -->




  <!-- ============================== Solo para ALUMNOS ============================== -->

  <?php if ($rol == 0) { // Mostrar solo para alumnos ?>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Students -->
  <!-- Nav Item - Datos -->
  <li class="nav-item">
    <a id="sddatos" class="nav-link" href="page-student-datos.php">
      <i class="fas fa-file-alt"></i>
      <span>Datos</span></a>
  </li>

  <!-- Nav Item - Documentos -->
  <li class="nav-item">
    <a id="sdstudentDocs" class="nav-link" href="page-student-docs.php">
      <i class="far fa-folder-open"></i>
      <span>Documentos</span></a>
  </li>

  <!-- Nav Item - Solicitud -->
  <li class="nav-item">
    <a id="sdstudentSolicitud" class="nav-link" href="page-student-solicitud.php">
      <i class="fas fa-vote-yea"></i>
      <span>Solicitud</span></a>
  </li>

  <!-- Nav Item - Edicion Datos/Documentos -->
  <li class="nav-item">
    <a href="#" class="nav-link collapsed" data-toggle="collapse" data-target="#collapseStudentEdit" aria-expanded="true"
      aria-controls="collapseStudentEdit">
      <i class="fas fa-fw fa-cog"></i>
      <span>Modificar</span>
    </a>
    <div id="collapseStudentEdit" class="collapse" aria-labelledby="headingStudentEdit" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="page-student-edit-datos.php">Datos</a>
        <a class="collapse-item" href="page-student-edit-docs.php">Documentos</a>
        <a class="collapse-item" href="page-student-edit-solicitud.php">Solicitud</a>
        <a class="collapse-item" href="page-student-edit-pass.php">Correo / Contraseña</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <?php }?>

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