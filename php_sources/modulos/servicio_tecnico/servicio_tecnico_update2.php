
<?php

include_once("servicio_tecnico_base2.php");
$fecha=date("Y-m-d");
$hora=date("H:i:s");





#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_servicio_tecnico=$_POST["id_servicio_tecnico"];
		
		$query='update servicio_tecnico set
		apellido="'.$_POST["apellido"].'",
		nombres="'.$_POST["nombres"].'",
		direccion="'.$_POST["direccion"].'",
		celular="'.$_POST["celular"].'",
		marca="'.$_POST["marca"].'",
		codigo_servicio="'.$_POST["codigo_servicio"].'",
		modelo="'.$_POST["modelo"].'",
		n_de_serie="'.$_POST["n_de_serie"].'",
		falla_declarada="'.$_POST["falla_declarada"].'",
		falla_encontrada="'.$_POST["falla_encontrada"].'",
		servicio_realizado="'.$_POST["servicio_realizado"].'",
		estado="'.$_POST["estado"].'",
		mano_de_obra="'.$_POST["mano_de_obra"].'",
		repuestos="'.$_POST["repuestos"].'",
		acepta="'.$_POST["acepta"].'",
		total="'.$_POST["total"].'",
		retirado="'.$_POST["retirado"].'",
		fecha_ingreso="'.$_POST["fecha_ingreso"].'",
		hora_ingreso="'.$_POST["hora_ingreso"].'",
		fecha_retiro="'.$_POST["fecha_retiro"].'",
		hora_retiro="'.$_POST["hora_retiro"].'"
				where id="'.$_POST["id_servicio_tecnico"].'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#muestra registro ingresado
	$query='select * from servicio_tecnico where id="'.$id_servicio_tecnico.'"';
	$array_servicio_tecnico=mysql_fetch_array(mysql_query($query));
	include("servicio_tecnico_muestra.inc.php");
}
#---------------------------------------------------------------------------------



#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion2"){
		$id_servicio_tecnico=$_POST["id_servicio_tecnico"];
		
		$query='update servicio_tecnico set
		falla_encontrada="'.$_POST["falla_encontrada"].'",
		presupuesto="'.$_POST["presupuesto"].'",
		estado="presupuestado",
		repuestos="'.$_POST["repuestos"].'",
		total="'.$_POST["total"].'",
		fecha_presupuesto="'.$fecha.'",
		hora_presupuesto="'.$hora.'"
				where id="'.$id_servicio_tecnico.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}


	#---------------------------------------------------------------------------------
	$q='insert into servicio_tecnico_seguimiento set id_servicio="'.$id_servicio_tecnico.'", estado_servicio="Presupuestado", estado_reparacion="Sin reparar", fecha="'.$fecha.'", hora="'.$hora.'"';
	mysql_query($q);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	#---------------------------------------------------------------------------------

	
	#muestra registro ingresado
	$query='select * from servicio_tecnico where id="'.$id_servicio_tecnico.'"';
	$array_servicio_tecnico=mysql_fetch_array(mysql_query($query));
	include("servicio_tecnico_muestra2.inc.php");
}
#---------------------------------------------------------------------------------


/*
estados
pendiente de reparar
pendiente de aprobacion presupuesto
acepta presupuesto s/n
reparado s/n
retirado s/n
*/

#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion3"){
		$id_servicio_tecnico=$_POST["id_servicio_tecnico"];
		
		$query='update servicio_tecnico set
		falla_encontrada="'.$_POST["falla_encontrada"].'",
		presupuesto="'.$_POST["presupuesto"].'",
		estado="finalizado",
		repuestos="'.$_POST["repuestos"].'",
		total="'.$_POST["total"].'",
		fecha_presupuesto="'.$fecha.'",
		hora_presupuesto="'.$hora.'"
				where id="'.$id_servicio_tecnico.'"
			';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

	#---------------------------------------------------------------------------------
	$q='insert into servicio_tecnico_seguimiento set id_servicio="'.$id_servicio_tecnico.'", estado_servicio="Finalizado", estado_reparacion="'.$_POST["estado_reparacion"].'", fecha="'.$fecha.'", hora="'.$hora.'"';
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
