<?php
				

#--------------------------------------------------------------------------
function fecha_hora_actual($var){
	if($var=="fecha"){
    	return date("Y-n-d");
	}
	if($var=="hora"){
    	return date("H:i:s");
	}
}
#--------------------------------------------------------------------------
    
#--------------------------------------------------------------------------
function muestra_texto($texto,$size,$color){
    if (!$color){
	$color="#ffffff";
    }
    if (!$size){
	$size="2";
    }
    echo '<font color="'.$color.'" size="'.$size.'">'.$texto.'</font>'.chr(13);
}
#--------------------------------------------------------------------------


#--------------------------------------------------------------------------
function muestra_texto_tabla($texto,$size,$color){
    if (!$color){
	$color="#ffffff";
    }
    if (!$size){
	$size="2";
    }
    echo '<td><font color="'.$color.'" size="'.$size.'">'.$texto.'</font></td>'.chr(13);
}
#--------------------------------------------------------------------------


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
#--------------------------------------------------------------------------


#--------------------------------------------------------------------------
function input_hidden($name,$value){
	echo '<input type="hidden" name="'.$name.'" value="'.$value.'">'.chr(13);
}


#-----------------------------------------------------------------
function verifica_precio_sucursal($id_articulo, $id_sucursal){
	$query='select * from precios where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);

	if($rows==1){
		return "1";
	}

	if($rows<1){
		$query='select * from precios where id_articulo="'.$id_articulo.'" and id_sucursal="1"';
		$res2=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
		$rows2=mysql_num_rows($res2);
		$array_precios=mysql_fetch_array($res2);
		if($rows2>0){
					$query_precios='insert into precios set precio_base="'.$array_precios["precio_base"].'",
																porcentaje_contado="'.$array_precios["porcentaje_contado"].'",
																porcentaje_tarjeta="'.$array_precios["porcentaje_tarjeta"].'",
																fecha="'.$array_precios["fecha"].'",
																hora="'.$array_precios["hora"].'",
																id_articulo="'.$array_precios["id_articulo"].'",
																id_sucursal="'.$id_sucursal.'"
																';
					mysql_query($query_precios)or die(mysql_error());
		}

		
	}
return $array_precios;
}
#-----------------------------------------------------------------

#-----------------------------------------------------------------
function precio_sucursal($id_articulo, $id_sucursal){
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
		$array_precios=mysql_fetch_array($res);
		return $array_precios;		
	}
return $array_precios;
}
#-----------------------------------------------------------------



#--------------------------------------------------------------------------
# esta funcion verifica si existe el id_articulo, id_stock en tabla stock
# y en caso que no este no agrega
function verifica_stock_sucursal($id_articulo,$id_sucursal){
	if($id_articulo=="NO"){
		$array["stock"]="0";
		$array["maximo"]="0";
		$array["minimo"]="0";
		return $array;		
	}
	$query='select * from stock where 	id_articulo="'.$id_articulo.'" and 
																				id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);

	if($rows==1){
		$array=mysql_fetch_array($res);
		return $array;		
	}
	
	if($rows<1){
		$q='insert into stock set id_articulo="'.$id_articulo.'", id_sucursal="'.$id_sucursal.'"';
		mysql_query($q);

		$array["stock"]="0";
		$array["maximo"]="0";
		$array["minimo"]="0";
		return $array;		
	}
	
	if($rows>1){
		$q='delete from stock where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
		mysql_query($q);

		$q='insert into stock set id_articulo="'.$id_articulo.'", id_sucursal="'.$id_sucursal.'"';
		mysql_query($q);

		$array["stock"]="0";
		$array["maximo"]="0";
		$array["minimo"]="0";
		return $array;		
	}
}
#--------------------------------------------------------------------------



#--------------------------------------------------------------------------
function stock_sucursal($id_articulo,$id_sucursal){
	if($id_articulo=="NO"){
		$array["stock"]="0";
		$array["maximo"]="0";
		$array["minimo"]="0";
		return $array;		
	}
	$query='select * from stock where 	id_articulo="'.$id_articulo.'" and 
																				id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);
	if($rows>0){
		$array=mysql_fetch_array($res);
		if($array["stock"]==""){$array["stock"]="0";}
		if($array["maximo"]==""){$array["maximo"]="0";}
		if($array["minimo"]==""){$array["minimo"]="0";}
		return $array;		
	}else{
		$array["stock"]="0";
		$array["maximo"]="0";
		$array["minimo"]="0";
		return $array;		
	}
	if($rows>1){
		$q='delete from stock where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
		mysql_query($q);
		$array["stock"]="0";
		$array["maximo"]="0";
		$array["minimo"]="0";
		return $array;		
	}
}
#--------------------------------------------------------------------------



#-----------------------------------------
function get_numero_venta($id_sucursal){
	$query='select * from numero_venta where id_sucursal="'.$id_sucursal.'"';
	$result=mysql_query($query) or die(mysql_error());
	$rows=mysql_num_rows($result);
	if($rows<"1"){
		$numero_venta="1";
		$q1='insert into numero_venta set numero="1", id_sucursal="'.$id_sucursal.'"';
		mysql_query($q1)or die(mysql_error());
	}else{
		$array_nventa=mysql_fetch_array($result);
		$numero_venta=$array_nventa["numero"];
	}	
	
return $numero_venta;
}
#-----------------------------------------


