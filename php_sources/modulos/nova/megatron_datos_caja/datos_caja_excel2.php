<?php 
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include("seguridad.inc.php");

//include("cabecera.inc.php");
include("../../includes/funciones_varias.php");


?>
<?php
if(!$_POST["fecha_desde"] OR !$_POST["fecha_hasta"]){
//	echo "salio aca!";
	exit;
}


/*
1 determino tama;o array con todas las sucursales
2 1 while que recorra las sucursales por cada dia
3 colocar los datos de las sucursales por dia
*/
 
$fecha=date("Y-n-d");
$hora=date("H_i_s");

#----------------------------------------------------------
#determina el ancho maximo de la tabla
/*
$maxsuc=0;
$query='select distinct fecha from datos_caja';
$result=mysql_query($query)or die(mysql_error());

while($row=mysql_fetch_array($result)){
	$reg=cant_suc( $row[0] );
	if($reg>$maxsuc){	$maxsuc=$reg;	}
}
*/
//$data.= "maxsuc: ".$maxsuc."<br>".chr(13);
#----------------------------------------------------------

$data= '<table border="1">'.chr(13);

/*
$data.= '<tr>'.chr(13);
$maxsuc=( $maxsuc * 2 ) + 1;
for($i=1;$i<=$maxsuc;$i++){
	$data.= '	<td>'.$i.'</td>'.chr(13);
}
$data.= '</tr>'.chr(13);
*/

$query='select distinct fecha from datos_caja where fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'" order by fecha';
$result=mysql_query($query)or die(mysql_error());

while($row=mysql_fetch_array($result)){

//	$data.=  "	<tr>".chr(13);
	//$data.=  '	<td>'.chr(13);
	//$data.=  '		p2(fecha)'.chr(13);
	//$data.=  "		".$row["fecha"].chr(13);

	$q2='select distinct numero_suc from datos_caja where fecha="'.$row["fecha"].'" order by numero_suc';
	$res2=mysql_query($q2)or die(mysql_error());
	while($row2=mysql_fetch_array($res2)){
		#$data.=  '		<td>p3(suc)'.chr(13);
		#$data.=  "		suc: ".$row2["numero_suc"]."<br>".chr(13);
		$cp5=0;
		$q3='select distinct turno from datos_caja where fecha="'.$row["fecha"].'" and numero_suc="'.$row2["numero_suc"].'" order by turno';
		$res3=mysql_query($q3)or die(mysql_error());
		$rows3=mysql_num_rows($res3);
		while($row3=mysql_fetch_array($res3)){
		/*	$cp5++;
			$data.=  "			<td>".chr(13);
			$data.=  "			p5(turno): ".$cp5.chr(13);
			$data.=  "			suc: ".$row2["numero_suc"].chr(13);
			$data.=  "			turno: ".$row3["turno"].chr(13);
			*/

			$q4='select * from datos_caja where fecha="'.$row["fecha"].'" and numero_suc="'.$row2["numero_suc"].'" and turno="'.$row3["turno"].'"';
			$res4=mysql_query($q4)or die(mysql_error());
			while($row4=mysql_fetch_array($res4)){
				$tt2=( $row4["total_efectivo"] + $row4["total_tarjeta"] );
				$data.=  "			<tr><td>Fecha</td><td>".$row["fecha"]."</td>".chr(13);
				$data.=  "			<td>Sucursal</td><td>".$row2["numero_suc"]."</td>".chr(13);
				$data.=  "			<td>Turno</td><td>".$row3["turno"]."</td></tr>".chr(13);
				$data.=  "			<tr><td>TE</td><td>".str_replace('.',',',$row4["total_efectivo"])."</td></tr>".chr(13);
				$data.=  "			<tr><td>TT</td><td>".str_replace('.',',',$row4["total_tarjeta"])."</td></tr>".chr(13);
				$data.=  "			<tr><td>SC</td><td>".str_replace('.',',',$row4["sin_comision"])."</td></tr>".chr(13);
				$data.=  "			<tr><td>TT2</td><td>".str_replace('.' , ',' , $tt2 )."</td></tr>".chr(13);
			}
			//calcula_total_dia();
			$data.=  "			</td>".chr(13);
		}
		
		//if($rows3 <2 ){	$data.= '		<td></td><td></td>'.chr(13); 	}

		$data.=  '		</td>'.chr(13);
	}
	$data.=  '	</td>'.chr(13);
	$data.=  '	</tr>'.chr(13);
}
$data.=  '</table>'.chr(13);

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=listado_datos_caja_".$fecha."_".$hora.".xls");
header("Pragma: no-cache");
header("Expires: 0");

echo $data;


#----------------------------------------------------------
#esta funcion determina la cantidad de sucursales ingresadas en una fecha 
function cant_suc($fecha){
	$q1='select distinct numero_suc from datos_caja where fecha="'.$fecha.'"';
	$result=mysql_query($q1)or die(mysql_error());
	$rows=mysql_numrows($result);
	return $rows;
}
#----------------------------------------------------------

#----------------------------------------------------------
#calcula el total de tarjetas + efectivo de ma;ana y tarde de una sucursal 
function calcula_total_dia( $fecha, $sucursal ){
	$data.= "aa";
}
#----------------------------------------------------------


?>
