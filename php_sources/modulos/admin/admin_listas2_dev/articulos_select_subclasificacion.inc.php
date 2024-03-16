<?php
/* archivo para ser llamado desde un formulario*/
//echo $subclasificacion;
$query='select distinct subclasificacion from articulos where marca="'.$marca.'" and clasificacion="'.$clasificasion.'" order by subclasificacion';
$result=mysql_query($query)or die(mysql_error());
?>
<SELECT name=subclasificacion> 
<?php

if($subclasificacion==""){
    echo '<OPTION selected value="TODAS">TODAS</OPTION>	'.chr(13);
}else{
	echo '<OPTION value="TODAS">TODAS</OPTION>	'.chr(13);
}
while ($row= mysql_fetch_array($result)) {
    if($subclasificacion!=$row["subclasificacion"]){
		echo '<OPTION value="'.$row["subclasificacion"].'">'.$row["subclasificacion"].'</OPTION>  ';
	}else{
		echo '<OPTION  selected value="'.$row["subclasificacion"].'">'.$row["subclasificacion"].'</OPTION>  ';
	}
	echo chr(13);
}
?>
</select>
