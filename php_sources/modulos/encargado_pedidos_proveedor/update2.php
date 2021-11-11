<br>
<?php

include("pedidos_base.php");
include("../includes/connect.php");
$fecha=date("Y-n-d");
$hora=date("H:i:s");


if($_POST["accion"]=="ELIMINAR"){
 	$query='delete from pedidos_proveedor where numero_pedido="'.$_POST["numero_pedido"].'"';
 	#echo $query."<br>";
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	if(!mysql_error()){
	    echo 'El pedido ha sido eliminado con exito<br>';
	}

}


?>
</center>
</body>
</html>
