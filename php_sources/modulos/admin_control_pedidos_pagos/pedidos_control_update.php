<?php
include("../../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

include_once("../../includes/connect.php");
include_once("pedidos_control_base.php");


$fecha=date("Y-n-d");
$hora=date("H:i:s");



#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	$query='insert into pedidos_control set
		empresa="'.$_POST["empresa"].'",
		responsable="'.$_POST["responsable"].'",
		importe_pedido="'.$_POST["importe_pedido"].'",
		fecha_envio="'.$_POST["fecha_envio"].'",
		rceptor="'.$_POST["rceptor"].'",
		import_recibido_a="'.$_POST["import_recibido_a"].'",
		import_recibido_b="'.$_POST["import_recibido_b"].'",
		fecha_recepcion="'.$_POST["fecha_recepcion"].'",
		n_correo="'.$_POST["n_correo"].'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_pedidos_control=mysql_insert_id($id_connection);


	#muestra registro ingresado
	$query='select * from pedidos_control where id="'.$id_pedidos_control.'"';
	$array_pedidos_control=mysql_fetch_array(mysql_query($query));
	include("pedidos_control_muestra.inc.php");
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_pedidos_control=$_POST["id_pedidos_control"];
		
		$query='update pedidos_control set
		empresa="'.$_POST["empresa"].'",
		responsable="'.$_POST["responsable"].'",
		importe_pedido="'.$_POST["importe_pedido"].'",
		fecha_envio="'.$_POST["fecha_envio"].'",
		rceptor="'.$_POST["rceptor"].'",
		import_recibido_a="'.$_POST["import_recibido_a"].'",
		import_recibido_b="'.$_POST["import_recibido_b"].'",
		fecha_recepcion="'.$_POST["fecha_recepcion"].'",
		n_correo="'.$_POST["n_correo"].'"
				where id="'.$id_pedidos_control.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from pedidos_control where id="'.$id_pedidos_control.'"';
	$array_pedidos_control=mysql_fetch_array(mysql_query($query));
	include("pedidos_control_muestra.inc.php");
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
 	$query='delete from pedidos_control where id="'.$id_pedidos_control.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}


?>
</center>
</body>
</html>
