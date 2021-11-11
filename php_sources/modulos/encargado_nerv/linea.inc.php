<?php
/* archivo para ser llamado desde un formulario*/
//echo $marca;
$marca=str_replace("\'","'",$linea);
$result=mysql_query("select distinct marca from articulos order by marca")or die(mysql_error());
?>
<SELECT name=linea> 
<?php

if(!$linea){
    echo '<OPTION selected value="">SELECCIONE MARCA</OPTION>'.chr(13);
}

echo '<OPTION value="Normal">Normal</OPTION>'.chr(13);
while ($row= mysql_fetch_array($result)) {
    if($linea==$row["marca"]){
		echo '<OPTION  selected value="'.$row["marca"].'">'.$row["marca"].'</OPTION>';
	}else{
		echo '<OPTION value="'.$row["marca"].'">'.$row["marca"].'</OPTION>';
	}
	echo chr(13);
}
?>
</select>
