<?php
session_start();

session_unset();
session_destroy();

echo "Has cerrado correctamente la sesion";
echo "<br><br><a href='../index.php'>Ir a Inicio de Sesion</a>";  
?>