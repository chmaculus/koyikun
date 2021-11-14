<?php

#-----------------------------------------
function detalle_articulo($id_articulo){
	$query='select * from koyikun.articulos where id="'.$id_articulo.'"';
	$res=mysql_query($query);
	if(mysql_error()){
	echo mysql_error()."<br>";
	echo "s: ".$_SERVER["SCRIPT_NAME"]."<br>";
	echo "f: ".__FILE__."<br>";
	echo "l: ".__LINE__."<br>";
}	$rows=mysql_num_rows($res);
	if($rows==1){
		$array_articulos=mysql_fetch_array($res);
		return $array_articulos;		
	}else{
		return NULL;
	}
}
#-----------------------------------------


#-----------------------------------------
function array_articulos($id_articulos){
    $query='select * from koyikun.articulos where id="'.$id_articulos.'"';
    $res=mysql_query($query);
if(mysql_error()){
	echo mysql_error()."<br>";
	echo "s: ".$_SERVER["SCRIPT_NAME"]."<br>";
	echo "f: ".__FILE__."<br>";
	echo "l: ".__LINE__."<br>";
}    $rows=mysql_num_rows($res);
    if($rows==1){
        $array_articulos=mysql_fetch_array($res);
        return $array_articulos;        
    }else{
        return NULL;
    }
}
#-----------------------------------------

?>