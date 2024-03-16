<?php
/* archivo para ser llamado desde un formulario*/
$query='select distinct clasificacion from articulos where marca="'.$_POST["marca"].'" order by clasificacion';
$result=mysql_query($query)or die(mysql_error());
?>
<SELECT name=clasificacion> 
<?php

if($_POST["clasificacion"]==""){
    echo '<OPTION selected value="">SIN clasificacion</OPTION>';
}

//echo '<OPTION value="TODAS" selected> TODAS  </OPTION>';

while ($row= mysql_fetch_array($result)) {
    if($_POST["clasificacion"]==$row["clasificacion"]){
		echo '<OPTION  selected value="'.$row["clasificacion"].'">'.$row["clasificacion"].'</OPTION>  ';
	}else{
		echo '<OPTION value="'.$row["clasificacion"].'">'.$row["clasificacion"].'</OPTION>  ';
	}
	echo chr(13);
}
?>
</select>
