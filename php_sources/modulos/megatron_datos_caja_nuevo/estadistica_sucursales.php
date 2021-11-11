<?php
include("cabecera.inc.php");
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
/*
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

*/
include("connect.php");




$epoch=strtotime($fecha);
$nuevafecha = strtotime ( '-1 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
//	$aa=explode("-",$fecha);
$aa=explode("-",$nuevafecha);


echo '<table border="1">';


$anio="2010";

$q='select distinct sucursal from ventas order by sucursal';
$res=mysql_query($q);
while($row=mysql_fetch_array($res)){
	//$q0='select sum(cantidad * precio_unitario from ventas where fecha>="'.$fecha_desde.'" and fecha<="'$fecha_hasta'" and sucursal="'.$row[1].'"';
	for($i=1;$i<=12;$i++){
		if($i>=1 AND $i<=9){
			$b="0".$i;
		}else{
			$b=$i;
		}
		$q0='select sum(cantidad * precio_unitario) from ventas where fecha>="'.$anio.'-'.$b.'-01" and fecha<="'.$anio.'-'.$b.'-31" and sucursal="'.$row[0].'"';
		$res2=mysql_query($q0);
		if(mysql_error()){
			echo mysql_error()."<br>";
		}
		$array=mysql_fetch_array($res2);
		echo "<tr>";
		echo '<td>'.$row[0].'</td><td>'.$anio.'-'.$b.'-01</td><td>'.$anio.'-'.$b.'-31</td><td>'   .str_replace(".",",",$array[0])."</td>"; 
		echo "</tr>";
	}
	echo "<br>";
}

echo "</table>";



#------------------------------------------------
function acumulado_mes_anterior( $fecha, $sucursal ){
	$epoch=strtotime($fecha);
	$nuevafecha = strtotime ( '-1 month' , strtotime ( $fecha ) ) ;
//	$aa=explode("-",$fecha);
	$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
	$aa=explode("-",$nuevafecha);

	$mes=$aa[1];
	if($mes>0 AND $mes< 10){
		$mes="0".$mes;
	}
	if($mes==-1){
		$mes=12;
	}

	$bb=$aa[0]."-".( $mes);
	//$q='select sum( cantidad * precio_unitario ) from ventas where fecha >= "'.$bb.'01" and fecha <= "'.$bb.'31" and sucursal="'.$sucursal.'"';
	$q='select sum( cantidad * precio_unitario ) from ventas where fecha >= "'.$bb.'-01" and fecha <= "'.$bb.'-31"  and sucursal="'.$sucursal.'"';
	echo "<td>".$fecha." ".$q."</td>";
	$result=mysql_query($q)or die(mysql_error());
	$total=mysql_result($result,0);
	//return $q;
return $total;
}	

#------------------------------------------------



?>
