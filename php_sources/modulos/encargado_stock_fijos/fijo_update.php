<?php
include("../includes/connect.php");
include("../includes/funciones_stock.php");


/*
verifica tabla stock id art, id_suc
*/

verifica_tabla_stock($_POST["id_articulo"],$_POST["id_sucursal"]);



$q='update stock set fijo="'.$_POST["fijo"].'" where id_articulo="'.$_POST["id_articulo"].'" and id_sucursal="'.$_POST["id_sucursal"].'"';

echo $q."<br>";

mysql_query($q);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}


?>
<script type="text/javascript" >

open(location, '_self').close();

</script>

