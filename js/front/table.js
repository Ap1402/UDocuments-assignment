$(document).ready(function () {
 
 // Traducir la tabla al español
 $('.dataTables_length').addClass('bs-select');
});
var table = $('#dataTable').DataTable({
 language: {
  "decimal": "",
  "emptyTable": "No hay información",
  "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
  "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
  "infoFiltered": "(Filtrado de _MAX_ total entradas)",
  "infoPostFix": "",
  "thousands": ",",
  "lengthMenu": "Mostrar _MENU_",
  "loadingRecords": "Cargando...",
  "processing": "Procesando...",
  "search": "Buscar:",
  "zeroRecords": "Sin resultados encontrados",
  "paginate": {
   "first": "Primero",
   "last": "Ultimo",
   "next": "Siguiente",
   "previous": "Anterior"
  }
 },
});
var table2 = $('#dataTable2').DataTable({
 language: {
  "decimal": "",
  "emptyTable": "No hay información",
  "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
  "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
  "infoFiltered": "(Filtrado de _MAX_ total entradas)",
  "infoPostFix": "",
  "thousands": ",",
  "lengthMenu": "Mostrar _MENU_",
  "loadingRecords": "Cargando...",
  "processing": "Procesando...",
  "search": "Buscar:",
  "zeroRecords": "Sin resultados encontrados",
  "paginate": {
   "first": "Primero",
   "last": "Ultimo",
   "next": "Siguiente",
   "previous": "Anterior"
  }
 },
});