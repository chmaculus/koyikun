<?php
/* archivo para ser llamado desde un formulario*/
//echo $id_sucursal;
$result=mysql_query("select distinct vendedor from ventas order by vendedor")or die(mysql_error());
?>
<SELECT name=vendedor> 
<?php

if(!$_POST["vendedor"]){
    echo '<OPTION selected value="">Seleccione vendedor</OPTION>	'.chr(13);
}else{
	echo '<OPTION value="">Seleccione vendedor</OPTION>	'.chr(13);
}
while ($row=mysql_fetch_array($result)) {
    if($_POST["vendedor"]==$row["vendedor"]){
		echo '<OPTION  selected value="'.$row["vendedor"].'">'.$row["vendedor"].'</OPTION>  ';
	}else{
		echo '<OPTION value="'.$row["vendedor"].'">'.$row["vendedor"].'</OPTION>  ';
	}
	echo chr(13);
}
?>
</select>
