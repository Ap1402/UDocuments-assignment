<!-- Control de sesion -->
<?php 
include 'back/sessionController.php';
?>
<!-- End of Control de sesion -->

<?php
$admin = $_SESSION['rol']; // Limitar los enlaces del sidebar de acuerdo al rol

?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center py-5">
    <div class="sidebar-brand-icon">
      <img src="img/varias/logo_ujap_peq.png" width="40%" height="20%" class="d-inline-block align-items-center" alt="">
    </div>
  </a>


  <?php if ($admin > 0) { // Mostrar solo para administradores ?>

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
    <a id="table" class="nav-link" href="page-admin-table.php">
      <i class="fas fa-fw fa-table"></i>
      <span>Tabla alumnos</span></a>
  </li>

  <!-- Nav Item - Crear Admin -->
  <li class="nav-item">
    <a id="crearAdmin" class="nav-link" href="page-admin-crear-admin.php">
      <i class="fas fa-user-cog"></i>
      <span>Registrar Admin</span></a>
  </li>

  <!-- Nav Item - Modificar Admin -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
      aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Modificar</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="page-admin-edit-pass.php">Correo / Contraseña<br>(Admin)</a>        
      </div>
    </div>
  </li>

  <?php } ?>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Students -->
  <div class="sidebar-heading">
    Alumnos
  </div>

  <?php if ($admin < 1) { // Mostrar solo para alumnos ?>
  <!-- Nav Item - Datos -->
  <li class="nav-item">
    <a id="datos" class="nav-link" href="page-student-datos.php">
      <i class="fas fa-file-alt"></i>
      <span>Datos</span></a>
  </li>
 <?php }?>

 <?php if ($admin >= 1) { // Mostrar solo para admin ?> 
  <!-- Nav Item - Crear Alumno -->
  <li class="nav-item">
    <a id="crearAlumno" class="nav-link" href="page-admin-crear-alumno.php">
      <i class="fas fa-user"></i>
      <span>Registrar Alumno</span></a>
  </li>
 <?php } ?>
 <?php if ( ( $admin >= 1 && isset($_GET['ida']) ) || ($admin < 1) ) { // Mostrar solo para admin 
  $ida = $_GET['ida']; // id_alumno
  ?> 
  <!-- Nav Item - Documentos -->
  <li class="nav-item">
    <a id="docs" class="nav-link"
    href="<?=($admin == 1) ? 'page-admin-student-docs.php?ida='.$ida : 'page-student-docs.php'?>">
      <i class="far fa-folder-open"></i>
      <span>Documentos</span></a>
  </li>

  <!-- Nav Item - Solicitud -->
  <li class="nav-item">
    <a id="solicitud" class="nav-link"
    href="<?=($admin == 1) ? 'page-admin-student-solicitud.php?ida='.$ida : 'page-student-solicitud.php'?>">
      <i class="fas fa-vote-yea"></i>
      <span>Solicitud</span></a>
  </li>


  <!-- Nav Item - Edicion Datos/Documentos -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
      aria-controls="collapseOne">
      <i class="fas fa-fw fa-cog"></i>
      <span>Modificar</span>
    </a>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item"
        href="<?=($admin == 1) ? 'page-admin-student-edit-datos.php?ida='.$ida : 'page-student-edit-datos.php'?>">Datos</a>
        <a class="collapse-item"
        href="<?=($admin == 1) ? 'page-admin-student-edit-docs.php?ida='.$ida : 'page-student-edit-docs.php'?>">Documentos</a>
        <a class="collapse-item"
        href="<?=($admin == 1) ? 'page-admin-student-edit-solicitud.php?ida='.$ida : 'page-student-edit-solicitud.php'?>">Solicitud</a>
        <?php if ($admin >= 1) { ?>
          <a class="collapse-item" href="<?='page-admin-student-edit-pass.php?ida='.$ida?>">Correo / Contraseña</a>
        <?php } ?>        
      </div>
    </div>
  </li>
<?php } ?>
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

</ul>
<!-- End of Sidebar -->