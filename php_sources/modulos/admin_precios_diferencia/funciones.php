<?php
#-----------------------------------------------------------------
function precio_sucursal($id_articulo,$id_sucursal){
	$query='select * from precios where id_articulo="'.$id_articulo.'" and id_sucursal="1"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);

	if($rows==1){
		$array_precios=mysql_fetch_array($res);
		return $array_precios;		
	}else{
		$array_precios["precio_base"]=0;
	}
return $array_precios;
}
#-----------------------------------------------------------------

#---------------------------------------------------------------------------------------------
function calcula_precio_venta($id_articulos){
	$query='select * from costos where id_articulos="'.$id_articulos.'"';
	$result=mysql_query($query);
	$rows=mysql_num_rows($result);
	if($rows=="1"){
		$array=mysql_fetch_array($result);
	}else{
		return "0";
	}

	$temp1=( ( $array["precio_costo"] * ( $array["descuento1"] * -1 ) ) / 100 )+ $array["precio_costo"];
	$temp1=( ( $temp1 * ( $array["descuento2"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array["descuento3"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array["descuento4"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array["descuento5"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array["descuento6"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array["descuento7"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array["descuento8"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array["descuento9"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array["descuento10"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * $array["iva"] ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * $array["margen"] ) / 100 )+ $temp1;
	return round($temp1,6);
}
#---------------------------------------------------------------------------------------------


?>
