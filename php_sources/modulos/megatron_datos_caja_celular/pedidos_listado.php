<?php

include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
include_once("../../login/login_verifica.inc.php");
include_once("cabecera.inc.php");

?>


<center>
<?php

$fecha=date("Y-n-d");
$hora=date("H:i:s");

$time_stamp=time($fecha);

include("pedidos_base.php");
echo "Pedidos pendientes<br>";
$query='select distinct numero_pedido, sucursal, fecha, hora, tipo from pedidos where finalizado="N"';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
    echo "<th>Pedido N</th>";
    echo "<th>Sucursal</th>";
    echo "<th>Tipo</th>";
    echo "<th>fecha</th>";
    echo "<th>hora</th>";
    echo "<th>Dias de retraso</th>";
    echo "<th>Detalle</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
    
    echo "<tr>";
    echo '<td>'.$row["numero_pedido"].'</td>';
    echo '<td>'.nombre_sucursal($row["sucursal"]).'</td>';
    echo '<td>'.$row["tipo"].'</td>';
    echo '<td>'.$row["fecha"].'</td>';
    echo '<td>'.$row["hora"].'</td>';

    $f2=strtotime($row["fecha"]);
    $retraso=($time_stamp - $f2);
    $dias=($retraso / 60 / 60 / 24);
    $aa=explode(".",$dias);
    if($aa[0]<=3){
	    echo '<td><font4>'.$aa[0].'</font4></td>';
    }elseif($aa[0]>=4 AND $aa[0]<=5){
	    echo '<td><font6>'.$aa[0].'</font6></td>';
    }elseif($aa[0]>5){
	    echo '<td><font5>'.$aa[0].'</font5></td>';
    }
    echo '<td>'.$row["finalizado"].'</td>';
//    if($count>5){
//	echo "<td></td>";
//    }else{
	echo '<td>';
		include("marcas.inc.php");
	echo '</td>';
	echo '<td><A HREF="pedidos_detalle.php?numero_pedido='.$row["numero_pedido"].'&sucursal='.$row["sucursal"].'"><button>Detalle</button></A></td>';
//    }
    
    echo "</tr>".chr(10);
    $count++;
}





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










?>
</table></center>