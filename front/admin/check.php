<!-- Formulario Datos -->

<div class="col-sm-12 col-lg-10 mx-auto">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="p-4">
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-4">Validar <small class="text-muted"> documentos del alumno</small></h1>
        </div>
        <form id="datosForm" method="POST" class="user needs-validation" novalidate>
          <br>

          <div class="alert alert-success" role="alert" id="exito" hidden></div>
          <br>


          <div class="form-group row">

            <div class="col-md-12 text-md-center col-lg-4 text-lg-left my-auto pl-5">
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="check_cedula">
                <label class="custom-control-label" for="check_cedula">
                  <h5 class="text-gray-900 pl-3">Cedula</h5>
                </label>
              </div>
            </div>
            <div class="col-md-12 text-md-center col-lg-8 text-lg-left my-auto">

              <div id="preview-images-cedula" class="preview-images">

                <a href="img/varias/logo_ujap.png" data-lightbox="gallerycedula" data-title="Cedula">
                  <div class="thumbnail" data-id="<?php echo (str_shuffle('AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_')) ?>"
                  style="background-image: url('img/varias/logo_ujap.png')">
                </div>
              </a>
                <a href="img/varias/banner.png" data-lightbox="gallerycedula" data-title="Cedula">
                  <div class="thumbnail" data-id="<?php echo (str_shuffle('AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_')) ?>"
                  style="background-image: url('img/varias/banner.png')"></div>
                </a>
                <a href="img/varias/consultoria_integral.png" data-lightbox="gallerycedula" data-title="Cedula">
                  <div class="thumbnail" data-id="<?php echo (str_shuffle('AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_')) ?>"
                  style="background-image: url('img/varias/consultoria_integral.png')"></div>
                </a>
                <a href="img/varias/logo_ujap_peq.png" data-lightbox="gallerycedula" data-title="Cedula">
                  <div class="thumbnail" data-id="<?php echo (str_shuffle('AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_')) ?>"
                  style="background-image: url('img/varias/logo_ujap_peq.png')"></div>
                </a>
                <a href="img/varias/76.jpg" data-lightbox="gallerycedula" data-title="Cedula">
                  <div class="thumbnail" data-id="<?php echo (str_shuffle('AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_')) ?>"
                  style="background-image: url('img/varias/76.jpg')"></div>
                </a>

              </div>

            </div>

          </div>

          <br>
          <hr class="sidebar-divider">
          <br>

          <div class="form-group row">

            <div class="col-md-12 text-md-center col-lg-4 text-lg-left my-auto pl-5">
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="check_cedula">
                <label class="custom-control-label" for="check_cedula">
                  <h5 class="text-gray-900 pl-3">Cedula</h5>
                </label>
              </div>
            </div>
            <div class="col-md-12 text-md-center col-lg-8 text-lg-left my-auto">

              <div id="preview-images-foto" class="preview-images">

                <a href="img/varias/logo_ujap.png" data-lightbox="galleryfoto" data-title="foto">
                  <div class="thumbnail" data-id="<?php echo (str_shuffle('AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_')) ?>"
                    style="background-image: url('img/varias/logo_ujap.png')">
                  </div>
                </a>
                <a href="img/varias/banner.png" data-lightbox="galleryfoto" data-title="foto">
                  <div class="thumbnail" data-id="<?php echo (str_shuffle('AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_')) ?>"
                    style="background-image: url('img/varias/banner.png')"></div>
                </a>
                <a href="img/varias/consultoria_integral.png" data-lightbox="galleryfoto" data-title="foto">
                  <div class="thumbnail" data-id="<?php echo (str_shuffle('AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_')) ?>"
                    style="background-image: url('img/varias/consultoria_integral.png')"></div>
                </a>
                <a href="img/varias/logo_ujap_peq.png" data-lightbox="galleryfoto" data-title="foto">
                  <div class="thumbnail" data-id="<?php echo (str_shuffle('AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_')) ?>"
                    style="background-image: url('img/varias/logo_ujap_peq.png')"></div>
                </a>
                <a href="img/varias/76.jpg" data-lightbox="galleryfoto" data-title="foto">
                  <div class="thumbnail" data-id="<?php echo (str_shuffle('AaBbCcDdEeFfGgHhIiJjKkLlMm0123456789_')) ?>"
                    style="background-image: url('img/varias/76.jpg')"></div>
                </a>

              </div>

            </div>

          </div>

          <br>
          <hr class="sidebar-divider">
          <br>



          <br>

          <div class="alert alert-danger" role="alert" id="resultado" hidden>
          </div>
          <br>

          <button id="enviarDat" type="submit" class="btn btn-primary btn-user btn-block">
            Guardar
          </button>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- Page level custom scripts -->
<script src="js/front/form-validation.js"></script>
<script src="scripts/datos.js"></script>



<script>
  $(document).ready(function () {
    $("#discapacidad").change(function () {
      var selectedOpt = $(this).val();
      if (selectedOpt == 2) {
        var html =
          "<input type='text' id='tipo_discapacidad' name='tipo_discapacidad' class='form-control form-control-user' placeholder='Tipo discapacidad' minlength='4' required><div class='invalid-feedback'>Por favor introduzca un Tipo de discapacidad válida.</div>";
        $("#tipo_disc").prepend(html);
      } else {
        $("#tipo_discapacidad").remove();
      };
    });
  });
</script>

<script>
  $(document).ready(function () {

    var carreras = <?php echo json_encode($resultArray) ?>;

    $("#carrera").change(function () {

      var codigo = $("#carrera").val();
      var nuevasopciones = "";

      console.log(carreras[codigo - 1]);

      if (carreras[codigo - 1]["manana"] == 1) {
        nuevasopciones += "<option value='1'>Mañana</option>";
      }
      if (carreras[codigo - 1]["tarde"] == 1) {
        nuevasopciones += "<option value='2'>Tarde</option>";
      }
      if (carreras[codigo - 1]["noche"] == 1) {
        nuevasopciones += "<option value='3'>Noche</option>";
      }

      $("select#turno").html(nuevasopciones);
    });
  });
</script>