#-----------------------------------------
function incrementa_n_venta($id_sucursal){
	$query='select * from numero_venta where id_sucursal="'.$id_sucursal.'"';
	$result=mysql_query($query) or die(mysql_error());
	$array_nventa=mysql_fetch_array($result);
	$numero_venta=$array_nventa["numero"];
	$q1='update numero_venta set numero="'.( $numero_venta + 1 ).'", id_sucursal="'.$id_sucursal.'"';
	mysql_query($q1)or die(mysql_error());
}
#-----------------------------------------


#-----------------------------------------
#esta funcion a agrega los articulos de la tabla ventas_temp a la tabla ventas
function venta_temp_ventas($cantidad, $id_articulos, $numero_venta, $tipo_pago, $sucursal, $vendedor){
	$fecha=date("Y-n-d");
	$hora=date("H:i:s");
	$descripcion=detalle_articulo($id_articulos);
	$array_precio=precio_sucursal($id_articulos, $id_sucursal);
	if($tipo_pago=="contado"){
		$precio=( ( $array_precio["precio_base"] * $array_precio["porcentaje_contado"])/100 + $array_precio["precio_base"]);
	}
	if($tipo_pago=="tarjeta"){
		$precio=( ( $array_precio["precio_base"] * $array_precio["porcentaje_tarjeta"])/100 + $array_precio["precio_base"]);
	}
	$query='insert into ventas set cantidad="'.$cantidad.'",
												numero_venta="'.$numero_venta.'",
												marca="'.$descripcion["marca"].'",
												descripcion="'.$descripcion["descripcion"].'",
												clasificacion="'.$descripcion["clasificacion"].'",
												subclasificacion="'.$descripcion["subclasificacion"].'",
												precio_unitario="'.round($precio, 2).'",
												tipo_pago="'.$tipo_pago.'",
												sucursal="'.$sucursal.'",
												vendedor="'.$vendedor.'",
												fecha="'.$fecha.'",
												hora="'.$hora.'"
	';
	mysql_query($query)or die(mysql_error());
}
#-----------------------------------------




#-----------------------------------------------------------------
function get_stock($id_articulo,$id_sucursal){
	$query='select * from stock where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);
	if($rows==1){
		$array_stock=mysql_fetch_array($res);
		return $array_stock["stock"];		
	}
return $array_stock["stock"];

}
#-----------------------------------------------------------------


#-----------------------------------------------------------------
function descuenta_stock($cantidad, $id_articulos, $id_sucursal){
	$fecha=date("Y-n-d");
	$hora=date("H:i:s");

	$query='select * from stock where id_articulo="'.$id_articulos.'" and id_sucursal="'.$id_sucursal.'"';
	$result=mysql_query($query)or die(mysql_error());
	$rows=mysql_num_rows($result);
	$array=mysql_fetch_array($result);

	
	if($rows<"1"){
		$stock_anterior="0";
		$stock_nuevo=( $stock_anterior - $cantidad ); 
		$q1='insert into stock set id_articulo="'.$id_articulos.'", id_sucursal="'.$id_sucursal.'", stock="0", maximo="0", minimo="0", fecha="'.$fecha.'", hora="'.$hora.'"';
	}
	if($rows=="1"){
		$stock_anterior=$array["stock"];
		$stock_nuevo=( $stock_anterior - $cantidad ); 
		$q1='update stock  set stock="'.$stock_nuevo.'", fecha="'.$fecha.'", hora="'.$hora.'" where id="'.$array["id"].'"';
	}
	mysql_query($q1)or die(mysql_error().$_SERVER["script_name"]);
	
}
#-----------------------------------------------------------------


#-----------------------------------------------------------------
function nombre_sucursal($id_sucursal){
	$query='select * from sucursales where id="'.$id_sucursal.'"';
	$array_suc=mysql_fetch_array(mysql_query($query));
return $array_suc["sucursal"];
}
#-----------------------------------------------------------------


#-----------------------------------------
function detalle_articulo($id_articulo){
	$query='select * from articulos where id="'.$id_articulo.'"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);
	if($rows==1){
		$array_articulos=mysql_fetch_array($res);
		return $array_articulos;		
	}else{
		return NULL;
	}


}
#-----------------------------------------


#-----------------------------------------
function calcula_total_venta($id_session){
	$query='select * from ventas_temp where id_session="'.$id_session.'"';
	$result=mysql_query($query)or die(mysql_error());
	while($row=mysql_fetch_array($result)){
		
	}
}
#-----------------------------------------


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


#---------------------------------------------------------------------------------------------
function get_promo( $id_articulos, $id_sucursal ){
	$q='select * from promociones where id_articulos="'.$id_articulos.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($q);
	$rows=mysql_num_rows($res);

	if($rows>0){
		$array=mysql_fetch_array($res);
		return $array;
	}else{
		return "NO";
	}
}
#---------------------------------------------------------------------------------------------
?>