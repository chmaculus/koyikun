<?php

include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
include_once("../../includes/funciones_stock.php");
include_once("../../login/login_verifica.inc.php");
//include_once("../../includes/funciones_stock.php");

#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

echo "<center>";


$fecha=date("Y-n-d");
$hora=date("H:i:s");


include_once("pedidos_base.php");

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
    echo "<th>Cant recibida</th>";
    echo "<th>Suc</th>";
echo "</tr>";




$query=base64_decode($_POST["query"]);
$result=mysql_query($query);

while($row=mysql_fetch_array($result)){
	$array_stock=array_stock($row["id_articulo"],$id_sucursal);
		$query='update pedidos_proveedor set
        cantidad_recibida="'.$_POST["cantidad".$row["id"]].'",
        finalizado="S",
         fecha_envio="'.$fecha.'",
        	hora_envio="'.$hora.'"
                where id="'.$row["id"].'"
            ';
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
    
    echo '<td>'.$_POST["cantidad".$row["id"]].'</td>';
    echo '<td>'.nombre_sucursal($row["sucursal"]).'</td>';
    echo "</tr>".chr(10);

	
	if($_POST["cantidad".$row["id"]] > 0){
		$array_stock_origen=array_stock($row["id_articulo"],$id_sucursal);

		ingresa_stock($_POST["cantidad".$row["id"]], $row["id_articulo"], 1);

		$array_stock_origen_nuevo=array_stock($row["id_articulo"],$id_sucursal);

		#---------------------------------------------------------------------------------
		//inserta movimiento origen
		$ant1=$array_stock_origen["stock"];
		$nuevo1=( $ant1 - $row["cantidad"] );
		$query='insert into seguimiento_stock set
			id_articulo="'.$row["id_articulo"].'",
			stock_anterior="'.$array_stock_origen["stock"].'",
			stock_nuevo="'.$array_stock_origen_nuevo["stock"].'",
			tipo="PROV_RECIBIDO",
			origen="99999",
			destino="1",
			fecha="'.$fecha.'",
			hora="'.$hora.'",
			cantidad="'.$_POST["cantidad".$row["id"]].'",
			envio="'.$row["numero_pedido"].'"';

	//	echo $query."<br>";
		mysql_query($query);
		if(mysql_error()){ echo $query."<br>"; echo mysql_error()."<br>"; echo $_SERVER["SCRIPT_NAME"]."<br>"; 	}		
		#---------------------------------------------------------------------------------

		
	}
}








?>
