<html>
	<meta charset="utf-8" />
	<head> <title> Menu Database WEBPORTALMUSICAL </title>
	</head>
	<body>
		<h1>Menu Database WEBPORTALMUSICAL - Alberto</h1>
		</br>
		<?php
			echo "Sesion Iniciada con el usuario: ".$_SESSION['nombre'];
		?>
		<form action='controllers/downmusic_controller.php' method='post'><input type='submit' value='Comprar/Descargar Musica'></form></br>		
		<form action='controllers/histfacturas_controller.php' method='post'><input type='submit' value='Ver Facturas Cliente'></form></br>	
		<form action='controllers/facturas_controller.php' method='post'><input type='submit' value='Ver Facturas Cliente entre 2 Fechas'></form></br>	
		<form action='controllers/ranking_controller.php' method='post'><input type='submit' value='Ver Rankig de Descargas entre 2 Fechas'></form></br>	
		
		<br><br><a href='models/logout.php'>Cerrar sesion</a>

	</body>
</html>