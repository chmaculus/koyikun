<?php
/* archivo para ser llamado desde un formulario*/
//echo $id_sucursal;
$result=mysql_query("select * from sucursales order by sucursal")or die(mysql_error());
?>
<SELECT name=id_sucursal> 
<?php

if(!$_POST["id_sucursal"]){
    echo '<OPTION selected value="">Seleccione una sucursal</OPTION>	'.chr(13);
}else{
	echo '<OPTION value="">Seleccione una sucursal</OPTION>	'.chr(13);
}
while ($row= mysql_fetch_array($result)) {
    if($_POST["id_sucursal"]==$row["id"]){
		echo '<OPTION  selected value="'.$row["id"].'">'.$row["sucursal"].'</OPTION>  ';
	}else{
		echo '<OPTION value="'.$row["id"].'">'.$row["sucursal"].'</OPTION>  ';
	}
	echo chr(13);
}
?>
</select>
