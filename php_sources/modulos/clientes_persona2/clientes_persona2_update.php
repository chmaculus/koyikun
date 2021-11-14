<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
  <title>Tablabla clientes_persona2 By Christian Máculus</title>
</head>



<?php
$fecha=date("Y-n-d");
$hora=date("H:i:s");



#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	$query='insert into clientes_persona2 set
		id="'.$_POST["id"].'",
		uuid="'.$_POST["uuid"].'",
		apellido="'.$_POST["apellido"].'",
		nombres="'.$_POST["nombres"].'",
		dni="'.$_POST["dni"].'",
		estado_civil="'.$_POST["estado_civil"].'",
		telefono="'.$_POST["telefono"].'",
		celular="'.$_POST["celular"].'",
		email="'.$_POST["email"].'",
		web="'.$_POST["web"].'",
		calle="'.$_POST["calle"].'",
		numero="'.$_POST["numero"].'",
		piso="'.$_POST["piso"].'",
		dpto="'.$_POST["dpto"].'",
		localidad="'.$_POST["localidad"].'",
		departamento="'.$_POST["departamento"].'",
		provincia="'.$_POST["provincia"].'",
		pais="'.$_POST["pais"].'",
		profesion="'.$_POST["profesion"].'",
		observaciones="'.$_POST["observaciones"].'",
		usa_tarjeta="'.$_POST["usa_tarjeta"].'",
		vendedor="'.$_POST["vendedor"].'",
		sucursal="'.$_POST["sucursal"].'",
		nombre_comercio="'.$_POST["nombre_comercio"].'",
		tel_comercial="'.$_POST["tel_comercial"].'",
		dom_comercial="'.$_POST["dom_comercial"].'",
		localidad_comercio="'.$_POST["localidad_comercio"].'",
		dpto_comercio="'.$_POST["dpto_comercio"].'",
		calle_comercio="'.$_POST["calle_comercio"].'",
		numero_comercio="'.$_POST["numero_comercio"].'",
		piso_comercio="'.$_POST["piso_comercio"].'",
		provincia_comercio="'.$_POST["provincia_comercio"].'",
		pais_comercio="'.$_POST["pais_comercio"].'",
		carnet="'.$_POST["carnet"].'",
		codigo_barras="'.$_POST["codigo_barras"].'",
		fecha_entrega="'.$_POST["fecha_entrega"].'",
		radio="'.$_POST["radio"].'",
		canal="'.$_POST["canal"].'",
		programas="'.$_POST["programas"].'",
		fecha="'.$_POST["fecha"].'",
		hora="'.$_POST["hora"].'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_clientes_persona2=mysql_insert_id($id_connection);


	#muestra registro ingresado
	$query='select * from clientes_persona2 where id="'.$id_clientes_persona2.'"';
	$array_clientes_persona2=mysql_fetch_array(mysql_query($query));
	include(clientes_persona2"_muestra.inc.php")
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_clientes_persona2=$_POST["id_clientes_persona2"];
		
		$query='update clientes_persona2 set
		id="'.$_POST["id"].'",
		uuid="'.$_POST["uuid"].'",
		apellido="'.$_POST["apellido"].'",
		nombres="'.$_POST["nombres"].'",
		dni="'.$_POST["dni"].'",
		estado_civil="'.$_POST["estado_civil"].'",
		telefono="'.$_POST["telefono"].'",
		celular="'.$_POST["celular"].'",
		email="'.$_POST["email"].'",
		web="'.$_POST["web"].'",
		calle="'.$_POST["calle"].'",
		numero="'.$_POST["numero"].'",
		piso="'.$_POST["piso"].'",
		dpto="'.$_POST["dpto"].'",
		localidad="'.$_POST["localidad"].'",
		departamento="'.$_POST["departamento"].'",
		provincia="'.$_POST["provincia"].'",
		pais="'.$_POST["pais"].'",
		profesion="'.$_POST["profesion"].'",
		observaciones="'.$_POST["observaciones"].'",
		usa_tarjeta="'.$_POST["usa_tarjeta"].'",
		vendedor="'.$_POST["vendedor"].'",
		sucursal="'.$_POST["sucursal"].'",
		nombre_comercio="'.$_POST["nombre_comercio"].'",
		tel_comercial="'.$_POST["tel_comercial"].'",
		dom_comercial="'.$_POST["dom_comercial"].'",
		localidad_comercio="'.$_POST["localidad_comercio"].'",
		dpto_comercio="'.$_POST["dpto_comercio"].'",
		calle_comercio="'.$_POST["calle_comercio"].'",
		numero_comercio="'.$_POST["numero_comercio"].'",
		piso_comercio="'.$_POST["piso_comercio"].'",
		provincia_comercio="'.$_POST["provincia_comercio"].'",
		pais_comercio="'.$_POST["pais_comercio"].'",
		carnet="'.$_POST["carnet"].'",
		codigo_barras="'.$_POST["codigo_barras"].'",
		fecha_entrega="'.$_POST["fecha_entrega"].'",
		radio="'.$_POST["radio"].'",
		canal="'.$_POST["canal"].'",
		programas="'.$_POST["programas"].'",
		fecha="'.$_POST["fecha"].'",
		hora="'.$_POST["hora"].'"
				where id="'.$id_clientes_persona2.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from clientes_persona2 where id="'.$id_clientes_persona2.'"';
	$array_clientes_persona2=mysql_fetch_array(mysql_query($query));
	include(clientes_persona2"_muestra.inc.php")
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
 	$query='delete from clientes_persona2 where id="'.$id_clientes_persona2.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}


?>
</center>
</body>
</html>
