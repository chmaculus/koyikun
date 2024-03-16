<?php



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



#-----------------------------------------
function detalle_articulo($id_articulo){
	$query='select * from articulos where id="'.$id_articulo.'"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);
	if($rows==1){
		$array_articulos=mysql_fetch_array($res);
		return $array_articulos;		
	}

return $array_articulos;
}
#-----------------------------------------

?>
