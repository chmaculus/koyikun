<?php
include("../../includes/connect.php");

$q='select * from lucas3.stock where id_sucursal=2';
$res=mysql_query($q);
while($row=mysql_fetch_array($res)){
	verifica_tabla_stock($row["id_articulo"]);
	$q2='update lucas2.stock set minimo="'.$row["minimo"].'", maximo="'.$row["maximo"].'", fecha="2011-03-31", hora="00:00:00" where id_sucursal=2 and id_articulo="'.$row["id_articulo"].'"';
	echo $q2."\n";
}

function verifica_tabla_stock($id_articulo){
	$q='select * from lucas2.stock where id_sucursal=2 and id_articulo="'.$id_articulo.'"';
	$res=mysql_query($q);
	$rows=mysql_num_rows($res);
	if($rows==1){
		return 1;
	}else{
		$q='delete from lucas2.stock where id_sucursal=2 and id_articulo="'.$id_articulo.'"';
		mysql_query($q);
		$q='insert into lucas2.stock set id_sucursal=2, id_articulo="'.$id_articulo.'"';
		mysql_query($q);
		return 1;
	}
}


?>