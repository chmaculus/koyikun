<?php
$q='select * from cajas_deudores order by deudor';
$r=mysql_query($q);
echo mysql_error();
?>

<select name="entrega_recibe">
<?php
echo '<option value="" label="SELECCIONE">SELECCIONE</option>';
while($row=mysql_fetch_array($r)){
	echo '<option value="'.$row["deudor"].'" label="'.$row["deudor"].'">'.$row["deudor"].'</option>';
}
?>

</select>