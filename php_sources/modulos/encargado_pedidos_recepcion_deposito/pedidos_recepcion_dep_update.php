<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
  <title>Tablabla pedidos_recepcion_d By Christian Máculus</title>
</head>



<?php
$fecha=date("Y-n-d");
$hora=date("H:i:s");



#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	$query='insert into pedidos_recepcion_d set
		id="'.$_POST["id"].'",
		proveedor="'.$_POST["proveedor"].'",
		numero_factura="'.$_POST["numero_factura"].'",
		fecha_factura="'.$_POST["fecha_factura"].'",
		razon_social="'.$_POST["razon_social"].'",
		importe="'.$_POST["importe"].'",
		tipo="'.$_POST["tipo"].'",
		observaciones="'.$_POST["observaciones"].'",
		fecha="'.$_POST["fecha"].'",
		hora="'.$_POST["hora"].'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_pedidos_recepcion_d=mysql_insert_id($id_connection);


	#muestra registro ingresado
	$query='select * from pedidos_recepcion_d where id="'.$id_pedidos_recepcion_d.'"';
	$array_pedidos_recepcion_d=mysql_fetch_array(mysql_query($query));
	include(pedidos_recepcion_d"_muestra.inc.php")
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_pedidos_recepcion_d=$_POST["id_pedidos_recepcion_d"];
		
		$query='update pedidos_recepcion_d set
		id="'.$_POST["id"].'",
		proveedor="'.$_POST["proveedor"].'",
		numero_factura="'.$_POST["numero_factura"].'",
		fecha_factura="'.$_POST["fecha_factura"].'",
		razon_social="'.$_POST["razon_social"].'",
		importe="'.$_POST["importe"].'",
		tipo="'.$_POST["tipo"].'",
		observaciones="'.$_POST["observaciones"].'",
		fecha="'.$_POST["fecha"].'",
		hora="'.$_POST["hora"].'"
				where id="'.$id_pedidos_recepcion_d.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from pedidos_recepcion_d where id="'.$id_pedidos_recepcion_d.'"';
	$array_pedidos_recepcion_d=mysql_fetch_array(mysql_query($query));
	include(pedidos_recepcion_d"_muestra.inc.php")
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
 	$query='delete from pedidos_recepcion_d where id="'.$id_pedidos_recepcion_d.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}


?>
</center>
</body>
</html>
