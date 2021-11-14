<select name="proveedor">
<option value="">Seleccione</option>
<?php
include("../includes/connect.php");
$q='select nombre  from logic.proveedores order by nombre';
$res=mysql_query($q);
while($row=mysql_fetch_array($res)){
	echo '<option value="'.$row[0].'">'.$row[0].'</option>'.chr(10);	
}
?>

</select>