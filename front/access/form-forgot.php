  
  <div class="col-lg-3 d-none d-lg-block bg-password-image"></div>
  <div class="col-sm-10 col-md-9 col-lg-9">
    <div class="p-5">
      <div class="text-center">
        <h1 class="h4 text-gray-900 mb-2">¿Olvido la contraseña?</h1>
        <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset
          your password!</p>
      </div>
      <form id="forgotForm" method="POST" class="user needs-validation" novalidate>
        <div class="form-group">
          <div class="col">
          <input type="email" id="pass_forgot" name="pass_forgot" class="form-control form-control-user"
            placeholder="Correo" required>
            <div class="invalid-feedback">
              Por favor introduzca un correo válido.
            </div>
            </div>
        </div>
        <button id="enviarFor" type="submit" class="btn btn-primary btn-user btn-block">
          Recuperar contraseña
        </button>
      </form>
      <hr>
      <div class="text-center">
        <a href="page-registro.php" class="small">Crear una cuenta!</a>
      </div>
      <div class="text-center">
        <a href="index.php" class="small">¿Ya tienes una cuenta? Iniciar sesión!</a>
      </div>
    </div>
  </div>