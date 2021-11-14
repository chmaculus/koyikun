<?php
/* archivo para ser llamado desde un formulario*/
$result=mysql_query("select sucursal from sucursales order by sucursal")or die(mysql_error());
?>
<SELECT
onchange="if (this.selectedIndex > 1) window.open 
    (document.clasificacion.dest.options
	[document.clasificacion.dest.selectedIndex]
    .value,'_top'
    ); 
    this.selectedIndex = 1;" name=sucursal> 
<?php

if($sucursal==""){
    echo '<OPTION selected value="">NINGUNA</OPTION>';
}

//echo '<OPTION value="TODAS" selected> TODAS  </OPTION>';

while ($row= mysql_fetch_array($result)) {
		echo '<OPTION value="'.$row["sucursal"].'">'.$row["sucursal"].'</OPTION>';echo chr(13);
}
?>
</select>
