<?php

#--------------------------------------------------------------------
function listas_porcentaje_verifica( $id_lista, $id_articulos ){
	$q='select * from listas_porcentaje where id_articulos="'.$id_articulos.'" and id_lista="'.$id_lista.'"';
	$res=mysql_query($q)or die(mysql_error()." ".$q);
	$rows=mysql_num_rows($res);
	if($rows==1){
		return 1;
	}else{
		return 0;
	}
}
#--------------------------------------------------------------------

?>
