<?php
include_once("../../conectar.php");

$query='select distinct subclasificacion from koyikun.articulos where marca="'.$_POST["marca"].'" and 
																								clasificacion="'.$_POST["clasificacion"].'" and 
																								subclasificacion!="" order by subclasificacion';
$result=mysql_query($query)or die(mysql_error());





if(!$_POST["clasificacion"]){
    echo '<OPTION selected value="">Seleccione clasificacion</OPTION>	'.chr(13);
	return;
}

if($_POST["subclasificasion"]==""){
    echo '<OPTION selected value="">TODAS</OPTION>	'.chr(13);
}else{
	echo '<OPTION value="">TODAS</OPTION>	'.chr(13);
}
while ($row= mysql_fetch_array($result)) {
    if( $subclasificacion==$row["subclasificacion"] ){
		echo '<OPTION  selected value="'.$row["subclasificacion"].'">'.$row["subclasificacion"].'</OPTION>  ';
	}else{
		echo '<OPTION value="'.$row["subclasificacion"].'">'.$row["subclasificacion"].'</OPTION>  ';
	}
	echo chr(13);
}
?>
