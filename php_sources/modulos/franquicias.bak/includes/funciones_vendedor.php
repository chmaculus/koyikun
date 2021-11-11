<?php


#-----------------------------------------------------------------
function nombre_vendedor($vendedor){
    $query='select * from vendedores where numero="'.$vendedor.'"';
    $res=mysql_query($query);
    $rows=mysql_num_rows($res);
    if($rows<1){
        $array="NULL";
        return $array;
    }else{
	$array=mysql_fetch_array($res);
        //echo $query;
	return $array;
    }
}
#-----------------------------------------------------------------
    
    
?>