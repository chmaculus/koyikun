<?php

include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
#include_once("../../login/login_verifica.inc.php");
include_once("cabecera.inc.php");

#jrarquia 0 coresponde a administrador
#if($jerarquia!="1"){
#	header('Location: ../../login/login_nologin.php?nologin=6');
#	exit;
#} 
?>


<center>
<?php

$fecha=date("Y-n-d");
$hora=date("H:i:s");

$time_stamp=time($fecha);

include("pedidos_base.php");
echo "Pedidos pendientes<br>";
$query='select distinct numero_pedido, sucursal, fecha, hora from pedidos where finalizado="N"';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
    echo "<th>Pedido N</th>";
    echo "<th>Sucursal</th>";
    echo "<th>fecha</th>";
    echo "<th>hora</th>";
    echo "<th>Dias de retraso</th>";
    echo "<th>Detalle</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
    
    echo "<tr>";
    echo '<td>'.$row["numero_pedido"].'</td>';
    echo '<td>'.nombre_sucursal($row["sucursal"]).'</td>';
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
	echo '<td><A HREF="pedidos_detalle.php?numero_pedido='.$row["numero_pedido"].'&sucursal='.$row["sucursal"].'"><button>Detalle</button></A></td>';
//    }
    
    echo "</tr>".chr(10);
    $count++;
}
?>
</table></center>