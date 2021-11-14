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



#---------------------------------------------------------------------------------------------
function calcula_total_vendedor($id_datos_caja, $vendedor){
	$query='select sum(total) from comisiones_vendedores where id_datos_caja="'.$id_datos_caja.'" and  vendedor="'.$vendedor.'"';
	$result=mysql_query($query)or die (mysql_error());
	return mysql_result($result,0);
}
#---------------------------------------------------------------------------------------------

#---------------------------------------------------------------------------------------------
function calcula_total_marca_vendedor( $linea, $vendedor, $desde, $hasta ){
	$query='select sum(total) from comisiones_vendedores where vendedor="'.$vendedor.'" and linea="'.$linea.'" and fecha>="'.$desde.'" and fecha<="'.$hasta.'"';
	$result=mysql_query($query)or die (mysql_error());
	return mysql_result($result,0);
}
#---------------------------------------------------------------------------------------------


?>
