


<?php
#exit;
include("../includes/connect.php");
include("../includes/funciones_stock.php");


/*
verifica tabla stock id art, id_suc
*/

$id_sucursal=$_COOKIE["id_sucursal"];


$query=base64_decode($_POST["query"]);
//$query='select * from articulos limit 0,100';
echo $query;


$res=mysql_query($query);
while($row=mysql_fetch_array($res)){
	 verifica_tabla_stock($row["id"],$id_sucursal);

	 $q='update stock set fijo="'.$_POST["fijo".$row["id"]].'" where id_articulo="'.$row["id"].'" and id_sucursal="'.$id_sucursal.'"';
	 mysql_query($q);
	 echo $q."<br>";
}







//mysql_query($q);
//if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}


?>
