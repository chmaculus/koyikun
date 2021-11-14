<?php
include("./includes/connect.php");

#-------------------------------------------------------------------
$q1='select distinct id_articulo from stock order by id_articulo';
$r1= mysql_query($q1);
 
	$count=0;
while( $row=mysql_fetch_array($r1) ){
	$rows=verifica_id($row["id_articulo"]);
	if($rows<1){
		$count++;
		$q2='delete from stock where id_articulo="'.$row["id_articulo"].'"';
		//echo $q2.chr(10);
		mysql_query($q2);
	}
}
echo "Se eliminaron ".$count." regisros huerfanos de la tabla stock".chr(10);
#-------------------------------------------------------------------


#-------------------------------------------------------------------
$q1='select distinct id_articulo from precios order by id_articulo';
$r1= mysql_query($q1);
 
	$count=0;
while( $row=mysql_fetch_array($r1) ){
	$rows=verifica_id($row["id_articulo"]);
	if($rows<1){
		$count++;
		$q2='delete from precios where id_articulo="'.$row["id_articulo"].'"';
		//echo $q2.";".chr(10);
		mysql_query($q2);
	}
}
echo "Se eliminaron ".$count." regisros huerfanos de la tabla precios".chr(10);
#-------------------------------------------------------------------


#-------------------------------------------------------------------
$q1='select distinct id_articulos from costos order by id_articulos';
$r1= mysql_query($q1);
 
	$count=0;
while( $row=mysql_fetch_array($r1) ){
	$rows=verifica_id($row["id_articulos"]);
	if($rows<1){
		$count++;
		$q2='delete from costos where id_articulos="'.$row["id_articulos"].'"';
		//echo $q2.";".chr(10);
		mysql_query($q2);
	}
}
echo "Se eliminaron ".$count." regisros huerfanos de la tabla costos".chr(10);
#-------------------------------------------------------------------




#-----------------------------------
function verifica_id($id_articulo){
	$q='select id from articulos where id="'.$id_articulo.'"';
	$r=mysql_query($q);
	$rows=mysql_num_rows($r);
	return $rows;
}
#-----------------------------------


?>
