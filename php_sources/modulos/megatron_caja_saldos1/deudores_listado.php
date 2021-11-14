


<?php
echo "<center>";
include("index.php");
include_once("../includes/connect.php");
$query="select * from cajas_deudores limit 0,1000";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id</th>";
	echo "<th>deudor</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["deudor"].'</td>';
	echo "</tr>".chr(10);
}
?>
</table></center>
