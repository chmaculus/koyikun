<?php
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
function nombre_sucursal($id_sucursal){
	$query='select * from sucursales where id="'.$id_sucursal.'"';
	$array_suc=mysql_fetch_array(mysql_query($query));
return $array_suc["sucursal"];
}
#-----------------------------------------------------------------

#-----------------------------------------------------------------
function nombre_usuario($id_usuario){
	$query='select * from usuarios where id="'.$id_usuario.'"';
	$array=mysql_fetch_array(mysql_query($query));
return $array["nombre"];
}
#-----------------------------------------------------------------

#-----------------------------------------------------------------
function id_sucursal($sucursal){
	$query='select * from sucursales where sucursal="'.$sucursal.'"';
	$array_suc=mysql_fetch_array(mysql_query($query));
return $array_suc["id"];
}
#-----------------------------------------------------------------

#-----------------------------------------
function comilla($var){
	$var=str_replace('"','\\"',$var);
return $var;	
}
#-----------------------------------------


?>
