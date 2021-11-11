<?php
/*
1 determino tama;o array con todas las sucursales
2 1 while que recorra las sucursales por cada dia
3 colocar los datos de las sucursales por dia
*/
 
include_once("connect.php");

$fecha=date("Y-n-d");
$hora=date("H_i_s");


#estructura tabla: datos_caja
#--------------------------------------
# 0	id	mediumint(8) unsigned
# 1	numero_suc	varchar(5)
# 2	fecha	date
# 3	total_efectivo	double(10,2)
# 4	total_tarjeta	double(10,2)
# 5	sin_comision	double(10,2)
# 6	turno	varchar(1)
# 7	fecha_sistema	date
# 8	hora_sistema	time
# 9	id_sucursal	mediumint(9)
# 10	id_session	varchar(30)
#--------------------------------------
echo '<table border=1>';


#----------------------------------------------------------
#determina el ancho maximo de la tabla
$maxsuc=0;
$query='select distinct fecha from datos_caja';
$result=mysql_query($query)or die(mysql_error());

while($row=mysql_fetch_array($result)){
	if($reg>$maxsuc){	$maxsuc=$reg;	}
}
#----------------------------------------------------------
echo '</table>';


/*
for($i=1;$i<=$maxsuc;$i++){
	echo $i;
}
*/

echo "La cantidad maxima del array es: ".$maxsuc;

#----------------------------------------------------------
#esta funcion determina la cantidad de sucursales ingresadas en una fecha 
function bbbbb($fecha){
	$q1='select distinct numero_suc from datos_caja where fecha="'.$fecha.'" order by numero_suc';
	$result=mysql_query($q1)or die(mysql_error());
	$rows=mysql_numrows($result);
	return $rows;
}
#----------------------------------------------------------

#----------------------------------------------------------
function cccc( $fecha ){
	$q1='select * from datos_caja where fecha="'.$fecha.'" order by numero_suc, turno';
	$result=mysql_query($q1)or die(mysql_error());
	while($row=mysql_fetch_array($result)){
		if(!$ffecha OR $ffecha!=$row["fecha"]){
			$ffecha=$row["fecha"];
			echo "</tr><tr>";
			echo "<td>fecha".$row["fecha"]."</td><td><td>";
		}
		if(!$suc OR $suc!=$row["numero_suc"]){
			$suc=$row["numero_suc"];
			echo "</td><td>";
			echo "Nsuc: ".$row["numero_suc"]."<td>";
		}
		if(!$turno OR $turno!=$row["turno"]){
			$turno=$row["turno"];
			//echo "</td><td>";
			echo "Turno: ".$row["turno"]."";
		}
		echo "EF: ".$row["total_efectivo"];
		echo "Tarj: ".$row["total_tarjeta"];
		echo "S/C ".$row["sin_comision"];
	}
	
}
#----------------------------------------------------------




?>
