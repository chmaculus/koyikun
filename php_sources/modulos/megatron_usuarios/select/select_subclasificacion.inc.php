<?php
include_once("../../conectar.php");

if($_POST["marca"]){
//echo '<OPTION selected value="">post</OPTION>	'.chr(13);
	$marca=$_POST["marca"];
}else if($array_articulos["marca"]){
//echo '<OPTION selected value="">array</OPTION>	'.chr(13);
	$marca=$array_articulos["marca"];
}

if($_POST["clasificacion"]){
//echo '<OPTION selected value="">post</OPTION>	'.chr(13);
	$clasificacion=$_POST["clasificacion"];
}else if($array_articulos["clasificacion"]){
//echo '<OPTION selected value="">array</OPTION>	'.chr(13);
	$clasificacion=$array_articulos["clasificacion"];
}

if($_POST["subclasificacion"]){
//echo '<OPTION selected value="">post</OPTION>	'.chr(13);
	$subclasificacion=$_POST["subclasificacion"];
}else if($array_articulos["subclasificacion"]){
//echo '<OPTION selected value="">array</OPTION>	'.chr(13);
	$subclasificacion=$array_articulos["subclasificacion"];
}


$query='select distinct subclasificacion from koyikun.articulos where marca="'.$marca.'" and 
																								clasificacion="'.$clasificacion.'" and 
																								subclasificacion!="" order by subclasificacion';
$result=mysql_query($query)or die(mysql_error());





if(!$clasificacion){
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
