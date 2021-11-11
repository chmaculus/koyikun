

<?php

include("index.php");
include_once("../includes/connect.php");



$fecha=date("Y-n-d");
$hora=date("H:i:s");



#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	$query='insert into cajas_deudores set
		id="'.$_POST["id"].'",
		deudor="'.$_POST["deudor"].'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_cajas_deudores=mysql_insert_id($id_connection);


	#muestra registro ingresado
	$query='select * from cajas_deudores where id="'.$id_cajas_deudores.'"';
	$array_cajas_deudores=mysql_fetch_array(mysql_query($query));
	include("deudores_muestra.inc.php");
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_cajas_deudores=$_POST["id_cajas_deudores"];
		
		$query='update cajas_deudores set
		id="'.$_POST["id"].'",
		deudor="'.$_POST["deudor"].'"
				where id="'.$id_cajas_deudores.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from cajas_deudores where id="'.$id_cajas_deudores.'"';
	$array_cajas_deudores=mysql_fetch_array(mysql_query($query));
	include("deudores_muestra.inc.php");
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
 	$query='delete from cajas_deudores where id="'.$id_cajas_deudores.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}


?>
</center>
</body>
</html>
