<?php

$CustomerId=$_SESSION['id'];

//Select varios resultados
$facturas = array();
$sql="SELECT * FROM Invoice WHERE CustomerId='$CustomerId'";
$resultado=mysqli_query($conn, $sql);
if ($resultado) {
	$row=mysqli_fetch_assoc($resultado);
		if (mysqli_num_rows($resultado)>0) {
			while ($row = mysqli_fetch_assoc($resultado)) {
				//array para guar los datos de visualizacion
				$visualizacion[]=["InvoiceId"=>$row['InvoiceId'], "Total"=>$row['Total'], "InvoiceDate"=>$row['InvoiceDate']];
			}
		} else {
			echo "No hay facturas para este usuario";
		}
}


?>