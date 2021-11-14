<?php


#---------------------------------------------------------------------------------------------
function precio_sucursal($id_articulo,$id_sucursal){
	$query='select * from koyikun.precios where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);
	if($rows==1){
		$array_precios=mysql_fetch_array($res);
		return $array_precios;		
	}
	if($rows<1){
		$array_precios["precio_base"]="0";
		$array_precios["porcentaje_contado"]="0";
		$array_precios["porcentaje_tarjeta"]="0";
		return $array_precios;		
	}
return $array_precios;
}
#---------------------------------------------------------------------------------------------



#---------------------------------------------------------------------------------------------
function precio_costo($id_articulos){
	$query='select * from koyikun.costos where id_articulos="'.$id_articulos.'"';
	$result=mysql_query($query);
	$rows=mysql_num_rows($result);
	if($rows=="1"){
		$array=mysql_fetch_array($result);
		return $array;
	}else{
		return 0;
	}
}
#---------------------------------------------------------------------------------------------

#---------------------------------------------------------------------------------------------
function calcula_precio_venta( $array_costos ){
	$temp1=( ( $array_costos["precio_costo"] * ( $array_costos["descuento1"] * -1 ) ) / 100 )+ $array_costos["precio_costo"];
	$temp1=( ( $temp1 * ( $array_costos["descuento2"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento3"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento4"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento5"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento6"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento7"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento8"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento9"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento10"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * $array_costos["iva"] ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * $array_costos["margen"] ) / 100 )+ $temp1;
	return round($temp1,6);
}
#---------------------------------------------------------------------------------------------

#---------------------------------------------------------------------------------------------
function calcula_precio_web( $array_costos ){
	$temp1=( ( $array_costos["precio_costo"] * ( $array_costos["descuento1"] * -1 ) ) / 100 )+ $array_costos["precio_costo"];
	$temp1=( ( $temp1 * ( $array_costos["descuento2"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento3"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento4"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento5"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento6"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento7"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento8"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento9"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento10"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * $array_costos["iva"] ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * $array_costos["margen_web"] ) / 100 )+ $temp1;
	return round($temp1,6);
}
#---------------------------------------------------------------------------------------------

#-----------------------------------------------------------------
function verifica_costo( $id_articulos ){
	$query='select * from koyikun.costos where id_articulos="'.$id_articulos.'"';
	$rows=mysql_num_rows(mysql_query($query));

	if($rows==1){
		return 1;
	}

	if($rows<1){
		$query='insert into koyikun.costos set id_articulos="'.$id_articulos.'"';
		mysql_query($query) or die(mysql_error());
		return 1;
	}

	if($rows>1){
		$query='delete from koyikun.costos where id_articulos="'.$id_articulos.'"';
		mysql_query($query) or die(mysql_error());
		$query='insert into koyikun.costos set id_articulos="'.$id_articulos.'"';
		mysql_query($query) or die(mysql_error());
		return 1;
	}
	
}
#-----------------------------------------------------------------



#-----------------------------------------------------------------
function verifica_tabla_precios( $id_articulos ){
	$query='select * from koyikun.precios where id_articulo="'.$id_articulos.'" and id_sucursal=1';
	$rows=mysql_num_rows(mysql_query($query));

	if($rows==1){
		return 1;
	}

	if($rows<1){
		$query='insert into koyikun.precios set id_articulo="'.$id_articulos.'", id_sucursal="1" ';
		mysql_query($query) or die(mysql_error());
		return 1;
	}

	if($rows>1){
		$query='delete from koyikun.costos where id_articulos="'.$id_articulos.'"';
		mysql_query($query) or die(mysql_error());
		$query='insert into costos set id_articulos="'.$id_articulos.'", id_sucursal="1" ';
		mysql_query($query) or die(mysql_error());
		return 1;
	}
	

}
#-----------------------------------------------------------------





#-----------------------------------------------------------------
function calcula_total_venta($id_session){
	$q='select sum(cantidad * precio) from ventas_temp2 where id_session="'.$id_session.'"';
	$array=mysql_fetch_array(mysql_query($q));
	return $array[0];
}
#-----------------------------------------------------------------



#-------------------------------------------------------------------------------------------------
function insert_or_update_ventas_temp_valores($array){
	$q1='select * from ventas_temp_valores where id_session="'.$array["id_session"].'" and id="'.$array["id"].'"';
	$r1=mysql_num_rows(mysql_query($q1));
	if($r1==1){
		$q='update ventas_temp_valores set valor="'.$array["valor"].'" where id_session="'.$array["id_session"].'" and id="'.$array["id"].'"';
	}
	if($r1>1){
		$q='delete from ventas_temp_valores where id_session="'.$array["id_session"].'" and id="'.$array["id"].'"';
		mysql_query($q);
		$q='insert ventas_temp_valores set 	valor="'.$array["valor"].'", 
																				id_session="'.$array["id_session"].'", 
																				id="'.$array["id"].'",
																				descripcion="'.$array["descripcion"].'"
																				';
	}
	if($r1<1){
		$q='insert ventas_temp_valores set 	valor="'.$array["valor"].'", 
																				id_session="'.$array["id_session"].'", 
																				id="'.$array["id"].'",
																				descripcion="'.$array["descripcion"].'"
																				';
	}
mysql_query($q);
if(mysql_error()){echo mysql_error();}
	
}//end function
#-------------------------------------------------------------------------------------------------

#-------------------------------------------------------------------------------------------------
function get_ventas_temp_valores2($id_session,$id){
	$q='select valor from ventas_temp_valores where id_session="'.$id_session.'" and id="'.$id.'"';
	$result=mysql_query($q);
	$array=mysql_fetch_array($result);
	if(mysql_error()){echo mysql_error();}
	return $array[0];
}//end function
#-------------------------------------------------------------------------------------------------

#-------------------------------------------------------------------------------------------------
function get_ventas_temp_valores($id_session,$id){
	$q1='select valor from ventas_temp_valores where id_session="'.$array["id_session"].'" and id="'.$array["id"].'"';
	$r1=mysql_query($q1);
	$array=mysql_fetch_array($r1);
	return $array["valor"];
}//end function
#-------------------------------------------------------------------------------------------------




?>
