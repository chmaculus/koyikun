<?php

include_once("connect.php");
include_once("../../includes/funciones_varias.php");
//include_once("../../login/login_verifica.inc.php");
include_once("cabecera.inc.php");

?>


<center>
<?php

$fecha=date("Y-n-d");
$hora=date("H:i:s");

$time_stamp=time($fecha);

include("pedidos_base.php");

echo "Pedidos pendientes<br>";

$query='select distinct fecha from pedidos where finalizado="N" order by fecha';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}




#--------------------------------------------------------------------------------
#cantidad pedidos penientes
$q='select distinct numero_pedido, sucursal from pedidos where finalizado="N"';
$pendientes=mysql_num_rows(mysql_query($q));
#--------------------------------------------------------------------------------



//echo $query."<br>";

echo '<table class="t1>"<tr><td>';
echo '<table class="t1">';
echo "<tr>";
    echo "<th>Fecha</th>";
    echo "<th>Cantidad</th>";
    echo "<th>Dias retraso</th>";
    echo "<th>Finalizados</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
    $rows=mysql_num_rows(mysql_query('select distinct numero_pedido from pedidos where finalizado="N" and fecha="'.$row["fecha"].'"'));
    $rows2=mysql_num_rows(mysql_query('select distinct numero_pedido from pedidos where finalizado="S" and fecha_envio="'.$row["fecha"].'"'));

    $f2=strtotime($row["fecha"]);
    $retraso=($time_stamp - $f2);
    $dias=($retraso / 60 / 60 / 24);
    $aa=explode(".",$dias);

    $total=$total+$rows;
    echo "<tr>";
    echo '<td>'.$row["fecha"].'</td>';
    echo '<td>'.$rows.'</td>';
    echo '<td>'.$aa[0].'</td>';
    echo '<td>'.$rows2.'</td>';

    echo "</tr>".chr(10);
    $count++;
}

echo "</table></td>";

echo '<td><table class="t1"><tr>';
echo '<td><font size="6px">Total</font></td>';
echo '</tr>';
echo '<tr>';
echo '<td><font size="6px">'.$pendientes.'</font></td>';
echo '</tr>';
echo '</table>';

echo '</td></tr></table>';


/*
function contar1($marca, $numero_pedido, $sucursal){
		
	$q2='select count(*) from articulos,pedidos where 	pedidos.numero_pedido="'.$numero_pedido.'" and 
																				pedidos.sucursal="'.$sucursal.'" and
																				articulos.marca="'.$marca.'" and
																				articulos.id=pedidos.id_articulo'; 
																					
	$res2=mysql_query($q2);
	if(mysql_error()){
		echo "<td>".mysql_error()."</td>";
	}

	//echo "<td>".$q2."</td>";
	$array=mysql_fetch_array($res2);
	//$rows=mysql_num_rows($res2);
	return $array[0];
}
*/









?>
</table></center>