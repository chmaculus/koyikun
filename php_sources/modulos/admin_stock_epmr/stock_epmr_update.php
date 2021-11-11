<?php

include("cabecera.inc.php");
include("../includes/cabecera.inc.php");
include("../includes/connect.php");



$fecha=date("Y-n-d");
$hora=date("H:i:s");



#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	$query='insert into stock_epmr set
		id_articulo="'.$_POST["id_articulo"].'",
		estanteria="'.$_POST["estanteria"].'",
		piso="'.$_POST["piso"].'",
		modulo="'.$_POST["modulo"].'",
		reserva="'.$_POST["reserva"].'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_stock_epmr=mysql_insert_id($id_connection);


	#muestra registro ingresado
	$query='select * from stock_epmr where id="'.$id_stock_epmr.'"';
	$array_stock_epmr=mysql_fetch_array(mysql_query($query));
	include("stock_epmr_muestra.inc.php");
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_stock_epmr=$_POST["id_stock_epmr"];
		
		$query='update stock_epmr set
		id_articulo="'.$_POST["id_articulo"].'",
		estanteria="'.$_POST["estanteria"].'",
		piso="'.$_POST["piso"].'",
		modulo="'.$_POST["modulo"].'",
		reserva="'.$_POST["reserva"].'"
				where id_articulo="'.$_POST["id_articulo"].'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from stock_epmr where id="'.$id_stock_epmr.'"';
	$array_stock_epmr=mysql_fetch_array(mysql_query($query));
	include("stock_epmr_muestra.inc.php");
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
 	$query='delete from stock_epmr where id="'.$id_stock_epmr.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}


?>
</center>
</body>
</html>
