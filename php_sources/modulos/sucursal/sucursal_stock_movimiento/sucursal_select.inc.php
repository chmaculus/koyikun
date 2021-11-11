<?php
/* archivo para ser llamado desde un formulario*/
//echo $id_sucursal;
$result=mysql_query("select * from sucursales order by sucursal")or die(mysql_error());
?>
<SELECT name=id_destino> 
<?php

if($id_sucursal==""){
    echo '<OPTION selected value="">Seleccione una sucursal</OPTION>	'.chr(13);
}else{
	echo '<OPTION value="">Seleccione una sucursal</OPTION>	'.chr(13);
}
while ($row= mysql_fetch_array($result)) {
	echo '<OPTION value="'.$row["id"].'">'.$row["sucursal"].'</OPTION>';
	echo chr(13);
}
?>
</select>
