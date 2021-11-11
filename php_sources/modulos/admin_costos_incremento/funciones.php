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
		return "0";
	}
}
#---------------------------------------------------------------------------------------------


#--------------------------------------------------------------------------------
function incrementa_costo( $id_articulos, $porcentaje, $fecha, $hora, $tipo_cambio ){
	$q='select * from costos where id_articulos="'.$id_articulos.'"';
	$result=mysql_query($q);
	$array=mysql_fetch_array($result);

	$costo_nuevo = (( $array["precio_costo"] * $porcentaje ) / 100 ) + $array["precio_costo"];

	if($tipo_cambio=="fabrica"){
		$q2='update costos set precio_costo="'.round( $costo_nuevo, 6 ).'", 
									fecha="'.$fecha.'", 
									hora="'.$hora.'" 
										where id_articulos="'.$id_articulos.'" 
		';
	}

	if($tipo_cambio=="gerencia"){
		$q2='update costos set precio_costo="'.round( $costo_nuevo, 6 ).'", 
									fecha_gerencia="'.$fecha.'", 
									hora_gerencia="'.$hora.'" 
										where id_articulos="'.$id_articulos.'" 
		';
	}
	
	mysql_query($q2)or die(mysql_error()." ".$q2);
}
#--------------------------------------------------------------------------------

#-----------------------------------------------------------------
function verifica_tabla_precios($id_articulos){
	$query='select * from precios where id_articulo="'.$id_articulos.'" and id_sucursal="1"';
	$rows=mysql_num_rows( mysql_query($query) );
	if($rows < "1" ){
		$q='insert into precios set id_articulo="'.$id_articulos.'" and id_sucursal="1"';
		mysql_query($q);
		return 1;
	}else{
		return 1;
	}
}
#-----------------------------------------------------------------

#-----------------------------------------------------------------
function verifica_tabla_costos($id_articulos){
	$query='select * from costos where id_articulos="'.$id_articulos.'" and precio_costo>"0"';
	$rows=mysql_num_rows( mysql_query($query) );
	if($rows == "1" ){
		return 1;
	}else{
		$q='delete from costos where id_articulos="'.$id_articulos.'"';
		mysql_query($q);

		$q='insert into costos set id_articulos="'.$id_articulos.'"';
		mysql_query($q);
		return 1;
	}
}
#-----------------------------------------------------------------

#---------------------------------------------------------------------------------------------
function calcula_precio_venta( $id_articulos ){

	$query='select * from costos where id_articulos="'.$id_articulos.'"';
	$result=mysql_query($query);
	$rows=mysql_num_rows($result);
	if($rows=="1"){
		$array_costos=mysql_fetch_array($result);
	}else{
		return "0";
	}

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
function calcula_precio_costo( $id_articulos ){

	$query='select * from costos where id_articulos="'.$id_articulos.'"';
	$result=mysql_query($query);
	$rows=mysql_num_rows($result);
	if($rows=="1"){
		$array_costos=mysql_fetch_array($result);
	}else{
		return "0";
	}

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
	$temp1=( ( $temp1 * ( $array_costos["iva"] ) ) / 100 )+ $temp1;
	return round($temp1,6);
}
#---------------------------------------------------------------------------------------------


#---------------------------------------------------------------------------------------------
function ingreso_seguimiento_costos($id_articulo, $costo_anterior, $costo_nuevo, $tipo_cambio, $id_costos_detalle, $fecha, $hora){
	$q='insert into costos_seguimiento set id_articulo="'.$id_articulo.'", costo_anterior="'.$costo_anterior.'", costo_nuevo="'.$costo_nuevo.'", tipo_cambio="'.$tipo_cambio.'", id_costos_detalle="'.$id_costos_detalle.'", fecha="'.$fecha.'", hora="'.$hora.'"';
	mysql_query($q);
	if(mysql_error()){
		echo mysql_error()."<br>";
		echo $q."<br>";
	}
}
#---------------------------------------------------------------------------------------------





#---------------------------------------------------------------------------------------------
function fecha_conv($separador, $fecha){
	$f=explode($separador, $fecha);

	if($separador=="/"){
		$fecha=$f[2]."-".$f[1]."-".$f[0];
	}

	if($separador=="-"){
		$fecha=$f[2]."/".$f[1]."/".$f[0];
	}
return $fecha;
}
#---------------------------------------------------------------------------------------------



?>
