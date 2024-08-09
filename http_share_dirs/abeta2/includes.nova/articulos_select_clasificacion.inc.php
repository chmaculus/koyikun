<?php
/* archivo para ser llamado desde un formulario*/
$result=mysql_query("select distinct clasificacion from articulos order by clasificacion")or die(mysql_error());
?>
<SELECT
onchange="if (this.selectedIndex > 1) window.open 
    (document.clasificacion.dest.options
	[document.clasificacion.dest.selectedIndex]
    .value,'_top'
    ); 
    this.selectedIndex = 1;" name=clasificacion> 
<?php

if($clasificacion==""){
    echo '<OPTION selected value="">SIN clasificacion</OPTION>';
}

//echo '<OPTION value="TODAS" selected> TODAS  </OPTION>';

while ($row= mysql_fetch_array($result)) {
    if($clasificacion==$row["clasificacion"]){
		echo '<OPTION  selected value="'.$row["clasificacion"].'">'.$row["clasificacion"].'</OPTION>  ';
	}else{
		echo '<OPTION value="'.$row["clasificacion"].'">'.$row["clasificacion"].'</OPTION>  ';
	}
	echo chr(13);
}
?>
</select>
