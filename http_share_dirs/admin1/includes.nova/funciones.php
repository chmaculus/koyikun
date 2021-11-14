<?php



#-----------------------------------------------------------------
//en la lista para borrar 
function fecha_hora_actual($var){
	if($var=="fecha"){
    	return date("Y-n-d");
	}
	if($var=="hora"){
    	return date("H:i:s");
	}
}
#-----------------------------------------------------------------
    



#-----------------------------------------------------------------
function calcula_total_venta($numero_venta, $sucursal){
	$query='select * from ventas where numero_venta="'.$numero_venta.'" and sucursal="'.$sucursal.'"';
	$result=mysql_query($query)or die(mysql_error());

	while($row=mysql_fetch_array($result)){
		$total_venta=$total_venta + ( $row["cantidad"] * $row["precio_unitario"] );
		if( $row["marca"]=="Descuento" AND $row["descripcion"]=="Descuento" ){$descuento="SI";}
		$array["tipo_pago"]=$row["tipo_pago"];
		$array["vendedor"]=$row["vendedor"];
		$array["fecha"]=$row["fecha"];
		$array["hora"]=$row["hora"];
	}
	
	$array["total_venta"]=$total_venta;

	if($descuento=="SI"){
		$array["descuento"]="SI";
	}else{
		$array["descuento"]="NO";
	}

return $array;
}				
#-----------------------------------------------------------------



#-----------------------------------------------------------------
function seguimiento_stock($id_articulo, $stock_anterior, $stock_nuevo, $tipo, $origen, $destino){
	$fecha=date("Y-n-d");
	$hora=date("H:i:s");
	$query='insert into seguimiento_stock set id_articulo="'.$id_articulo.'",
															stock_anterior="'.$stock_anterior.'",
															stock_nuevo="'.$stock_nuevo.'",
															tipo="'.$tipo.'",
															origen="'.$origen.'",
															destino="'.$destino.'",
															fecha="'.$fecha.'",
															hora="'.$hora.'"
															'; 	
	mysql_query($query)or die(mysql_error()."<br>".$SCRIPT_NAME."<br>".$query."<br><br>");
}
#-----------------------------------------------------------------


#-----------------------------------------------------------------
//en la lista para borrar 
function input_hidden($name,$value){
	echo '<input type="hidden" name="'.$name.'" value="'.$value.'">'.chr(13);
}
#-----------------------------------------------------------------


#-----------------------------------------------------------------
function precio_sucursal($id_articulo,$id_sucursal){
	if($id_articulo=="NO"){
		$array_precios["precio_base"]="0";
		$array_precios["porcentaje_contado"]="0";
		$array_precios["porcentaje_tarjeta"]="0";
		return $array_precios;		
	}
	$query='select * from precios where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);

	if($rows==1){
		$array_precios=mysql_fetch_array($res);
		return $array_precios;		
	}
	if($rows<1){
		$query='select * from precios where id_articulo="'.$id_articulo.'" and id_sucursal="1"';
		$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
		$rows=mysql_num_rows($res);
		if($rows==1){
			return $array_precios;
		}		
	}
return $array_precios;
}
#-----------------------------------------------------------------


#-----------------------------------------------------------------
function stock_sucursal($id_articulo,$id_sucursal){
	if($id_articulo=="NO"){
		$array["stock"]="0";
		$array["maximo"]="0";
		$array["minimo"]="0";
		$array["id_sucursal"]="0";
		return $array;		
	}
	$query='select stock, maximo, minimo ,id_sucursal from stock where 	id_articulo="'.$id_articulo.'" and 
																							id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);
	if($rows==1){
		$array=mysql_fetch_array($res);
		return $array;		
	}
	if($rows<1){
		$array["stock"]="0";
		$array["maximo"]="0";
		$array["minimo"]="0";
		$array["id_sucursal"]="0";
		return $array;		
	}
	if($rows>1){
		$q='delete from stock where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
		mysql_query($q);
		$array["stock"]="0";
		$array["maximo"]="0";
		$array["minimo"]="0";
		$array["id_sucursal"]="0";
		return $array;		
	}
}
#-----------------------------------------------------------------


#-----------------------------------------------------------------
function nombre_sucursal($id_sucursal){
	$query='select * from sucursales where id="'.$id_sucursal.'"';
	$array=mysql_fetch_array(mysql_query($query));
return $array["sucursal"];
}
#-----------------------------------------------------------------


#-----------------------------------------------------------------
function verifica_tabla_precios($id_articulos){
	$query='select * from precios where id_articulo="'.$id_articulos.'" and id_sucursal="1"';
	$rows=mysql_num_rows( mysql_query($query) );
	if($rows < "1" ){
		$q='insert into precios set id_articulo="'.$id_articulos.'" and id_sucursal="1"';
		mysql_query($q);
		return 0;
	}else{
		return 1;
	}
}
#-----------------------------------------------------------------

#-----------------------------------------------------------------
function verifica_tabla_costos($id_articulos){
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


#-----------------------------------------------------------------
function descuenta_stock($cantidad, $id_articulos, $id_sucursal){
	$query='select * from stock where id_articulo="'.$id_articulos.'" and id_sucursal="'.$id_sucursal.'"';
	$result=mysql_query($query)or die(mysql_error());
	$rows=mysql_num_rows($result);
	$array=mysql_fetch_array($result);

	
	if($rows<"1"){
		$stock_anterior="0";
		$stock_nuevo=( $stock_anterior - $cantidad ); 
		$q1='insert into stock set id_articulo="'.$id_articulos.'", id_sucursal="'.$id_sucursal.'", stock="0", maximo="0", minimo="0"';
	}
	if($rows=="1"){
		$stock_anterior=$array["stock"];
		$stock_nuevo=( $stock_anterior - $cantidad ); 
		$q1='update stock  set stock="'.$stock_nuevo.'" where id="'.$array["id"].'"';
	}
//	echo $q1;
	mysql_query($q1)or die(mysql_error().$_SERVER["script_name"]." ".$q1);
	
}
#-----------------------------------------------------------------



?>