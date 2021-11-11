<?php



$fecha=date("Y-n-d");
$epoch=strtotime($fecha);

echo '<table border="1">';




#-------------------------------------------------------------------------
$epoch2=($epoch-(60*60*168));
$fecha2=date("Y-n-d",$epoch2);
$q='select distinct responsable from pedidos where estado="Preparado" and fecha_ped_prep="'.$fecha2.'"';
$res=mysql_query($q);
echo '<td><table class="t1">'.chr(10);
echo '<tr><td class="fecha">'.$fecha2.'</tr></tr>';
while($row=mysql_fetch_array($res)){
        $q2='select distinct numero_pedido from pedidos where responsable="'.$row["responsable"].'" and estado="Preparado" and fecha_ped_prep="'.$fecha2.'"';
        $rows=mysql_num_rows(mysql_query($q2));
        echo '<tr><td>'.$row["responsable"].'</td><td>'.$rows.'</td></tr>'.chr(10);
//        echo '<tr><td>'.$row["responsable"].'</td><td>'.$rows.'</td><td>'.$q2.'</td></tr>'.chr(10);
        //echo '<td>'.$q2.'</td>';
}
echo '</table></td>'.chr(10);
#-------------------------------------------------------------------------


#-------------------------------------------------------------------------
$epoch2=($epoch-(60*60*144));
$fecha2=date("Y-n-d",$epoch2);
$q='select distinct responsable from pedidos where estado="Preparado" and fecha_ped_prep="'.$fecha2.'"';
$res=mysql_query($q);
echo '<td><table class="t1">'.chr(10);
echo '<tr><td class="fecha">'.$fecha2.'</tr></tr>';
while($row=mysql_fetch_array($res)){
        $q2='select distinct numero_pedido from pedidos where responsable="'.$row["responsable"].'" and estado="Preparado" and fecha_ped_prep="'.$fecha2.'"';
        $rows=mysql_num_rows(mysql_query($q2));
        echo '<tr><td>'.$row["responsable"].'</td><td>'.$rows.'</td></tr>'.chr(10);
//        echo '<tr><td>'.$row["responsable"].'</td><td>'.$rows.'</td><td>'.$q2.'</td></tr>'.chr(10);
        //echo '<td>'.$q2.'</td>';
}
echo '</table></td>'.chr(10);
#-------------------------------------------------------------------------




#-------------------------------------------------------------------------
$epoch2=($epoch-(60*60*120));
$fecha2=date("Y-n-d",$epoch2);
$q='select distinct responsable from pedidos where estado="Preparado" and fecha_ped_prep="'.$fecha2.'"';
$res=mysql_query($q);
echo '<td><table class="t1">'.chr(10);
echo '<tr><td class="fecha">'.$fecha2.'</tr></tr>';
while($row=mysql_fetch_array($res)){
        $q2='select distinct numero_pedido from pedidos where responsable="'.$row["responsable"].'" and estado="Preparado" and fecha_ped_prep="'.$fecha2.'"';
        $rows=mysql_num_rows(mysql_query($q2));
        echo '<tr><td>'.$row["responsable"].'</td><td>'.$rows.'</td></tr>'.chr(10);
//        echo '<tr><td>'.$row["responsable"].'</td><td>'.$rows.'</td><td>'.$q2.'</td></tr>'.chr(10);
        //echo '<td>'.$q2.'</td>';
}
echo '</table></td>'.chr(10);
#-------------------------------------------------------------------------




#-------------------------------------------------------------------------
$epoch2=($epoch-(60*60*96));
$fecha2=date("Y-n-d",$epoch2);
$q='select distinct responsable from pedidos where estado="Preparado" and fecha_ped_prep="'.$fecha2.'"';
$res=mysql_query($q);
echo '<td><table class="t1">'.chr(10);
echo '<tr><td class="fecha">'.$fecha2.'</tr></tr>';
while($row=mysql_fetch_array($res)){
        $q2='select distinct numero_pedido from pedidos where responsable="'.$row["responsable"].'" and estado="Preparado" and fecha_ped_prep="'.$fecha2.'"';
        $rows=mysql_num_rows(mysql_query($q2));
        echo '<tr><td>'.$row["responsable"].'</td><td>'.$rows.'</td></tr>'.chr(10);
//        echo '<tr><td>'.$row["responsable"].'</td><td>'.$rows.'</td><td>'.$q2.'</td></tr>'.chr(10);
        //echo '<td>'.$q2.'</td>';
}
echo '</table></td>'.chr(10);
#-------------------------------------------------------------------------

#-------------------------------------------------------------------------
$epoch2=($epoch-(60*60*72));
$fecha2=date("Y-n-d",$epoch2);
$q='select distinct responsable from pedidos where estado="Preparado" and fecha_ped_prep="'.$fecha2.'"';
$res=mysql_query($q);
echo '<td><table class="t1">'.chr(10);
echo '<tr><td class="fecha">'.$fecha2.'</tr></tr>';
while($row=mysql_fetch_array($res)){
        $q2='select distinct numero_pedido from pedidos where responsable="'.$row["responsable"].'" and estado="Preparado" and fecha_ped_prep="'.$fecha2.'"';
        $rows=mysql_num_rows(mysql_query($q2));
        echo '<tr><td>'.$row["responsable"].'</td><td>'.$rows.'</td></tr>'.chr(10);
//        echo '<tr><td>'.$row["responsable"].'</td><td>'.$rows.'</td><td>'.$q2.'</td></tr>'.chr(10);
        //echo '<td>'.$q2.'</td>';
}
echo '</table></td>'.chr(10);
#-------------------------------------------------------------------------


