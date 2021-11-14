<?php
include_once("tarjetas_base.php");
echo "<br>";
include("../includes/connect.php");
$fecha=date("Y-n-d");
$hora=date("H:i:s");
$uuid=mysql_result(mysql_query("select uuid()"),0,0);



#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	$query='insert into tarjetas set
		id="'.$_POST["id"].'",
		tarjeta="'.$_POST["tarjeta"].'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_tarjetas=mysql_insert_id($id_connection);


	#muestra registro ingresado
	$query='select * from tarjetas where id="'.$id_tarjetas.'"';
	$array_tarjetas=mysql_fetch_array(mysql_query($query));
	include("tarjetas_muestra.inc.php");
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_tarjetas=$_POST["id_tarjetas"];
		
		$query='update tarjetas set
		id="'.$_POST["id"].'",
		tarjeta="'.$_POST["tarjeta"].'"
				where id="'.$id_tarjetas.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from tarjetas where id="'.$id_tarjetas.'"';
	$array_tarjetas=mysql_fetch_array(mysql_query($query));
	include("tarjetas_muestra.inc.php");
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
 	$query='delete from tarjetas where id="'.$id_tarjetas.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}


?>
</center>
</body>
</html>
