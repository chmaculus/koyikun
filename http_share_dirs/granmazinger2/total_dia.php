<?php

include("cabecera.inc.php");
//include("../includes/funciones_varias.php");
include_once("./includes/funciones_varias.inc.php");
include_once("./includes/funciones_tabla_gastos.php");
include_once("./includes/funciones_vendedor.php");
include_once("./includes/funciones_sucursal.php");
include_once("./includes/funciones_calculo.php");

include("connect.php");

$mes_anio=date("Y-n");
$fecha_desde=$mes_anio."-01";
$fecha_hasta=$mes_anio."-31";

echo '<center>';

#-------------------------------------------------------------------------------
#trae acumulado mes
$q='select sum(cantidad * Precio_unitario) from ventas where fecha>="'.$mes_anio.'-01" and fecha<="'.$mes_anio.'-31"';
$res=mysql_query($q);
$total_acum_mes=mysql_result($res,0,0);
#-------------------------------------------------------------------------------



#-------------------------------------------------------------------------------
#trae acumulado anterior
$mes_ant=($mes-1);
if($mes==0){$mes=12;}
$q='select sum(cantidad * Precio_unitario) from ventas where fecha>="'.$anio.'-'.$mes_ant.'-01" and fecha<="'.$anio.'-'.$mes_ant.'-31"';
$res=mysql_query($q);
$total_acum_mes_ant=mysql_result($res,0,0);
$acum_mes_ant=$total_acum_mes_ant;
#-------------------------------------------------------------------------------


$saldo=get_saldo();



$zz=($acum_mes * 100) / $acum_mes_ant; 
$cli=calcula_total_clientes( $fecha, $sucursal );
$toto=calcula_total_total( $fecha );



#-------------------------------------------
#cotizacion dolar
$dolar=mysql_result(mysql_query('select valor from gastos.valores where id="1"'),0,0);
#-------------------------------------------


#-------------------------------------------
#cotizacion chileno
$chileno=mysql_result(mysql_query('select valor from gastos.valores where id="2"'),0,0);
#-------------------------------------------





////////////////////////////////
echo '<table class="t1">';
echo "<tr>";



echo "<td>";
echo '<table class="t1">';



echo '<tr>';
echo "<td>COTUS</td><td>".round($dolar,2)."</td>";
echo '</tr>';

echo '<tr>';
echo "<td>COTCHI</td><td>".$chileno."</td>";
echo '</tr>';




#-------------------------------------------
$qa='select sum(valor) from gastos.cuota_alquiler';
$arr=mysql_fetch_array(mysql_query($qa));
$tinflu=($arr[0] * 100) / $acum_mes_ant;
#-------------------------------------------
echo '<tr>';
echo "<td>A influ TT</td><td>".round($tinflu,2)."</td>";
echo '</tr>';



##   menos 2  mes 
#-------------------------------------------
$desde=sumafecha("-2 month",$fecha_desde);
$hasta=sumafecha("-2 month",$fecha_hasta);

$aabb=explode("-",$desde);
$anio=$aabb[0];
$mes=$aabb[1];
//$fecha->add(new DateInterval('P10D'));

//$fecha->add(new DateInterval('P10D'));

$query='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$desde.'" and fecha_vencimiento<="'.$anio.'-'.$mes.'-31" and cuenta!="Proyeccion"';
#echo "-2: ".$query."<br>";
$result=mysql_query($query);

if(mysql_error()){
	echo mysql_error();
}
$tot=mysql_fetch_array($result);


	#------------------------------------
	$qa='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$desde.'" and fecha_vencimiento<="'.$hasta.'"  and cobrado="N"';
#	echo $query."<br>";
	$ra=mysql_query($qa);

	if(mysql_error()){
        	echo mysql_error();
	}
	$ta=mysql_fetch_array($ra);
	#------------------------------------------------------------------------------------------------------------------------------------------------------



	#------------------------------------
	$qaa='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$desde.'" and fecha_vencimiento<="'.$hasta.'"  and cobrado="S"  and cuenta!="Proyeccion"';
