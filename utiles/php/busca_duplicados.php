<?php
include("../../includes/connect.php");

#------------------------------------------------------------------------------------------
$q1='select id_articulo, id_sucursal from precios order by id_articulo, id_sucursal';
$res=mysql_query($q1);

while($row=mysql_fetch_array($res)){
	if( $id_articulo != $row["id_articulo"] ){
		$id_articulo = $row["id_articulo"];
		$count=0;
	}else{
		if($id_sucursal != $row["id_sucursal"]){
			$id_sucursal = $row["id_sucursal"];
			$count=0;
		}else{
			$count++;
		}
		if($count>1){
			echo "id_articulo: ".$id_articulo." id_sucursal: ".$id_sucursal.chr(13);
		}
	}
}
#------------------------------------------------------------------------------------------


#------------------------------------------------------------------------------------------
$q1='select id_articulo, id_sucursal from stock order by id_articulo, id_sucursal';
$res=mysql_query($q1);

while($row=mysql_fetch_array($res)){
	if( $id_articulo != $row["id_articulo"] ){
		$id_articulo = $row["id_articulo"];
		$count=0;
	}else{
		if($id_sucursal != $row["id_sucursal"]){
			$id_sucursal = $row["id_sucursal"];
			$count=0;
		}else{
			$count++;
		}
		if($count>1){
			echo "id_articulo: ".$id_articulo." id_sucursal: ".$id_sucursal.chr(13);
		}
	}
}
#------------------------------------------------------------------------------------------

?>