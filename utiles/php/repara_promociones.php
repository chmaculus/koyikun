<?php
include_once("./includes/connect.php");

$fecha=date("Y-n-d");


$q='select id_articulos, id_sucursal, fecha_finaliza from promociones where fecha_finaliza>="'.$fecha.'" and habilitado="S"';
$res=mysql_query($q);
//echo "rows: ".mysql_num_rows($res).chr(10);


while($row=mysql_fetch_array($res)) {
	$q2='update precios set promocion="S" where id_articulo="'.$row["id_articulos"].'" 
							and id_sucursal="'.$row["id_sucursal"].'"';
	mysql_query($q2);
	$affected=mysql_affected_rows($id_connection);
	if($affected>0){
		echo $q2.";".chr(10);
		echo '#affected: '.$affected.chr(10);
 }
}
?>