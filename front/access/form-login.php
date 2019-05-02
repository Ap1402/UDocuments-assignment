<div class="col-lg-3 d-none d-lg-block bg-login-image"></div>
<div class="col-sm-12 col-md-10 col-lg-9">
  <div class="p-5">
    <div class="text-center">
      <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
    </div>
    <form id="loginForm" method="POST" class="user needs-validation" novalidate>

      <!-- Username -->
      <div class="form-group">
        <div class="col">
        <input type="text" id="usernameLog" name="usernameLog" class="form-control form-control-user"
          placeholder="Nombre usuario" minlength="4" required>
        <div class="invalid-feedback">
          Por favor introduzca un nombre de usuario válido.
        </div>
        </div>
      </div>

      <!-- Password -->
      <div class="form-group">
        <div class="col">
        <input type="password" id="contrasenaLog" name="contrasenaLog" minlength="4"
          class="form-control form-control-user" placeholder="Contraseña" required>
        <div class="invalid-feedback">
          La contraseña debe tener al menos 8 carateres
        </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col">
        <div class="custom-control custom-checkbox small">
          <input type="checkbox" class="custom-control-input" id="customCheck">
          <label class="custom-control-label" for="customCheck">Recordarme</label>
        </div>
        </div>
      </div>

      <br>
      <div class="alert alert-danger" role="alert" id="resultadoLog" hidden></div>
      <!-- Sign up button -->
      <button id="enviarLog" type="submit" class="btn btn-primary btn-user btn-block">
        Iniciar sesión
      </button>
    </form>
    <hr>
    <div class="text-center">
      <a href="page-forgot.php" class="small">¿Olvido la contraseña?</a>
    </div>
    <div class="text-center">
      <a href="page-registro.php" class="small">Crear una cuenta!</a>
    </div>
  </div>
</div>
