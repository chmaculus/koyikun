<?php
include_once("../../includes/connect.php");

/* archivo para ser llamado desde un formulario*/
//echo $clasificacion;
if(!$_POST["marca"]){
    echo '<OPTION selected value="">Seleccione marca</OPTION>	'.chr(13);
	return;
}

$query='select distinct clasificacion from articulos 
						where marca="'.$_POST["marca"].'" and clasificacion!=""
									order by clasificacion';

$result=mysql_query($query)or die(mysql_error()." ".$query);

if($_POST["clasificasion"]==""){
    echo '<OPTION selected value="">TODAS</OPTION>	'.chr(13);
}else{
	echo '<OPTION value="">TODAS</OPTION>	'.chr(13);
}
while ($row= mysql_fetch_array($result)) {
    if($_POST["clasificacion"]==$row["clasificacion"] AND $_POST["clasificacion"]!="" ){
		echo '<OPTION  selected value="'.$row["clasificacion"].'">'.$row["clasificacion"].'</OPTION>  ';
	}else{
		echo '<OPTION value="'.$row["clasificacion"].'">'.$row["clasificacion"].'</OPTION>  ';
	}
	echo chr(13);
}
?>
