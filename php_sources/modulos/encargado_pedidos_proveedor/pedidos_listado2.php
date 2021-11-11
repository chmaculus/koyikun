<?php

include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
include_once("../../login/login_verifica.inc.php");
include_once("cabecera.inc.php");

#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
?>

<center>
<?php

include("pedidos_base.php");
echo "Pedidos finalizados<br>";

$query='select distinct numero_pedido, fecha, hora from pedidos_proveedor where finalizado="S"';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
    echo "<th>Pedido N</th>";
    echo "<th>Total N</th>";
    echo "<th>fecha</th>";
    echo "<th>hora</th>";
    echo "<th>Detalle</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	$q='select sum(costo * cantidad_solicitada) where numero_pedido="'.$row["numero_pedido"].'"';
	$total=mysql_result(mysql_query($q),0,0);
    echo "<tr>";
    echo '<td>'.$row["numero_pedido"].'</td>';
    echo '<td>'.$total.'</td>';
    echo '<td>'.$row["fecha"].'</td>';
    echo '<td>'.$row["hora"].'</td>';
    echo '<td>'.$row["finalizado"].'</td>';
    echo '<td><A HREF="pedidos_detalle.php?numero_pedido='.$row["numero_pedido"].'&sucursal='.$row["sucursal"].'"><button>Detalle</button></A></td>';
    echo "</tr>".chr(10);
}
?>
</table></center>