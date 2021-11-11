<?php





#------------------------------------------------
function acumulado_mes2( $fecha, $sucursal ){
	$aa=explode("-",$fecha);
	$mes=$aa[1];
	if($mes>0 AND $mes< 10){
		$mes="0".$mes;
	}
	$bb=$aa[0]."-".$mes;
	//$q='select sum( cantidad * precio_unitario ) from ventas where fecha >= "'.$bb.'01" and fecha <= "'.$bb.'31" and sucursal="'.$sucursal.'"';
	$q='select sum( cantidad * precio_unitario ) from ventas where fecha >= "'.$bb.'-01" and fecha <= "'.$bb.'-31" ';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	//return $q;
	return $total;
}
#------------------------------------------------



#------------------------------------------------
function trae_gastos_total_ant( $fecha, $sucursal){
	$aa=explode("-",$fecha);
	$mes=$aa[1] -1;
	if($mes>0 AND $mes< 10){
		$mes="0".$mes;
	}
	$bb=$aa[0]."-".( $mes);
	$q='select sum(monto) from gastos.gastos where fecha >= "'.$bb.'-01" and fecha <= "'.$bb.'-31"';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	//return $q;
	//echo $q;
return $total;
}	
#------------------------------------------------


#------------------------------------------------
function suma_z( $fecha){
	$q='select sum(importe) from reportes_caja where fecha ="'.$fecha.'" and ( motivo ="ZM" or motivo ="ZT")';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	//return $q;
	//echo $q;
return $total;
}	
#------------------------------------------------



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
function rentabilidad( $sucursal, $fecha_desde, $fecha_hasta ){
	$query='select sum(  (cantidad * precio_unitario) - ( cantidad * costo) ) from ventas where sucursal="'.$sucursal.'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"';
	$result=mysql_query($query)or die(mysql_error());
	$total=mysql_result($result,0);	
return $total;
}				
#-----------------------------------------------------------------

function sumafecha ($suma,$fechaInicial)
{
  $fecha = !empty($fechaInicial) ? $fechaInicial : date('Y-m-d'); 
  $nuevaFecha = strtotime ($suma , strtotime ( $fecha ) ) ;
  $nuevaFecha = date ( 'Y-m-d' , $nuevaFecha );
  return $nuevaFecha;
}

#------------------------------------------------
function trae_total_z( $fecha, $sucursal , $z){
	
	$aa=explode("-",$fecha);

	$mes=$aa[1];
	if($mes>0 AND $mes< 10){
		$mes="0".$mes;
	}
	
	$bb=$aa[0]."-".( $mes);
	
	//$q='select sum(importe) from reportes_caja where fecha>="'.$bb.'-01" and fecha<="'.$bb.'-31" and sucursal="'.$sucursal.'" and ( motivo="ZM" or motivo="ZT")';
	$q='select sum(importe) from reportes_caja where fecha>="'.$bb.'-01" and fecha<="'.$bb.'-31" and sucursal="'.$sucursal.'"';
	//echo $q;
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	//echo $q;
	//return $q;
return $total;
}	
#------------------------------------------------


#------------------------------------------------
function trae_total_z_todas( $fecha, $sucursal , $z){
	
	$aa=explode("-",$fecha);

	$mes=$aa[1];
	if($mes>0 AND $mes< 10){
		$mes="0".$mes;
	}
	
	$bb=$aa[0]."-".( $mes);
	
	//$q='select sum(importe) from reportes_caja where fecha>="'.$bb.'-01" and fecha<="'.$bb.'-31" and sucursal="'.$sucursal.'" and ( motivo="ZM" or motivo="ZT")';
	$q='select sum(importe) from reportes_caja where fecha>="'.$bb.'-01" and fecha<="'.$bb.'-31" ';
	//echo $q;
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	//echo $q;
	//return $q;
return $total;
}	
#------------------------------------------------


#------------------------------------------------
function trae_z( $fecha, $sucursal , $z){
	$q='select importe from reportes_caja where fecha ="'.$fecha.'" and sucursal="'.$sucursal.'" and motivo="'.$z.'"';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	//echo $q;
	//return $q;
return $total;
}	
#------------------------------------------------




?>