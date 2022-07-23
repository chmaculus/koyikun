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
function array_usuario($id_usuario){
	$query='select * from usuarios where id="'.$id_usuario.'"';
	$array=mysql_fetch_array(mysql_query($query));
return $array;
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





#-----------------------------------------
function get_numero_pedido_proveedor(){
        $query='select * from pedidos_proveedor_numero limit 0,1';
        $result=mysql_query($query) or die(mysql_error());
        $rows=mysql_num_rows($result);
        if($rows<"1"){
                $numero_venta="1";
                $q1='insert into pedidos_proveedor_numero set numero="1"';
                mysql_query($q1)or die(mysql_error());
        }else{
                $array_nventa=mysql_fetch_array($result);
                $numero_venta=$array_nventa["numero"];
        }

return $numero_venta;
}
#-----------------------------------------


#-----------------------------------------
function incrementa_n_pedido_proveedor(){
        $query='select * from pedidos_proveedor_numero limit 0,1';
        $result=mysql_query($query) or die(mysql_error());
        $array_nventa=mysql_fetch_array($result);
        $numero_venta=$array_nventa["numero"];
        $q1='update pedidos_proveedor_numero set numero="'.( $numero_venta + 1 ).'" ';
        mysql_query($q1)or die(mysql_error());
}
#-----------------------------------------




#-----------------------------------------
function trae_zona($numero_pedido,$id_sucursal){
 $q='select marcas_zonas.zona, pedidos.sucursal from pedidos, marcas_zonas where
marcas_zonas.marca=pedidos.marca and 
marcas_zonas.clasificacion=pedidos.clasificacion and
pedidos.numero_pedido="'.$numero_pedido.'" and 
pedidos.sucursal="'.$id_sucursal.'" limit 0,1';
 $res=mysql_query($q);
 $rows=mysql_num_rows($res);
 if($rows<1){return 1;}
 //echo $q."<br><br>";
 return mysql_result($res,0,0);
}
#-----------------------------------------


function trae_tipo($numero_pedido,$sucursal){
  $q='select tipo from pedidos where sucursal="'.$sucursal.'" and numero_pedido="'.$numero_pedido.'" limit 0,1';
  //echo $q."<br>";
  $res=mysql_query($q);
  if(mysql_error()){echo mysql_error()."<br>";}
  $array=mysql_fetch_array($res);
  if($array[0]=="AUTOMATICO"){return "Virtual";}
  if($array[0]=="MANUAL"){return "Humano";}
  //return $array[0];
  
}


#---------------------------------------
function log_this($file, $var) {
        $pfile = fopen($file, 'a+');
        if (is_array($var)) {
            fwrite($pfile, date("Y-m-d H:i:s")." ".print_r($var, true) . " \n");
        } else {
            fwrite($pfile, date("Y-m-d H:i:s")." ".$var . "\n");
        }
        fclose($pfile);
}
#---------------------------------------
    

#---------------------------------------
function verifica_vacio($var){
        if($var=="" or $var=NULL){
                $var=0;
        }
        log_this("/tmp/estadistica.log", "func vacio: ".$var)
        return $var;
}
#---------------------------------------




?>
