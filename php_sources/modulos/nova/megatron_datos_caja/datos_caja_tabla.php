<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");

include_once("seguridad.inc.php");
include_once("cabecera.inc.php");
include("../../includes/funciones_varias.php");
?>
<center>
<form action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>" method="post">
<?php include("fecha_desde_hasta.inc.php"); ?>
<input type="submit" name="ACEPTAR" value="ACEPTAR" />
</form>

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

$maxsuc=0;


$query='select distinct fecha from datos_caja where fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'"';
$result=mysql_query($query)or die(mysql_error());
$rows=mysql_num_rows($result);

if($rows<1){
	echo "Sin resultados";
}
echo  '<table class="t1">'.chr(13);
while($row=mysql_fetch_array($result)){

	echo  "	<tr>".chr(13);
	echo  '	<td>'.chr(13);
	echo  "	".$row["fecha"].chr(13);
	echo  '	<td>'.chr(13);
	echo  '	<table border="1">'.chr(13);

	$q2='select distinct numero_suc from datos_caja where fecha="'.$row["fecha"].'" order by numero_suc';
	$res2=mysql_query($q2)or die(mysql_error());
	while($row2=mysql_fetch_array($res2)){
		echo  '		<td>'.chr(13);
		echo  "		suc: ".$row2["numero_suc"]."<br>".chr(13);

		echo  '<table border="1">';
		$q3='select distinct turno from datos_caja where fecha="'.$row["fecha"].'" and numero_suc="'.$row2["numero_suc"].'" order by turno';
		$res3=mysql_query($q3)or die(mysql_error());
		while($row3=mysql_fetch_array($res3)){
			$q4='select * from datos_caja where fecha="'.$row["fecha"].'" and numero_suc="'.$row2["numero_suc"].'" and turno="'.$row3["turno"].'"';
			$res4=mysql_query($q4)or die(mysql_error());
			echo  "			<td>";
			echo  "			turno: ".$row3["turno"]."<br>";
			echo  '			<table>';
			while($row4=mysql_fetch_array($res4)){
				echo  "				<tr><td>TE</td><td>".$row4["total_efectivo"]."</td></tr>";
				echo  "				<tr><td>TT</td><td>".$row4["total_tarjeta"]."</td></tr>";
				echo  "				<tr><td>SC</td><td>".$row4["sin_comision"]."</td></tr>";
				echo  "				<tr><td>TT2</td><td>".( $row4["total_efectivo"] + $row4["total_tarjeta"] )."</td></tr>";
			}
			echo  '			</table>';
			echo  "			</td>";
		}

		echo  '		</table>';
		echo  '		</td>'.chr(13);
	}
	echo  '	</td>'.chr(13);
	echo  '	</tr>'.chr(13);
	echo  '	</table>'.chr(13);
}
echo  '</table>';

?>
