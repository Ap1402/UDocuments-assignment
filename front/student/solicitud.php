<!-- Formulario Solicitudes -->

<div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="p-4">
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-4">Solicitud de ingreso
          </h1>
        </div>
        <form id="solicitudForm" method="POST" class="user needs-validation" novalidate>
          <div class="alert alert-success" role="alert" id="exito" hidden></div>
          <br>

          <div class="form-group row">
            <div class="col-sm-6 my-auto">
              <select id="carrera" name="carrera" class="form-control" required>
                <option disabled selected value="">Carrera</option>
                <?php 
                  include '../../back/conexion.php';

                  $sql = "SELECT * FROM carreras WHERE estatus=1";
                  $result = mysqli_query($conexion, $sql);
                  $resultArray = array();
                  if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value=". $row["codigo"] .">".$row["nombre"]."</option>";
                    $resultArray[]=array("codigo"=>$row["codigo"],"nombre"=>$row["nombre"],"manana"=>$row["manana"],"tarde"=>$row["tarde"],"noche"=>$row["noche"]);
                    };
                  
                  };
                ?>
              </select>
              <div class="invalid-feedback">
                Por favor seleccione una opción.
              </div>
            </div>
            <div class="col-sm-6 my-auto">
              <select id="turno" name="turno" class="form-control" required>
                <option disabled="disabled" selected value="">Seleccionar turno</option>

              </select>
              <div class="invalid-feedback">
                Por favor seleccione una opción.
              </div>
            </div>



          </div>

          <div class="form-group row">
            <div class="col my-auto">
              <select id="nombre_solicitud" name="nombre_solicitud" class="form-control" required>
                <option disabled selected value="">Método de ingreso</option>
                <?php 
              $sql2 = "SELECT * FROM tipo_solicitud WHERE activa=1";
              $result2 = mysqli_query($conexion, $sql2);

              if ($result2->num_rows > 0) {                
                while ($row2 = mysqli_fetch_assoc($result2)) {
?>
                <option value="<?= $row2['tipo']; ?>"> <?= $row2['nombre_solicitud']; ?></option>

                <?php
                };
              
              };
            ?>
              </select>
              <div class="invalid-feedback">
                Por favor seleccione una opción.
              </div>
            </div>
          </div>

          <br>

          <div class="alert alert-danger" role="alert" id="resultado" hidden>
          </div>
          <br>

          <button id="enviarSol" type="submit" class="btn btn-primary btn-user btn-block">
            Guardar
          </button>

        </form>
      </div>
    </div>
  </div>
</div>

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