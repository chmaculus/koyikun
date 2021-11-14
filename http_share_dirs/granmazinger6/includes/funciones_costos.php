<?php

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
function array_costo($id_articulos){
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
function verifica_tabla_costos2($id_articulos){
	$query='select * from costos where id_articulos="'.$id_articulos.'"';
	$rows=mysql_num_rows( mysql_query($query) );
	if($rows == "1" ){
		return 1;
	}else{
		//$q='delete from costos where id_articulos="'.$id_articulos.'"';
		//mysql_query($q);
		//$q='insert into costos set id_articulos="'.$id_articulos.'"';
		//mysql_query($q);
		return 0;
	}
}
#-----------------------------------------------------------------




#--------------------------------------------------------------------------------
function incrementa_costo( $id_articulos, $porcentaje, $fecha, $hora ){
	$q='select * from costos where id_articulos="'.$id_articulos.'"';
	$result=mysql_query($q);
	$array=mysql_fetch_array($result);

	$costo_nuevo = (( $array["precio_costo"] * $porcentaje ) / 100 ) + $array["precio_costo"];

	$q2='update costos set precio_costo="'.$costo_nuevo.'", 
									fecha="'.$fecha.'", 
									hora="'.$hora.'" 
										where id_articulos="'.$id_articulos.'" 
	';
	mysql_query($q2)or die(mysql_error()." ".$q2);
}
#--------------------------------------------------------------------------------


#-----------------------------------------------------------------
function verifica_costo($id_articulos){
	$query='select * from costos where id_articulos="'.$id_articulos.'"';
	$rows=mysql_num_rows(mysql_query($query));
	if($rows=="1"){
		return "1";
	}
	if($rows<"1"){
		$query='insert into costos set id_articulos="'.$id_articulos.'"';
		mysql_query($query)or die(mysql_error());
	}
	if($rows>"1"){
		$query='delete from costos where id_articulos="'.$id_articulos.'"';
		mysql_query($query)or die(mysql_error());
		$query='insert into costos set id_articulos="'.$id_articulos.'"';
		mysql_query($query)or die(mysql_error());
	}
}
#-----------------------------------------------------------------

#-----------------------------------------------------------------
function verifica_tabla_costos($id_articulos){
	$query='select * from costos where id_articulos="'.$id_articulos.'"';
	$rows=mysql_num_rows(mysql_query($query));
	if($rows=="1"){
		return "1";
	}
	if($rows<"1"){
		$query='insert into costos set id_articulos="'.$id_articulos.'"';
		mysql_query($query)or die(mysql_error());
	}
	if($rows>"1"){
		$query='delete from costos where id_articulos="'.$id_articulos.'"';
		mysql_query($query)or die(mysql_error());
		$query='insert into costos set id_articulos="'.$id_articulos.'"';
		mysql_query($query)or die(mysql_error());
	}
}
#-----------------------------------------------------------------


#---------------------------------------------------------------------------------------------
function ingreso_seguimiento_costos($id_articulo, $array_costos_seguimiento, $tipo_cambio, $id_costos_detalle, $fecha, $hora){

	
	$query='insert into costos_seguimiento set
		id_costos_detalle="'.$id_costos_detalle.'",
		id_articulo="'.$id_articulo.'",
		costo="'.$array_costos_seguimiento["precio_costo"].'",
		moneda="'.$array_costos_seguimiento["moneda"].'",
		descuento1="'.$array_costos_seguimiento["descuento1"].'",
		descuento2="'.$array_costos_seguimiento["descuento2"].'",
		descuento3="'.$array_costos_seguimiento["descuento3"].'",
		descuento4="'.$array_costos_seguimiento["descuento4"].'",
		descuento5="'.$array_costos_seguimiento["descuento5"].'",
		descuento6="'.$array_costos_seguimiento["descuento6"].'",
		iva="'.$array_costos_seguimiento["iva"].'",
		margen="'.$array_costos_seguimiento["margen"].'",
		fecha="'.$fecha.'",
		hora="'.$hora.'",
		tipo="'.$tipo_cambio.'"';

	//echo $query."<br><br>";
	
	mysql_query($query);
	if(mysql_error()){
		echo mysql_error()."<br>";
		echo $query."<br>";
	}
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


#-----------------------------------------------------------------
function insert_OR_update_costos($array_costos){
	$q1='select * from costos where id_articulos="'.$array_costos["id_articulos"].'"';
	$rows=mysql_num_rows(mysql_query($q1));	
	
	$qi='insert into table costos set ';
	$qa='update costos set ';

	$qii='id_articulos="'.$array_costos["id_articulos"].'",
	';
	$qc='precio_costo="'.$array_costos["precio_costo"].'",
			moneda="'.$array_costos["moneda"].'",
			descuento1="'.$array_costos["descuento1"].'",
			descuento2="'.$array_costos["descuento2"].'",
			descuento3="'.$array_costos["descuento3"].'",
			descuento4="'.$array_costos["descuento4"].'",
			descuento5="'.$array_costos["descuento5"].'",
			descuento6="'.$array_costos["descuento6"].'",
			descuento7="'.$array_costos["descuento7"].'",
			descuento8="'.$array_costos["descuento8"].'",
			descuento9="'.$array_costos["descuento9"].'",
			descuento10="'.$array_costos["descuento10"].'",
			iva="'.$array_costos["iva"].'",
			margen="'.$array_costos["margen"].'",
			fecha="'.$array_costos["fecha"].'",
			hora="'.$array_costos["hora"].'",
			fecha_gerencia="'.$array_costos["fecha_gerencia"].'",
			hora_gerencia="'.$array_costos["hora_gerencia"].'"
			';

	$qf=' where id_articulos="'.$array_costos["id_articulos"].'"';

	if($rows==1){
		$query=$qa.$qc.$qf;
	}
	if($rows<1){
		$query=$qi.$qii.$qc;
	}
	if($rows>1){
		$qt='delete from cotos where id_articulo="'.$array_precios["id_articulo"].'"';
		mysql_query($qt);
		$query=$qi.$qii.$qc;
	}
	mysql_query($query);
return $query;	
}
#-----------------------------------------------------------------


#-----------------------------------------------------------------
function costo_ultima_actualizacion($id_articulos, $fecha ){
	$fecha_menos_30 = date('Y-m-d',time() - (30 * 24 * 60 * 60));
	$fecha_menos_60 = date('Y-m-d',time() - (60 * 24 * 60 * 60));
	$q2='select fecha, fecha_gerencia from costos where id_articulos="'.$id_articulos.'"';
	//echo $q2;
	$r=mysql_query($q2);
	if(mysql_error()){
		echo mysql_error();
	}
	$rows=mysql_num_rows($r);
	if($rows>0){
		$fecha_fabrica=mysql_result($r, 0, 0);
		$fecha_gerencia=mysql_result($r, 0, 1);
	}else{
		return 2;
	}
	if($fecha_fabrica>$fecha_gerencia){
		$fecha_ultima=$fecha_fabrica;
	}
	if($fecha_fabrica<$fecha_gerencia){
		$fecha_ultima=$fecha_gerencia;
	}
	$q='select fecha from costos_seguimiento where id_articulo="'.$id_articulos.'" order by fecha desc limit 0,1';
	$r=mysql_query($q);
	$rows2=mysql_num_rows($r);
	if(mysql_error()){
		echo mysql_error();
	}

	if($rows2>0){
		$fecha_tcosto=mysql_result($r, 0, 0);
	}
	

	if($fecha_ultima<$fecha_tcosto){
		$fecha_ultima=$fecha_tcosto;
	}

	if($fecha_ultima > $fecha_menos_30 ){
		$ff="0";
	}

	if($fecha_ultima < $fecha_menos_30 AND $fecha_ultima > $fecha_menos_60 ){
		$ff="1";
	}
	if($fecha_ultima < $fecha_menos_60 ){
		$ff="2";
	}
	//echo "<td>ff: ".$ff."</td>";
	
return $ff;
}
#-----------------------------------------------------------------




?>