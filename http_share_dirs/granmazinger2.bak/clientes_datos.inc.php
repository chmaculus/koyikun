<?php
echo '<table border="1">';



$q='select count(*) from ventas_datos_clientes where fecha="'.$fecha.'"';
$total00=mysql_result(mysql_query($q),0,0);


#-----------------------------------------------------------------------
$q='select distinct(nacionalidad) as pais1,
														(select  count(*) from ventas_datos_clientes where fecha="'.$fecha.'" and nacionalidad=pais1) as tot1
														from ventas_datos_clientes where fecha="'.$fecha.'"';

//echo $q."<br>";
$total=mysql_query($q);

if(mysql_error()){echo mysql_error()."<br>";}

while($row=mysql_fetch_array($total)) {
echo "<tr>";
    echo "<td>".$row[0]."</td>";
    echo "<td>".$row[1]."</td>";
    echo "<td>".round((($row[1] * 100 ) / $total00),1)."</td>";
echo "</tr>";
}
#-----------------------------------------------------------------------




#-----------------------------------------------------------------------
$q='select distinct(sexo) as sexo1,
														(select  count(*) from ventas_datos_clientes where fecha="'.$fecha.'" and sexo=sexo1) as tot1
														from ventas_datos_clientes where fecha="'.$fecha.'"';

//echo $q."<br><br>";
$total=mysql_query($q);

if(mysql_error()){echo mysql_error()."<br>";}

while($row=mysql_fetch_array($total)) {
echo "<tr>";
    echo "<td>".$row[0]."</td>";
    echo "<td>".$row[1]."</td>";
    echo "<td>".round((($row[1] * 100 ) / $total00),1)."</td>";
echo "</tr>";
}
#-----------------------------------------------------------------------


#-----------------------------------------------------------------------
$q='select distinct(rango) as rango1,
														(select  count(*) from ventas_datos_clientes where fecha="'.$fecha.'" and rango=rango1) as tot1
														from ventas_datos_clientes where fecha="'.$fecha.'" order by rango';

//echo $q."<br><br>";
$total=mysql_query($q);

if(mysql_error()){echo mysql_error()."<br>";}

while($row=mysql_fetch_array($total)) {
	if($row[0]=="1"){$rango=str_replace("1","Menos de 20",$row[0]);}
	if($row[0]=="2"){$rango=str_replace("2","21 - 30",$row[0]);}
	if($row[0]=="3"){$rango=str_replace("3","31 - 45",$row[0]);}
	if($row[0]=="4"){$rango=str_replace("4","46 - 60",$row[0]);}
	if($row[0]=="5"){$rango=str_replace("5","mas de 60",$row[0]);}
	
echo "<tr>";
    echo "<td>".$rango."</td>";
    echo "<td>".$row[1]."</td>";
    echo "<td>".round((($row[1] * 100 ) / $total00),1)."</td>";
echo "</tr>";
}
#-----------------------------------------------------------------------


/*
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
echo "<tr>";
    echo "<td>Total contado</td>";
    echo "<td>".round($array_contado[0],2)."</td>";
echo "</tr>";

#---------------------------------------------
$array_tarjeta=mysql_fetch_array(mysql_query('select sum(cantidad * precio_unitario) from ventas where (tipo_pago="ta" or tipo_pago="de") and fecha="'.$fecha.'"'));
echo "<tr>";
    echo "<td>Total tarjera</td>";
    echo "<td>".round($array_tarjeta[0],2)."</td>";
echo "</tr>";
#---------------------------------------------


#---------------------------------------------

#---------------------------------------------

$q='select distinct(marca) as marca1,
					 (select  sum(cantidad * precio_unitario) from ventas where fecha="'.$fecha.'" and marca1=marca) as tot1,
					 (select  sum(cantidad) from ventas where fecha="'.$fecha.'" and marca1=marca) as cant1,
					 (select  sum(cantidad * (precio_unitario - costo)) from ventas where fecha="'.$fecha.'" and marca1=marca) as rent1
					  from ventas where fecha="'.$fecha.'" order by tot1 desc limit 0,20;';

$res=mysql_query($q);
while($row=mysql_fetch_array($res)){
echo "<tr>";
    echo "<td>".$row["marca1"]."</td>";
    echo "<td>".round($row["tot1"],2)."</td>";
    echo "<td>".round($row["can11"],2)."</td>";
    echo "<td>".round($row["rent1"],2)."</td>";
echo "</tr>";
	
}


#---------------------------------------------

echo '</table>';
*/

?>