#	echo $qaa."<br>";
	$raa=mysql_query($qaa);

	if(mysql_error()){
        	echo mysql_error();
	}
	$taa=mysql_fetch_array($raa);
	#------------------------------------

$pa_t=$pa_t+$taa[0];
$pe_t=$pe_t+$ta[0];

echo '<tr>';
echo '<td>CHE '.$mes."-".$anio.'</td><td>'.round($tot[0],2).'</td>';
	echo "<td>PA:</td><td>".round($taa[0],2)."</td>";
echo "<td>PE:</td><td>".round($ta[0],2)."</td>";
echo '</tr>';
#-------------------------------------------



##   menos un  1  mes 
#-------------------------------------------
$desde=sumafecha("-1 month",$fecha_desde);
$hasta=sumafecha("-1 month",$fecha_hasta);

$aabb=explode("-",$desde);
$anio=$aabb[0];
$mes=$aabb[1];
//$fecha->add(new DateInterval('P10D'));

//$fecha->add(new DateInterval('P10D'));

$query='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$desde.'" and fecha_vencimiento<="'.$anio.'-'.$mes.'-31" and cuenta!="Proyeccion"';

#echo "zaza: ".$query."<br>";
$result=mysql_query($query);

if(mysql_error()){
	echo mysql_error();
}
$tot=mysql_fetch_array($result);


	#------------------------------------
	$qa='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$desde.'" and fecha_vencimiento<="'.$hasta.'"  and cobrado="N"';
#	echo $query."<br>";
	$ra=mysql_query($qa);

	if(mysql_error()){
        	echo mysql_error();
	}
	$ta=mysql_fetch_array($ra);
	#------------------------------------------------------------------------------------------------------------------------------------------------------


	#------------------------------------
	$qaa='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$desde.'" and fecha_vencimiento<="'.$hasta.'"  and cobrado="S"  and cuenta!="Proyeccion"';
#	echo "aacc1".$qaa."<br>";
	$raa=mysql_query($qaa);

	if(mysql_error()){
        	echo mysql_error();
	}
	$taa=mysql_fetch_array($raa);
	#------------------------------------

$pa_t=$pa_t+$taa[0];
$pe_t=$pe_t+$ta[0];


echo '<tr>';
echo '<td>CHE '.$mes."-".$anio.'</td><td>'.round($tot[0],2).'</td>';
	echo "<td>PA:</td><td>".round($taa[0],2)."</td>";
	echo "<td>PE:</td><td>".round($ta[0],2)."</td>";
echo '</tr>';
#-------------------------------------------








##   1 actual 
#-------------------------------------------

$query='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$fecha_desde.'" and fecha_vencimiento<="'.$fecha_hasta.'" and cuenta!="Proyeccion"';
#echo "zaza: ".$query."<br>";
$result=mysql_query($query);

if(mysql_error()){
	echo mysql_error();
}
$aabb=explode("-",$fecha_desde);
$anio=$aabb[0];
$mes=$aabb[1];
//$fecha->add(new DateInterval('P10D'));
$tot=mysql_fetch_array($result);



	#------------------------------------
	$qa='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$fecha_desde.'" and fecha_vencimiento<="'.$fecha_hasta.'"  and cobrado="N"';
	
	#echo "jejeje1 ".$query."<br>";
	$ra=mysql_query($qa);

	if(mysql_error()){
        	echo mysql_error();
	}
	$ta=mysql_fetch_array($ra);
	#------------------------------------------------------------------------------------------------------------------------------------------------------


	#------------------------------------
	$qaa='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$fecha_desde.'" and fecha_vencimiento<="'.$fecha_hasta.'"  and cobrado="S"  and cuenta!="Proyeccion"';
#	echo "jejeje2 ".$query."<br>";
	$raa=mysql_query($qaa);

	if(mysql_error()){
        	echo mysql_error();
	}
	$taa=mysql_fetch_array($raa);
	#------------------------------------

$pa_t=$pa_t+$taa[0];
$pe_t=$pe_t+$ta[0];



