<?php
include("cabecera.inc.php");
echo '<center>';

if($_POST["fecha"]){
	$fecha=fecha_conv( "/", $_POST["fecha"] );
}else{
	$fecha=date("Y-n-d");
}


echo '<form method="POST" action="'.$_SERVER["SCRIPT_NAME"].'">';
echo 'Fecha: <input type="text" name="fecha" size="10" value="'.fecha_conv( "-", $fecha ).'">';
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
echo '</form>';


include("connect.php");



$q='select distinct sucursal from ventas where fecha="'.$fecha.'" order by sucursal';
$result=mysql_query($q);


echo '<table border="1">';

while($row=mysql_fetch_array($result)){
	echo "	<tr>";
	echo "	<td>";//abre sucursal
	echo $row["sucursal"];

	# manana
	$hora_desde="08:00:00";
	$hora_hasta="14:00:00";

	$total_debito=calcula_tot_debito( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );
	$total_efectivo=calcula_tot_ef( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );
	$total_tarjeta=calcula_tot_tarj( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );
////////////////////////////////

//calcula_total_ventas
	$totot=calcula_total_ventas( "Dif x financiacion Credito", $row["sucursal"] ,$fecha, $hora_desde, $hora_hasta );
	$credito=calcula_numero_ventas( "Dif x financiacion Credito", $row["sucursal"] ,$fecha, $hora_desde, $hora_hasta );
	$debito=calcula_numero_ventas( "Dif x financiacion Debito", $row["sucursal"] ,$fecha, $hora_desde, $hora_hasta );
	$aaa1=$totot - ($credito + $debito);
	
	echo '<table border="1">';//abre tabla turno
	echo "<tr>";
	echo "<td>TM";

	echo '<table border="1">';
	echo "<tr>";
	echo "<td>TE</td><td>".$total_efectivo."</td>";
	echo "<td>".$aaa1."</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>TT</td><td>".$total_tarjeta."</td>";
	echo "<td>".$credito."</td>";
	echo "</tr>".chr(13);
	
	echo "<tr>";
	echo "<td>TD</td><td>".$total_debito."</td>";
	echo "<td>".$debito."</td>";
	echo "</tr>".chr(13);
	
	$total_manana=( $total_efectivo + $total_tarjeta + $total_debito);
	echo "<tr>";
	echo "<td>TT2</td><td>".$total_manana."</td>";
	echo "</tr>".chr(13);

	echo '</table>'.chr(13);//cierra tabla turno
	echo '</table>';
	# //manana

	# tarde
	$hora_desde="14:00:01";
	$hora_hasta="22:00:00";

	$total_efectivo=calcula_tot_ef( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );
	$total_debito=calcula_tot_debito( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );
	$total_tarjeta=calcula_tot_tarj( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );

	echo '<table border="1">';//abre tabla turno
	echo "<tr>";
	echo "<td>TT";

	echo '<table border="1">';
	echo "<tr>";
	echo "<td>TE</td><td>".$total_efectivo."</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>TT</td><td>".$total_tarjeta."</td>";
	echo "</tr>".chr(13);

	echo "<tr>";
	echo "<td>TD</td><td>".$total_debito."</td>";
	echo "</tr>".chr(13);

	$total_tarde=( $total_efectivo + $total_tarjeta + $total_debito );
	echo "<tr>";
	echo "<td>TT2</td><td>".$total_tarde."</td>";
	echo "</tr>".chr(13);

	echo '</table>'.chr(13);//cierra tabla turno
	echo '</table>'.chr(13);

	$tts=( $total_manana + $total_tarde );
	echo '<tr>';
		echo '<td>TTS</td>';
		echo '<td>'.$tts.'</td>';
	echo '</tr>';
	# //tarde

	echo chr(13);
}

echo "</table>".chr(13);


echo "<font1>Total dia: ".calcula_total_total( $fecha )."</font1>";

#------------------------------------------------
function calcula_tot_ef( $fecha, $sucursal, $hora_desde, $hora_hasta ){
	$q='select sum( cantidad * precio_unitario ) from ventas where fecha="'.$fecha.'" and sucursal="'.$sucursal.'" and hora>="'.$hora_desde.'" and hora<="'.$hora_hasta.'" and tipo_pago="CO"';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	return $total;
}
#------------------------------------------------

#------------------------------------------------
function calcula_tot_tarj( $fecha, $sucursal, $hora_desde, $hora_hasta ){
	$q='select sum( cantidad * precio_unitario ) from ventas where fecha="'.$fecha.'" and sucursal="'.$sucursal.'" and hora>="'.$hora_desde.'" and hora<="'.$hora_hasta.'" and tipo_pago="TA"';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	return $total;
}
#------------------------------------------------

#------------------------------------------------
function calcula_tot_debito( $fecha, $sucursal, $hora_desde, $hora_hasta ){
	$q='select sum( cantidad * precio_unitario ) from ventas where fecha="'.$fecha.'" and sucursal="'.$sucursal.'" and hora>="'.$hora_desde.'" and hora<="'.$hora_hasta.'" and tipo_pago="DE"';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	return $total;
}
#------------------------------------------------

#------------------------------------------------
function calcula_total_total( $fecha ){
	$q='select sum( cantidad * precio_unitario ) from ventas where fecha="'.$fecha.'"';
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
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
function calcula_numero_ventas($marca, $sucursal ,$fecha, $hora_desde, $hora_hasta){
	$query='select sum( cantidad ) from ventas where sucursal="'.$sucursal.'" and marca="'.$marca.'" and fecha="'.$fecha.'" and hora>="'.$hora_desde.'" and hora<="'.$hora_hasta.'" ';
	//echo $query;
	
	$result=mysql_query($query)or die(mysql_error());
	$total=mysql_result($result,0);	
return $total;
}				
#-----------------------------------------------------------------

#-----------------------------------------------------------------
function calcula_total_ventas($marca, $sucursal ,$fecha, $hora_desde, $hora_hasta){
	$query='select distinct numero_venta from ventas where sucursal="'.$sucursal.'" and fecha="'.$fecha.'" and hora>="'.$hora_desde.'" and hora<="'.$hora_hasta.'" ';
	//echo $query;
	
	$result=mysql_query($query)or die(mysql_error());
	$total=mysql_num_rows($result);	
return $total;
}				
#-----------------------------------------------------------------


?>