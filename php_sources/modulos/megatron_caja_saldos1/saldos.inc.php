<?php
$query="select distinct entrega_recibe from caja_saldos";
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<br><table class="t1">';
echo "<tr>";
	echo "<th>entrega_recibe</th>";
	echo "<th>Adeuda</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	$q='select sum(debe - haber) from caja_saldos where entrega_recibe="'.$row["entrega_recibe"].'"';
	
	$res=mysql_fetch_array(mysql_query($q));
	echo "<tr>";
	echo '<td>'.$row["entrega_recibe"].'</td>';
	echo '<td>'.round($res[0],2).'</td>';
	//echo '<td>'.$q.'</td>';
	echo "</tr>".chr(10);
}
?>
</table></center>
