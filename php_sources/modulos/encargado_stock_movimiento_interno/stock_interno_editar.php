<?php 
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");
include("base.php");



$query='select * from stock_movimiento_interno where numero_envio="'.$_GET["numero_envio"].'" order by marca, clasificacion, subclasificacion, descripcion';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}

echo "q: ".$query."<br>";

echo '<center>';
echo '<form method="POST" action="update3.php">';
echo '<table class="t1">';
echo "<tr>";
	echo "<th>id_articulos</th>";
	echo "<th>cantidad</th>";
	echo "<th>marca</th>";
	echo "<th>descripcion</th>";
	echo "<th>contenido</th>";
	echo "<th>presentacion</th>";
	echo "<th>clasificacion</th>";
	echo "<th>subclasificacion</th>";
	echo "<th>Contado</th>";
	echo "<th>Descuento</th>";
	echo "<th>Desc. Max.</th>";
	echo "<th>Sub-total</th>";
	echo "<th>Sub-total c/desc</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id_articulos"].'</td>';
	echo '<td><input type="text" name="cantidad'.$row["id_articulos"].'" value="'.$row["cantidad"].'" size="3"></td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["contado"].'</td>';

	$subtotal=($row["cantidad"] * $row["contado"]);
	echo '<td><input type="text" name="descuento'.$row["id_articulos"].'" value="'.round($row["descuento"],0).'" size="3"></td>';
	if($row["descuento"]>0){$subtotal2=($subtotal-(($subtotal*$row["descuento"])/100));}else{$subtotal2=$subtotal;}
	echo '<td>'.round($row["descuento"],0).'</td>';
	echo '<td>'.round($subtotal,0).'</td>';
	$tsub1=$tsub1+$subtotal;
	$tsub2=$tsub2+$subtotal2;

	echo '<td>'.round($subtotal2,2).'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo "</tr>".chr(10);
}

$q2='select sum(cantidad) from stock_movimiento_interno where numero_envio="'.$_GET["numero_envio"].'"';
$tcant=mysql_result(mysql_query($q2),0,0);

echo '<tr>';
echo '<td></td><td>Tcant:'.$tcant.'</td><td></td><td></td><td></td><td></td><td></td><td></td>';
echo '<td>Totales</td>';
echo '<td>'.$tsub1.'</td>';
echo '<td></td>';
echo '<td>'.$tsub2.'</td>';
echo '</tr>';

echo '<tr>';
echo '<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>';
echo '<td>'.$array["cuotas"]." Cuota/s de: ".round(($tsub2 / $array["cuotas"]),2)."</td>"; 
echo '</tr>';

echo '<input type="hidden" name="query" value="">';
echo "</form>";



?>
</table></center>