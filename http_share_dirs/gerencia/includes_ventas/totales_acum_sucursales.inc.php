<?php

	echo '<table class="t1">';
	echo "<tr>";
		echo "<th>Mes</th>";
		echo "<th>Acum Deb/Tarj</th>";
		echo "<th>Comprobantes</th>";
	echo "</tr>".chr(10);


for($i=-3;$i<=0;$i++){
	$epoch2=strtotime($i." month", $epoch);
	$str_mes=date("M",$epoch2);//nombre mes
	$mes=date("Y-n",$epoch2);


	echo '<tr>';
	echo "<td>$str_mes</td>";
		$q='select sum(cantidad * precio_unitario) from ventas where fecha>="'.$mes.'-01" 
				and fecha<="'.$mes.'-31" 
				and (tipo_pago="ta" or tipo_pago="de")';
	//	echo '<td>'.$q.'</td>';
		$res=mysql_query($q);if(mysql_error()){echo "<td>".mysql_error()."<br>".$q."</td>";}
		$t4=mysql_result($res,0,0);
		echo '<td>'.$t4.'</td>';
		
		$q='select sum(importe) from facturas_compra where fecha_factura>="'.$mes.'-01" 
				and fecha_factura<="'.$mes.'-31"
				'; 
	//	echo '<td>'.$q.'</td>';
		$res=mysql_query($q);if(mysql_error()){echo "<td>".mysql_error()."<br>".$q."</td>";}
		$t4=mysql_result($res,0,0);
		echo '<td>'.$t4.'</td>';
		
	
	echo '</tr>'.chr(10);

}

echo '</table>';
$epoch2=$epoch;


?>