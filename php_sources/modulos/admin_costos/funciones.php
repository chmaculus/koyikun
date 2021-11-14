<?php


#---------------------------------------------------------------------------------------------
function precio_sucursal($id_articulo,$id_sucursal){
	$query='select * from precios where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
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
	$query='select * from costos where id_articulos="'.$id_articulos.'"';
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
	$query='select * from costos where id_articulos="'.$id_articulos.'"';
	$rows=mysql_num_rows(mysql_query($query));

	if($rows==1){
		return 1;
	}

	if($rows<1){
		$query='insert into costos set id_articulos="'.$id_articulos.'"';
		mysql_query($query) or die(mysql_error());
		return 1;
	}

	if($rows>1){
		$query='delete from costos where id_articulos="'.$id_articulos.'"';
		mysql_query($query) or die(mysql_error());
		$query='insert into costos set id_articulos="'.$id_articulos.'"';
		mysql_query($query) or die(mysql_error());
		return 1;
	}
	
}
#-----------------------------------------------------------------



#-----------------------------------------------------------------
function verifica_tabla_precios( $id_articulos ){
	$query='select * from precios where id_articulo="'.$id_articulos.'" and id_sucursal=1';
	$rows=mysql_num_rows(mysql_query($query));

	if($rows==1){
		return 1;
	}

	if($rows<1){
		$query='insert into precios set id_articulo="'.$id_articulos.'", id_sucursal="1" ';
		mysql_query($query) or die(mysql_error());
		return 1;
	}

	if($rows>1){
		$query='delete from costos where id_articulos="'.$id_articulos.'"';
		mysql_query($query) or die(mysql_error());
		$query='insert into costos set id_articulos="'.$id_articulos.'", id_sucursal="1" ';
		mysql_query($query) or die(mysql_error());
		return 1;
	}
	

}
#-----------------------------------------------------------------

?>
