<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="../css/style.css" type="text/css">
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
  <title>Tablabla cuota_alquiler By Christian Máculus</title>
</head>



<?php

include_once("../includes/connect.php");
$fecha=date("Y-n-d");
$hora=date("H:i:s");



#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	$query='insert into cuota_alquiler set
		sucursal="'.$_POST["sucursal"].'",
		a="'.$_POST["a"].'",
		b="'.$_POST["b"].'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_cuota_alquiler=mysql_insert_id($id_connection);


	#muestra registro ingresado
	$query='select * from cuota_alquiler where id="'.$id_cuota_alquiler.'"';
	$array_cuota_alquiler=mysql_fetch_array(mysql_query($query));
	//include(cuota_alquiler"_muestra.inc.php")
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_cuota_alquiler=$_POST["id_cuota_alquiler"];
		
		$query='update cuota_alquiler set
		sucursal="'.$_POST["sucursal"].'",
		a="'.$_POST["a"].'",
		b="'.$_POST["b"].'"
				where id="'.$id_cuota_alquiler.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from cuota_alquiler where id="'.$id_cuota_alquiler.'"';
	$array_cuota_alquiler=mysql_fetch_array(mysql_query($query));
	//include(cuota_alquiler"_muestra.inc.php")
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
 	$query='delete from cuota_alquiler where id="'.$id_cuota_alquiler.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}


?>
</center>
</body>
</html>
