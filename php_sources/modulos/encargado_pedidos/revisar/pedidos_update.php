<?php

include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
include_once("../../login/login_verifica.inc.php");
//include_once("../../includes/funciones_stock.php");

#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

echo "<center>";
echo "Sucursal: ".nombre_sucursal($id_sucursal)."<br>";


$fecha=date("Y-n-d");
$hora=date("H:i:s");


include_once("pedidos_base.php");


$query=base64_decode($_POST["query"]);
echo "q:".$query."<br>";
$result=mysql_query($query);
$rows=mysql_num_rows($result);
if($rows<1){
	echo "El pedido ya se encuentra finalizado<br><br>";
	exit;
}




echo "Imprimir esta panatalla para su control!<br>";

echo '<table class="t1">';
echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>N Pedido</th>";
    echo "<th>marca</th>";
    echo "<th>descripcion</th>";
    echo "<th>contenido</th>";
    echo "<th>presentacion</th>";
    echo "<th>clasificacion</th>";
    echo "<th>subclasificacion</th>";
    echo "<th>Stk.Act.</th>";
    echo "<th>cant pedida</th>";
    echo "<th>Cant enviada</th>";
    echo "<th>Suc</th>";
echo "</tr>";






while($row=mysql_fetch_array($result)){
	$array_stock=array_stock($row["id_articulo"],$id_sucursal);
		$query='update pedidos set
        cantidad_recibida="'.$_POST["cantidad".$row["id_articulo"]].'",
        finalizado="P",
         fecha_envio_prep="'.$fecha.'",
        	hora_envio_prep="'.$hora.'"
                where id="'.$row["id"].'"
            ';
	echo $query."<br>";
    mysql_query($query);
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
    
    echo "<tr>";
    echo '<td>'.$row["id_articulo"].'</td>';
    echo '<td>'.$row["numero_pedido"].'</td>';
    echo '<td>'.$row["marca"].'</td>';
    echo '<td>'.$row["descripcion"].'</td>';
    echo '<td>'.$row["contenido"].'</td>';
    echo '<td>'.$row["presentacion"].'</td>';
    echo '<td>'.$row["clasificacion"].'</td>';
    echo '<td>'.$row["subclasificacion"].'</td>';
    echo '<td>'.$array_stock["stock"].'</td>';
    echo '<td>'.$row["cantidad_solicitada"].'</td>';
    
    echo '<td>'.$_POST["cantidad".$row["id_articulo"]].'</td>';
    echo '<td>'.nombre_sucursal($row["sucursal"]).'</td>';
    echo "</tr>".chr(10);

	
	if($_POST["cantidad".$row["id_articulo"]] > 0){

	}
}


#-----------------------------------------------------------------
function array_stock($id_articulo,$id_sucursal){
	$query='select * from stock where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query);
	if(mysql_error()){
		$array_stock["error"]=mysql_error();
		$array_stock["query"]=$query;
		return $array_stock;
	}
	$rows=mysql_num_rows($res);

	if($rows==1){
		$array_stock=mysql_fetch_array($res);
		$array_stock["rows"]=$rows;
		$array_stock["query"]=$query;
		return $array_stock;		
	}

	if($rows<1){
		$array_stock["stock"]=0;
		$array_stock["rows"]=$rows;
		$array_stock["query"]=$query;
		return $array_stock;
	}
}
#-----------------------------------------------------------------



#-----------------------------------------------------------------
function descuenta_stock($cantidad, $id_articulos, $id_sucursal){
	$query='select * from stock where id_articulo="'.$id_articulos.'" and id_sucursal="'.$id_sucursal.'"';
	$result=mysql_query($query)or die(mysql_error());
	$rows=mysql_num_rows($result);
	$array=mysql_fetch_array($result);

	
	if($rows<"1"){
		$stock_anterior="0";
		$stock_nuevo=0; 
		$q1='insert into stock set id_articulo="'.$id_articulos.'", id_sucursal="'.$id_sucursal.'", stock="'.$cantidad.'", maximo="0", minimo="0"';
	}
	if($rows=="1"){
		$stock_anterior=$array["stock"];
		$stock_nuevo=( $stock_anterior - $cantidad );
/*
		if($stock_nuevo<0){
			$stock_nuevo=0;
		} 
*/		
		$q1='update stock  set stock="'.$stock_nuevo.'" where id="'.$array["id"].'"';
	}
	//echo $q1."<br>";
	mysql_query($q1)or die(mysql_error().$_SERVER["script_name"]);
	
}
#-----------------------------------------------------------------



?>