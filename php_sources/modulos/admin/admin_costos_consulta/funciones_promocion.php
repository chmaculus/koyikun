<?php
#---------------------------------------------------------------------------------------------
function verifica_promocion($id_articulos, $id_sucursal){
	$query='select * from promociones where id_articulos="'.$id_articulos.'" and id_sucursal="'.$id_sucursal.'"';
	$result=mysql_query($query);
	$rows=mysql_num_rows($result);

	if($rows>0 ){
		$q='delete from promociones where id_articulos="'.$id_articulos.'" and id_sucursal="'.$id_sucursal.'"';
		mysql_query($q);
	}
}
#---------------------------------------------------------------------------------------------



#--------------------------------------------------------------------------
function query_promocion($id_articulos, $id_sucursal, $precio_promocion, $fecha_inicio, $fecha_finaliza, $habilitado){
	if($habilitado==""){
		$habilitado="N";
	}

		$query='insert into promociones set id_articulos="'.$id_articulos.'",
														id_sucursal="'.$id_sucursal.'",
														precio_promocion="'.$precio_promocion.'",
														fecha_inicio="'.$fecha_inicio.'",
														fecha_finaliza="'.$fecha_finaliza.'",
														habilitado="'.$habilitado.'"
		';

return $query;
}
#--------------------------------------------------------------------------


#--------------------------------------------------------------------------
function insert_OR_update_promocion($array_promociones){
	$q1='select * from promociones where id_articulos="'.$array_promociones["id_articulos"].'" and id_sucursal="'.$array_promociones["id_sucursal"].'"';
	$rows=mysql_num_rows(mysql_query($q1));	

	$qi='insert into table promociones set ';
	$qa='update promociones set ';

	$qii='id_articulos="'.$array_promociones["id_articulos"].'",
		id_sucursal="'.$array_promociones["id_sucursal"].'",
		';	
	$qc='fecha_inicio="'.$array_promociones["fecha_inicio"].'",
		fecha_finaliza="'.$array_promociones["fecha_finaliza"].'",
		precio_promocion="'.$array_promociones["precio_promocion"].'",
		habilitado="'.$array_promociones["habilitado"].'"
		';	

	$qf='where id_articulo="'.$array_promociones["id_articulos"].'" and id_sucursal="'.$array_promociones["id_sucursal"].'"';

	if($rows==1){
		$query=$qa.$qc.$qf;
	}
	if($rows<1){
		$query=$qi.$qii.$qc;
	}
	if($rows>1){
		$qt='delete from promociones where id_articulos="'.$array_precios["id_articulos"].'" and id_sucursal="'.$array_precios["id_sucursal"].'"';
		mysql_query($qt);
		$query=$qi.$qii.$qc;
	}
	mysql_query($query);
return $query;	
}
#--------------------------------------------------------------------------

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