<?php
include("facturas_compra_base.php");

$fecha=date("Y-n-d");
$epoch=strtotime($fecha);

include("../includes/connect.php");



/*

$fecha=date("Y-m-d");
$epoch=strtotime($fecha);

$days = array('Dom', 'Lun', 'Mar', 'Mie','Jue','Vie', 'Sab');

$epoch2=($epoch-(60*60*$i));
$fecha2=date("Y-n-d",$epoch2);
$week=date("w",$epoch2);
echo $days[$week];

$epoch1=strtotime($i." days", $epoch);
$epoch2=strtotime($i." month", $epoch);
echo date("M",$epoch2);//nombre mes

$aa=date("Y-m-d",$epoch1);
$bb=date("Y-m",$epoch2);
$week=date("w",$epoch1);
echo date("M",$epoch2);//nombre mes
*/

for($i=0;$i>=-3;$i--){
	$epoch2=strtotime($i." month", $epoch);
	$str_mes=date("M",$epoch2);//nombre mes
	$mes=date("Y-n",$epoch2);

	echo '<table class="t1">';
	echo "<tr>";
		echo "<th>sucursal</th>";
		echo "<th>Contado $fecha</th>";
		echo "<th>Deb/Tarj $fecha</th>";
		echo "<th>Acom Contado $str_mes</th>";
		echo "<th>Acum Deb/Tarj $str_mes</th>";
	echo "</tr>";

	$query="select * from sucursales where suc_reales=1 order by sucursal";
	$result=mysql_query($query);
	if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}
	while($row=mysql_fetch_array($result)){
		echo "<tr>";
		echo '<td>'.$row["sucursal"].'</td>';
	
		$q='select sum(cantidad * precio_unitario) from ventas where sucursal="'.$row["sucursal"].'" 
			and fecha="'.$fecha.'" 
			and tipo_pago="co"';
	//	echo '<td>'.$q.'</td>';
		$res=mysql_query($q);if(mysql_error()){echo "<td>".mysql_error()."<br>".$q."</td>";}
		$t1=mysql_result($res,0,0);
		echo '<td>'.$t1.'</td>';
	
		$q='select sum(cantidad * precio_unitario) from ventas where sucursal="'.$row["sucursal"].'" 
			and fecha="'.$fecha.'" 
			and (tipo_pago="ta" or tipo_pago="de")';
	//	echo '<td>'.$q.'</td>';
		$res=mysql_query($q);if(mysql_error()){echo "<td>".mysql_error()."<br>".$q."</td>";}
		$t2=mysql_result($res,0,0);
		echo '<td>'.$t2.'</td>';
	
		$q='select sum(cantidad * precio_unitario) from ventas where sucursal="'.$row["sucursal"].'" 
				and fecha>="'.$mes.'-01" 
				and fecha<="'.$mes.'-31" 
				and tipo_pago="co"';
	//	echo '<td>'.$q.'</td>';
		$res=mysql_query($q);if(mysql_error()){echo "<td>".mysql_error()."<br>".$q."</td>";}
		$t3=mysql_result($res,0,0);
		echo '<td>'.$t3.'</td>';
	
		$q='select sum(cantidad * precio_unitario) from ventas where sucursal="'.$row["sucursal"].'" 
				and fecha>="'.$mes.'-01" 
				and fecha<="'.$mes.'-31" 
				and (tipo_pago="ta" or tipo_pago="de")';
	//	echo '<td>'.$q.'</td>';
		$res=mysql_query($q);if(mysql_error()){echo "<td>".mysql_error()."<br>".$q."</td>";}
		$t4=mysql_result($res,0,0);
		echo '<td>'.$t4.'</td>';
	
		echo "</tr>".chr(10);
		$tot1=$tot1+$t1;
		$tot2=$tot2+$t2;
		$tot3=$tot3+$t3;
		$tot4=$tot4+$t4;
	}
	echo "<tr>	<td>Totales:</td>	<td>$tot1</td>	<td>$tot2</td>	<td>$tot3</td>	<td>$tot4</td>	</tr>".chr(10);
	echo '</table><br><br>';
}





?>
</table></center>
