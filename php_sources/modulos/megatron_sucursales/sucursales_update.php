<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Tablabla sucursales By Christian Máculus</title>
</head>



<?php
$fecha=date("Y-n-d");
$hora=date("H:i:s");



#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	$query='insert into sucursales set
		id="'.$_POST["id"].'",
		sucursal="'.$_POST["sucursal"].'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_sucursales=mysql_insert_id($id_connection);


	#muestra registro ingresado
	$query='select * from sucursales where id="'.$id_sucursales.'"';
	$array_sucursales=mysql_fetch_array(mysql_query($query));
	include(sucursales"_muestra.inc.php")
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_sucursales=$_POST["id_sucursales"];
		
		$query='update sucursales set
		id="'.$_POST["id"].'",
		sucursal="'.$_POST["sucursal"].'"
				where id="'.$id_sucursales.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from sucursales where id="'.$id_sucursales.'"';
	$array_sucursales=mysql_fetch_array(mysql_query($query));
	include(sucursales"_muestra.inc.php")
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
 	$query='delete from sucursales where id="'.$id_sucursales.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}


?>
</center>
</body>
</html>
