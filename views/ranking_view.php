<pre>
<?php
	foreach ($visualizacion as $factura){
		echo "TOP ".$cont.":  ID Cancion: <strong>".$factura['TrackId']."</strong> Nombre Cancion: <strong>".$factura['Name']."</strong> Precio Unidad: <strong>".$factura['UnitPrice']."</strong> Cantidad: <strong>".$factura['Quantity']."</strong> <br>";
		$cont+=1;
	}
?>
</pre>