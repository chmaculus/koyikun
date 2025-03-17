<?php


#---------------------------------------------------------------------------------------------
function array_precios( $id_articulo, $id_sucursal ){
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





#---------------------------------------------------------------------------------------------
function precio_sucursal2( $id_articulo, $id_sucursal ){
	$query='select * from precios where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query);
	$rows=mysql_num_rows($res);
	if($rows==1){
		$array_precios=mysql_fetch_array($res);
		$array_precios["query"]=$query;
		$array_precios["rows"]=$rows;
		return $array_precios;		
	}
	if($rows<1){
		$query='select * from precios where id_articulo="'.$id_articulo.'" and id_sucursal="1"';
		$res=mysql_query($query);
		$rows=mysql_num_rows($res);

		if($rows==1){
			$array_precios=mysql_fetch_array($res);
			$array_precios["query"]=$query;
			$array_precios["rows"]=$rows;
			return $array_precios;
		}else{		
			$array_precios["precio_base"]="0";
			$array_precios["porcentaje_contado"]="0";
			$array_precios["porcentaje_tarjeta"]="0";
			$array_precios["rows"]=$rows;
			$array_precios["query"]=$query;
			return $array_precios;
		}		
	}
return $array_precios;
}
#---------------------------------------------------------------------------------------------


#-----------------------------------------------------------------
function verifica_tabla_precios($id_articulos, $id_sucursal ){
	$query='select * from precios where id_articulo="'.$id_articulos.'" and id_sucursal="'.$id_sucursal.'"';
	$rows=mysql_num_rows( mysql_query($query) );
	if($rows < "1" ){
		$q='insert into precios set id_articulo="'.$id_articulos.'", id_sucursal="'.$id_sucursal.'"';
		mysql_query($q);
		return 0;
	}
		$q='delete from precios where id_articulo="'.$id_articulos.'", id_sucursal="'.$id_sucursal.'"';
	if($rows > 1 ){
		mysql_query($q);
		$q='insert into precios set id_articulo="'.$id_articulos.'", id_sucursal="'.$id_sucursal.'"';
		mysql_query($q);
		return 0;
	}
	if($rows == 1 ){
		return 1;
	}
	

}
#-----------------------------------------------------------------


#-----------------------------------------------------------------
function verifica_tabla_precios3($id_articulos, $id_sucursal ){
	if($id_sucursal!=1){
		$q1='select * from precios where id_articulo="'.$id_articulos.'" and id_sucursal="1"';
		$array_precios=mysql_fetch_array(mysql_query($q1));
	}
	
	$query='select * from precios where id_articulo="'.$id_articulos.'" and id_sucursal="'.$id_sucursal.'"';
	$rows=mysql_num_rows( mysql_query($query) );
	if($rows < "1" ){
		$q='insert into precios set
			id_articulo="'.$id_articulos.'",
			precio_base="'.$array_precios["precio_base"].'",
			porcentaj_contado="'.$array_precios["porcentaje_contado"].'",
			porcentaje_tarjeta="'.$array_precios["porcentaje_tarjeta"].'",
			id_sucursal="'.$id_sucursal.'",
			fecha="'.$array_precios["fecha"].'",
			hora="'.$array_precios["hora"].'",
			promocion="'.$array_precios["promocion"].'"';		
			echo $q."<br>";	
			mysql_query($q);
	}
	if($rows > 1 ){
		$q='delete from precios where id_articulo="'.$id_articulos.'", id_sucursal="'.$id_sucursal.'"';
		mysql_query($q);
		$q='insert into koyikun.precios set
			id_articulo="'.$id_articulos.'",
			precio_base="'.$array_precios["precio_base"].'",
			porcentaj_contado="'.$array_precios["porcentaje_contado"].'",
			porcentaje_tarjeta="'.$array_precios["porcentaje_tarjeta"].'",
			id_sucursal="'.$id_sucursal.'",
			fecha="'.$array_precios["fecha"].'",
			hora="'.$array_precios["hora"].'",
			promocion="'.$array_precios["promocion"].'"';	
			echo $q."<br>";	
		mysql_query($q);
		if(mysql_error()){
			echo mysql_error()."<br>";
		}
	}
}
#-----------------------------------------------------------------


#-----------------------------------------------------------------
function verifica_tabla_precios2($id_articulos, $id_sucursal){
	$query='select * from precios where id_articulo="'.$id_articulos.'" and id_sucursal="'.$id_sucursal.'"';
	$rows=mysql_num_rows( mysql_query($query) );
	if($rows == "1" ){
		return 1;
	}else{
		return 0;
	}
	
}
#-----------------------------------------------------------------


#-----------------------------------------------------------------
function insert_OR_update_precios($array_precios){
	$q1='select * from precios where id_articulo="'.$array_precios["id_articulo"].'" and id_sucursal="'.$array_precios["id_sucursal"].'"';
	$rows=mysql_num_rows(mysql_query($q1));	
	
	$qi='insert into table precios set ';
	$qa='update precios set ';

	$qii='id_articulo="'.$array_precios["id_articulo"].'",
			id_sucursal="'.$array_precios["id_sucursal"].'",
	';
	$qc='precio_base="'.$array_precios["precio_base"].'",
		porcentaje_contado="'.$array_precios["porcentaje_contado"].'",
		porcentaje_tarjeta="'.$array_precios["porcentaje_tarjeta"].'",
		fecha="'.$array_precios["fecha"].'",
		hora="'.$array_precios["hora"].'",
		promocion="'.$array_precios["promocion"].'"
		';
	$qf=' where id_articulo="'.$array_precios["id_articulo"].'" and id_sucursal="'.$array_precios["id_sucursal"].'"';
	if($rows==1){
		$query=$qa.$qc.$qf;
	}
	if($rows<1){
		$query=$qi.$qii.$qc;
	}
	if($rows>1){
		$qt='delete from precios where id_articulo="'.$array_precios["id_articulo"].'" and id_sucursal="'.$array_precios["id_sucursal"].'"';
		mysql_query($qt);
		$query=$qi.$qii.$qc;
	}
	mysql_query($query);
return $query;	
}
#-----------------------------------------------------------------




?>
