<?php
session_start();
//si no has iniciado sesion, volvemos al login
require_once(".././models/redirigir.php");

// Llamada al fichero que inicia la conexión a la Base de Datos
require_once(".././db/db.php");

// Llamada al fichero de control de errores
require_once(".././models/errores.php");

set_error_handler("errores");

?>
<html>
<body>
    <h1>FACTURAS ENTRE FECHAS- Alberto</h1>
		<form action="" method="post">
			<div align="left">
				<label for="fechaIni">Introduzca la fecha inicio  </label><input type='date' name='fechaIni'><br>
				<label for="fechaFin">Introduzca la fecha fin </label><input type='date' name='fechaFin'><br>
			</div>
			<div><input type="submit" value="Buscar"></div>
		</form>
		<br>
		<form action="../index.php" method="post"><div><input type="submit" value="Volver"></div></form></form>

<?php

if (isset($_POST) && !empty($_POST)) { 

	$visualizacion=array();

    require_once(".././models/facturas_model.php");

	require_once(".././views/histfacturas_view.php");  //uso el mismo archivo que el apartado de histfacuras ya que visualizamos lo mismo
}

?>