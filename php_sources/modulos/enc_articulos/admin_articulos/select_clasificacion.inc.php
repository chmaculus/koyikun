<?php
include_once("../../includes/connect.php");


/* archivo para ser llamado desde un formulario*/
//echo $clasificacion;

if($_POST["marca"]){
	$marca=$_POST["marca"];
}


if(!$marca AND $clasificacion=="" ){
    echo '<OPTION selected value="">Seleccione marca</OPTION>	'.chr(13);
	return;
}

//if($clasificacion AND $clasificacion!=""){
    //echo '<OPTION selected value="'.$clasificacion.'">'.$clasificacion.'</OPTION>	'.chr(13);
//}

$query='select distinct clasificacion from articulos 
						where marca="'.$marca.'" and clasificacion!=""
									order by clasificacion';

$result=mysql_query($query)or die(mysql_error()." ".$query);

if($clasificacion==""){
    echo '<OPTION selected value="">TODAS</OPTION>	'.chr(13);
}else{
	echo '<OPTION value="">TODAS</OPTION>	'.chr(13);
}
while ($row= mysql_fetch_array($result)) {
    if( $clasificacion==$row["clasificacion"] AND $clasificacion != "" ){
		echo '<OPTION  selected value="'.$row["clasificacion"].'">'.$row["clasificacion"].'</OPTION>  ';
	}else{
		echo '<OPTION value="'.$row["clasificacion"].'">'.$row["clasificacion"].'</OPTION>  ';
	}
	echo chr(13);
}
?>
