<?php
include_once("../../includes/connect.php");

if($_POST["marca"]){
	$marca=$_POST["marca"];
}

if($_POST["clasificacion"]){
	$clasificacion=$_POST["clasificacion"];
}

$query='select distinct subclasificacion from articulos where marca="'.$marca.'" and clasificacion="'.$clasificacion.'" and subclasificacion!="" order by subclasificacion';
$result=mysql_query($query)or die(mysql_error());

if(!$subclasificacion){
    echo '<OPTION selected value="">Seleccione clasificacion</OPTION>	'.chr(13);
	//return;
}

if($subclasificasion==""){
    echo '<OPTION selected value="">TODAS</OPTION>	'.chr(13);
}else{
	echo '<OPTION value="">TODAS</OPTION>	'.chr(13);
}
while ($row= mysql_fetch_array($result)) {
    if( $subclasificacion == $row["subclasificacion"] ){
		echo '<OPTION  selected value="'.$row["subclasificacion"].'">'.$row["subclasificacion"].'</OPTION>  ';
	}else{
		echo '<OPTION value="'.$row["subclasificacion"].'">'.$row["subclasificacion"].'</OPTION>  ';
	}
	echo chr(13);
}
?>
