<?php
include_once("viajante_clientes_base.php");



include_once("./includes/connect.php");
$fecha=date("Y-n-d");
$hora=date("H:i:s");



#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	$query='insert into viajante_clientes set
		id_viajante="'.$_POST["id_viajante"].'",
		apellido="'.$_POST["apellido"].'",
		nombres="'.$_POST["nombres"].'",
		localidad="'.$_POST["localidad"].'",
		codigo_postal="'.$_POST["codigo_postal"].'",
		celular="'.$_POST["celular"].'",
		fecha="'.$_POST["fecha"].'",
		hora="'.$_POST["hora"].'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_viajante_clientes=mysql_insert_id($id_connection);


	#muestra registro ingresado
	$query='select * from viajante_clientes where id="'.$id_viajante_clientes.'"';
	$array_viajante_clientes=mysql_fetch_array(mysql_query($query));
	include("viajante_clientes_muestra.inc.php");
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_viajante_clientes=$_POST["id_viajante_clientes"];
		
		$query='update viajante_clientes set
		id_viajante="'.$_POST["id_viajante"].'",
		apellido="'.$_POST["apellido"].'",
		nombres="'.$_POST["nombres"].'",
		localidad="'.$_POST["localidad"].'",
		codigo_postal="'.$_POST["codigo_postal"].'",
		celular="'.$_POST["celular"].'",
		fecha="'.$_POST["fecha"].'",
		hora="'.$_POST["hora"].'"
				where id="'.$id_viajante_clientes.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from viajante_clientes where id="'.$id_viajante_clientes.'"';
	$array_viajante_clientes=mysql_fetch_array(mysql_query($query));
	include("viajante_clientes_muestra.inc.php");
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
 	$query='delete from viajante_clientes where id="'.$id_viajante_clientes.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}


?>
</center>
</body>
</html>
