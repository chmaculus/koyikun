
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
  <title>Tablabla caja_saldos By Christian Máculus</title>
</head>



<?php
$fecha=date("Y-n-d");
$hora=date("H:i:s");

include("index.php");
include_once("../includes/connect.php");


#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){
	
	$query='insert into caja_saldos set
		id="'.$_POST["id"].'",
		codigo="'.$_POST["codigo"].'",
		entrega_recibe="'.$_POST["entrega_recibe"].'",
		detalle="'.$_POST["detalle"].'",
		debe="'.$_POST["debe"].'",
		haber="'.$_POST["haber"].'",
		saldo="'.$saldo.'",
		fecha="'.$fecha.'",
		hora="'.$hora.'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_caja_saldos=mysql_insert_id($id_connection);


	#muestra registro ingresado
	$query='select * from caja_saldos where id="'.$id_caja_saldos.'"';
	$array_caja_saldos=mysql_fetch_array(mysql_query($query));
	include("caja_saldos_muestra.inc.php");
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_caja_saldos=$_POST["id_caja_saldos"];
		
		$query='update caja_saldos set
		codigo="'.$_POST["codigo"].'",
		entrega_recibe="'.$_POST["entrega_recibe"].'",
		detalle="'.$_POST["detalle"].'",
		debe="'.$_POST["debe"].'",
		haber="'.$_POST["haber"].'",
		saldo="'.$saldo.'",
		fecha="'.$fecha.'",
		hora="'.$hora.'"
				where id="'.$id_caja_saldos.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from caja_saldos where id="'.$id_caja_saldos.'"';
	$array_caja_saldos=mysql_fetch_array(mysql_query($query));
	include("caja_saldos_muestra.inc.php");
}
#---------------------------------------------------------------------------------



if(!mysql_error()){
	if($_POST["accion"]=="ingreso"){
		echo '<td><font1>Los datos se ingresaron correctamente</font1></td>';
	}
	if($_POST["accion"]=="modificacion"){
		echo '<td><font1>Los datos se actualizaron correctamente</font1></td>';
	}
}
if($_POST["accion"]=="ELIMINAR"){
 	$query='delete from caja_saldos where id="'.$id_caja_saldos.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}


#-----------------------------------------------------------------------
#actualiza saldo
$saldo=calcula_saldo($_POST["codigo"]);
$query='update caja_saldos set
		saldo="'.$saldo.'"
				where codigo="'.$_POST["codigo"].'"
		';
mysql_query($query);

#-----------------------------------------------------------------------




#-----------------------------------------------------------------------
function calcula_saldo($codigo){
	$q='select sum(debe - haber) from caja_saldos where codigo="'.$codigo.'"';
	$array=mysql_fetch_array(mysql_query($q));
	return $array[0];
}
#-----------------------------------------------------------------------



?>
</center>
</body>
</html>
