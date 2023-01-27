
<?php

include_once("servicio_tecnico_base.php");
$fecha=date("Y-m-d");
$hora=date("H:i:s");



#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){
	if($_POST["total"]<1){
		$total=0;
	}
	
	if($_POST["mano_de_obra"]<1){
		$mano_de_obra=0;
	}
	if($_POST["fecha_retiro"]==""){
		$fecha_retiro="0000-00-00";
	}
	if($_POST["hora_retiro"]==""){
		$_POST["hora_retiro"]="00:00:00";
	}

	$query='insert into servicio_tecnico set
		apellido="'.$_POST["apellido"].'",
		nombres="'.$_POST["nombres"].'",
		direccion="'.$_POST["direccion"].'",
		celular="'.$_POST["celular"].'",
		marca="'.$_POST["marca"].'",
		codigo_servicio="'.$_POST["codigo_servicio"].'",
		sucursal="'.$_COOKIE["id_sucursal"].'",
		modelo="'.$_POST["modelo"].'",
		n_de_serie="'.$_POST["n_de_serie"].'",
		falla_declarada="'.$_POST["falla_declarada"].'",
		falla_encontrada="'.$_POST["falla_encontrada"].'",
		servicio_realizado="'.$_POST["servicio_realizado"].'",
		estado="pendiente",
		mano_de_obra='.$mano_de_obra.',
		repuestos="'.$_POST["repuestos"].'",
		acepta="'.$_POST["acepta"].'",
		total='.$total.',
		retirado="'.$_POST["retirado"].'",
		fecha_ingreso="'.$fecha.'",
		hora_ingreso="'.$hora.'",
		fecha_presupuesto="'.$fecha.'",
		hora_presupuesto="'.$hora.'",
		fecha_reparacion="'.$fecha.'",
		hora_reparacion="'.$hora.'",
		fecha_retiro="'.$fecha_retiro.'",
		hora_retiro="'.$_POST["hora_retiro"].'"';
	mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	$id_servicio_tecnico=mysql_insert_id($id_connection);

	$fff=date("Ymd");
	$codigo=$fff.$id_servicio_tecnico;
	
	$q='update servicio_tecnico set codigo_servicio="'.$codigo.'" where id="'.$id_servicio_tecnico.'"';
	mysql_query($q);	
	
	#---------------------------------------------------------------------------------
	$q='insert into servicio_tecnico_seguimiento set id_servicio="'.$id_servicio_tecnico.'", estado_servicio="Ingreso", estado_reparacion="Sin reparar", fecha="'.$fecha.'", hora="'.$hora.'"';
	mysql_query($q);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
	#---------------------------------------------------------------------------------
	
	#muestra registro ingresado
	$query='select * from servicio_tecnico where id="'.$id_servicio_tecnico.'"';
	$array_servicio_tecnico=mysql_fetch_array(mysql_query($query));
	include("servicio_tecnico_muestra.inc.php");
}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){
		$id_servicio_tecnico=$_POST["id_servicio_tecnico"];
		if($_POST["total"]<1){
			$total=0;
		}
		
		if($_POST["mano_de_obra"]<1){
			$mano_de_obra=0;
		}
		if(!$_POST["fecha_retiro"]==""){
			$_POST["fecha_retiro"]="1978-09-22";
		}
		echo "ret: ".$_POST["fecha_retiro"]."<br>";
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
		mano_de_obra='.$mano_de_obra.',
		repuestos="'.$_POST["repuestos"].'",
		acepta="'.$_POST["acepta"].'",
		total='.$total.',
		retirado="'.$_POST["retirado"].'",
		fecha_ingreso="'.$_POST["fecha_ingreso"].'",
		hora_ingreso="'.$_POST["hora_ingreso"].'",
		fecha_retiro="0000-00-00",
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



if(!mysql_error()){
	if($_POST["accion"]=="ingreso"){
		echo '<td><font1>Los datos se ingresaron correctamente</font1></td>';
	}
	if($_POST["accion"]=="modificacion"){
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
