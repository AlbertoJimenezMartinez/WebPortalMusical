<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Portal Musical</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
<h1>DESCARGAR/COMPRAR CANCIONES - Alberto</h1>
<?php
session_start();
//si no has iniciado sesion, volvemos al login
require_once(".././models/redirigir.php");

// Llamada al fichero que inicia la conexión a la Base de Datos
require_once(".././db/db.php");

// Llamada al fichero de control de errores
require_once(".././models/errores.php");

// Llamada al fichero de funciones del carrito
require_once(".././models/downmusic_model.php");
require_once(".././views/downmusic_view.php");

set_error_handler("errores");


	echo "Usuario: ".$_SESSION['nombre'];
	$canciones = obtenerCanciones($conn);
	
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<div align="left">
	<label for="canciones">Canciones:</label>
	<select name="canciones">
		<?php foreach($canciones as $cancion) : ?>
			<option> <?php echo $cancion['Name'] ?> </option>
		<?php endforeach; ?>
	</select>
	<br>
</div>
		
<?php
	echo '<div><input type="submit" name="enviar" value="Añadir al Carrito"></div>';
	echo "<h1>Cesta compras</h1>";
	
	if (!isset($_POST) || empty($_POST)) { //sin enviar el formulario
		mostrarCarrito($conn);  
		if (isset($_POST['comprar']) && !empty($_POST['comprar'])) { 
			comprar($conn);
		}
	} else {
		
		if (isset($_POST['enviar']) && !empty($_POST['enviar'])) {
			$cancion = $_POST['canciones'];
			añadirCarrito($conn, $cancion);
			mostrarCarrito($conn); 
		} 
		if (isset($_POST['comprar']) && !empty($_POST['comprar'])) { 
			comprar($conn);
		}
		
	}
	


?>

</form>
<form action="../index.php" method="post"><div><input type="submit" value="Volver"></div></form>
</body>

</html>