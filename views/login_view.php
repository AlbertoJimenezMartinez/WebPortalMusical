<?php

function loginCorrecto() {
	echo "Has iniciado Sesion: ".$_SESSION['nombre'];
	echo "<br><br><a href='./index.php'>Ir a los distintos metodos</a>";
	echo "<br><br><a href='models/logout.php'>Cerrar Sesion</a>";
}

function loginIncorrecto() {
	echo "Los datos introducidos no son correctos";
	echo "<br><br><a href='./index.php'>Volver</a>";
}

?>