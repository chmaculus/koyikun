<?php

//include_once("../cabecera.inc.php");
//include_once("../connect.php");

$fecha=date("Y-n-d");
$epoch=strtotime($fecha);


$show=0;

$epoch1=strtotime($i." days", $epoch);
$epoch2=strtotime($i." month", $epoch);
$aa=date("Y-m-d",$epoch1);
$bb=date("Y-m",$epoch2);
$week=date("w",$epoch1);


echo '<table><tr valign="top"><td valign="top">'.chr(10);

#-------------------------------------------------------
echo '	<table border="1"><tr>'.chr(10);

for($i=168;$i>=0;$i=$i-24){
	if($i==72){echo '</tr><tr>'.chr(10);}
	$epoch2=($epoch-(60*60*$i));
	$fecha2=date("Y-n-d",$epoch2);
	$week=date("w",$epoch2);

	#-------------------------------------------------------------------------
	echo '	<td>'.chr(10);
	echo '		<table class="t1">'.chr(10);
	//echo '<tr><td class="fecha">'.$fecha2.'</tr></tr>';
	echo '		<tr><td class="fecha">'.$days[$week]." ".date("d",$epoch2).'</td></tr>'.chr(10);


	$q='select distinct responsable from pedidos where fecha_ped_prep="'.$fecha2.'"';
	if ($show==1){echo "q1: ".$q."<br><br>";}

	$res=mysql_query($q);
	while($row=mysql_fetch_array($res)){
        $q2='select distinct numero_pedido, sucursal from pedidos where responsable="'.$row["responsable"].'" and fecha_ped_prep is not null and fecha_ped_prep="'.$fecha2.'"';
        if ($show==1){echo "q2: ".$q2."<br><br>";}
        $rows=mysql_num_rows(mysql_query($q2));
        if($row["responsable"]=="VICTOR"){echo '		<tr><td class="victor">'.$row["responsable"].'</td><td>'.$rows.'</font></td></tr>'.chr(10);}
        if($row["responsable"]=="MATIAS"){echo '		<tr><td class="matias">'.$row["responsable"].'</td><td>'.$rows.'</font></td></tr>'.chr(10);}
        if($row["responsable"]=="SANDRA"){echo '		<tr><td class="sandra">'.$row["responsable"].'</td><td>'.$rows.'</font></td></tr>'.chr(10);}
        echo chr(10);
	}
	echo '		</table>'.chr(10).'	</td>'.chr(10);
	#-------------------------------------------------------------------------
//	echo "i: ".$i."<br>";
}


echo '	</tr></table>'.chr(10);
echo '</td>';





echo '	<td valign="top">';
#-------------------------------------------------------------------------------------------
#muestra dias de atraso
echo '<br>';
$q='select pedidos.fecha from pedidos, marcas_zonas where
		pedidos.estado is NULL and
			pedidos.marca=marcas_zonas.marca and
				(pedidos.zona="1" or
					pedidos.zona="2" or
						pedidos.zona="3")
								order by fecha limit 0,1';


$ress=mysql_query($q);
if(mysql_error()){echo mysql_error()."<br>";}
$arr=mysql_fetch_array($ress);


$fecha=date("Y-n-d");
$time_stamp=time($fecha);

$f2=strtotime($arr[0]);
$retraso=($time_stamp - $f2);
$dias=($retraso / 60 / 60 / 24);
$aa=explode(".",$dias);



//echo chr(10).'<br><br>';
echo chr(10).'<font size="5">Dias<br><br>atraso: </font>';
echo chr(10).'<font size="5">'.$aa[0].'</font><br>';


$q='select distinct numero_pedido, sucursal from pedidos where
		pedidos.estado is NULL and
				(pedidos.zona="1" or
					pedidos.zona="2" or
						pedidos.zona="3")
								order by fecha';

$res=mysql_query($q);
if(mysql_error()){echo mysql_error();}
$rows=mysql_num_rows($res);

//echo '&nbsp;&nbsp;&nbsp;';


echo chr(10).'<br><font size="5"><br>Pedidos<br><br>pendientes:<br><br></font>
<font size="5">'.$rows.'</font><br>';
#fin muestra dias de atraso
#-------------------------------------------------------------------------------------------

echo '	</td>';










echo '</tr></table>'.chr(10);
#-------------------------------------------------------

