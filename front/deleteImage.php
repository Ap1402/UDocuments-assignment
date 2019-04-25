<?php 
   //Tomando datos y eliminado espacios en blanco final e inicio.
   $file = trim($_POST['file']);
   $cedula = trim($_POST['cedula']);

   // Armando la ruta completa del archivo a eliminar
   // $file_path = dirname(__FILE__).'\\'.'storage'.'\\'.$cedula.'\\'.$file;
   $file_path = dirname(__FILE__) . '\\' . 'storage' . '\\' . $file;

   // Eliminando el archivo
   unlink($file_path);

   // print_r(dirname(__FILE__)); // ruta origen del proyecto
   // print_r('\\');
   // print_r($cedula);          // nombre de a carpeta del alumno
   // print_r('\\');
   // print_r($file);            // nombre del archivo con extension
      
?>