echo '<tr>';
echo '<td>CHE '.$mes."-".$anio.'</td><td>'.round($tot[0],2).'</td>';
	echo "<td>PA:</td><td>".round($taa[0],2)."</td>";
	echo "<td>PE:</td><td>".round($ta[0],2)."</td>";
echo '</tr>';
#-------------------------------------------



##   mas un  1  mes 
#-------------------------------------------

$desde=sumafecha("1 month",$fecha_desde);
$hasta=sumafecha("1 month",$fecha_hasta);

$aabb=explode("-",$desde);
$anio=$aabb[0];
$mes=$aabb[1];
//$fecha->add(new DateInterval('P10D'));

//$fecha->add(new DateInterval('P10D'));

$query='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$desde.'" and fecha_vencimiento<="'.$anio.'-'.$mes.'-31" and cuenta!="Proyeccion"';
//echo "zaza: ".$query."<br>";
$result=mysql_query($query);

if(mysql_error()){
	echo mysql_error();
}
$tot=mysql_fetch_array($result);

	#------------------------------------
	$qa='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$desde.'" and fecha_vencimiento<="'.$hasta.'"  and cobrado="N"';
	#echo "zazaza2".$query."<br>";
	$ra=mysql_query($qa);

	if(mysql_error()){
        	echo mysql_error();
	}
	$ta=mysql_fetch_array($ra);
	#------------------------------------------------------------------------------------------------------------------------------------------------------

	#------------------------------------
	$qaa='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$desde.'" and fecha_vencimiento<="'.$hasta.'"  and cobrado="S"  and cuenta!="Proyeccion"';
	$raa=mysql_query($qaa);

	if(mysql_error()){
        	echo mysql_error();
	}
	$taa=mysql_fetch_array($raa);
	#------------------------------------

$pa_t=$pa_t+$taa[0];
$pe_t=$pe_t+$ta[0];


echo '<tr>';
echo '<td>CHE '.$mes."-".$anio.'</td><td>'.round($tot[0],2).'</td>';
	echo "<td>PA:</td><td>".round($taa[0],2)."</td>";
	echo "<td>PE:</td><td>".round($ta[0],2)."</td>";
echo '</tr>';
#-------------------------------------------



##   mas un  2  mes 
#-------------------------------------------
$desde=sumafecha("2 month",$fecha_desde);
$hasta=sumafecha("2 month",$fecha_hasta);

$aabb=explode("-",$desde);
$anio=$aabb[0];
$mes=$aabb[1];
//$fecha->add(new DateInterval('P10D'));

$query='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$desde.'" and fecha_vencimiento<="'.$anio.'-'.$mes.'-31" and cuenta!="Proyeccion"';
//echo "zaza: ".$query."<br>";
$result=mysql_query($query);

if(mysql_error()){
	echo mysql_error();
}
$tot=mysql_fetch_array($result);


	#------------------------------------
	$qa='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$desde.'" and fecha_vencimiento<="'.$hasta.'"  and cobrado="N"';
	//echo $query."<br>";
	$ra=mysql_query($qa);

	if(mysql_error()){
        	echo mysql_error();
	}
	$ta=mysql_fetch_array($ra);
	#------------------------------------------------------------------------------------------------------------------------------------------------------

	#------------------------------------
	$qaa='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$desde.'" and fecha_vencimiento<="'.$hasta.'"  and cobrado="S"  and cuenta!="Proyeccion"';
	$raa=mysql_query($qaa);

	if(mysql_error()){
        	echo mysql_error();
	}
	$taa=mysql_fetch_array($raa);
	#------------------------------------

$pa_t=$pa_t+$taa[0];
$pe_t=$pe_t+$ta[0];


echo '<tr>';
echo '<td>CHE '.$mes."-".$anio.'</td><td>'.round($tot[0],2).'</td>';
	echo "<td>PA:</td><td>".round($taa[0],2)."</td>";
	echo "<td>PE:</td><td>".round($ta[0],2)."</td>";
echo '</tr>';
#-------------------------------------------



##   mas un  3  mes 
#-------------------------------------------
$desde=sumafecha("3 month",$fecha_desde);
$hasta=sumafecha("3 month",$fecha_hasta);

