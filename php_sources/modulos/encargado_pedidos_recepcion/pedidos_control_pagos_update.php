<?php

include("../../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
$fecha=date("Y-n-d");
$hora=date("H:i:s");

include_once("cabecera.inc.php");

#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	$query='insert into pedidos_control_pagos set
		id_pedidos_control="'.$_POST["id_pedidos_control"].'",
		tipo_pago="'.$_POST["tipo_pago"].'",
		tipo_cuenta="'.$_POST["tipo_cuenta"].'",
		empresa="'.$_POST["empresa"].'",
		n_cheque_cuenta="'.$_POST["n_cheque_cuenta"].'",
		banco="'.$_POST["banco"].'",
		importe="'.$_POST["importe"].'",
		fecha_emision="'.$_POST["fecha_emision"].'",
		fecha_vencimiento="'.$_POST["fecha_vencimiento"].'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_pedidos_control_pagos=mysql_insert_id($id_connection);


	#muestra registro ingresado
	$query='select * from pedidos_control_pagos where id="'.$id_pedidos_control_pagos.'"';
	$array_pedidos_control_pagos=mysql_fetch_array(mysql_query($query));
	include("pedidos_control_pagos_muestra.inc.php");
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_pedidos_control_pagos=$_POST["id_pedidos_control_pagos"];
		
		$query='update pedidos_control_pagos set
		id_pedidos_control="'.$_POST["id_pedidos_control"].'",
		tipo_pago="'.$_POST["tipo_pago"].'",
		tipo_cuenta="'.$_POST["tipo_cuenta"].'",
		empresa="'.$_POST["empresa"].'",
		n_cheque_cuenta="'.$_POST["n_cheque_cuenta"].'",
		banco="'.$_POST["banco"].'",
		importe="'.$_POST["importe"].'",
		fecha_emision="'.$_POST["fecha_emision"].'",
		fecha_vencimiento="'.$_POST["fecha_vencimiento"].'"
				where id="'.$id_pedidos_control_pagos.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from pedidos_control_pagos where id="'.$id_pedidos_control_pagos.'"';
	$array_pedidos_control_pagos=mysql_fetch_array(mysql_query($query));
	include("pedidos_control_pagos_muestra.inc.php");
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
 	$query='delete from pedidos_control_pagos where id="'.$id_pedidos_control_pagos.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}


?>
</center>
</body>
</html>
