<?php 

function mostrarCarrito($conn){
    if(count($_SESSION['cesta'])==0){
        echo "Cesta vacia";
    }
    else{
        foreach ($_SESSION['cesta'] as $idCancion => $unidades){
            $pvp=obtenerPVPCancion($conn, $idCancion);
			echo "ID_CANCION=$idCancion, UNIDADES=$unidades, PVP=$pvp, PRECIO TOTAL=".($pvp*$unidades)." <br>";
			
        }
        echo '<br><div><input type="submit" name="comprar" value="Comprar"></div>'; 
    }
}

?>