$aabb=explode("-",$desde);
$anio=$aabb[0];
$mes=$aabb[1];
//$fecha->add(new DateInterval('P10D'));


//$fecha->add(new DateInterval('P10D'));

$query='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$desde.'" and fecha_vencimiento<="'.$anio.'-'.$mes.'-31" and cuenta!="Proyeccion"';
//echo "zaza: ".$query."<br>";
$result=mysql_query($query);

if(mysql_error()){
	echo mysql_error();
}
$tot=mysql_fetch_array($result);

	#------------------------------------
	$qa='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$desde.'" and fecha_vencimiento<="'.$hasta.'"  and cobrado="N"';
	//echo $query."<br>";
	$ra=mysql_query($qa);

	if(mysql_error()){
        	echo mysql_error();
	}
	$ta=mysql_fetch_array($ra);
	#------------------------------------------------------------------------------------------------------------------------------------------------------

	#------------------------------------
	$qaa='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$desde.'" and fecha_vencimiento<="'.$hasta.'"  and cobrado="S"  and cuenta!="Proyeccion"';
	$raa=mysql_query($qaa);

	if(mysql_error()){
        	echo mysql_error();
	}
	$taa=mysql_fetch_array($raa);
	#------------------------------------


$pa_t=$pa_t+$taa[0];
$pe_t=$pe_t+$ta[0];

echo '<tr>';
echo '<td>CHE '.$mes."-".$anio.'</td><td>'.round($tot[0],2).'</td>';
	echo "<td>PA:</td><td>".round($taa[0],2)."</td>";
	echo "<td>PE:</td><td>".round($ta[0],2)."</td>";
echo '</tr>';
#-------------------------------------------




##   mas un  4  mes 
#-------------------------------------------
$desde=sumafecha("4 month",$fecha_desde);
$hasta=sumafecha("4 month",$fecha_hasta);

$aabb=explode("-",$desde);
$anio=$aabb[0];
$mes=$aabb[1];
//$fecha->add(new DateInterval('P10D'));

//$fecha->add(new DateInterval('P10D'));

$query='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$desde.'" and fecha_vencimiento<="'.$anio.'-'.$mes.'-31" and cuenta!="Proyeccion"';
//echo "zaza: ".$query."<br>";
$result=mysql_query($query);

if(mysql_error()){
	echo mysql_error();
}
$tot=mysql_fetch_array($result);


	#------------------------------------
	$qa='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$desde.'" and fecha_vencimiento<="'.$hasta.'"  and cobrado="N"';
	//echo $query."<br>";
	$ra=mysql_query($qa);

	if(mysql_error()){
        	echo mysql_error();
	}
	$ta=mysql_fetch_array($ra);
	#------------------------------------------------------------------------------------------------------------------------------------------------------

	#------------------------------------
	$qaa='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$desde.'" and fecha_vencimiento<="'.$hasta.'"  and cobrado="S"  and cuenta!="Proyeccion"';
	$raa=mysql_query($qaa);

	if(mysql_error()){
        	echo mysql_error();
	}
	$taa=mysql_fetch_array($raa);
	#------------------------------------


$pa_t=$pa_t+$taa[0];
$pe_t=$pe_t+$ta[0];

echo '<tr>';
echo '<td>CHE '.$mes."-".$anio.'</td><td>'.round($tot[0],2).'</td>';
	echo "<td>PA:</td><td>".round($taa[0],2)."</td>";
	echo "<td>PE:</td><td>".round($ta[0],2)."</td>";
echo '</tr>';
#-------------------------------------------




///////totales
#-------------------------------------------
echo '<tr>';
echo '<td></td><td></td>';
	echo "<td>T PA:</td><td>".round($pa_t,2)."</td>";
	echo "<td>T PE:</td><td>".round($pe_t,2)."</td>";
echo '</tr>';

#-------------------------------------------



$sBANK=trae_valor2("sBANK");
$ResEFE=trae_valor2("ResEFE");
$SS=trae_valor2("SS");
$Ch=trae_valor2("Ch");
$Doc=trae_valor2("Doc");
$Cheq=trae_valor2("cheq");

