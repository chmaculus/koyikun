
<?php

include_once("servicio_tecnico_base.php");
$fecha=date("Y-m-d");
$hora=date("H:i:s");

if($_POST["id_servicio_tecnico"]){
	$id_servicio_tecnico=$_POST["id_servicio_tecnico"];
}

/*
estados
pendiente de reparar
pendiente de aprobacion presupuesto
acepta presupuesto s/n
reparado s/n
retirado s/n
*/

#---------------------------------------------------------------------------------
if($_POST["accion"]=="APROBAR PRESUPUESTO"){
		$id_servicio_tecnico=$_POST["id_servicio_tecnico"];
		
		$query='update servicio_tecnico set
		estado="aprobado"
				where id="'.$id_servicio_tecnico.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#---------------------------------------------------------------------------------
	$q='insert into servicio_tecnico_seguimiento set id_servicio="'.$id_servicio_tecnico.'", estado_servicio="Presup. aprob.", estado_reparacion="Sin reparar", fecha="'.$fecha.'", hora="'.$hora.'"';
	mysql_query($q);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	#---------------------------------------------------------------------------------
	
	#muestra registro ingresado
	$query='select * from servicio_tecnico where id="'.$id_servicio_tecnico.'"';
	$array_servicio_tecnico=mysql_fetch_array(mysql_query($query));
	echo "<br>Presupuesto Aprobado<br>";
	include("servicio_tecnico_muestra2.inc.php");
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="RECHAZAR PRESUPUESTO"){
		$id_servicio_tecnico=$_POST["id_servicio_tecnico"];
		
		$query='update servicio_tecnico set
		estado="rechazado"
				where id="'.$id_servicio_tecnico.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#---------------------------------------------------------------------------------
	$q='insert into servicio_tecnico_seguimiento set id_servicio="'.$id_servicio_tecnico.'", estado_servicio="Presup. rechaz..", estado_reparacion="Sin reparar", fecha="'.$fecha.'", hora="'.$hora.'"';
	mysql_query($q);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	#---------------------------------------------------------------------------------
	
	#muestra registro ingresado
	$query='select * from servicio_tecnico where id="'.$id_servicio_tecnico.'"';
	$array_servicio_tecnico=mysql_fetch_array(mysql_query($query));
	echo "<br>Presupuesto Rechazado<br>";
	include("servicio_tecnico_muestra2.inc.php");
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="ENTREGAR"){
		$id_servicio_tecnico=$_POST["id_servicio_tecnico"];
		
		$query='update servicio_tecnico set
		estado="entregado"
				where id="'.$id_servicio_tecnico.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#---------------------------------------------------------------------------------
	$q='insert into servicio_tecnico_seguimiento set id_servicio="'.$id_servicio_tecnico.'", estado_servicio="entregado", estado_reparacion="", fecha="'.$fecha.'", hora="'.$hora.'"';
	mysql_query($q);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	#---------------------------------------------------------------------------------
	
	#muestra registro ingresado
	$query='select * from servicio_tecnico where id="'.$id_servicio_tecnico.'"';
	$array_servicio_tecnico=mysql_fetch_array(mysql_query($query));
	include("servicio_tecnico_muestra2.inc.php");
}
#---------------------------------------------------------------------------------





if(!mysql_error()){
	if($_POST["accion"]=="ingreso"){
		echo '<td><font1>Los datos se ingresaron correctamente</font1></td>';
	}
	if($_POST["accion"]=="modificacion"){
		echo '<td><font1>Los datos se actualizaron correctamente</font1></td>';
	}
	if($_POST["accion"]=="modificacion2"){
		echo '<td><font1>Los datos se actualizaron correctamente</font1></td>';
	}
	if($_POST["accion"]=="modificacion3"){
		echo '<td><font1>Los datos se actualizaron correctamente</font1></td>';
	}
}
if($_POST["accion"]=="ELIMINAR"){
 	$query='delete from servicio_tecnico where id="'.$id_servicio_tecnico.'"';
 	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
 	exit;
}


?>
</center>
</body>
</html>
