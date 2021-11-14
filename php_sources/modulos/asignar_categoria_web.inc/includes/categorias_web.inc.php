<select name="id_web">
///////////////////////////////////////
<?php
include_once("../includes/connect.php");



if( $array_articulos["id_web"]<1 ){
	echo '<OPTION  selected value="">SELECCIONE</OPTION>  ';
}


echo '<OPTION value="">SIN ASIGNAR</OPTION>  ';

$query='select * from categorias_web order by categoria, subcategoria';
#$query='select * from id_web';
$result=mysql_query($query)or die(mysql_error()." ".$query);


while ($row=mysql_fetch_array($result)) {
	if( $array_articulos["id_web"]==$row["id"] ){
		echo '<OPTION  selected value="'.$row["id"].'">'.$row["categoria"]." - ".$row["subcategoria"].'</OPTION>  ';
	}else{
		echo '<OPTION value="'.$row["id"].'">'.$row["categoria"]." - ".$row["subcategoria"].'</OPTION>  ';
	}
	echo chr(10);
}

?>
///////////////////////////////////////
</select>

