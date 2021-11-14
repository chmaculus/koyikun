<?php
include("vendedores_base.php");
include_once("../../includes/connect.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Tablabla vendedores By Christian Máculus</title>
</head>

<center>

<?php
$fecha=date("Y-n-d");
$hora=date("H:i:s");



#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	$query='insert into vendedores set
		id_legajo="'.$_POST["id_legajo"].'",
		numero="'.$_POST["numero"].'",
		apellido="'.$_POST["apellido"].'",
		nombres="'.$_POST["nombres"].'",
		localidad="'.$_POST["localidad"].'",
		fecha="'.$fecha.'",
		hora="'.$hora.'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_vendedores=mysql_insert_id($id_connection);


	#muestra registro ingresado
	$query='select * from vendedores where id="'.$id_vendedores.'"';
	$array_vendedores=mysql_fetch_array(mysql_query($query));
	include("vendedores_muestra.inc.php");
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_vendedores=$_POST["id_vendedores"];
		
		$query='update vendedores set
		id_legajo="'.$_POST["id_legajo"].'",
		numero="'.$_POST["numero"].'",
		apellido="'.$_POST["apellido"].'",
		nombres="'.$_POST["nombres"].'",
		localidad="'.$_POST["localidad"].'",
		fecha="'.$fecha.'",
		hora="'.$hora.'"
				where id="'.$id_vendedores.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from vendedores where id="'.$id_vendedores.'"';
	$array_vendedores=mysql_fetch_array(mysql_query($query));
	include("vendedores_muestra.inc.php");
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
 	$query='delete from vendedores where id="'.$id_vendedores.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}


?>
</center>
</body>
</html>
