<?php

//si no has iniciado sesion, volvemos al login
if (!isset($_SESSION['nombre'])){
	header("Location: .././index.php");
}

?>