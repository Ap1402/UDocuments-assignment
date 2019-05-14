<?php 

include 'conexion.php';

   //Tomando datos y eliminado espacios en blanco final e inicio.
   $file = trim($_POST['file']);
   $cedula = trim($_POST['cedula']);

   // Armando la ruta completa del archivo a eliminar
   $file_path = dirname(__FILE__).'\\'.'Documentos'.'\\'.$cedula.'\\'.$file;
   $path_splitted = explode('_', $file);

   if (($path_splitted[0] == 'cedula') ) {
      $urlBD =$cedula.'/'.$file;
      $borrarDoc = "UPDATE documentos SET  cedula='' WHERE cedula='$urlBD'";
      $result = mysqli_query($conexion, $borrarDoc);   
   }

   if (($path_splitted[0] == 'foto') ) {
      $urlBD =$cedula.'/'.$file;
      $borrarDoc = "UPDATE documentos SET  foto='' WHERE foto='$urlBD'";
      $result = mysqli_query($conexion, $borrarDoc);   
   }

   if (($path_splitted[0] == 'fondo') ) {
      $urlBD =$cedula.'/'.$file;
      $borrarDoc = "UPDATE documentos SET  fondo='' WHERE fondo='$urlBD'";
      $result = mysqli_query($conexion, $borrarDoc);   
   }

   if (($path_splitted[0] == 'partida') ) {
      $urlBD =$cedula.'/'.$file;
      $borrarDoc = "UPDATE documentos SET  partida='' WHERE partida='$urlBD'";
      $result = mysqli_query($conexion, $borrarDoc);   
   }

   if (($path_splitted[0] == 'notas') ) {
      $urlBD =$cedula.'/'.$file;
      $borrarDoc = "DELETE FROM notas WHERE nota='$urlBD'";
      $result = mysqli_query($conexion, $borrarDoc);   
   }
   if (($path_splitted[0] == 'rusnies') ) {
      $urlBD =$cedula.'/'.$file;
      $borrarDoc = "DELETE FROM rusnies WHERE rusnies='$urlBD'";
      $result = mysqli_query($conexion, $borrarDoc);   
   }
   if (($path_splitted[0] == 'metodo') ) {
      $urlBD =$cedula.'/'.$file;
      $borrarDoc = "DELETE FROM metodoing  WHERE metodo='$urlBD'";
      $result = mysqli_query($conexion, $borrarDoc);   
   }
   // Eliminando el archivo
   unlink($file_path);



   // print_r(dirname(__FILE__)); // ruta origen del proyecto
   // print_r('\\');
   // print_r($cedula);          // nombre de a carpeta del alumno
   // print_r('\\');
   // print_r($file);            // nombre del archivo con extension
      
?>