<?php
include_once("./connect.php");
include_once("./cabecera2.inc.php");



$fecha=date("Y-n-d");
$fecha=date("Y-n-d");





$hora=time();
$aye=$hora-(60 * 60 * 24 );
$ayer=date("Y-n-d",$aye);



echo '<table class="t1"><tr><td>HOY';

#-----------------------------------------------------------------------------
$q='select distinct responsable from pedidos where fecha_envio="'.$fecha.'"';
$res=mysql_query($q);

echo '<table class="t1">'.chr(10);

while($row=mysql_fetch_array($res)){
	$q2='select distinct numero_pedido from pedidos where responsable="'.$row["responsable"].'" and fecha_envio="'.$fecha.'"';
	$rows=mysql_num_rows(mysql_query($q2));
	echo '<tr><td>'.$row["responsable"].'</td><td>'.$rows.'</td></tr>'.chr(10);
}
echo '</table>'.chr(10);
#-----------------------------------------------------------------------------

echo '</td>';//tabla 1
echo '<td> Ultimos 30 dias';//tabla1


echo chr(10).chr(10);




#-----------------------------------------------------------------------------
//$q='select distinct responsable from pedidos where fecha_envio>="'.$u_mes.'" and fecha_envio<="'.$fecha.'"';
$res=mysql_query($q);

echo '<table class="t1">'.chr(10);

while($row=mysql_fetch_array($res)){
	$q2='select distinct numero_pedido from pedidos where responsable="'.$row["responsable"].'" and  fecha_envio>="'.$u_mes.'" and fecha_envio<="'.$fecha.'"';
	$rows=mysql_num_rows(mysql_query($q2));
	echo '<tr><td>'.$row["responsable"].'</td><td>'.$rows.'</td></tr>'.chr(10);
}
echo '</table>'.chr(10);

echo '</td>';//tabla 1
echo '</tr>';//tabla1
echo '</table>';//tabla1
#-----------------------------------------------------------------------------


















?>