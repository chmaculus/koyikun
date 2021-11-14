<?php



$zz=($acum_mes * 100) / $acum_mes_ant; 
$cli=calcula_total_clientes( $fecha, $sucursal );
$toto=calcula_total_total( $fecha );




////////////////////////////////
echo '<table class="t1">';
echo "<tr>";
echo "<td>";
echo '<table class="t1">';
	echo '<tr class="especial4" id="especial4">';
echo "<td>Total dia</td><td>".$toto."</td>";
echo '</tr>';


#-----------------------------------
$acum_mes=acumulado_mes2($fecha , $row["sucursal"]);
echo '<tr class="especial" id="especial">';
echo "<td>ACT</td><td>".$acum_mes."</td>";

//$acum_mes_anioa=acumulado_mes2_anioa( $fecha, $sucursal );

$acum_mes_anioaa=acumulado_menos_un_anio($fecha , $row["sucursal"]);
echo "<td>ACT -1 Y</td><td>".$acum_mes_anioaa."</td>";
echo "<td>".round(( $acum_mes / $acum_mes_anioaa),2)."</td>";

echo '</tr>';
#-----------------------------------



#-----------------------------------
$mes_anio_anterior= acumulado_mes2_anio($fecha, $sucursal);
echo '<tr>';

$acum_mes_ant=acumulado_mes_anterior2($fecha , $row["sucursal"]);
echo "<td>ANT</td><td>".$acum_mes_ant."</td>";


$acumulado_menos_mes_anio=acumulado_menos_mes_anio($fecha , $row["sucursal"]);
echo "<td>ANT Year</td><td>".$acumulado_menos_mes_anio."</td>";
echo "<td>".round(($acum_mes_ant / $acumulado_menos_mes_anio),2)."</td>";
echo '</tr>';
#-----------------------------------



	echo '<tr class="especial2" id="especial2">';
echo "<td>COM</td><td>".round($zz,2)."%</td>";
echo '</tr>';

$za1=calcula_total_dias_todas($fecha);
echo '<tr>';
echo "<td>AcuDi</td><td>".$za1."</td>";
echo '</tr>';

$proy=round((($acum_mes / $za1) * 26),2);
echo '<tr>';
echo "<td>Proy</td><td>".$proy."</td>";
echo '</tr>';

$com2=round(($proy / $acum_mes_ant),2);
		echo '<tr class="especial3" id="especial3">';
echo "<td>Com2</td><td>".$com2."</td>";
echo '</tr>';

echo '<tr>';
echo "<td>Tcli</td><td>".$cli."</td>";
echo '</tr>';

echo '<tr>';
echo "<td>Vtk</td><td>".round(($toto / $cli),2)."</td>";
echo '</tr>';

echo '<tr>';
echo "<td>T.Gast</td><td>".round(trae_gastos_total( $fecha, $sucursal),2)."</td>";
echo '</tr>';

echo '<tr>';
echo "<td>T.Gast Ant</td><td>".round(trae_gastos_total_ant( $fecha, $sucursal),2)."</td>";
echo '</tr>';

echo '<tr>';
echo "<td>T.Z</td><td>".round(suma_z($fecha),2)."</td>";
echo '</tr>';

		echo '<tr class="especial3" id="especial3">';
echo "<td>T.Z ACU</td><td>".trae_total_z_todas( $fecha, $sucursal , $z)."</td>";
echo '</tr>';


#-------------------------------------------
$qa='select sum(valor) from cuota_alquiler';
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
//echo "-2: ".$query."<br>";
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








##   1 actual 
#-------------------------------------------

$query='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$fecha_desde.'" and fecha_vencimiento<="'.$fecha_hasta.'" and cuenta!="Proyeccion"';
//echo "zaza: ".$query."<br>";
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
	//echo $query."<br>";
	$ra=mysql_query($qa);

	if(mysql_error()){
        	echo mysql_error();
	}
	$ta=mysql_fetch_array($ra);
	#------------------------------------------------------------------------------------------------------------------------------------------------------


	#------------------------------------
	$qaa='select sum(importe) from gastos.banco where fecha_vencimiento>="'.$fecha_desde.'" and fecha_vencimiento<="'.$fecha_hasta.'"  and cobrado="S"  and cuenta!="Proyeccion"';
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

echo	"<tr>";
echo	"<td>S:</td><td>".$saldo."</td>";
echo  "</tr>";


echo "</td>";
echo "</table>";


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
	echo '<td>'.$q.'</td>';
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
	echo '<td>'.$q.'</td>';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	//return $q;
	//echo "acumulado_menos_mes_anio: ".$q." t:". $total."<br>";
return $total;
}	
#------------------------------------------------



?>