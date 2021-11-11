<?php
/* archivo para ser llamado desde un formulario*/
//echo $marca;
$result=mysql_query("select distinct marca from articulos order by marca")or die(mysql_error());
?>
<SELECT
onchange="if (this.selectedIndex > 1) window.open 
    (document.clasificacion.dest.options
	[document.clasificacion.dest.selectedIndex]
    .value,'_top'
    ); 
    this.selectedIndex = 1;" name=marca> 
<?php

if($marca==""){
    echo '<OPTION selected value="">SIN MARCA</OPTION>';
}

//echo '<OPTION value="TODAS" selected> TODAS  </OPTION>';

while ($row= mysql_fetch_array($result)) {
    if($marca==$row["marca"]){
		echo '<OPTION  selected value="'.$row["marca"].'">'.$row["marca"].'</OPTION>  ';
	}else{
		echo '<OPTION value="'.$row["marca"].'">'.$row["marca"].'</OPTION>  ';
	}
	echo chr(13);
}
?>
</select>
