<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Tablabla codigos_autorizados By Christian Máculus</title>
</head>



<?php
$fecha=date("Y-n-d");
$hora=date("H:i:s");



#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	$query='insert into codigos_autorizados set
		id="'.$_POST["id"].'",
		id_servicio="'.$_POST["id_servicio"].'",
		tipo="'.$_POST["tipo"].'",
		codigo="'.$_POST["codigo"].'",
		fecha="'.$_POST["fecha"].'",
		hora="'.$_POST["hora"].'",
		fecha_vigencia="'.$_POST["fecha_vigencia"].'",
		fecha_caducidad="'.$_POST["fecha_caducidad"].'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_codigos_autorizados=mysql_insert_id($id_connection);


	#muestra registro ingresado
	$query='select * from codigos_autorizados where id="'.$id_codigos_autorizados.'"';
	$array_codigos_autorizados=mysql_fetch_array(mysql_query($query));
	include("codigos_autorizados_muestra.inc.php");
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_codigos_autorizados=$_POST["id_codigos_autorizados"];
		
		$query='update codigos_autorizados set
		id="'.$_POST["id"].'",
		id_servicio="'.$_POST["id_servicio"].'",
		tipo="'.$_POST["tipo"].'",
		codigo="'.$_POST["codigo"].'",
		fecha="'.$_POST["fecha"].'",
		hora="'.$_POST["hora"].'",
		fecha_vigencia="'.$_POST["fecha_vigencia"].'",
		fecha_caducidad="'.$_POST["fecha_caducidad"].'"
				where id="'.$id_codigos_autorizados.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from codigos_autorizados where id="'.$id_codigos_autorizados.'"';
	$array_codigos_autorizados=mysql_fetch_array(mysql_query($query));
	include("codigos_autorizados_muestra.inc.php");
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
 	$query='delete from codigos_autorizados where id="'.$id_codigos_autorizados.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}


?>
</center>
</body>
</html>
