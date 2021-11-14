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
function calcula_total_vendedor($id_session, $vendedor){
	$query='select sum(total) from comisiones_vendedores where id_session="'.$id_session.'" and  vendedor="'.$vendedor.'"';
	$result=mysql_query($query)or die (mysql_error());
	return mysql_result($result,0);
}
#---------------------------------------------------------------------------------------------

?>
