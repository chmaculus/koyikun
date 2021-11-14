<?php
/*
1 determino tama;o array con todas las sucursales
2 1 while que recorra las sucursales por cada dia
3 colocar los datos de las sucursales por dia
*/
 
include_once("connect.php");

$fecha=date("Y-n-d");
$hora=date("H_i_s");

#----------------------------------------------------------
#determina el ancho maximo de la tabla
$maxsuc=0;
$query='select distinct fecha from datos_caja';
$result=mysql_query($query)or die(mysql_error());

while($row=mysql_fetch_array($result)){
	$reg=cant_suc( $row[0] );
	if($reg>$maxsuc){	$maxsuc=$reg;	}
}
//echo "maxsuc: ".$maxsuc."<br>".chr(13);
#----------------------------------------------------------

echo '<table border="1">'.chr(13);
echo '<tr>'.chr(13);

$maxsuc=( $maxsuc * 2 ) + 1;
for($i=1;$i<=$maxsuc;$i++){
	echo '	<td>'.$i.'</td>'.chr(13);
}
echo '</tr>'.chr(13);


$query='select distinct fecha from datos_caja';
$result=mysql_query($query)or die(mysql_error());

while($row=mysql_fetch_array($result)){

	echo  "	<tr>".chr(13);
	echo  '	<td>'.chr(13);
	echo  '		p2(fecha)'.chr(13);
	echo  "		".$row["fecha"].chr(13);

	$q2='select distinct numero_suc from datos_caja where fecha="'.$row["fecha"].'" order by numero_suc';
	$res2=mysql_query($q2)or die(mysql_error());
	while($row2=mysql_fetch_array($res2)){
		#echo  '		<td>p3(suc)'.chr(13);
		#echo  "		suc: ".$row2["numero_suc"]."<br>".chr(13);
		$cp5=0;
		$q3='select distinct turno from datos_caja where fecha="'.$row["fecha"].'" and numero_suc="'.$row2["numero_suc"].'" order by turno';
		$res3=mysql_query($q3)or die(mysql_error());
		$rows3=mysql_num_rows($res3);
		while($row3=mysql_fetch_array($res3)){
			$cp5++;
			echo  "			<td>".chr(13);
			echo  "			p5(turno): ".$cp5.chr(13);
			echo  "			suc: ".$row2["numero_suc"].chr(13);
			echo  "			turno: ".$row3["turno"].chr(13);
			

			$q4='select * from datos_caja where fecha="'.$row["fecha"].'" and numero_suc="'.$row2["numero_suc"].'" and turno="'.$row3["turno"].'"';
			$res4=mysql_query($q4)or die(mysql_error());
			while($row4=mysql_fetch_array($res4)){
				echo "			p7".chr(13);
				
				echo  "			TE ".$row4["total_efectivo"].chr(13);
				echo  "			TT ".$row4["total_tarjeta"].chr(13);
				echo  "			SC ".$row4["sin_comision"].chr(13);
				echo  "			TT2 ".( $row4["total_efectivo"] + $row4["total_tarjeta"] ).chr(13);
			}
			echo  "			</td>".chr(13);
		}
		
		if($rows3 <2 ){	echo '		<td></td>'.chr(13); 	}

		echo  '		</td>'.chr(13);
	}
	echo  '	</td>'.chr(13);
	echo  '	</tr>'.chr(13);
}
echo  '</table>'.chr(13);




#----------------------------------------------------------
#esta funcion determina la cantidad de sucursales ingresadas en una fecha 
function cant_suc($fecha){
	$q1='select distinct numero_suc from datos_caja where fecha="'.$fecha.'" order by numero_suc';
	$result=mysql_query($q1)or die(mysql_error());
	$rows=mysql_numrows($result);
	return $rows;
}
#----------------------------------------------------------


?>
