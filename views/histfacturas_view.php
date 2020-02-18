<pre>
<?php
	foreach ($visualizacion as $factura){
		echo "Numero Factura Compra: <strong>".$factura['InvoiceId']."</strong> Precio Total: <strong>".$factura['Total']."</strong> Fecha Compra: <strong>".$factura['InvoiceDate']."</strong> <br>";
	}
?>
</pre>