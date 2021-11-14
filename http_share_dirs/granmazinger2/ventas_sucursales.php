<?php


include_once("cabecera2.inc.php");
include_once("./includes/funciones_varias.inc.php");
include_once("./includes/funciones_tabla_gastos.php");
include_once("./includes/funciones_vendedor.php");
include_once("./includes/funciones_sucursal.php");
include_once("./includes/funciones_calculo.php");
include_once("connect.php");





echo '<center>';

if($_POST["fecha"]){
	$fecha=fecha_conv( "/", $_POST["fecha"] );
}else{
	$fecha=date("Y-m-d");
}
$epoch=strtotime($fecha);


#-------------------------------------------------------------------------
$nuevafecha = strtotime ( '-1 month' ,  strtotime ( $fecha )  ) ;
//$nuevafecha = strtotime ( '-1 month' ,  $nuevafecha ) ;
$nuevafecha2 = date ( 'Y-m-j' , $nuevafecha );

$aa=explode("-",$nuevafecha2);
$mes=$aa[1];
$bb=$aa[0]."-".( $mes);

$q='select sum( cantidad * precio_unitario ) from ventas where fecha >= "'.$bb.'-01" and fecha <= "'.$bb.'-31" and sucursal!="157 AP OnLine"';
//echo 'q: '.$q."<br>";

$result=mysql_query($q)or die(mysql_error());
$total_mes_anterior_todas=mysql_result($result,0);
#-------------------------------------------------------------------------







$qqq='select sum(cantidad * precio_unitario) from ventas where fecha="'.$fecha.'" and sucursal!="157 AP OnLine" ';
$total_dia=mysql_result(mysql_query($qqq),0,0);


$zzaa=explode("-",$fecha);
$mes=$zzaa[1];
$anio=$zzaa[0];

$fecha_desde=$anio."-".$mes."-01";
$fecha_hasta=$anio."-".$mes."-31";






echo '<table class="t1">';
echo '<tr>';
echo '<form method="POST" action="'.$_SERVER["SCRIPT_NAME"].'">';
echo '<td>Fecha: <input type="text" name="fecha" id="fecha" size="10" value="'.fecha_conv( "-", $fecha ).'">';
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"></td>';
echo '</form>';

echo '<td>TTT</td>';
echo '<td><font size="3px"> '.round($total_dia,2 ).'</font></td>';
echo "</tr>".chr(13);

echo "</table>";






$days = array('Dom', 'Lun', 'Mar', 'Mie','Jue','Vie', 'Sab');
//echo date('Y-m-d', strtotime($days[$day], strtotime($date)));




#-----------------------------------------------------------
echo '<table><tr>';
echo '<td>';
include("includes_ventas/comparativos.php");
echo '</td>';

echo '<td>';
include("includes_ventas/meses_anteriores.php");
echo '</td>';

echo '<td>';
include("includes/responsable_preparado.inc.php");
echo '</td>';

echo '<td>';
include("includes_ventas/totales_acum_sucursales.inc.php");
echo '</td>';

echo '<td>';
include("ventas_listado_hora.php");
echo '</td>';

echo '</tr></table>';
#-----------------------------------------------------------









$saldo=get_saldo();

/*
#---------------------------------------------------------------------	
#muestra total
	echo '<tr class="especial2" id="especial2">';
	echo "</tr>".chr(13);
#---------------------------------------------------------------------	
*/


?>
<table border="1">
<?php

$qb='select distinct sucursal from ventas where fecha="'.$fecha.'" and sucursal!="157 AP OnLine" order by sucursal';
//echo "qb: ".$qb."<br>";

