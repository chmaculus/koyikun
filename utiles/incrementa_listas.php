<?php
include("./includes/connect.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");


#----------------------------------------------------------
#incremento costos 
$porcentaje_incremento="7";

$q0='update costos set precio_costo=(((precio_costo * '.$porcentaje_incremento.') / 100) + precio_costo)';
mysql_query($q0);
if(mysql_error()){
	echo mysql_error()."\n";
	echo $q0."\n";
}
#----------------------------------------------------------
/*
update promociones set precio_promocion=(((precio_promocion * 8) / 100) + precio_promocion) where fecha_finaliza>="2018-06-15";
select precio_promocion,(((precio_promocion(((precio_promocion * 8) / 100) + precio_promocion) from promociones where fecha_finaliza>="2018-06-15";
*/



$q1='select id_articulos from costos order by id_articulos';
$result=mysql_query($q1);
while($row=mysql_fetch_array($result)){

	$array_costo=precio_costo( $row["id_articulos"] );
	$precio_venta=calcula_precio_venta( $array_costo );
	$rows=verifica_tabla_precios( $row["id_articulos"] );

	//echo "fecha: ".$array_costo["fecha"]." fecha_gerencia: ".$array_costo["fecha_gerencia"].chr(13);
	if( $array_costo["fecha"] < $array_costo["fecha_gerencia"] ){
		$fecha=$array_costo["fecha_gerencia"];
		$hora=$array_costo["hora_gerencia"];
	}else{
		$fecha=$array_costo["fecha"];
		$hora=$array_costo["hora"];
	}


	if( $array_costo["precio_costo"] > 0 ){
		if($rows==0){
			$query='insert into precios set precio_base="'.$precio_venta.'", porcentaje_contado="0", porcentaje_tarjeta="20", id_articulo="'.$row["id_articulos"].'", id_sucursal="1", fecha="'.$fecha.'", hora="'.$hora.'" ';
			$counti++;
		}else{
			$query='update precios set precio_base="'.$precio_venta.'", porcentaje_contado="0", porcentaje_tarjeta="20", fecha="'.$fecha.'", hora="'.$hora.'" where id_articulo="'.$row["id_articulos"].'"';
			$countu++;
		}
		//echo $query.";".chr(13);
		mysql_query($query)or die(mysql_error()." ".$query);
	}
}

echo "insert: ".$counti." upd: ".$countu;
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

#-----------------------------------------------------------------
function verifica_tabla_precios($id_articulos){
	$query='select id_articulo from precios where id_articulo="'.$id_articulos.'" and id_sucursal="1"';
	$rows=mysql_num_rows( mysql_query($query) );
	return $rows;
}
#-----------------------------------------------------------------

#---------------------------------------------------------------------------------------------
function precio_sucursal( $id_articulo, $id_sucursal ){
	$query='select * from precios where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);
	if($rows==1){
		$array_precios=mysql_fetch_array($res);
		$array_precios["query"]=$query;
		$array_precios["rows"]=$rows;
		return $array_precios;		
	}
	if($rows<1){
		$array_precios["precio_base"]="0";
		$array_precios["porcentaje_contado"]="0";
		$array_precios["porcentaje_tarjeta"]="0";
		$array_precios["rows"]=$rows;
		$array_precios["query"]=$query;
		return $array_precios;		
	}
return $array_precios;
}
#---------------------------------------------------------------------------------------------



?>