<?php
include("./includes/connect.php");
include("./includes/funciones_stock.php");
include("./includes/funciones_articulos.php");


$fecha=date("Y-n-d");
$hora=date("H:i:s");



$q='select * from stock where fijo>0 order by id_sucursal';
$res=mysql_query($q);

$suc="";


while($row=mysql_fetch_array($res)){
    if($suc!=$row[id_sucursal]){
	$suc=$row[id_sucursal];
	$numero_pedido=get_numero_pedido($row["id_sucursal"]);
	incrementa_n_pedido($row["id_sucursal"]);
    }
    if($row["stock"]<0){
	$stock=0;
    }else{
	$stock=$row["stock"];
    }
                    
    
    if($row["stock"]<1){
	$stk_dep=stock_sucursal($row["id_articulo"], 1);
	if($stk_dep["stock"]>0){
	    $array_articulo=array_articulos($row["id_articulo"]);
	    $cant=($row["fijo"] - $stock);
	    
	    $query='insert into pedidos set 
	    id_articulo="'.$array_articulo["id"].'",
	    numero_pedido="'.$numero_pedido.'",
	    marca="'.$array_articulo["marca"].'",
	    descripcion="'.$array_articulo["descripcion"].'",
	    contenido="'.$array_articulo["contenido"].'",
	    presentacion="'.$array_articulo["presentacion"].'",
	    clasificacion="'.$array_articulo["clasificacion"].'",
	    subclasificacion="'.$array_articulo["subclasificacion"].'",
	    cantidad_solicitada="'.$cant.'",
	    sucursal="'.$row["id_sucursal"].'",
	    fecha="'.$fecha.'",
	    hora="'.$hora.'",
	    finalizado="N",
	    tipo="automatico"';
//	    echo $query.chr(10);
	    mysql_query($query);
	    if(mysql_error()){echo mysql_error().chr(10);
		echo $query.chr(10);
	    }
	    
	}
	
	
    }
}


#-----------------------------------------
function get_numero_pedido($id_sucursal){
        $query='select * from pedido_numero where id_sucursal="'.$id_sucursal.'"';
        $result=mysql_query($query) or die(mysql_error());
        $rows=mysql_num_rows($result);
        if($rows<"1"){
                $numero_venta="1";
                $q1='insert into pedido_numero set numero="1", id_sucursal="'.$id_sucursal.'"';
                mysql_query($q1)or die(mysql_error());
        }else{
                $array_nventa=mysql_fetch_array($result);
                $numero_venta=$array_nventa["numero"];
        }

return $numero_venta;
}
#-----------------------------------------


#-----------------------------------------
function incrementa_n_pedido($id_sucursal){
        $query='select * from pedido_numero where id_sucursal="'.$id_sucursal.'"';
        $result=mysql_query($query) or die(mysql_error());
        $array_pedido=mysql_fetch_array($result);
        $numero_pedido=$array_pedido["numero"];
        $q1='update pedido_numero set numero="'.( $numero_pedido + 1 ).'" where  id_sucursal="'.$id_sucursal.'"';
        echo $q1."<br>";
        mysql_query($q1)or die(mysql_error());
}
#-----------------------------------------



#-----------------------------------------------------------------
function nombre_sucursal($id_sucursal){
        $query='select * from sucursales where id="'.$id_sucursal.'"';
        $array_suc=mysql_fetch_array(mysql_query($query));
return $array_suc["sucursal"];
}
#-----------------------------------------------------------------



?>
