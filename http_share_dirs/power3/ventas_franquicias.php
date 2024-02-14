<?php
include("cabecera2.inc.php");
include("./includes/funciones_varias.inc.php");
include_once("./includes/funciones_tabla_gastos.php");
include_once("./includes/funciones_vendedor.php");
include_once("./includes/funciones_sucursal.php");
include_once("./includes/funciones_calculo.php");
include("connect.php");


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


$qqq='select sum(cantidad * precio_unitario) from franquicias_ventas where fecha="'.$fecha.'" and sucursal="88" ';

//echo "$q1: ".$qqq."<br>";

$arr1=mysqli_fetch_array(mysqli_query($link1,$qqq));
$total_dia=$arr1[0];


$zzaa=explode("-",$fecha);
$mes=$zzaa[1];
$anio=$zzaa[0];

$fecha_desde=$anio."-".$mes."-01";
$fecha_hasta=$anio."-".$mes."-31";

/*
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
*/





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

$qb='select distinct sucursal from franquicias_ventas where fecha="'.$fecha.'" and sucursal="88" order by sucursal';
//echo "$q2: ".$qb."<br>";

$resultb=mysqli_query($link1,$qb);
while($rowab=mysqli_fetch_array($resultb)){
	#------------------------------------------------
	# manana
	$hora_desde="08:00:00";
	$hora_hasta="14:00:00";

   $q='select sum( cantidad * precio_unitario ) from franquicias_ventas where fecha="'.$fecha.'" and sucursal="'.$rowab["sucursal"].'" and hora>="'.$hora_desde.'" and hora<="'.$hora_hasta.'" ';
	//echo "$q3: ".$q."<br>";
   $result=mysqli_query($link1,$q);
   $arr1=mysqli_fetch_array($result);
   $total_manana=$arr1[0];
	#------------------------------------------------

	#------------------------------------------------
	# tarde
	$hora_desde="14:00:01";
	$hora_hasta="22:00:00";

   $q='select sum( cantidad * precio_unitario ) from franquicias_ventas where fecha="'.$fecha.'" and sucursal="'.$rowab["sucursal"].'" and hora>="'.$hora_desde.'" and hora<="'.$hora_hasta.'" ';
//   echo "$q4: ".$q."<br>";

   $result=mysqli_query($link1,$q);
   $arr1=mysqli_fetch_array($result);
   $total_tarde=$arr1[0];
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
if($count==6){
    echo '</tr><tr>';
}

}// end while
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
        $q='select sum( cantidad * precio_unitario ) from _franquicias_ventas where fecha >= "'.$bb.'-01" and fecha <= "'.$bb.'-31" and sucursal="88"';
        $result=mysqli_query($q);
				$arr1=mysqli_fetch_array(mysqli_query($link1,$qqq));
				$total=$arr1[0];
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
        $q='select sum( cantidad * precio_unitario ) from franquicias_ventas where fecha >= "'.$bb.'-01" and fecha <= "'.$bb.'-31" and sucursal="88"';
        $result=mysqli_query($q);
				$arr1=mysqli_fetch_array(mysqli_query($link1,$qqq));
				$total=$arr1[0];
        //return $q;
        //echo "acumulado_menos_mes_anio: ".$q." t:". $total."<br>";
return $total;
}
#------------------------------------------------
	
	
	
?>