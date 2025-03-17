<?php
	echo '<table class="t1">';//abre tabla turno

	

	/////////////////////////////////////////////
	echo "<tr>";
	echo "<td>SUC</td><td>".$rowab["sucursal"]."</td>";
	echo "</tr>".chr(13);
	/////////////////////////////////////////////



	/////////////////////////////////////////////
	echo "<tr>";
	echo "<td>TT M</td><td>".$total_manana."</td>";
	echo "</tr>".chr(13);
	/////////////////////////////////////////////


	/////////////////////////////////////////////
	echo "<tr>";
	echo "<td>TT T</td><td>".$total_tarde."</td>";
	echo "</tr>".chr(13);
	/////////////////////////////////////////////



	/////////////////////////////////////////////
   echo '<tr class="especial" id="especial">';
	echo '<td>TT S</td>';
	echo '<td>'.( $total_manana + $total_tarde ).'</td>';
	echo "</tr>".chr(13);
	/////////////////////////////////////////////
	


	/////////////////////////////////////////////
	echo '<tr class="especial" id="especial">';
	echo '<td>ACT</td>';
	echo '<td>'.$acum_mes.'</td>';
	echo '</tr>';
	/////////////////////////////////////////////




	/////////////////////////////////////////////
	$acum_mes_ant=acumulado_mes_anterior($fecha , $rowab["sucursal"]);
	echo '<tr>';
		echo '<td>ANT</td>';
		echo '<td>'.$acum_mes_ant.'</td>';
	echo '</tr>';
	/////////////////////////////////////////////




	/////////////////////////////////////////////
	echo '<tr>';
		echo '<td>ACT VS ANT</td>';
		echo '<td>'.round(($acum_mes / $acum_mes_ant),2).'</td>';
	echo '</tr>';
	/////////////////////////////////////////////






/////////////////////////////////////////////////////
$arr_fecha=explode("-",$fecha);
 $fff=($arr_fecha[0] -1)."-".$arr_fecha[1] ."-";
 $q='select sum(cantidad * precio_unitario) from ventas where fecha>="'.$fff.'01" and fecha<="'.$fff.'31" and sucursal="'.$rowab[0].'"';
 $act1y=mysql_result(mysql_query($q),0,0);
        echo '<tr class="especial" id="especial">';
        //echo '<td>'.$q.'</td>';
        echo '<td>ACT -1Y</td>';
        echo '<td>'.$act1y.'</td>';
        echo '</tr>';
/////////////////////////////////////////////////////


	/////////////////////////////////////////////
	echo '<tr>';
		echo '<td>AC VS AC -1Y</td>';
		echo '<td>'.round(($acum_mes / $act1y),2).'</td>';
	echo '</tr>';
	/////////////////////////////////////////////



	/////////////////////////////////////////////
$epoch=strtotime($fecha);
$nuevafecha = strtotime ( '-1 month' ,  strtotime ( $fecha )  ) ;
$nuevafecha2 = date ( 'Y-m-j' , $nuevafecha );

$aa=explode("-",$nuevafecha2);
$mes=$aa[1];
$bb=$aa[0]."-".( $mes);

$q='select sum( cantidad * precio_unitario ) from ventas where fecha >= "'.$bb.'-01" and fecha <= "'.$bb.'-31" and sucursal="'.$rowab[0].'"';
$result=mysql_query($q)or die(mysql_error());
$total_mes_anterior_sucursal=mysql_result($result,0);
$aa=($total_mes_anterior_sucursal*100)/$total_mes_anterior_todas;
	echo '<tr>';
		echo '<td>INFLU SUC</td>';
//		echo '<td>'.$q.'</td>';
		echo '<td>'.round($aa,2).'</td>';
	echo '</tr>';
	/////////////////////////////////////////////


	/////////////////////////////////////////////
//	$zz=($acum_mes / $act1y) * 100; 
//		echo '<tr class="especial2" id="especial2">';
//		echo '<td>COM</td>';
//		echo '<td>'.round($zz,2).'%</td>';
//	echo '</tr>';
	/////////////////////////////////////////////



	/////////////////////////////////////////////
	#comparativo mes anterior
//	$zz=($acum_mes * 100) / $acum_mes_ant; 
//		echo '<tr class="especial2" id="especial2">';
//		echo '<td>COM1</td>';
//		echo '<td>'.round($zz,2).'%</td>';
//	echo '</tr>';
	/////////////////////////////////////////////


	
	/////////////////////////////////////////////
	#proyeccion mes
	$dias_acumulados=calcula_total_dias_sucursal( $fecha, $rowab["sucursal"] );
	$prom1=($acum_mes / $dias_acumulados);
	echo '<tr>';
		echo '<td>Proy</td>';
		echo '<td>'.round($prom1 * 26,2).'</td>';
	echo '</tr>';
	/////////////////////////////////////////////


	/////////////////////////////////////////////
	//$aaaa=cuenta_ventas($rowab["sucursal"],$fff);


	$m=$fecha;
		$query='select distinct numero_venta from ventas where sucursal="'.$rowab["sucursal"].'" and fecha="'.$fecha.'"';
		$rows=mysql_num_rows(mysql_query($query));


	echo '<tr>';
		echo '<td>TCD</td>';
		echo '<td>'.$rows.'</td>';
	echo '</tr>';

	for($i=-4;$i<=-1;$i++){
		$epoch1=strtotime($i." month",$epoch);
		$aa=date("Y-n",$epoch1);
		$query='select distinct numero_venta from ventas where sucursal="'.$rowab["sucursal"].'" and fecha>="'.$aa.'-01" and fecha<="'.$aa.'-31"';
		$rows=mysql_num_rows(mysql_query($query));
		echo '<tr>';
			echo '<td>TCAM '.date("M",$epoch1).'</td>';
			echo '<td>'.$rows.'</td>';
			//echo '<td>'.$query.'</td>';
		echo '</tr>';
	}	

	$m=date("Y-n");
		$query='select distinct numero_venta from ventas where sucursal="'.$rowab["sucursal"].'" and fecha>="'.$m.'-01" and fecha<="'.$m.'-31"';
		$rows=mysql_num_rows(mysql_query($query));
	echo '<tr>';
		echo '<td>TCAM</td>';
		echo '<td>'.$rows.'</td>';
	echo '</tr>';



	/////////////////////////////////////////////


	/////////////////////////////////////////////
	#var
//	$tasa_crecim=round(((($prom1 * 26) * 100) / $acum_mes_ant)-100,2);
//		echo '<tr class="especial3" id="especial3">';
//		echo '<td>Com2</td>';
//		echo '<td>'.$tasa_crecim.'%</td>';
//	echo '</tr>';
	/////////////////////////////////////////////



	#-------------------------------------------------------------
//	$mes_anio=date("Y-n");
//	$q='select sum(cantidad * precio_unitario), sum(cantidad * costo) from ventas where sucursal="'.$rowab["sucursal"].'" and fecha>="'.$mes_anio.'-01" and fecha<="'.$mes_anio.'-31"';
//	$array=mysql_fetch_array(mysql_query($q));
//	$rent=(($array[0] / $array[1] * 100)-100);
//		echo '<tr>';
//		echo '<td>R</td>';
//		echo '<td>'.round($rent,2).'%</td>';
//		echo '</tr>';
	#-------------------------------------------------------------	



	echo "</table>";

?>