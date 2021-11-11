<?php
include("cabecera2.inc.php");
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



$q='select distinct sucursal from ventas where fecha="'.$fecha.'" order by sucursal';
$result=mysql_query($q);

echo "Fecha: ".$_POST["fecha"];
?>
<table border="1">
<?php
while($row=mysql_fetch_array($result)){
//	$total_clientes_dia=calcula_total_clientes_sucursal( $fecha, $row["sucursal"] );


#------------------------------------------------
	# manana
	$hora_desde="08:00:00";
	$hora_hasta="14:00:00";

        $q='select sum( cantidad * precio_unitario ) from ventas where fecha="'.$fecha.'" and sucursal="'.$row["sucursal"].'" and hora>="'.$hora_desde.'" and hora<="'.$hora_hasta.'" ';
        echo $q;
        $result=mysql_query($q)or die(mysql_error());
        $total_manana=mysql_result($result,0);
#------------------------------------------------
                                


//	$total_efectivo=calcula_tot_ef( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );
//	$cantidad_efectivo=calcula_cantidad_ef( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );

//	$total_debito=calcula_tot_debito( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );
//	$cantidad_debito=calcula_cantidad_debito( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );

//	$total_tarjeta=calcula_tot_tarj( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );
//	$cantidad_tarjeta=calcula_cantidad_tarj( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );
	
//	$total_debito_credito=( $total_debito + $total_tarjeta);

//	$tot_cli_man=($cantidad_efectivo + $cantidad_debito + $cantidad_tarjeta);

//	$porc_efectivo=round(( $cantidad_efectivo * 100 ) / $tot_cli_man , 2);
//	$porc_debito=round(( $cantidad_debito * 100 ) / $tot_cli_man , 2);
//	$porc_tarjeta=round(( $cantidad_tarjeta * 100 ) / $tot_cli_man , 2);

//	$gastos_suc=trae_gastos_sucursal( $fecha, $row["sucursal"]);

	echo "	<tr>";
	echo "	<td>";//abre sucursal


	///////////muestra resultados manana	
	include("manana5.php");
	/////////// fin muestra resultados manana	
	
	
	echo "</td>";//tabla general

	echo "<td>";
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo "</td>";
	
	#---------------------------------------------------------------	
	# TARDE
	#---------------------------------------------------------------	
	
	# tarde
	$hora_desde="14:00:01";
	$hora_hasta="22:00:00";

        $q='select sum( cantidad * precio_unitario ) from ventas where fecha="'.$fecha.'" and sucursal="'.$row["sucursal"].'" and hora>="'.$hora_desde.'" and hora<="'.$hora_hasta.'" ';
        echo $q;
        $result=mysql_query($q)or die(mysql_error());
        $total_tarde=mysql_result($result,0);

//	$total_efectivo=calcula_tot_ef( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );
//	$cantidad_efectivo=calcula_cantidad_ef( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );

//	$total_debito=calcula_tot_debito( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );
//	$cantidad_debito=calcula_cantidad_debito( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );

//	$total_tarjeta=calcula_tot_tarj( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );
//	$cantidad_tarjeta=calcula_cantidad_tarj( $fecha, $row["sucursal"], $hora_desde, $hora_hasta );

//	$tot_cli_man=($cantidad_efectivo + $cantidad_debito + $cantidad_tarjeta);

//	$porc_efectivo=round(( $cantidad_efectivo * 100 ) / $tot_cli_man , 2);
//	$porc_debito=round(( $cantidad_debito * 100 ) / $tot_cli_man , 2);
//	$porc_tarjeta=round(( $cantidad_tarjeta * 100 ) / $tot_cli_man , 2);
	
	
//	$total_debito_credito=$total_debito_credito + ( $total_debito + $total_tarjeta);

//	$zt=trae_z( $fecha, id_sucursal($row["sucursal"]) , "ZT");

	echo "<td>";
	/////////////////////////muestra resultados tarde
	include("tarde5.php");	
	/////////////////////////fin muestra resultados tarde
	echo "</td>";

	
	echo "<td>";
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo "</td>";
	


	#-------------------------------------------------------------
	#-------------------------------------------------------------
/*	
	echo "<td>";
	include("datos_sucursal3.php");
	echo "</td>";
*/	
	#-------------------------------------------------------------
	#-------------------------------------------------------------

	/*
	echo "<td>";
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo "</td>";
	*/
	#-------------------------------------------------------------
	#-------------------------------------------------------------
	/*
	echo "<td>";
	include("proyeccion.php");
	echo "</td>";
	*/
	#-------------------------------------------------------------
	#-------------------------------------------------------------


	echo "</tr>";
	echo chr(13);

}// end while
echo "</table>".chr(13);


#------------------------------------------------------------
#------------------------------------------------------------
/*
//// total dia
include("total_dia.inc.php");
*/
#------------------------------------------------------------
#------------------------------------------------------------


//echo "<td>";
/*
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

*/



?>