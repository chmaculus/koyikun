<?php

include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
include_once("../../login/login_verifica.inc.php");
include_once("cabecera.inc.php");

#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
?>


<form method="post" action="pedidos_proveedor_envio_update.php" name="form_pedidos_proveedor_envio">



<?php
$fecha=date("Y-n-d");
$hora=date("H:i:s");



#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	$query='insert into pedidos_proveedor_envio set
		numero_pedido="'.$_POST["numero_pedido"].'",
		operado="'.$_POST["operado"].'",
		fecha="'.$fecha.'",
		hora="'.$hora.'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_pedidos_proveedor_envio=mysql_insert_id($id_connection);

	$q='update pedidos_proveedor set fecha_enviado="'.$fecha.'", hora_enviado="'.$hora.'", enviado="'.$_POST["operado"].'" where numero_pedido="'.$_POST["numero_pedido"].'"';
	mysql_query($q);
	if(mysql_error()){echo mysql_error()."<br>".$q."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from pedidos_proveedor_envio where id="'.$id_pedidos_proveedor_envio.'"';
	$array_pedidos_proveedor_envio=mysql_fetch_array(mysql_query($query));
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_pedidos_proveedor_envio=$_POST["id_pedidos_proveedor_envio"];
		
		$query='update pedidos_proveedor_envio set
		numero_pedido="'.$_POST["numero_pedido"].'",
		operado="'.$_POST["operado"].'",
		fecha="'.$_POST["fecha"].'",
		hora="'.$_POST["hora"].'"
				where id="'.$id_pedidos_proveedor_envio.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from pedidos_proveedor_envio where id="'.$id_pedidos_proveedor_envio.'"';
	$array_pedidos_proveedor_envio=mysql_fetch_array(mysql_query($query));
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
 	$query='delete from pedidos_proveedor_envio where id="'.$id_pedidos_proveedor_envio.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}


?>
</center>
</body>
</html>
