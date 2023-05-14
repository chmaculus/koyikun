<?php

#-----------------------------------------------------------------
function calcula_total_venta($numero_venta, $sucursal){
	$query='select * from ventas where numero_venta="'.$numero_venta.'" and sucursal="'.$sucursal.'"';
	$result=mysql_query($query)or die(mysql_error());

	while($row=mysql_fetch_array($result)){
		$total_venta=$total_venta + ( $row["cantidad"] * $row["precio_unitario"] );
		if( $row["marca"]=="Descuento" AND $row["descripcion"]=="Descuento" ){$descuento="SI";}
		$array["tipo_pago"]=$row["tipo_pago"];
		$array["vendedor"]=$row["vendedor"];
		$array["fecha"]=$row["fecha"];
		$array["hora"]=$row["hora"];
	}
	
	$array["total_venta"]=$total_venta;

	if($descuento=="SI"){
		$array["descuento"]="SI";
	}else{
		$array["descuento"]="NO";
	}

return $array;
}				
#-----------------------------------------------------------------

#-----------------------------------------------------------------
function calcula_total_venta_temp($id_session){
	$query='select sum( cantidad * precio_unitario) from ventas_temp2 where id_session="'.$id_session.'"';
	$result=mysql_query($query);
	if(mysql_error()){
		echo "error: ".mysql_error()."<br>";
		echo "query: ".$query."<br>";
		echo "script: ".$_SERVER["SCRIPT_NAME"]."<br>";
	}
	$rows=mysql_num_rows($result);
	$total=mysql_result($result,0,1);
return $total;	

}				
#-----------------------------------------------------------------


#-----------------------------------------
function get_numero_venta($id_sucursal){
	$query='select * from numero_venta where id_sucursal="'.$id_sucursal.'"';
	$result=mysql_query($query) or die(mysql_error());
	$rows=mysql_num_rows($result);
	if($rows<"1"){
		$numero_venta="1";
		$q1='insert into numero_venta set numero="1", id_sucursal="'.$id_sucursal.'"';
		mysql_query($q1)or die(mysql_error());
	}else{
		$array_nventa=mysql_fetch_array($result);
		$numero_venta=$array_nventa["numero"];
	}	
	
return $numero_venta;
}
#-----------------------------------------


#-----------------------------------------
function incrementa_n_venta($id_sucursal){
	$query='select * from numero_venta where id_sucursal="'.$id_sucursal.'"';
	$result=mysql_query($query) or die(mysql_error());
	$array_nventa=mysql_fetch_array($result);
	$numero_venta=$array_nventa["numero"];
	$q1='update numero_venta set numero="'.( $numero_venta + 1 ).'" where  id_sucursal="'.$id_sucursal.'"';
	mysql_query($q1)or die(mysql_error());
	return $numero_venta;
}
#-----------------------------------------




#-------------------------------------------------------------------------------------------------
function insert_or_update_ventas_temp_valores($array){
	$q1='select * from ventas_temp_valores where id_session="'.$array["id_session"].'" and id="'.$array["id"].'"';
	$r1=mysql_num_rows(mysql_query($q1));
	if($r1==1){
		$q='update ventas_temp_valores set valor="'.$array["valor"].'" where id_session="'.$array["id_session"].'" and id="'.$array["id"].'"';
	}
	if($r1>1){
		$q='delete from ventas_temp_valores where id_session="'.$array["id_session"].'" and id="'.$array["id"].'"';
		mysql_query($q);
		$q='insert ventas_temp_valores set valor="'.$array["valor"].'",
																				id_session="'.$array["id_session"].'",
																				id="'.$array["id"].'",
																				descripcion="'.$array["descripcion"].'"
																				';
	}
	if($r1<1){
		$q='insert ventas_temp_valores set valor="'.$array["valor"].'",
																				id_session="'.$array["id_session"].'",
																				id="'.$array["id"].'",
																				descripcion="'.$array["descripcion"].'"
																				';
	}
	
}//end function



#------------------------------------------------------------------------------------------------- -------------------------------------------------------------------------------------------------
function get_ventas_temp_valores($id_session,$id){
	$q1='select valor from ventas_temp_valores where id_session="'.$array["id_session"].'" and id="'.$array["id"].'"';
	$r1=mysql_query($q1);
	$array=mysql_fetch_array($r1);
	return $array["valor"];
}//end function
#-------------------------------------------------------------------------------------------------

#---------------------------------------------------------------------------
#funcion para calcular y verificar el numero de autorizacion
function verifica_autorizacion($numero){
		
		$cod_descuento=get_valor(8);
		$crc32_valor=crc32($cod_descuento);
		$crc32=crc32($numero);
		
		//echo "b: ".$cod_descuento."<br>";
		//echo "a: ".$crc32_valor."<br>";
		//echo "c: ".$numero."<br>";
		//exit;
		
		if($crc32_valor==$numero){
			return 1;
		}else{
			return 0;
		}
}
#---------------------------------------------------------------------------



#---------------------------------------------------------------------------
function trae_totales_presupuesto_franquicia($numero_envio){
	$q='select sum(cantidad * contado) as tot,  
				(sum(cantidad * contado) - sum(((cantidad * contado) * 30) / 100)) as descuento
            from stock_movimiento_interno
			where numero_envio="'.$numero_envio.'"';
    // echo "<td>".$q."</td>";
    $res=mysql_query($q);
    if(mysql_error()){
        echo "<td>".mysql_error()."</td>";
    }
    // echo "<td>rows: ".mysql_num_rows($res)."</td>";
	// $array=mysql_fetch_array($res);
    $array[0]=mysql_result($res,0,0);
    $array[1]=mysql_result($res,0,1);

    $a=array("total" => round($array[0],0),
    "descuento" => round($array[1],0)
    );
    // echo "<td>a:".print_r($a,true)."</td>";

	return $a;
}
#---------------------------------------------------------------------------


?>
