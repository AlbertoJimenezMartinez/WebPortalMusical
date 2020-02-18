<?php

	require_once("../models/limpiar_campos.php");

	if (empty($_POST["fechaIni"])) {
		trigger_error("La fecha de inicio no puede estar vacia");
	}
	else {
	  $fecha=strtotime($_REQUEST['fechaIni']);
	  $fechaInicio=date("Y-m-d",$fecha);
	} 
	if (empty($_POST["fechaFin"])) {
		trigger_error("La fecha de fin no puede estar vacia");
	}
	else {
	  $fecha=strtotime($_REQUEST['fechaFin']);
	  $fechaFin=date("Y-m-d",$fecha);
	} 

	$CustomerId=$_SESSION['id'];

$facturas = array();
$sql="SELECT invoiceline.TrackId as TrackId, Name, invoiceline.UnitPrice as UnitPrice, sum(Quantity) as Quantity FROM invoiceline,track,invoice where invoiceline.TrackId=track.TrackId and invoice.InvoiceId=invoiceline.InvoiceId and DATE_FORMAT(InvoiceDate,'%Y-%m-%d')>='$fechaInicio' AND DATE_FORMAT(InvoiceDate,'%Y-%m-%d')<='$fechaFin' GROUP BY(invoiceline.TrackId) ORDER BY sum(Quantity) DESC";
/* $sql="SELECT invoiceline.TrackId as TrackId, Name, invoiceline.UnitPrice as UnitPrice, sum(Quantity) as Quantity FROM invoiceline, track where invoiceline.TrackId=track.TrackId AND InvoiceDate>='$fechaInicio' AND InvoiceDate<='$fechaFin' GROUP BY(invoiceline.TrackId) ORDER BY sum(Quantity) DESC"; */

$resultado=mysqli_query($conn, $sql);
if ($resultado) {
	$row=mysqli_fetch_assoc($resultado);
		if (mysqli_num_rows($resultado)>0) {
			while ($row = mysqli_fetch_assoc($resultado)) {
				//array para guar los datos de visualizacion
				$visualizacion[]=["TrackId"=>$row['TrackId'], "Name"=>$row['Name'], "UnitPrice"=>$row['UnitPrice'], "Quantity"=>$row['Quantity']];
			}
		} else {
			echo "No hay compras entre esas fechas";
		}
}


?>