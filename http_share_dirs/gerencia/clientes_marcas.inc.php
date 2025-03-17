<?php
echo '<table border="1">';

$array_contado=mysql_fetch_array(mysql_query('select sum(cantidad * precio_unitario) from ventas where fecha="'.$fecha.'"'));
$total=$array_contado[0];


$total_clientes=mysql_num_rows(mysql_query('select distinct numero_venta, sucursal from ventas where fecha="'.$fecha.'"'));
echo "<tr>";
    echo "<td>Cantidad Clientes</td>";
    echo "<td>".$total_clientes."</td>";
echo "</tr>";

#---------------------------------------------
$aacc=explode("-",$fecha);
$mes_anio=$aacc[0]."-".$aacc[1]."-";
$q='select distinct numero_venta, sucursal from ventas where fecha>="'.$mes_anio.'01" and fecha<="'.$mes_anio.'31"';
//echo $q;
$total_clientes_mes=mysql_num_rows(mysql_query($q));
echo "<tr>";
    echo "<td>Cantidad Clientes Mes</td>";
    echo "<td>".$total_clientes_mes."</td>";
echo "</tr>";
#---------------------------------------------

#---------------------------------------------
$array_contado=mysql_fetch_array(mysql_query('select sum(cantidad * precio_unitario) from ventas where tipo_pago="co" and fecha="'.$fecha.'"'));
$contado=$array_contado[0];
$porc1=round((($contado * 100)/$total),1);

echo "<tr>";
    echo "<td>Total contado</td>";
    echo "<td>".round($array_contado[0],2)."</td>";
    echo "<td>".$porc1."</td>";
echo "</tr>";

#---------------------------------------------
$array_tarjeta=mysql_fetch_array(mysql_query('select sum(cantidad * precio_unitario) from ventas where (tipo_pago="ta" or tipo_pago="de") and fecha="'.$fecha.'"'));

$porc1=round((($array_tarjeta[0] * 100)/$total),1);

echo "<tr>";
    echo "<td>Total tarjera</td>";
    echo "<td>".round($array_tarjeta[0],2)."</td>";
    echo "<td>".$porc1."</td>";
echo "</tr>";
#---------------------------------------------


#---------------------------------------------

#---------------------------------------------

$q='select distinct(marca) as marca1,
					 (select  sum(cantidad * precio_unitario) from ventas where fecha="'.$fecha.'" and marca1=marca) as tot1,
					 (select  sum(cantidad) from ventas where fecha="'.$fecha.'" and marca1=marca) as cant1,
					 (select  sum(cantidad * (precio_unitario - costo)) from ventas where fecha="'.$fecha.'" and marca1=marca) as rent1
					  from ventas where fecha="'.$fecha.'" order by tot1 desc limit 0,15;';

//echo $q."<br>";
$res=mysql_query($q);
while($row=mysql_fetch_array($res)){
echo "<tr>";
    echo "<td>".$row["marca1"]."</td>";
    echo "<td>".round($row["tot1"],2)."</td>";
    echo "<td>".round($row["cant1"],2)."</td>";
    echo "<td>".round($row["rent1"],2)."</td>";
    $ttt=(($row["rent1"] * 100) / $row["tot1"]);
    echo "<td>".round($ttt,2)."%</td>";
echo "</tr>";
	
}


#---------------------------------------------

echo '</table>';


?>
