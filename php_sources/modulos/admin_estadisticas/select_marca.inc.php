<?php
/* archivo para ser llamado desde un formulario*/
//echo $marca;
$result=mysql_query('select distinct marca from ventas_estadistica where marca!="" order by marca')or die(mysql_error());
?>
<?php

if($_POST["marca"]==""){
    echo '<OPTION selected value="">SELECCIONE</OPTION>	'.chr(13);
}
while ($row= mysql_fetch_array($result)) {
    if($_POST["marca"]==$row["marca"]){
		echo '<OPTION  selected value="'.$row["marca"].'">'.$row["marca"].'</OPTION>  ';
	}else{
		echo '<OPTION value="'.$row["marca"].'">'.$row["marca"].'</OPTION>  ';
	}
	echo chr(13);
}
?>
