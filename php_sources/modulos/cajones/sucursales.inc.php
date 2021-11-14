<?php
/* archivo para ser llamado desde un formulario*/
//echo $id_sucursal;
$result=mysql_query("select * from sucursales order by sucursal")or die(mysql_error());
//echo '<SELECT name=id_sucursal>'; 

if(!$sucursal){
    echo '<OPTION selected value="">Seleccione</OPTION>	'.chr(10);
}else{
	echo '<OPTION value="">Seleccione</OPTION>	'.chr(10);
}

while ($row= mysql_fetch_array($result)) {
    if($sucursal==$row["sucursal"]){
		echo '<OPTION value="'.$row["sucursal"].'" selected >'.$row["sucursal"].'</OPTION>  ';
	}else{
		echo '<OPTION value="'.$row["sucursal"].'">'.$row["sucursal"].'</OPTION>  ';
	}
	echo chr(10);
}
//echo '</select>';

?>
