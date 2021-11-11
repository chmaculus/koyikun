<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="../css/style.css" type="text/css">
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
  <title>Tablabla cuota_alquiler By Christian Máculus</title>
</head>



<center>
<?php
include("../includes/connect.php");
$query="select * from cuota_alquiler limit 0,1000";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>sucursal</th>";
	echo "<th>valor</th>";
	echo "<th>valor2</th>";
	echo "<th>Modificar</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["sucursal"].'</td>';
	echo '<td>'.$row["a"].'</td>';
	echo '<td>'.$row["b"].'</td>';
	echo '<td><A HREF="cuota_alquiler_ingreso.php?id_cuota_alquiler='.$row["id"].'"><button>Modificar</button></A></td>';
    	echo "</tr>".chr(10);
}
?>
</table></center>

