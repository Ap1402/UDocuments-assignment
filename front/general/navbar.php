<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Utilidades de Usuario -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span id="usernameActual" class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']?></span>
                <!-- <i class="fas fa-user-circle"></i> -->
                <img class="img-profile rounded-circle" src="../img/varias/user-icon.svg">
              </a>              
              <!-- Dropdown - Perfil de usuario -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php if ($rol == 0) { // Mostrar solo para alumnos ?>
                  <a class="dropdown-item" href="page-student-perfil.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Perfil
                  </a>
                  <a id="btnEditarBoth" class="dropdown-item" href="#">
                    <i class="fas fa-user-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                    Editar (Correo/Contraseña)
                  </a>
                <div class="dropdown-divider"></div>
                <?php } ?>
                <?php if ($rol >= 1) { // Mostrar solo para admin ?>
                  <a id="btnEditarSelf" class="dropdown-item" href="#">
                    <i class="fas fa-user-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                    Editar mis datos
                  </a>
                <div class="dropdown-divider"></div>
                <?php }?>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar sesión
                </a>
              </div>
            </li>

          </ul>

        </nav>