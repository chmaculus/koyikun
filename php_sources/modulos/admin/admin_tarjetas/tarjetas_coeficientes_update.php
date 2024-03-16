<?php
include_once("cabecera.inc.php");
include_once("../includes/connect.php");
$fecha=date("Y-n-d");
$hora=date("H:i:s");
$uuid=mysql_result(mysql_query("select uuid()"),0,0);


echo "<center>";
#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	$query='insert into tarjetas_coeficientes set
		id_tarjeta="'.$_POST["id_tarjeta"].'",
		cantidad_pagos="'.$_POST["cantidad_pagos"].'",
		coeficiente="'.$_POST["coeficiente"].'",
		fecha="'.$fecha.'",
		hora="'.$hora.'"';
		echo $query;
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_tarjetas_coeficientes=mysql_insert_id($id_connection);


	#muestra registro ingresado
	$query='select * from tarjetas_coeficientes where id="'.$id_tarjetas_coeficientes.'"';
	$array_tarjetas_coeficientes=mysql_fetch_array(mysql_query($query));
	include("tarjetas_coeficientes_muestra.inc.php");
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_tarjetas_coeficientes=$_POST["id_tarjetas_coeficientes"];
		
		$query='update tarjetas_coeficientes set
		cantidad_pagos="'.$_POST["cantidad_pagos"].'",
		coeficiente="'.$_POST["coeficiente"].'",
		fecha="'.$fecha.'",
		hora="'.$hora.'" 
				where id="'.$id_tarjetas_coeficientes.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from tarjetas_coeficientes where id="'.$id_tarjetas_coeficientes.'"';
	$array_tarjetas_coeficientes=mysql_fetch_array(mysql_query($query));
	include("tarjetas_coeficientes_muestra.inc.php");
}
#---------------------------------------------------------------------------------



?>





<?php
if(!mysql_error()){
	if($_POST["accion"]=="ingreso"){
		echo '<td><font1>Los datos se ingresaron correctamente</font1></td>';
	}
	if($_POST["accion"]=="modificacion"){
		echo '<td><font1>Los datos se actualizaron correctamente</font1></td>';
	}
}
if($_POST["accion"]=="ELIMINAR"){
 	$query='delete from tarjetas_coeficientes where id="'.$id_tarjetas_coeficientes.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}
?>
<br><a href='<?php echo base64_decode($_POST["url"]);?>' onClick='self.close();'><button>Cerrar</button></a>
</center>
</body>
</html>
