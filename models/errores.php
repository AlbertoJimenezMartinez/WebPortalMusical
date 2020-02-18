<?php

function errores ($error_level,$error_message,$error_file, $error_line, $error_context) {
  echo "<b> Codigo error: </b> $error_level  <br><b> Mensaje: </b> $error_message  <br><b> Fichero: </b> $error_file <br><b> Linea: </b>$error_line<br> ";
  //echo "<b>Array--> </b> <br>";
  //var_dump($error_context);
  echo "<br>";
  die();  

}

?>