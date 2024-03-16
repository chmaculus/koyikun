<?php
/*
falta que actualice tabla precios que el articulo no esta en promocion
*/
include_once("promociones_base.php");
include_once("../../includes/connect.php");

$query='delete from promociones where id="'.$_POST["id_promociones"].'"';
mysql_query($query)or die(mysql_error());
//echo "query: ".$query."<br>".chr(13);


?>