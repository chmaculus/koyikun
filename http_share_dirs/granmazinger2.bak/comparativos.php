<?php
include("cabecera2.inc.php");
//include("../includes/funciones_varias.php");
include_once("./includes/funciones_varias.inc.php");
include_once("./includes/funciones_tabla_gastos.php");
include_once("./includes/funciones_vendedor.php");
include_once("./includes/funciones_sucursal.php");
include_once("./includes/funciones_calculo.php");
include("connect.php");

$fecha=date("Y-n-d");
$mes_anio=date("Y-n");
$mes=date("n");
$anio=date("Y");


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
#-------------------------------------------------------------------------------






echo '<table class="t1">';///3 ra

	#--------------------------------------------	
	echo '<tr class="especial" id="especial">';///3 ra
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