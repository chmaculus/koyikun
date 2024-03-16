<?php
$query='select * from listas where id="'.$id_listas.'"';
$array_listas=mysql_fetch_array(mysql_query($query));
?>

<table class="t1">
	<tr>
		<td>id</td>
		<td><?php echo $array_listas["id"]; ?></td>
	</tr>
	<tr>
		<td>nombre</td>
		<td><?php echo $array_listas["nombre"]; ?></td>
	</tr>
	<tr>
		<td>porcentaje</td>
		<td><?php echo $array_listas["porcentaje"]; ?></td>
	</tr>
</table>
