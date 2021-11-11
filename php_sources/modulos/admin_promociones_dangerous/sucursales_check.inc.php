<?php

echo '<table border="1">';

$result=mysql_query('select * from sucursales where suc_reales="1" order by sucursal')or die(mysql_error());


while ($row= mysql_fetch_array($result)) {
	echo '<tr>';
	echo '<td>'.$row["sucursal"].'</td>';
	echo '<td><input type="checkbox" name="id_sucursal'.$row["id"].'" value="1"></td>';
	echo '<tr>';
	echo chr(13);
}

echo '</table>';

?>
