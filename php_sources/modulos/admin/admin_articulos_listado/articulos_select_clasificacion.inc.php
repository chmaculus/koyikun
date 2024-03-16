<?php
/* archivo para ser llamado desde un formulario*/
//echo $clasificacion;


/*
$query='select distinct articulos.clasificacion from articulos,stock 
						where articulos.marca="'.$marca.'" and
								stock.stock<stock.minimo and 
								stock.id_sucursal="'.$id_sucursal.'"
									order by articulos.clasificacion';
#this query it's excelent
#not aplicable on this case									
*/

$query='select distinct clasificacion from articulos 
						where marca="'.$marca.'"
									order by clasificacion';

$result=mysql_query($query)or die(mysql_error()." ".$query);
?>
<SELECT name=clasificacion> 
<?php

if($clasificacion==""){
    echo '<OPTION selected value="TODAS">TODAS</OPTION>	'.chr(13);
}else{
	echo '<OPTION value="TODAS">TODAS</OPTION>	'.chr(13);
}
while ($row= mysql_fetch_array($result)) {
    if($clasificacion!=$row["clasificacion"]){
		echo '<OPTION value="'.$row["clasificacion"].'">'.$row["clasificacion"].'</OPTION>  ';
	}else{
		echo '<OPTION  selected value="'.$row["clasificacion"].'">'.$row["clasificacion"].'</OPTION>  ';
	}
	echo chr(13);
}
?>
</select>
