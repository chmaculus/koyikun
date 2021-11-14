<?php
include_once("../../includes/connect.php");
//include_once("../../includes/funciones_varias.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad_1.inc.php");

include_once("cabecera.inc.php");
include_once("links.php");




$q='select * from articulos where id="'.$_GET["id_articulos"].'"';

$result=mysql_query($q);
if(mysql_error()){
	echo mysql_error();
}
$array_articulos=mysql_fetch_array($result);

	
echo '<body onLoad=document.aa.stock_nuevo.focus()>';
echo '<form name="aa" action="stock_update.php" method="post">';

echo "<center><br><br>";

include_once("articulos_muestra.inc.php");

echo "<br>";



include_once("stock_ingreso.inc.php");
?>