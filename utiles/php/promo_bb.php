<?php

echo chr(10);

$fecha=date("Y-n-d");

include("./includes/connect.php");

$q='select distinct id_articulo from precios where promocion="S"';
$res1=mysql_query($q);
while($row1=mysql_fetch_array($res1)){
		$q2='select * from promociones where fecha_inicio<="'.$fecha.'" and fecha_finaliza>="'.$fecha.'" and id_articulos="'.$row1["id_articulo"].'"';
		$res2=mysql_query($q2);
		$rows=mysql_num_rows($res2);
		echo "r: ".$rows."		".$q2.chr(10);
		if($rows<1){
			mysql_query('update precios set promocion="N" where id_articulo="'.$row1["id_articulo"].'"');
		}
}




?>