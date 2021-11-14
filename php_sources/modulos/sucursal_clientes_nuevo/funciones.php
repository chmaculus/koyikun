<?php
#--------------------------------
function get_clientes_persona_valores($id_cliente,$llave){
	$q='select valor from clientes_persona_valores where id_clientes_persona="'.$id_cliente.'" and llave="'.$llave.'"';
	if(mysql_error()){echo mysql_error();}
	$r=mysql_query($q);
	$rows=mysql_num_rows($r);
	if($rows==1){
		$valor=mysql_result($r, 0, 0);
		if(mysql_error()){echo mysql_error();}
		return $valor;
	}else{
		return null;
	}
}
#--------------------------------
?>