<?php
session_start();

// Llamada al fichero que inicia la conexión a la Base de Datos
require_once("db/db.php");

// Llamada al controlador
if (!isset($_SESSION['id'])) {
	require_once("controllers/login_controller.php");
} else {
	require_once("controllers/menu_metodos.php");	
}
	
?>