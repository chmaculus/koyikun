<?php
/* archivo para ser llamado desde un formulario */
//echo $marca;
$marca=str_replace("\'","'",$marca);
$result=mysql_query("select distinct marca from articulos order by marca")or die(mysql_error());
?>
<SELECT name=marca> 
<?php

if( !$marca OR $marca=="" ){
    echo '<OPTION selected value="">SELECCIONE MARCA</OPTION>	'.chr(13);
}
while ( $row=mysql_fetch_array($result)) {
    if( $marca==$row["marca"] AND $marca != "" ){
		echo '<OPTION  selected value="'.$row["marca"].'">'.$row["marca"].'</OPTION>  ';
	}else{
		echo '<OPTION value="'.$row["marca"].'">'.$row["marca"].'</OPTION>  ';
	}
	echo chr(13);
}
?>
</select>
