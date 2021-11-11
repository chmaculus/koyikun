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

#-----------------------------------------------------------------
function get_listas_porcentaje($id_articulos, $id_lista){
        $query='select * from listas_porcentaje where id_lista="'.$id_lista.'" and id_articulos="'.$id_articulos.'"';
        $result=mysql_query($query);
        if(mysql_error()){
                echo mysql_error();
        }
        $rows=mysql_num_rows($result);
        if($rows==1){
                $array_listas=mysql_fetch_array($result);
                $array_listas["rows"];
        }else{
                $array_listas["porcentaje"]=0;
                $array_listas["rows"];
        }
return $array_listas;
}

#-----------------------------------------------------------------

?>