#-------------------------------------------------------------------------
$epoch2=($epoch-(60*60*48));
$fecha2=date("Y-n-d",$epoch2);
$q='select distinct responsable from pedidos where estado="Preparado" and fecha_ped_prep="'.$fecha2.'"';
$res=mysql_query($q);
echo '<td><table class="t1">'.chr(10);
echo '<tr><td class="fecha">'.$fecha2.'</tr></tr>';
while($row=mysql_fetch_array($res)){
        $q2='select distinct numero_pedido from pedidos where responsable="'.$row["responsable"].'" and estado="Preparado" and fecha_ped_prep="'.$fecha2.'"';
        $rows=mysql_num_rows(mysql_query($q2));
        echo '<tr><td>'.$row["responsable"].'</td><td>'.$rows.'</td></tr>'.chr(10);
//        echo '<tr><td>'.$row["responsable"].'</td><td>'.$rows.'</td><td>'.$q2.'</td></tr>'.chr(10);
        //echo '<td>'.$q2.'</td>';
}
echo '</table></td>'.chr(10);
#-------------------------------------------------------------------------



#-------------------------------------------------------------------------
$epoch2=($epoch-(60*60*24));
$fecha2=date("Y-n-d",$epoch2);
$q='select distinct responsable from pedidos where estado="Preparado" and fecha_ped_prep="'.$fecha2.'"';
$res=mysql_query($q);
echo '<td><table class="t1">'.chr(10);
echo '<tr><td class="fecha">'.$fecha2.'</tr></tr>';
while($row=mysql_fetch_array($res)){
        $q2='select distinct numero_pedido from pedidos where responsable="'.$row["responsable"].'" and estado="Preparado" and fecha_ped_prep="'.$fecha2.'"';
        $rows=mysql_num_rows(mysql_query($q2));
        echo '<tr><td>'.$row["responsable"].'</td><td>'.$rows.'</td></tr>'.chr(10);
//        echo '<tr><td>'.$row["responsable"].'</td><td>'.$rows.'</td><td>'.$q2.'</td></tr>'.chr(10);
        //echo '<td>'.$q2.'</td>';
}
echo '</table></td>'.chr(10);
#-------------------------------------------------------------------------









#-------------------------------------------------------------------------
$q='select distinct responsable from pedidos where estado="Preparado" and fecha_ped_prep="'.$fecha.'"';
$res=mysql_query($q);
echo '<td><table class="t1">'.chr(10);
echo '<tr><td class="fecha">'.$fecha.'</tr></tr>';
while($row=mysql_fetch_array($res)){
        $q2='select distinct numero_pedido from pedidos where responsable="'.$row["responsable"].'" and estado="Preparado" and fecha_ped_prep="'.$fecha.'"';
        $rows=mysql_num_rows(mysql_query($q2));
        echo '<tr><td>'.$row["responsable"].'</td><td>'.$rows.'</td></tr>'.chr(10);
        //echo '<td>'.$q2.'</td>';
}
echo '</table></td>'.chr(10);
#-------------------------------------------------------------------------

echo '</table>';
echo '<br>';


/*
query OK
$query='select distinct pedidos.numero_pedido, pedidos.sucursal, pedidos.fecha
	from pedidos,marcas_zonas
		where pedidos.estado is NULL and
			pedidos.marca=marcas_zonas.marca and
				(pedidos.zona="1" or
					pedidos.zona="2" or
						pedidos.zona="3")
								order by fecha';
*/
							


$q='select pedidos.fecha from pedidos, marcas_zonas where
		pedidos.estado is NULL and
			pedidos.marca=marcas_zonas.marca and
				(pedidos.zona="1" or
					pedidos.zona="2" or
						pedidos.zona="3")
								order by fecha limit 0,1';


//echo $q."<br>";
$ress=mysql_query($q);
if(mysql_error()){echo mysql_error()."<br>";}


$arr=mysql_fetch_array($ress);


//echo $q;

$fecha=date("Y-n-d");
$time_stamp=time($fecha);

$f2=strtotime($arr[0]);
$retraso=($time_stamp - $f2);
$dias=($retraso / 60 / 60 / 24);
$aa=explode(".",$dias);

/*
echo "a:".$arr[0]."<br>";
echo "retr:".$retraso."<br>";
echo "dias:".$dias."<br>";
*/



echo chr(10).'<br><br><br><br><br><br>';
echo chr(10).'<font size="20">Dias atraso: </font>';

//echo chr(10).'<br><br><br><br><br><br>';
echo chr(10).'<font id="font4">'.$aa[0].'</font>';


$q='select distinct numero_pedido from pedidos where estado is NULL 
																		and finalizado is null
																		and fecha_envio is NULL
																		and estado !="Preparado" 
																			and (pedidos.zona="1" 
																						or pedidos.zona="2" 
																						or pedidos.zona="3")
																	';


$q='select distinct numero_pedido, sucursal from pedidos where
		pedidos.estado is NULL and
				(pedidos.zona="1" or
					pedidos.zona="2" or
						pedidos.zona="3")
								order by fecha';

$res=mysql_query($q);
if(mysql_error()){echo mysql_error();}
$rows=mysql_num_rows($res);

//echo chr(10).'<br><br><br><br><br><br>';
echo '&nbsp;&nbsp;&nbsp;';


//echo "r: ".$rows."<br>";

echo chr(10).'<font size="20">Pedidos pendientes: </font><font id="font4">'.$rows.'</font>';
//echo $q."<br>";

?>


<br><br><br><br>