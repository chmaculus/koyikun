
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Tablabla caja_saldos By Christian Máculus</title>
</head>



<center>
<?php


include("index.php");
include("../includes/connect.php");


echo '<form method="post" action="'.$_SERVER["SCRIPT_NAME"].'">';
if($_POST["TODOS"]=="selected"){
	echo 'Todos<input type="checkbox" name="TODOS" value="selected" checked>';
	$query='select distinct codigo, entrega_recibe, fecha from caja_saldos order by fecha desc limit 0,100';
}else{
	echo 'Todos<input type="checkbox" name="TODOS" value="selected">';
	$query='select distinct codigo, entrega_recibe, fecha from caja_saldos where saldo>0 order by fecha desc limit 0,100';
}
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
echo '</form>';



$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>codigo</th>";
	echo "<th>Fecha</th>";
	echo "<th>Entrega/Recibe</th>";
	echo "<th>Egreso</th>";
	echo "<th>Rendiciones</th>";
	echo "<th>Adeuda</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	$query='select entrega_recibe, sum(debe), sum(haber) from caja_saldos where codigo="'.$row["codigo"].'"';
	$array=mysql_fetch_array(mysql_query($query));
	
	echo "<tr>";
	
	echo '<td><a href="caja_saldos_rendiciones.php?codigo='.$row["codigo"].'">'.$row["codigo"].'</a></td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["entrega_recibe"].'</td>';
	echo '<td>'.$array[1].'</td>';
	echo '<td>'.$array[2].'</td>';
	echo '<td>'.($array[1] - $array[2]).'</td>';
	echo "</tr>".chr(10);
}

?>
</table>

<?php
include("saldos.inc.php");
?>

</center>
