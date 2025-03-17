<?php

#------------------------------------------------
#EFECTIVO
#------------------------------------------------



#------------------------------------------------
function calcula_tot_ef( $fecha, $sucursal, $hora_desde, $hora_hasta ){
	$q='select sum( cantidad * precio_unitario ) from ventas where fecha="'.$fecha.'" and sucursal="'.$sucursal.'" and hora>="'.$hora_desde.'" and hora<="'.$hora_hasta.'" and tipo_pago="CO"';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	return $total;
}
#------------------------------------------------

#------------------------------------------------
function calcula_cantidad_ef( $fecha, $sucursal, $hora_desde, $hora_hasta ){
	$q='select distinct numero_venta from ventas where fecha="'.$fecha.'" and sucursal="'.$sucursal.'" and hora>="'.$hora_desde.'" and hora<="'.$hora_hasta.'" and tipo_pago="CO"';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_num_rows($result);
	return $total;
}
#------------------------------------------------






#------------------------------------------------
#TARJETA
#------------------------------------------------
#------------------------------------------------
function calcula_tot_tarj( $fecha, $sucursal, $hora_desde, $hora_hasta ){
	$q='select sum( cantidad * precio_unitario ) from ventas where fecha="'.$fecha.'" and sucursal="'.$sucursal.'" and hora>="'.$hora_desde.'" and hora<="'.$hora_hasta.'" and tipo_pago="TA"';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	return $total;
}
#------------------------------------------------

#------------------------------------------------
function calcula_cantidad_tarj( $fecha, $sucursal, $hora_desde, $hora_hasta ){
	$q='select distinct numero_venta from ventas where fecha="'.$fecha.'" and sucursal="'.$sucursal.'" and hora>="'.$hora_desde.'" and hora<="'.$hora_hasta.'" and tipo_pago="TA"';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_num_rows($result);
	return $total;
}
#------------------------------------------------




#------------------------------------------------
#DEBITO
#------------------------------------------------
#------------------------------------------------
function calcula_tot_debito( $fecha, $sucursal, $hora_desde, $hora_hasta ){
	$q='select sum( cantidad * precio_unitario ) from ventas where fecha="'.$fecha.'" and sucursal="'.$sucursal.'" and hora>="'.$hora_desde.'" and hora<="'.$hora_hasta.'" and tipo_pago="DE"';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	return $total;
}
#------------------------------------------------

#------------------------------------------------
function calcula_cantidad_debito( $fecha, $sucursal, $hora_desde, $hora_hasta ){
	$q='select distinct numero_venta from ventas where fecha="'.$fecha.'" and sucursal="'.$sucursal.'" and hora>="'.$hora_desde.'" and hora<="'.$hora_hasta.'" and tipo_pago="DE"';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_num_rows($result);
	return $total;
}
#------------------------------------------------




#------------------------------------------------
//total del dia
function calcula_total_total( $fecha ){
	$q='select sum( cantidad * precio_unitario ) from ventas where fecha="'.$fecha.'"';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	return $total;
}
#------------------------------------------------

#------------------------------------------------
function calcula_total_clientes_sucursal( $fecha, $sucursal ){
	$q='select distinct numero_venta from ventas where fecha="'.$fecha.'" and sucursal="'.$sucursal.'"';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_num_rows($result);
	return $total;
}
#------------------------------------------------


#------------------------------------------------
function calcula_total_clientes( $fecha, $sucursal ){
	$q='select distinct numero_venta,sucursal from ventas where fecha="'.$fecha.'" and sucursal!=88';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_num_rows($result);
	//return $q;
return $total;
}	
#------------------------------------------------


#------------------------------------------------
function calcula_total_dias_sucursal( $fecha, $sucursal ){
	$aa=explode("-",$fecha);
	$mes=$aa[1];
	if($mes>0 AND $mes< 10){
		$mes="0".$mes;
	}
	$bb=$aa[0]."-".$mes;
	$q='select distinct fecha from ventas where fecha >= "'.$bb.'-01" and fecha <= "'.$bb.'-31" and sucursal="'.$sucursal.'"';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_num_rows($result);
	//return $q;
return $total;
}	
#------------------------------------------------

#------------------------------------------------
function calcula_total_dias_todas( $fecha ){
	$aa=explode("-",$fecha);
	$mes=$aa[1];
	if($mes>0 AND $mes< 10){
		$mes="0".$mes;
	}
	$bb=$aa[0]."-".$mes;
	
	$q='select distinct fecha from ventas where fecha >= "'.$bb.'-01" and fecha <= "'.$bb.'-31" ';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_num_rows($result);
	//return $q;
return $total;
}	
#------------------------------------------------



#-----------------------------------------------------------------
function nombre_sucursal($id_sucursal){
	$query='select * from sucursales where id="'.$id_sucursal.'"';
	$array_suc=mysql_fetch_array(mysql_query($query));
return $array_suc["sucursal"];
}
#-----------------------------------------------------------------

#-----------------------------------------------------------------
function id_sucursal($sucursal){
	$query='select * from sucursales where sucursal="'.$sucursal.'"';
	$array_suc=mysql_fetch_array(mysql_query($query));
	
return $array_suc["id"];
}
#-----------------------------------------------------------------




#------------------------------------------------
function acumulado_mes( $fecha, $sucursal ){
	$aa=explode("-",$fecha);
	$mes=$aa[1];
	$bb=$aa[0]."-".$mes;
	$q='select sum( cantidad * precio_unitario ) from ventas where fecha >= "'.$bb.'-01" and fecha <= "'.$bb.'-31" and sucursal="'.$sucursal.'"';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	//echo "qacummes:".$q;
	//return $q;
	return $total;
}
#------------------------------------------------



#------------------------------------------------
function acumulado_mes_anterior( $fecha, $sucursal ){
    /*
	$epoch=strtotime($fecha);
	$aa=$epoch - ( 60 * 60 * 24 * 32);
	$nuevafecha = strtotime ( '-1 month' , strtotime ( $fecha ) ) ;
//	$aa=explode("-",$fecha);
	$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
*/ 
	$aa=explode("-",$fecha);

	$mes=$aa[1];
	$anio=$aa[0];
	$mes=$mes -1 ;
	if($mes==0){
		$mes=12;
		$anio=$anio -1;
	}

	$bb=$anio."-".( $mes);
	//$q='select sum( cantidad * precio_unitario ) from ventas where fecha >= "'.$bb.'01" and fecha <= "'.$bb.'31" and sucursal="'.$sucursal.'"';
	$q='select sum( cantidad * precio_unitario ) from ventas where fecha >= "'.$bb.'-01" and fecha <= "'.$bb.'-31"  and sucursal="'.$sucursal.'"';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	//return $q;
return $total;
}	

#------------------------------------------------




?>