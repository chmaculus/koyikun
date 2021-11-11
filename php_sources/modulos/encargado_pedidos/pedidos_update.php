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
//echo "q:".$query."<br>";
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

		if($_POST["cajon".$row["id_articulo"]]==0){$cajon=$_POST["cajon".$row["id_articulo"]];}
		if($_POST["cajon".$row["id_articulo"]]>0){$cajon=$_POST["cajon".$row["id_articulo"]];}
		if($_POST["cajon2".$row["id_articulo"]]>0){$cajon=$_POST["cajon2".$row["id_articulo"]];}
		if($_POST["cajon3".$row["id_articulo"]]>0){$cajon=$_POST["cajon3".$row["id_articulo"]];}

	$array_stock=array_stock($row["id_articulo"],$id_sucursal);

	if($cajon==0){
		$query='update pedidos set
        cantidad_recibida="'.$_POST["cantidad".$row["id_articulo"]].'",
        cantidad_enviada="'.$_POST["cantidad".$row["id_articulo"]].'",
        cajon="'.$cajon.'",
        finalizado="S",
         fecha_envio="'.$fecha.'",
        	hora_envio="'.$hora.'",
         fecha_ped_prep="'.$fecha.'",
        	hora_ped_prep="'.$hora.'",
        	responsable="'.$_POST["responsable"].'",
        	bultos="'.$_POST["bultos"].'",
        	estado="Finalizado"
                where id="'.$row["id"].'"
            ';
	}else{

		$query='update pedidos set
        cantidad_recibida="'.$_POST["cantidad".$row["id_articulo"]].'",
        cantidad_enviada="'.$_POST["cantidad".$row["id_articulo"]].'",
        cajon="'.$cajon.'",
        finalizado="S",
         fecha_envio="'.$fecha.'",
        	hora_envio="'.$hora.'",
         fecha_ped_prep="'.$fecha.'",
        	hora_ped_prep="'.$hora.'",
        	responsable="'.$_POST["responsable"].'",
        	bultos="'.$_POST["bultos"].'",
        	estado="Preparado"
                where id="'.$row["id"].'"
            ';
	}
	//echo $query."<br>";
    mysql_query($query);
    $numero_pedido=$row["numero_pedido"];
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
		$array_stock_origen=array_stock($row["id_articulo"],$id_sucursal);
		$array_stock_destino=array_stock($row["id_articulo"],$row["sucursal"]);

		descuenta_stock(( $_POST["cantidad".$row["id_articulo"]] ), $row["id_articulo"], $id_sucursal);
		descuenta_stock($_POST["cantidad".$row["id_articulo"]]  * -1, $row["id_articulo"], $row["sucursal"]);

		$array_stock_origen_nuevo=array_stock($row["id_articulo"],$id_sucursal);
		$array_stock_destino_nuevo=array_stock($row["id_articulo"],$row["sucursal"]);
		#---------------------------------------------------------------------------------
		//inserta movimiento origen
		$ant1=$array_stock_origen["stock"];
		$nuevo1=( $ant1 - $row["cantidad"] );
		$query='insert into seguimiento_stock set
			id_articulo="'.$row["id_articulo"].'",
			stock_anterior="'.$array_stock_origen["stock"].'",
			stock_nuevo="'.$nuevo1.'",
			tipo="Pedido Envia01",
			origen="'.$id_sucursal.'",
			destino="'.$row["sucursal"].'",
			fecha="'.$fecha.'",
			hora="'.$hora.'",
			cantidad="'.$_POST["cantidad".$row["id_articulo"]].'",
			envio="'.$row["numero_pedido"].'"';

		//echo $query."<br>";
		mysql_query($query);
		if(mysql_error()){ echo "q1:".$query."<br><br>"; echo mysql_error()."<br><br>"; echo $_SERVER["SCRIPT_NAME"]."<br>"; 	}		
		#---------------------------------------------------------------------------------

		
		#---------------------------------------------------------------------------------
		//inserta movimiento destino
		$ant2=$array_stock_destino["stock"];
		$nuevo2=( $ant2 + $row["cantidad"] );
		$query='insert into seguimiento_stock set
			id_articulo="'.$row["id_articulo"].'",
			stock_anterior="'.$array_stock_destino["stock"].'",
			stock_nuevo="'.$nuevo2.'",
			tipo="Pedido recibe01",
			origen="'.$id_sucursal.'",
			destino="'.$row["sucursal"].'",
			fecha="'.$fecha.'",
			hora="'.$hora.'",
			cantidad="'.$_POST["cantidad".$row["id_articulo"]].'",
			envio="'.$row["numero_pedido"].'"';
		//echo $query."<br>";
		mysql_query($query);
		if(mysql_error()){ echo "q12:".$query."<br><br>"; echo mysql_error()."<br><br>"; echo $_SERVER["SCRIPT_NAME"]."<br>"; 	}		
		#---------------------------------------------------------------------------------
		

	}







}





if(!$_POST["responsable"] or $_POST["responsable"]){


	echo '<alerta1>Debe completar el campo responsable</alerta><br>';
	echo '<form method="POST" action="pedidos_update3.php">';
	echo '<center><table class="t1">';
	include("responsable.inc.php");
	echo '</table>';
	echo '<INPUT TYPE="hidden"  name="sucursal" value="'.$sucursal.'">';
	echo '<INPUT TYPE="hidden"  name="numero_pedido" value="'.$numero_pedido.'">';
	echo '<INPUT TYPE="SUBMIT" name="ACEPTAR" value="ACEPTAR">';
	echo '</form>';
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