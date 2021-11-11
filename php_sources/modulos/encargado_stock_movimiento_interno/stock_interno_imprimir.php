<?php 
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");
//include("base.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style2.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
</head>
<body>



<?php


$query='select * from stock_movimiento_interno where numero_envio="'.$_GET["numero_envio"].'" order by marca, clasificacion, subclasificacion, descripcion, contenido, presentacion';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}

//echo "q: ".$query."<br>";
?>

<center>



<img src="00.jpg" alt="">

<?php
/*
<font size="20" color="#000000">SISTEMA CONTROL INTERNO</font><br>
*/
?>


</center>
<br>

<center>




<?php


$query='select * from stock_movimiento_interno_datos where numero_movimiento="'.$_GET["numero_envio"].'"';
//echo $query."<br>";
$res=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$q."<br>".$_SERVER["SCRIPT_NAME"]."<br>";exit;}	

$array=mysql_fetch_array($res);

echo '<table border="0">';
echo '<tr><td>';
//echo '<font size="8" color="#000000">Uso interno exclusivamente</font>';
echo '</td></tr>';


echo '<tr><td>';
echo '<table border="1">';
echo '<tr>';
echo '	<td>Apellido</td>';
echo '	<td>'.$array["apellido"].'</td>';
echo '</tr>';
echo '<tr>';
echo '	<td>Nombre</td>';
echo '	<td>'.$array["nombre"].'</td>';
echo '</tr>';
echo '<tr>';
echo '	<td>Direccion</td>';
echo '	<td>'.$array["direccion"].'</td>';
echo '</tr>';
echo '<tr>';
echo '	<td>Localidad</td>';
echo '	<td>'.$array["localidad"].'</td>';
echo '</tr>';
echo '<tr>';
echo '	<td>Cuotas</td>';
echo '	<td>'.$array["cuotas"].'</td>';
echo '</tr>';
echo '<tr>';
echo '	<td>Numero</td>';
echo '	<td>'.$_GET["numero_envio"].'</td>';
echo '</tr>';
echo '<tr>';
echo '	<td>Fecha</td>';
echo '	<td>'.$array["fecha"].'</td>';
echo '</tr>';
echo '<tr>';
echo '	<td>Hora</td>';
echo '	<td>'.$array["hora"].'</td>';
echo '</tr>';
echo '</table>';

echo '</td></tr>';


echo "<tr><td>";
echo '<table border="1">';
echo "<tr>";
	echo "<th>cou</th>";
	echo "<th>cantidad</th>";
	echo "<th>id_articulos</th>";
	echo "<th>marca</th>";
	echo "<th>descripcion</th>";
	echo "<th>contenido</th>";
	echo "<th>presentacion</th>";
	echo "<th>clasificacion</th>";
	echo "<th>subclasificacion</th>";
	echo "<th>Contado</th>";
	echo "<th>Sub-total</th>";
	echo "<th>Descuento</th>";
	echo "<th>Sub-total c/desc</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
echo "</tr>";


$count=0;
while($row=mysql_fetch_array($result)){
	$count++;
	echo "<tr>";
	echo '<td>'.$count.'</td>';
	echo '<td>'.$row["cantidad"].'</td>';
	echo '<td>'.$row["id_articulos"].'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["contado"].'</td>';

	$subtotal=($row["cantidad"] * $row["contado"]);
	if($row["descuento"]>0){$subtotal2=($subtotal-(($subtotal*$row["descuento"])/100));}else{$subtotal2=$subtotal;}

	echo '<td>'.round($subtotal,2).'</td>';
	echo '<td>'.$row["descuento"].'</td>';
	$tsub1=$tsub1+$subtotal;
	$tsub2=$tsub2+$subtotal2;
	echo '<td>'.round($subtotal2,2).'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo "</tr>".chr(10);
}

$q='select sum(cantidad) from stock_movimiento_interno where numero_envio="'.$_GET["numero_envio"].'"';
$tcant=mysql_result(mysql_query($q),0,0);

echo '<tr>';
echo '<td></td><td>Tcant:'.$tcant.'</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>';
echo '<td>Totales</td>';
echo '<td>'.$tsub1.'</td>';
echo '<td>'.$tsub2.'</td>';
echo '</tr>';

echo '<tr>';
echo '<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>';
echo '<td>'.$array["cuotas"]." Cuota/s de: ".round(($tsub2 / $array["cuotas"]),2)."</td>"; 
echo '</tr>';



?>
</table>

</td></tr>


<tr><td>





<!-- -----------------------------------------------------  -->
<table>
	<tr>
		<td>
		<table border="1">
			<tr>
			<td>FIRMA AUTORIZACION</td>
			<td>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<br>
			</td>
			</tr>
			<tr>
			<td>FIRMA ENTREGA</td>
			<td>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<br>
			</td>
			</tr>
			<tr>
			<td>FIRMA RECEPCION</td>
			<td>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<br>
			</td>
			</tr>
		</table>
		</td>
		<td>
		</td>
	</tr>
</table>
<!-- -----------------------------------------------------  -->




</td></tr>

</table>
<?php
?>


<br><br><br>






















</center>
