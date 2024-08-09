<?php
include("cabecera.inc.php");



#---------------------------------------------------------
#---------------------------------------------------------
include("includes/funciones_varias.inc.php");
#---------------------------------------------------------
#---------------------------------------------------------



#---------------------------------------------------------
#---------------------------------------------------------
include("includes/funciones_totales.inc.php");
#---------------------------------------------------------
#---------------------------------------------------------




//include("../../includes/funciones_varias.php");

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



$q='select distinct sucursal from ventas where fecha="'.$fecha.'" order by sucursal';
$result=mysql_query($q);

echo "Fecha: ".$_POST["fecha"];
echo '<table border="1">';

while($row=mysql_fetch_array($result)){
	$total_clientes_dia=calcula_total_clientes_sucursal( $fecha, $row["sucursal"] );


	# manana
	$hora_desde="08:00:00";
	$hora_hasta="14:00:00";

	$total_efectivo=calcula_tot_ef( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );
	$cantidad_efectivo=calcula_cantidad_ef( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );

	$total_debito=calcula_tot_debito( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );
	$cantidad_debito=calcula_cantidad_debito( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );

	$total_tarjeta=calcula_tot_tarj( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );
	$cantidad_tarjeta=calcula_cantidad_tarj( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );

	$tot_cli_man=($cantidad_efectivo + $cantidad_debito + $cantidad_tarjeta);

	$porc_efectivo=round(( $cantidad_efectivo * 100 ) / $tot_cli_man , 2);
	$porc_debito=round(( $cantidad_debito * 100 ) / $tot_cli_man , 2);
	$porc_tarjeta=round(( $cantidad_tarjeta * 100 ) / $tot_cli_man , 2);

	$gastos_suc=trae_gastos_sucursal( $fecha, $row["sucursal"]);

	echo "	<tr>";
	echo "	<td>";//abre sucursal
	///////////muestra resultados manana	

	include("./includes/manana.inc.php");	
	
	echo "</td>";

	echo "<td>";
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo "</td>";
	
	#---------------------------------------------------------------	
	# TARDE
	#---------------------------------------------------------------	

	/////////////////////////muestra resultados tarde
	echo '<table class="t1">';//abre tabla turno

	///tarde
	echo "<tr>";
	echo "<td>TT</td>";
	echo "<td>".$row["sucursal"]."</td>";

	
	include("includes/tarde.inc.php");	
	
	# tarde
	$hora_desde="14:00:01";
	$hora_hasta="22:00:00";

	$total_efectivo=calcula_tot_ef( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );
	$cantidad_efectivo=calcula_cantidad_ef( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );

	$total_debito=calcula_tot_debito( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );
	$cantidad_debito=calcula_cantidad_debito( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );

	$total_tarjeta=calcula_tot_tarj( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );
	$cantidad_tarjeta=calcula_cantidad_tarj( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );

	$tot_cli_man=($cantidad_efectivo + $cantidad_debito + $cantidad_tarjeta);

	$porc_efectivo=round(( $cantidad_efectivo * 100 ) / $tot_cli_man , 2);
	$porc_debito=round(( $cantidad_debito * 100 ) / $tot_cli_man , 2);
	$porc_tarjeta=round(( $cantidad_tarjeta * 100 ) / $tot_cli_man , 2);

	$zt=trae_z( $fecha, id_sucursal($row["sucursal"]) , "ZT");

	echo "<td>";
	//echo "</td>";
	

	echo "<td>";
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo "</td>";

	echo "<td>";
	echo '<table class="t1">';
	$acum_mes=acumulado_mes($fecha , $row["sucursal"]);

		echo '<tr class="especial" id="especial">';
		echo '<td>ACT</td>';
		echo '<td>'.$acum_mes.'</td>';

	echo '</tr>';


	$acum_mes_ant=acumulado_mes_anterior($fecha , $row["sucursal"]);
	echo '<tr>';
		echo '<td>ANT</td>';
		echo '<td>'.$acum_mes_ant.'</td>';
	echo '</tr>';



	$zz=($acum_mes * 100) / $acum_mes_ant; 
	echo '<tr>';
		echo '<td>COM</td>';
		echo '<td>'.round($zz,2).'%</td>';
	echo '</tr>';
	
	$acudi=calcula_total_dias_sucursal( $fecha, $row["sucursal"] );
	$prom1=($acum_mes / $acudi);
	echo '<tr>';
		echo '<td>AcuDi</td>';
		echo '<td>'.$acudi.'</td>';
	echo '</tr>';

	echo '<tr>';
		echo '<td>Prom</td>';
		echo '<td>'.round($prom1,2).'</td>';
	echo '</tr>';

	echo '<tr>';
		echo '<td>Proy</td>';
		echo '<td>'.round($prom1 * 26,2).'</td>';
	echo '</tr>';

	$tasa_crecim=round(((($prom1 * 26) * 100) / $acum_mes_ant)-100,2);
	echo '<tr>';
		echo '<td>Com2</td>';
		echo '<td>'.$tasa_crecim.'%</td>';
	echo '</tr>';

	echo "<tr>";
	echo "<td>TX</td>";
	echo "<td>".($zm + $zt)."</td>";
	echo "</tr>".chr(13);

	$fa=explode("-",$fecha);
	$fecha_desde=$fa[0]."-".$fa[1]."-01";
	$fecha_hasta=$fa[0]."-".$fa[1]."-31";
	$rentabilidad=rentabilidad($row["sucursal"], $fecha_desde, $fecha_hasta);
	echo '<tr>';
		echo '<td>Rbrt</td>';
		echo '<td>'.round($rentabilidad,2).'</td>';
	echo '</tr>';

	echo "<tr>";
	echo "<td>Rbrut-G</td>";
	echo "<td>".round(($rentabilidad - $gastos_suc ),2)."</td>";
	echo "</tr>".chr(13);

	echo "<tr>";
	echo "<td>G</td>";
	echo "<td>".round($gastos_suc,2)."</td>";
	echo "</tr>".chr(13);

	echo "<tr>";
	echo "<td>G.ant</td>";
	echo "<td>".round(trae_gastos_sucursal_mes_ant( $fecha, $row["sucursal"]),2)."</td>";
	echo "</tr>".chr(13);


	$qa='select valor from cuota_alquiler where sucursal="'.$row["sucursal"].'"';
	$aa=mysql_fetch_array(mysql_query($qa));
	$influ=(($aa[0] * 100) / 	$acum_mes_ant) ;
	echo "<tr>";
	echo "<td>A Influ</td>";
	echo "<td>".round($influ,2)."</td>";
	echo "</tr>".chr(13);

	echo '</table>'.chr(13);//cierra tabla turno
	# //tarde

	if($tasa_crecim>0){
		echo '<img src="arriba.jpg" width="140" height="140">';
	}
	if($tasa_crecim<0){
		echo '<img src="abajo.jpg" width="140" height="140">';
	}

	echo chr(13);



////////////////////////////////////////
	//echo "<td>";
/*
	echo "<td>";
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo "</td>";
*/
	//echo "<td>";
/*
	echo '<table class="t1"';
	$q='select distinct marca from ventas where sucursal="'.$row["sucursal"].'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'" order by marca';
	$res5=mysql_query($q);
	while($row5=mysql_fetch_array($res5)){
		$q='select sum(cantidad * precio_unitario) from ventas where marca="'.$row5["marca"].'" and sucursal="'.$row["sucursal"].'" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'" order by marca';
		$res6=mysql_query($q);
		if(mysql_error()){
			echo '<td>'.mysql_error().'</td>';
		}
		$tottt=mysql_result($res6,0,0);
		echo '<tr>';
		echo '<td>'.$row5["marca"].'</td>';
		echo '<td>'.$tottt.'</td>';
		echo '</tr>';
	}
	echo '</table>';
	echo "</td>";
*/
	//echo "</td>";
////////////////////////////////////////

}

echo "</table>".chr(13);





#totales mes
#---------------------------------------------------------
#---------------------------------------------------------
include("./includes/totales.inc.php");
#---------------------------------------------------------
#---------------------------------------------------------





echo "<td>";
echo '<table class="t1">';
echo '<font size="5">RANKING DEL DIA</font>';
totales_vendedor2($fecha);
echo "</td>";
echo "</table>";


echo "<td>";
echo '<table class="t1">';
echo '<font size="5">RANKING DEL MES</font>';
totales_vendedor2_mes($fecha);
echo "</td>";
echo "</table>";




?>