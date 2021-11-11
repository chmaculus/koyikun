<?php
/* archivo para ser llamado desde un formulario*/
//echo $marca;
$result=mysql_query("select distinct marca from articulos order by marca")or die(mysql_error());
?>
<SELECT name=marca> 
<?php

if($_POST["marca"]==""){
    echo '<OPTION selected value="">SIN MARCA</OPTION>';
}

//echo '<OPTION value="TODAS" selected> TODAS  </OPTION>';

while ($row= mysql_fetch_array($result)) {
    if($_POST["marca"]==$row["marca"]){
		echo '<OPTION  selected value="'.$row["marca"].'">'.$row["marca"].'</OPTION>  ';
	}else{
		echo '<OPTION value="'.$row["marca"].'">'.$row["marca"].'</OPTION>  ';
	}
	echo chr(13);
}
?>
</select>