$TotalRES= $sBANK + $ResEFE + $SS + $Ch + $Doc + $Cheq + $saldo; 



echo "</td>";

echo '<td>';
//include_once("comparativos.php");
echo '</td>';

echo "</table>";












#-----------------------------------------------------------------------------------------------------------------
#valores R

$arrayr1=mysql_fetch_array(mysql_query('select * from gastos.valoresr where r="r1"'));
$arrayr2=mysql_fetch_array(mysql_query('select * from gastos.valoresr where r="r2"'));
$arrayr3=mysql_fetch_array(mysql_query('select * from gastos.valoresr where r="r3"'));



echo '<table border="1">';
 echo '<tr>';
	echo '<td></th>';
	echo '<td class="special1">R1</th>';
	echo '<td class="special1">R2</th>';
	echo '<td class="special1">R3</th>';
 echo '</tr>';

 echo '<tr>';
	 echo '<td class="special1">E</td>';
	 echo '<td>'.$arrayr1["2"].'</td>';
	 echo '<td>'.$arrayr2["2"].'</td>';
	 echo '<td>'.$arrayr3["2"].'</td>';
 echo '</tr>';
 
 echo '<tr>';
	 echo '<td class="special1">COTUS</td>';
	 $u1=($arrayr1["9"] * $dolar);
	 $u2=($arrayr2["9"] * $dolar);
	 $u3=($arrayr3["9"] * $dolar);
	 echo '<td>'.$u1.'</td>';
	 echo '<td>'.$u2.'</td>';
	 echo '<td>'.$u3.'</td>';
 echo '</tr>';
 
 echo '<tr>';
	 echo '<td class="special1">COTCHI</td>';
	 $c1=($arrayr1["8"] * $chileno);
	 $c2=($arrayr2["8"] * $chileno);
	 $c3=($arrayr3["8"] * $chileno);
	 echo '<td>'.$c1.'</td>';
	 echo '<td>'.$c2.'</td>';
	 echo '<td>'.$c3.'</td>';
 echo '</tr>';
 
 echo '<tr>';
	 echo '<td class="special1">S1</td>';
	 echo '<td>'.$arrayr1["3"].'</td>';
	 echo '<td>'.$arrayr2["3"].'</td>';
	 echo '<td>'.$arrayr3["3"].'</td>';
 echo '</tr>';
 
 echo '<tr>';
	 echo '<td class="special1">S2</td>';
	 echo '<td>'.$arrayr1["4"].'</td>';
	 echo '<td>'.$arrayr2["4"].'</td>';
	 echo '<td>'.$arrayr3["4"].'</td>';
 echo '</tr>';
 
 echo '<tr>';
	 echo '<td class="special1">S3</td>';
	 echo '<td>'.round($arrayr1["5"],2).'</td>';
	 echo '<td>'.round($arrayr2["5"],2).'</td>';
	 echo '<td>'.round($arrayr3["5"],2).'</td>';
 echo '</tr>';
 
 echo '<tr>';
	 echo '<td class="special1">T</td>';
	 $t1=($arrayr1[2] + $arrayr1[3] + $arrayr1[4] + $arrayr1[5] + $u1 + $c1);
	 $t2=($arrayr2[2] + $arrayr2[3] + $arrayr2[4] + $arrayr2[5] + $u2 + $c2);
	 $t3=($arrayr3[2] + $arrayr3[3] + $arrayr3[4] + $arrayr3[5] + $u3 + $c3);
	 echo '<td>'.$t1.'</td>';
	 echo '<td>'.$t2.'</td>';
	 echo '<td>'.$t3.'</td>';
 echo '</tr>';
 
 echo '<tr>';
	 echo '<td class="special1">Super T</td>';
	 echo '<td>'.round(($t1 + $t2 + $t3),2).'</td>';
 echo '</tr>';
 
echo '</table>';
#valores R fin
#-----------------------------------------------------------------------------------------------------------------





























