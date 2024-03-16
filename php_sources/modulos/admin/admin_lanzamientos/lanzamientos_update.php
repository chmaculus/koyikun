<?php
include_once("lanzamientos_base.php");
include_once("../includes/funciones.php");
include_once("../includes/connect.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");


$fecha_inicio=fecha_conv("/",$_POST["fecha_inicio"]);
$fecha_finaliza=fecha_conv("/",$_POST["fecha_finaliza"]);


#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	$query='insert into articulos_lanzamientos set
		id="'.$_POST["id"].'",
		descripcion="'.$_POST["descripcion"].'",
		fecha_inicio="'.$fecha_inicio.'",
		fecha_finaliza="'.$fecha_finaliza.'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_articulos_lanzamientos=mysql_insert_id($id_connection);


	#muestra registro ingresado
	$query='select * from articulos_lanzamientos where id="'.$id_articulos_lanzamientos.'"';
	$array_articulos_lanzamientos=mysql_fetch_array(mysql_query($query));
	include("lanzamientos_muestra.inc.php");
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_articulos_lanzamientos=$_POST["id_articulos_lanzamientos"];
		
		
		$query='update articulos_lanzamientos set
		id="'.$_POST["id"].'",
		descripcion="'.$_POST["descripcion"].'",
		fecha_inicio="'.$fecha_inicio.'",
		fecha_finaliza="'.$fecha_finaliza.'" 
				where id="'.$id_articulos_lanzamientos.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from articulos_lanzamientos where id="'.$id_articulos_lanzamientos.'"';
	$array_articulos_lanzamientos=mysql_fetch_array(mysql_query($query));
	include("lanzamientos_muestra.inc.php");
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
 	$query='delete from articulos_lanzamientos where id="'.$id_articulos_lanzamientos.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}


?>
</center>
</body>
</html>
