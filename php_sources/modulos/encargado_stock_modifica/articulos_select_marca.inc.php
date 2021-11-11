<?php
/* archivo para ser llamado desde un formulario*/
//echo $marca;
$result=mysql_query("select distinct marca from articulos order by marca")or die(mysql_error());
?>
<SELECT name=marca> 
<?php

if($marca==""){
    echo '<OPTION selected value="">TODAS</OPTION>	'.chr(13);
}else{
	echo '<OPTION value="">TODAS</OPTION>	'.chr(13);
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
</select>