#------------------------------------------------
function acumulado_mes2_anioa( $fecha, $sucursal ){
	$aa=explode("-",$fecha);
	$mes=$aa[1];
	$anio=$aa[0];
	if($mes>0 AND $mes< 10){
		//$mes="0".$mes;
	}
	$anio=($anio -1);
	$bb=$anio.'-'.$mes;
	//$q='select sum( cantidad * precio_unitario ) from ventas where fecha >= "'.$bb.'01" and fecha <= "'.$bb.'31" and sucursal="'.$sucursal.'"';
	$q='select sum( cantidad * precio_unitario ) from ventas where fecha >= "'.$bb.'-01" and fecha <= "'.$bb.'-31" ';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	//return $q;
	//$total["total"]=$total;
	//$total["query"]=$q;
	echo "acumulado_mes2_anioa: ".$q." t:". $total."<br>";
	return $total;
	
}
#------------------------------------------------

#------------------------------------------------
function acumulado_mes2_anio( $fecha, $sucursal ){
	$aa=explode("-",$fecha);
	$mes=$aa[1];
	if($mes>0 AND $mes< 10){
		//$mes="0".$mes;
	}
	$anio=$aa[0];
	$anio=$anio -1;
	$bb=$anio."-".$mes;
	//$q='select sum( cantidad * precio_unitario ) from ventas where fecha >= "'.$bb.'01" and fecha <= "'.$bb.'31" and sucursal="'.$sucursal.'"';
	$q='select sum( cantidad * precio_unitario ) from ventas where fecha >= "'.$bb.'-01" and fecha <= "'.$bb.'-31" ';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	//return $q;
	return $total;
}
#------------------------------------------------

#------------------------------------------------
function acumulado_mes_anterior2( $fecha, $sucursal ){
	$epoch=strtotime($fecha);
	$nuevafecha = strtotime ( '-1 month' , strtotime ( $fecha ) ) ;

	$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
	$aa=explode("-",$nuevafecha);

	$mes=$aa[1];
	if($mes>0 AND $mes< 10){
	//	$mes="0".$mes;
	}
	
	$bb=$aa[0]."-".( $mes);
	$q='select sum( cantidad * precio_unitario ) from ventas where fecha >= "'.$bb.'-01" and fecha <= "'.$bb.'-31" ';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	//return $q;
	//echo "acumulado_mes_anterior2: ".$q." t:". $total."<br>";
return $total;
}	
#------------------------------------------------

#------------------------------------------------
function acumulado_menos_un_anio( $fecha, $sucursal ){
	$epoch=strtotime($fecha);
	$nuevafecha = strtotime ( '-1 year' , strtotime ( $fecha ) ) ;

	$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
	$aa=explode("-",$nuevafecha);

	$mes=$aa[1];
	if($mes>0 AND $mes< 10){
	//	$mes="0".$mes;
	}
	
	$bb=$aa[0]."-".( $mes);
	$q='select sum( cantidad * precio_unitario ) from ventas where fecha >= "'.$bb.'-01" and fecha <= "'.$bb.'-31" ';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	//return $q;
	//echo "acumulado_menos_un_anio: ".$q." t:". $total."<br>";
return $total;
}	
#------------------------------------------------


#------------------------------------------------
function acumulado_menos_mes_anio( $fecha, $sucursal ){
	$epoch=strtotime($fecha);
	$nf1 = strtotime ( '-1 year' , strtotime ( $fecha ) ) ;

	$nuevafecha = strtotime ( '-1 month' ,  $nf1  ) ;

	$nuevafecha2 = date ( 'Y-m-j' , $nuevafecha );
	$aa=explode("-",$nuevafecha2);

	$mes=$aa[1];
	if($mes>0 AND $mes< 10){
	//	$mes="0".$mes;
	}
	
	$bb=$aa[0]."-".( $mes);
	$q='select sum( cantidad * precio_unitario ) from ventas where fecha >= "'.$bb.'-01" and fecha <= "'.$bb.'-31" ';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	//return $q;
	//echo "acumulado_menos_mes_anio: ".$q." t:". $total."<br>";
return $total;
}	
#------------------------------------------------



?>