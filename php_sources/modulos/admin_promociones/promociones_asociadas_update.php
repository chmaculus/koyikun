<?php
include_once("promociones_base.php");



include_once("connect.php");
$fecha=date("Y-n-d");
$hora=date("H:i:s");



#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	$query='insert into articulos_asociados set
		id_articulo="'.$_POST["id_articulo"].'",
		id_articulo_asociado="'.$_POST["id_articulo_asociado"].'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_articulos_asociados=mysql_insert_id($id_connection);


	#muestra registro ingresado
	$query='select * from articulos_asociados where id="'.$id_articulos_asociados.'"';
	$array_articulos_asociados=mysql_fetch_array(mysql_query($query));
	include("articulos_asociados_muestra.inc.php");
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_articulos_asociados=$_POST["id_articulos_asociados"];
		
		$query='update articulos_asociados set
		id_articulo="'.$_POST["id_articulo"].'",
		id_articulo_asociado="'.$_POST["id_articulo_asociado"].'"
				where id="'.$id_articulos_asociados.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from articulos_asociados where id="'.$id_articulos_asociados.'"';
	$array_articulos_asociados=mysql_fetch_array(mysql_query($query));
	include("articulos_asociados_muestra.inc.php");
}
#---------------------------------------------------------------------------------



?>





<?php
if(!mysql_error()){
	if($_POST["accion"]=="ingreso"){
		header('Location: promociones_asociadas.php?id_articulos='.$_POST["id_articulo"]);
		exit;
	}
	if($_POST["accion"]=="modificacion"){
		echo '<td><font1>Los datos se actualizaron correctamente</font1></td>';
	}
}
if($_POST["accion"]=="ELIMINAR"){
 	$query='delete from articulos_asociados where id="'.$id_articulos_asociados.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}


?>
</center>
</body>
</html>
