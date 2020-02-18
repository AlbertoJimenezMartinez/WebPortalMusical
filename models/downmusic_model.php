<?php 

function obtenerCanciones($conn) {
	$canciones = array();
	
	$sql = "SELECT Name FROM track ";
	
	$resultado = mysqli_query($conn, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			$canciones[] = $row;
		}
	}
	
	return $canciones;
}

function obtenerIdCanciones($conn, $nombreCancion) {
	$idCancion = null;
	
	$sql = "SELECT TrackId FROM Track WHERE Name = '$nombreCancion'";
	$resultado = mysqli_query($conn, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			$idCancion = $row['TrackId'];
		}
	}
	
	return $idCancion;
	
}

function añadirCarrito($conn, $cancion){
    
    $idCancion=obtenerIdCanciones($conn, $cancion);
	//guardarlo en el array asotiativo
	if(!empty($_SESSION['cesta'][$idCancion])){ //no deben de estar vacios al principios
		$_SESSION['cesta'][$idCancion]+=1;
		
	} else {
		$_SESSION['cesta'][$idCancion]=1;
	}
    
}


function obtenerPVPCancion($conn, $idCancion) {
	$sqlPrecio="select UnitPrice from track where trackId='$idCancion'";
    $resultado=mysqli_query($conn, $sqlPrecio); 
	if ($resultado) {
		$row=mysqli_fetch_assoc($resultado);
		$pvp=$row['UnitPrice']; 
	} else {
		trigger_error("Error: " . $sqlPrecio . "<br>" . mysqli_error($conn));
	}
	
	return $pvp;
	
}


function comprar($conn) {
	
		$CustomerId=$_SESSION['id'];
		
		//sacar los maximos InvoiceLineId y InvoiceId
		$sqlMax="SELECT max(InvoiceLineId) as InvoiceLineId, max(invoice.InvoiceId) as InvoiceId FROM invoiceline, invoice";
		$resultadoMax=mysqli_query($conn, $sqlMax);
		if ($resultadoMax) {
			$rowMax=mysqli_fetch_assoc($resultadoMax);
			$InvoiceId=$rowMax['InvoiceId']+1;
			$InvoiceLineId=$rowMax['InvoiceLineId'];
			//calcular el total de la factura
			$total=0;
			foreach ($_SESSION['cesta'] as $TrackId => $unidades) {
				//precio de cada uno y sumar
				$sql="SELECT UnitPrice FROM Track WHERE TrackId='$TrackId'";
				$resultado=mysqli_query($conn, $sql);
				if ($resultado) {
					$row=mysqli_fetch_assoc($resultado);
					$UnitPrice=$row['UnitPrice'];
					$total=$total+($UnitPrice*$unidades);
				} else {
					trigger_error("Error: " . $sql . "<br>" . mysqli_error($conn));
				}
			}

			//insertar en tabla Invoice
			$sql = "INSERT INTO Invoice (InvoiceId, CustomerId, InvoiceDate, Total) VALUES ('$InvoiceId', '$CustomerId', sysdate(), '$total')";
			if(!mysqli_query($conn, $sql)){
				echo "Error: ".$sql."<br>".mysqli_error($conn)."<br>";
			} else {
				echo "Invoice: Datos insertados correctamente<br>";
			}

			//insertar en tabla InvoiceLine
			foreach ($_SESSION['cesta'] as $TrackId => $unidades) {
				$InvoiceLineId+=1;
				$pvp=obtenerPVPCancion($conn, $TrackId);

				//guardar en pabla invoiceLine
				$sql = "INSERT INTO InvoiceLine (InvoiceLineId, InvoiceId, TrackId, UnitPrice, Quantity) VALUES ('$InvoiceLineId', '$InvoiceId', '$TrackId', '$pvp', '$unidades')";
				if (!mysqli_query($conn, $sql)) {
					echo "Error: ".$sql."<br>".mysqli_error($conn)."<br>";
				} else {
					echo "InvoiceLine: Datos insertados correctamente<br>";
				}
				
			}

			//vaciar la cesta
			$_SESSION['cesta']=array(); 
			
			
		} else {
			trigger_error("Error: " . $sqlMax . "<br>" . mysqli_error($conn));
		}
			
}

?>