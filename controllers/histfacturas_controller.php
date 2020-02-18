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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Portal Musical</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
<h1>FACTURAS HISTORICAS - Alberto</h1>
<?php echo "Usuario: ".$_SESSION['nombre'];?>
 
<?php
echo '<form action="../index.php" method="post"><div><input type="submit" value="Volver"></div></form>';

$visualizacion=array();

require_once(".././models/histfacturas_model.php");

require_once(".././views/histfacturas_view.php");

?>


</body>

</html>