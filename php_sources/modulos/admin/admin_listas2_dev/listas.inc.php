<table class="t1">
<th>Nombre</th>
<th>Porcentaje</th>
<?php
$query2='select * from listas order by nombre';
$result2=mysql_query($query2)or die(mysql_error() ." ".$_SERVER["script_name"]." ".$query2);
while($row=mysql_fetch_array($result2)){
	echo '<tr>';	
	echo '<td>'.$row["nombre"].'</td>';
	echo '<td><input type="text" name="porcentaje'.$row["id"].'" size="5" value="'.$row["porcentaje"].'"></td>';
	echo '</tr>'.chr(13);
}
echo '</table>';
?>
