<?php


include("./includes/connect.php");

$q='select id from articulos ';
$res=mysql_query($q);
while($row=mysql_fetch_array($res)){

		$array_costo=precio_costo( $row["id_articulos"] );
    $precio_venta=calcula_precio_venta( $array_costo );
    $rows=verifica_tabla_precios( $row["id_articulos"] );



	$rows=mysql_num_rows(mysql_query('select id from precios where id_articulo="'.$row[0].'"'));
	if($rows==0){echo "p: ".$row[0].chr(10);}

	$rows=mysql_num_rows(mysql_query('select id from costos where id_articulos="'.$row[0].'"'));
	if($rows==0){echo "c: ".$row[0].chr(10);}
}






#---------------------------------------------------------------------------------------------
function precio_costo($id_articulos){
        $query='select * from costos where id_articulos="'.$id_articulos.'"';
        $result=mysql_query($query);
        $rows=mysql_num_rows($result);
        if($rows=="1"){
                $array=mysql_fetch_array($result);
                return $array;
        }else{
                return "0";
        }
}
#---------------------------------------------------------------------------------------------


#---------------------------------------------------------------------------------------------
function calcula_precio_venta( $array_costos ){
        $temp1=( ( $array_costos["precio_costo"] * ( $array_costos["descuento1"] * -1 ) ) / 100 )+ $array_costos["precio_costo"];
        $temp1=( ( $temp1 * ( $array_costos["descuento2"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento3"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento4"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento5"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento6"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento7"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento8"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento9"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * ( $array_costos["descuento10"] * -1 ) ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * $array_costos["iva"] ) / 100 )+ $temp1;
        $temp1=( ( $temp1 * $array_costos["margen"] ) / 100 )+ $temp1;
        return round($temp1,6);
}
#---------------------------------------------------------------------------------------------


#-----------------------------------------------------------------
function verifica_tabla_precios($id_articulos){
        $query='select id_articulo from precios where id_articulo="'.$id_articulos.'" and id_sucursal="1"';
        $rows=mysql_num_rows( mysql_query($query) );
        return $rows;
}
#-----------------------------------------------------------------

#---------------------------------------------------------------------------------------------
function precio_sucursal( $id_articulo, $id_sucursal ){
        $query='select * from precios where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
        $res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
        $rows=mysql_num_rows($res);
        if($rows==1){
                $array_precios=mysql_fetch_array($res);
                $array_precios["query"]=$query;
                $array_precios["rows"]=$rows;
                return $array_precios;          
        }
        if($rows<1){
                $array_precios["precio_base"]="0";
                $array_precios["porcentaje_contado"]="0";
                $array_precios["porcentaje_tarjeta"]="0";
                $array_precios["rows"]=$rows;
                $array_precios["query"]=$query;
                return $array_precios;          
        }
return $array_precios;
}
#---------------------------------------------------------------------------------------------









?>