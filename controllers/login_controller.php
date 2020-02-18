<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Portal Musical</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
<h1>LOGIN - Alberto</h1>
<?php

require_once("models/errores.php");

set_error_handler("errores");


/* Se muestra el formulario la primera vez */
if (!isset($_POST) || empty($_POST)) { 
	
?>
<form action="" method="post">
	<div class="container ">
	<div class="card border-success mb-3" style="max-width: 30rem;">
	<div class="card-body">
		<div class="form-group">
        Email Usuario &nbsp <input type="text" name="email" class="form-control" required>
        </div>
		<div class="form-group">
        Contraseña  &nbsp <input type="text" name="contraseña" class="form-control" required>
        </div>
		</br>
		<div><input type="submit" value="Inicio de Sesion"></div>
</form>
<?php

} else {
	$correcto=true;
	// Aquí va el código al pulsar submit
	require_once("models/login_model.php");
	require_once("views/login_view.php");

	if ($correcto) {
		loginCorrecto();  //funcion de login_view, nos dara el mensaje de bienvenida
	} else {
		loginIncorrecto(); //funcion de login_view, nos dara el mensaje de error
	}
	
}
?>

