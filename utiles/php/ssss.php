<?php
//completa el campo vacio marca en tabla costos_detalle
include_once("includes/connect.php");

$q='select * from costos_detalle where marca="" or marca<=>NULL';
$r=mysql_query($q);
while($row=mysql_fetch_array($r)){
	$q2='select id_costos_detalle,id_articulo from costos_seguimiento where id_costos_detalle="'.$row["id"].'" limit 0,1';
	$r2=mysql_query($q2);
	$rows=mysql_num_rows($r2);
	if($rows>0){
	
//		echo $q2.chr(10);
		//echo "id_costos_detalle: ".$row["id"].chr(10);
		while($row2=mysql_fetch_array($r2)){
			$marca=GetMarcaByID($row2["id_articulo"]);
			$q3='update costos_detalle set marca="'.$marca.'" where id="'.$row["id"].'"';
			echo $q3.chr(10);
			mysql_query($q3);
			if(mysql_error()){echo mysql_error();}
		}
	}
}

#----------------------------
function GetMarcaByID($id_articulo){
	$q='select marca from articulos where id="'.$id_articulo.'"';
	$r=mysql_query($q);
	$marca=mysql_result($r,0,0);
	return $marca;
}
#----------------------------
?>