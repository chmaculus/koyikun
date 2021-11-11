<?php

$fecha=date("Y-n-d");
$hora=date("H:i:s");

include("../../includes/connect.php");

mysql_query('truncate table articulos_export');

$q0='insert into articulos_export set id=0, marca="fecha", descripcion="'.$fecha.'"';
mysql_query($q0);
$q0='insert into articulos_export set id=0, marca="hora", descripcion="'.$hora.'"';
mysql_query($q0);

$q1='select * from articulos order by id';
$result=mysql_query($q1);
while($row=mysql_fetch_array($result)){
	$array_costo=precio_costo( $row["id"] );
	$precio_venta=calcula_precio_venta( $array_costo );

	if( $array_costo["fecha"] < $array_costo["fecha_gerencia"] ){
		$fecha=$array_costo["fecha_gerencia"];
		$hora=$array_costo["hora_gerencia"];
	}else{
		$fecha=$array_costo["fecha"];
		$hora=$array_costo["hora"];
	}

	if ( $array_costo["precio_costo"] > 0 ){
		$precio=$precio_venta;
	}else{
		 $array_precios=precio_sucursal( $row["id"], 1 );
		 $precio=$array_precios["precio_base"];
		 $fecha=$array_precios["fecha"];
		 $hora=$array_precios["hora"];
	}
/*
	echo $row["id"];
	echo $row["codigo_interno"];
	echo $row["marca"];
	echo $row["descripcion"];
	echo $row["contenido"];
	echo $row["presentacion"];
	echo $row["clasificacion"];
	echo $row["subclasificacion"];
	echo $row["codigo_barra"];
	echo $precio;
	echo $fecha;
	echo $hora;
*/
	$query='insert into articulos_export set id='.$row["id"].', codigo_interno="'.$row["codigo_interno"].'", marca="'.str_replace('"','\\"',$row["marca"]).'", descripcion="'.str_replace('"','\\"', $row["descripcion"]).'", contenido="'.str_replace('"','\\"',$row["contenido"]).'", presentacion="'.str_replace('"','\\"',$row["presentacion"]).'", clasificacion="'.str_replace('"','\\"',$row["clasificacion"]).'", subclasificacion="'.str_replace('"','\\"',$row["subclasificacion"]).'", codigo_barra="'.$row["codigo_barra"].'", precio_base="'.$precio.'", porcentaje_tarjeta="'.$array_precios["porcentaje_tarjeta"].'", porcentaje_contado="'.$array_precios["porcentaje_contado"].'", fecha="'.$fecha.'", hora="'.$hora.'"';
	mysql_query($query);
	if(mysql_error()){
		echo mysql_error().chr(13);
		echo $query.chr(13).chr(13);
	}
	//echo $query.";".chr(13);
}

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