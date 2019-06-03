'use strict'

$(document).on('click', '.close-button-db span', function (e) {

  var target = this;
  // //console.log(target.dataset.path);
  // //console.log(target.dataset.cedula);

  var file_path = target.dataset.path;
  var cedula = target.dataset.cedula;

  // Cualquier ruta de archivo, incluso con slash invertido
  // var filepath = "\\direccion\\hacia-archivo\\nombre-archivo.png";

  // Usar la expresion regular para reemplazar el contenido extra con un espacio en blanco
  var filenameWithExtension = file_path.replace(/^.*[\\\/]/, '');

  // Expone nombre-archivo.png
  //console.log(filenameWithExtension);

  var deleteImage = function (filenameWithExtension, cedula, target) {
    var r = confirm("Esta seguro que desea eliminar este archivo?. Tenga en cuenta que este cambio es PERMANENTE. ");
    if (r == true) {
      $.ajax({
        type: 'POST',
        url: './back/deleteImage.php',
        data: {
          'file': filenameWithExtension,
          'cedula': cedula
        }
      })
        .done(function (response) {

          //console.log(response);

          if (target.parentNode.classList.contains('close-button-db')) {
            target.parentNode.parentNode.remove();
            alert('La imagen ' + filenameWithExtension + ' fue permanentemente eliminada.');
          }

        })
        .catch(function (err) {
          alert('Ocurrio un error al eliminar la imagen' + filenameWithExtension);
        });
    }
  }
  deleteImage(filenameWithExtension, cedula, target);

});