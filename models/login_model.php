<?php 
	
	require_once("models/limpiar_campos.php");
	
	$email=$_POST['email'];
	limpiar_campos($email); 
	$contraseña=$_POST['contraseña'];

	$sql = "select CustomerId, FirstName from Customer where Email='$email' and LastName='$contraseña'";
	$resultado= mysqli_query($conn, $sql);
	if ($resultado) {
		if (mysqli_num_rows($resultado)>0) {
			$row = mysqli_fetch_assoc($resultado);
			$_SESSION['nombre'] = $row['FirstName'];
			$_SESSION['id'] = $row['CustomerId'];
			$_SESSION['cesta'] = array();
			
			$correcto=true;
			
		} else {
			$correcto=false;
		}
	} else {
		trigger_error("Error: " . $sql . "<br>" . mysqli_error($conn));
	}
	
	

