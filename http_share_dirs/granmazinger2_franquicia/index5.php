<?php
include("cabecera.inc.php");
//include("../includes/funciones_varias.php");
include_once("./includes/funciones_varias.inc.php");
include_once("./includes/funciones_tabla_gastos.php");
include_once("./includes/funciones_vendedor.php");
include_once("./includes/funciones_sucursal.php");
include_once("./includes/funciones_calculo.php");


/*
$hora=time();

$ultimo_mes=$hora-(60 * 60 * 24 * 30);
$ultimo_tres=$hora-(60 * 60 * 24 * 30 * 3);
$ultimo_seis=$hora-(60 * 60 * 24 * 30 * 6);
$ultimo_nueve=$hora-(60 * 60 * 24 * 30 * 9 );
$ultimo_doce=$hora-(60 * 60 * 24 * 365);



$fecha=date("Y-n-d");

$u_mes=date("Y-n-d",$ultimo_mes);
$u_tres=date("Y-n-d",$ultimo_tres);
$u_seis=date("Y-n-d",$ultimo_seis);
$u_nueve=date("Y-n-d",$ultimo_nueve);
$u_doce=date("Y-n-d",$ultimo_doce);


*/




echo '<center>';

if($_POST["fecha"]){
	$fecha=fecha_conv( "/", $_POST["fecha"] );
}else{
	$fecha=date("Y-n-d");
}

$zzaa=explode("-",$fecha);
$mes=$zzaa[1];
$anio=$zzaa[0];

$fecha_desde=$anio."-".$mes."-01";
$fecha_hasta=$anio."-".$mes."-31";

echo '<form method="POST" action="'.$_SERVER["SCRIPT_NAME"].'">';
echo 'Fecha: <input type="text" name="fecha" id="fecha" size="10" value="'.fecha_conv( "-", $fecha ).'">';
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
echo '</form>';


include("connect.php");

$saldo=get_saldo();



$qb='select distinct sucursal from ventas where fecha="'.$fecha.'" order by sucursal';
$resultb=mysql_query($qb);

echo "Fecha: ".$_POST["fecha"];
?>
<table border="1">
<?php
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
}// end while

echo "</table>".chr(10);

/*
echo '$total_dia'.$total_dia."<br>";
echo '$acum_mes'.$acum_mes."<br>";
echo '$total_acum_mes'.$total_acum_mes."<br>";
echo '$total_acum_mes_ant'.$total_acum_mes_ant."<br>";
*/

echo "<br>";

#---------------------------------------------------------------------	
#muestra total
echo '<table class="t1">';
	echo '<tr class="especial2" id="especial2">';
	echo '<td>TTT</td>';
	echo '<td> '.$total_dia.'</td>';
	echo "</tr>".chr(13);
echo "</table>";
#---------------------------------------------------------------------	


#---------------------------------------------------------------------	
	echo '<table class="t1">';
	echo "<tr><td>";

	echo '<table class="t1">';

	#--------------------------------------------	
	echo '<tr class="especial" id="especial">';
	echo '<td>ACT</td>';
	echo '<td>'.$total_acum_mes.'</td>';

	##########acudi
	$acum_mes_anioaa=acumulado_menos_un_anio($fecha , $rowab["sucursal"]);
	echo "<td>ACT -1 Y</td><td>".$acum_mes_anioaa."</td>";
	echo "<td>".round( ( ($total_acum_mes * 100) / $acum_mes_anioaa),2)."</td>";

	echo '</tr>';
	#--------------------------------------------	

	
	#--------------------------------------------	
    echo '<tr class="especial" id="especial">';

  	echo '<td>ACT</td>';
	echo '<td>'.$total_acum_mes.'</td>';

		echo '<td>ANT</td>';
		echo '<td>'.$total_acum_mes_ant.'</td>';
		echo '<td>'.round(($total_acum_mes *100 ) / $total_acum_mes_ant,2).'</td>';
	echo '</tr>';
	#--------------------------------------------	

	#--------------------------------------------	
	$za1=calcula_total_dias_todas($fecha);
	echo '<tr>';
	echo "<td>AcuDi</td><td>".$za1."</td>";
	echo '</tr>';
	#--------------------------------------------	




	#--------------------------------------------	
	$proy=round((($total_acum_mes / $za1) * 25),2);
	echo '<tr>';
	echo "<td>Proy</td><td>".$proy."</td>";
	echo '</tr>';
	#--------------------------------------------	

include("compara_fechas.php");	


echo "</td>";
echo "</table>";

echo "<td>";
include("ventas_hora_general.inc.php");
echo "</td>";


echo "</tr>";
echo "</table>";





	
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
        //      $mes="0".$mes;
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