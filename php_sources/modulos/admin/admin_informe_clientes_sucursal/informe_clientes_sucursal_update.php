<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Tablabla informe_clientes_sucursal By Christian Máculus</title>
</head>



<?php
$fecha=date("Y-n-d");
$hora=date("H:i:s");

include("../includes/connect.php");

#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	$query='insert into informe_clientes_sucursal set
		id_sucursal="'.$_POST["id_sucursal"].'",
		sexo="'.$_POST["sexo"].'",
		edad="'.$_POST["edad"].'",
		compra="'.$_POST["compra"].'",
		motivo_no="'.trim($_POST["motivo_no"]).'",
		otro_motivo="'.trim($_POST["otro_motivo"]).'",
		marca_buscaba="'.trim($_POST["marca_buscaba"]).'",
		fecha="'.$fecha.'",
		hora="'.$hora.'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_informe_clientes_sucursal=mysql_insert_id($id_connection);


	#muestra registro ingresado
	$query='select * from informe_clientes_sucursal where id="'.$id_informe_clientes_sucursal.'"';
	$array_informe_clientes_sucursal=mysql_fetch_array(mysql_query($query));
	include("informe_clientes_sucursal_muestra.inc.php");
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$query='update informe_clientes_sucursal set
		$id_informe_clientes_sucursal=$_POST["id_informe_clientes_sucursal"];
		id_sucursal="'.$_POST["id_sucursal"].'",
		sexo="'.$_POST["sexo"].'",
		edad="'.$_POST["edad"].'",
		compra="'.$_POST["compra"].'",
		motivo_no="'.trim($_POST["motivo_no"]).'",
		otro_motivo="'.trim($_POST["otro_motivo"]).'",
		marca_buscaba="'.trim($_POST["marca_buscaba"]).'",
		fecha="'.$fecha.'",
		hora="'.$hora.'"
				where id="'.$id_informe_clientes_sucursal.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from informe_clientes_sucursal where id="'.$id_informe_clientes_sucursal.'"';
	$array_informe_clientes_sucursal=mysql_fetch_array(mysql_query($query));
	include("informe_clientes_sucursal_muestra.inc.php");
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
 	$query='delete from informe_clientes_sucursal where id="'.$id_informe_clientes_sucursal.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}


?>
</center>
</body>
</html>
