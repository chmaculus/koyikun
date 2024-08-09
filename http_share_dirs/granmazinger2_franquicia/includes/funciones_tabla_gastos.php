<?php

#-------------------------------------------------
function trae_valor($anio,$mes,$tipo) {
	if($mes>=1 AND $mes<=9 ){
		$mes1="0".$mes;
	}else{
		$mes1=$mes;
	}
	$q='select * from gastos.datos_banco where (anio_mes like "'.$anio."-".$mes1.'%" or anio_mes like "'.$anio."-".$mes.'%") and tipo="'.$tipo.'"';
	echo "<td>".$q."</td>";
	$res=mysql_query($q);
	if(mysql_error()){
		echo mysql_error();
	}
	$array=mysql_fetch_array($res);
	return $array["valor"];
}
#-------------------------------------------------

#-------------------------------------------------
function trae_valor2($tipo) {
	if($mes>=1 AND $mes<=9 ){
		$mes1="0".$mes;
	}
	$q='select * from gastos.datos_banco where tipo="'.$tipo.'"';
	//echo $q."<br>";
	$res=mysql_query($q);
	if(mysql_error()){
		echo mysql_error();
	}
	$array=mysql_fetch_array($res);
//	echo "valor: ".$tipo." ".$array["valor"]."<br>";
	//echo "q: ".$q."<br>";
	return $array["valor"];
}

#-------------------------------------------------



#-------------------------------------------------
function get_saldo(){
    $q='select * from gastos.gastos order by fecha2 desc, hora desc limit 0,1';
    $r=mysql_query($q);
    $array=mysql_fetch_array($r);
    return $array["saldo"];
}
#-------------------------------------------------




#------------------------------------------------
function trae_gastos_sucursal( $fecha, $sucursal){
	$aa=explode("-",$fecha);
	$mes=$aa[1];
	if($mes>0 AND $mes< 10){
		$mes="0".$mes;
	}
	$bb=$aa[0]."-".$mes;
	$q='select sum(monto) from gastos.gastos where fecha >= "'.$bb.'-01" and fecha <= "'.$bb.'-31" and categoria="'.$sucursal.'"';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	//return $q;
return $total;
}	
#------------------------------------------------

#------------------------------------------------
function trae_gastos_sucursal_mes_ant( $fecha, $sucursal){
	$aa=explode("-",$fecha);
	$mes=$aa[1] -1;
	if($mes>0 AND $mes< 10){
		$mes="0".$mes;
	}
	$bb=$aa[0]."-".( $mes);
	$q='select sum(monto) from gastos.gastos where fecha >= "'.$bb.'-01" and fecha <= "'.$bb.'-31" and categoria="'.$sucursal.'"';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	//return $q;
return $total;
}	
#------------------------------------------------


#------------------------------------------------
function trae_gastos_total( $fecha, $sucursal){
	$aa=explode("-",$fecha);
	$mes=$aa[1];
	if($mes>0 AND $mes< 10){
		$mes="0".$mes;
	}
	$bb=$aa[0]."-".$mes;
	$q='select sum(monto) from gastos.gastos where fecha >= "'.$bb.'-01" and fecha <= "'.$bb.'-31"';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	//return $q;
	//echo $q;
return $total;
}	
#------------------------------------------------




?>