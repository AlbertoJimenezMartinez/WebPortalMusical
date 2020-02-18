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
$sql="SELECT * FROM Invoice WHERE CustomerId='$CustomerId' AND DATE_FORMAT(InvoiceDate,'%Y-%m-%d')>='$fechaInicio' AND DATE_FORMAT(InvoiceDate,'%Y-%m-%d')<='$fechaFin'";
/* $sql="SELECT * FROM Invoice WHERE CustomerId='$CustomerId' AND InvoiceDate>='$fechaInicio' AND InvoiceDate<='$fechaFin'"; */

$resultado=mysqli_query($conn, $sql);
if ($resultado) {
	$row=mysqli_fetch_assoc($resultado);
		if (mysqli_num_rows($resultado)>0) {
			while ($row = mysqli_fetch_assoc($resultado)) {
				//array para guar los datos de visualizacion
				$visualizacion[]=["InvoiceId"=>$row['InvoiceId'], "Total"=>$row['Total'], "InvoiceDate"=>$row['InvoiceDate']];
			}
		} else {
			echo "No hay facturas para este usuario entre esas fechas";
		}
}