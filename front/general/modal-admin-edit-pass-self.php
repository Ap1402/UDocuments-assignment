<?php if ($rol > 0 && isset($_SESSION['id_admin'])) { ?>
      <!-- Modal EDITAR ADMIN SELF-->

      <div class="modal fade" id="editarAdminSelfModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalEditarAdminSelf" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalEditarAdminSelf">Editar Admin</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form id="passEditFormSelf" method="POST" class="user needs-validation" novalidate>

              <div class="modal-body">
                <div class="px-4 py-2">
                  <div class="alert alert-success" role="alert" id="exitoAdminSelf" style="display: none;"></div>
                  <input type="hidden" id="adminIdSelf" name="adminIdSelf" value="<?=$_SESSION['id_admin']?>">
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label class="pl-2"><small>Nombre</small></label><br>
                      <input type="text" id="nombreAdminSelf" name="nombreAdminSelf"
                        class="form-control form-control-user" placeholder="Nombre" minlength="2" data-toggle="tooltip"
                        data-placement="top" title="Nombre" value="<?=$_SESSION['nombre']?>" required>
                      <div class="invalid-feedback">
                        Este campo debe tener al menos 2 caracteres.
                      </div>
                    </div>
                  </div>
                  <div class="form-group row pt-2">
                    <div class="col-11">
                      <label for="botonMostrarContrasenaEditSelf">
                        <h5 class="text-gray-900 pl-2">Modificar Contraseña</h5>
                      </label>
                    </div>
                    <div class="col-1 text-center">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="botonMostrarContrasenaEditSelf">
                        <label class="custom-control-label" for="botonMostrarContrasenaEditSelf">
                        </label>
                      </div>
                    </div>
                  </div>
                  <div id="contrasenaMostrarEditSelf" style="display: none;">
                    <div class="form-group">
                      <label class="pl-2"><small>Contraseña</small></label><br>
                      <div class="input-group">
                        <input type="password" id="contrasenaEditSelf" name="contrasenaEditSelf" minlength="4"
                          class="form-control form-control-user" placeholder="Contraseña" data-toggle="tooltip"
                          data-placement="top" title="Contraseña" value="">
                        <div class="input-group-append">
                          <a id="show" onclick="mostrarContrasenaEditSelf()"
                            class="btn btn-primary text-center align-middle" href="#">
                            <i id="showpassSelf" class="fas fa-eye-slash"></i>
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
                        <input type="password" id="contrasena2EditSelf" name="contrasena2EditSelf" minlength="4"
                          class="form-control form-control-user" placeholder="Contraseña" data-toggle="tooltip"
                          data-placement="top" title="Repetir contraseña" value="">
                        <div class="input-group-append">
                          <a id="show2" onclick="mostrarContrasenaEditSelf()"
                            class="btn btn-primary text-center align-middle" href="#">
                            <i id="showpass2Self" class="fas fa-eye-slash"></i>
                          </a>
                        </div>
                      </div>
                      <div class="invalid-feedback">
                        Este campo debe tener al menos 4 caracteres.
                      </div>
                    </div>
                  </div>

                  <div class="alert alert-danger" role="alert" id="resultadoAdminSelf" style="display: none;"></div>

                </div>
              </div>
              <div class="modal-footer">
                <label><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button></label>
                <label><button type="submit" class="btn btn-primary text-white">Guardar</button></label>
              </div>

            </form>
          </div>
        </div>
      </div>
      <!-- /.Modal EDITAR ADMIN SELF-->
    <?php };?>
      <!-- Modal EDITAR ALUMNO BOTH-->

      <div class="modal fade" id="editarAlumnoBothModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalEditarAlumnoBoth" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalEditarAlumnoBoth">Editar Correo y contraseña</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form id="passEditFormBoth" method="POST" class="user needs-validation" novalidate>

              <div class="modal-body">
                <div class="px-4 py-2">

                  <div class="alert alert-success" role="alert" id="exitoAlumnoBoth" style="display: none;"></div>
                  <?php
                  include '../back/conexion.php';
                  if (isset($_SESSION['id'])) {
                    $idaBoth=$_SESSION['id'];
                    $correoAlumnoBoth = $_SESSION['correo'];
                    }else{
                    $idaBoth=$_GET['ida'];
                    $sql_both = "SELECT correo FROM alumnos WHERE id_alumno=$idaBoth";
                    $result_both = mysqli_query($conexion, $sql_both);
                    $row_both = mysqli_fetch_assoc($result_both);
                    $correoAlumnoBoth = $row_both['correo'];
                    };
                  ?>
                  <input type="hidden" id="idaAlumnoBoth" name="idaAlumnoBoth" value="<?=$idaBoth?>">

                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label class="pl-2"><small>Correo</small></label><br>
                      <input type="email" id="correoAlumnoBoth" name="correoAlumnoBoth"
                        class="form-control form-control-user" placeholder="Correo" minlength="2" data-toggle="tooltip"
                        data-placement="top" title="Correo" value="<?=$correoAlumnoBoth?>" required>
                      <div class="invalid-feedback">
                        Este campo debe tener al menos 2 caracteres.
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="pl-2"><small>Contraseña</small></label><br>
                    <div class="input-group">
                      <input type="password" id="contrasenaEditBoth" name="contrasenaEditBoth" minlength="4"
                        class="form-control form-control-user" placeholder="Contraseña" data-toggle="tooltip"
                        data-placement="top" title="Contraseña" value="">
                      <div class="input-group-append">
                        <a id="show" onclick="mostrarContrasenaEditBoth()"
                          class="btn btn-primary text-center align-middle" href="#">
                          <i id="showpassBoth" class="fas fa-eye-slash"></i>
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
                      <input type="password" id="contrasena2EditBoth" name="contrasena2EditBoth" minlength="4"
                        class="form-control form-control-user" placeholder="Contraseña" data-toggle="tooltip"
                        data-placement="top" title="Repetir contraseña" value="">
                      <div class="input-group-append">
                        <a id="show2" onclick="mostrarContrasenaEditBoth()"
                          class="btn btn-primary text-center align-middle" href="#">
                          <i id="showpass2Both" class="fas fa-eye-slash"></i>
                        </a>
                      </div>
                    </div>
                    <div class="invalid-feedback">
                      Este campo debe tener al menos 4 caracteres.
                    </div>
                  </div>


                  <div class="alert alert-danger" role="alert" id="resultadoAlumnoBoth" style="display: none;"></div>

                </div>
              </div>
              <div class="modal-footer">
                <label><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button></label>
                <label><button type="submit" class="btn btn-primary text-white">Guardar</button></label>
              </div>

            </form>
          </div>
        </div>
      </div>
      <!-- /.Modal EDITAR ALUMNO BOTH-->