$resultb=mysql_query($qb);
while($rowab=mysql_fetch_array($resultb)){
	#------------------------------------------------
	# manana
	$hora_desde="08:00:00";
	$hora_hasta="14:00:00";

   $q='select sum( cantidad * precio_unitario ) from ventas where fecha="'.$fecha.'" and sucursal="'.$rowab["sucursal"].'" and hora>="'.$hora_desde.'" and hora<="'.$hora_hasta.'" ';
   $result=mysql_query($q)or die(mysql_error());
   $total_manana=mysql_result($result,0);
	#------------------------------------------------

	#------------------------------------------------
	# tarde
	$hora_desde="14:00:01";
	$hora_hasta="22:00:00";

   $q='select sum( cantidad * precio_unitario ) from ventas where fecha="'.$fecha.'" and sucursal="'.$rowab["sucursal"].'" and hora>="'.$hora_desde.'" and hora<="'.$hora_hasta.'" ';
   $result=mysql_query($q)or die(mysql_error());
   $total_tarde=mysql_result($result,0);
	#------------------------------------------------
		
		
                                


	#---------------------------------------------------------------	
	# MAÑANA
	#---------------------------------------------------------------	
	echo "	<td>";//abre sucursal

	$acum_mes=acumulado_mes($fecha , $rowab["sucursal"]);
	
	#---------------------------------------------------------------	
	include("turno.inc.php");	
	#---------------------------------------------------------------	


	
	#---------------------------------------------------------------	
	//include("ventas_hora.inc.php");	
	#---------------------------------------------------------------	
	
	
	echo "</td>";//tabla general
	
	#---------------------------------------------------------------	
	# FIN MAÑANA
	#---------------------------------------------------------------	

	$total_dia=$total_dia +( $total_manana + $total_tarde );
	$acum_mes=acumulado_mes($fecha , $rowab["sucursal"]);
	$total_acum_mes=$total_acum_mes + $acum_mes;
	
	$acum_mes_ant=acumulado_mes_anterior($fecha , $rowab["sucursal"]);
	$total_acum_mes_ant=$total_acum_mes_ant + $acum_mes_ant;

 $count++;
 if($count==8){
    echo '</tr><tr>';
 }
	echo chr(10);
}//end while



//echo '<td width="300" height="300">';
echo '<td>';
echo '<iframe src="ventas_franquicias.php"  width="190" height="370" scroling="no"></iframe>';
echo '</td>';

//echo '<td width="300" height="300">';
echo '<td>';
echo '<iframe src="ventas_online.php" width="190" height="370" scrolling="no"></iframe>';
echo '</td>';
echo "</table>".chr(10);
#--------------------------------------------------------------------------



//echo "<br>";

	
#------------------------------------------------
function acumulado_menos_un_anio( $fecha, $sucursal ){
        $epoch=strtotime($fecha);
        $nuevafecha = strtotime ( '-1 year' , strtotime ( $fecha ) ) ;

        $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
        $aa=explode("-",$nuevafecha);

        $mes=$aa[1];
        if($mes>0 AND $mes< 10){
        //      $mes="0".$mes;
        }

        $bb=$aa[0]."-".( $mes);
        $q='select sum( cantidad * precio_unitario ) from ventas where fecha >= "'.$bb.'-01" and fecha <= "'.$bb.'-31" and sucursal!="157 AP OnLine"';
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
        //      $mes="0".$mes;
        }

        $bb=$aa[0]."-".( $mes);
        $q='select sum( cantidad * precio_unitario ) from ventas where fecha >= "'.$bb.'-01" and fecha <= "'.$bb.'-31" and sucursal!="157 AP OnLine"';
        $result=mysql_query($q)or die(mysql_error());
        $total=mysql_result($result,0);
        //return $q;
        //echo "acumulado_menos_mes_anio: ".$q." t:". $total."<br>";
return $total;
}
#------------------------------------------------
	
	
#------------------------------------------------
function cuenta_ventas($sucursal,$mes){
	$q='select distinct numero_venta from ventas where sucursal="'.$sucursal.'" and fecha>="'.$mes.'-01" and fecha<="'.$mes.'-31"';
	$r=mysql_query($q);
	$rows=mysql_num_rows($r);
	return $rows;
}
#------------------------------------------------
	
?>