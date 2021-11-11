<?php

#-----------------------------------------------------------------
function nombre_sucursal($id_sucursal){
	$query='select * from sucursales where id="'.$id_sucursal.'"';
	$array=mysql_fetch_array(mysql_query($query));
return $array["sucursal"];
}
#-----------------------------------------------------------------


?>
