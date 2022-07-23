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

$id_sucursal=$_POST["id_sucursal"];

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


/*
update pedidos set cantidad_recibida="", cantidad_enviada="", cajon="", finalizado="S", fecha_envio="2022-7-14", hora_envio="21:06:32", fecha_ped_prep="2022-7-14", hora_ped_prep="21:06:32", responsable="VICTOR", bultos="1", estado="Finalizado" where id="785898"
*/



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
		if($_POST["cantidad".$row["id_articulo"]]==""){
			$catrr=0;
		}
		if($cajon==""){
			$cajon=0;
		}
		if($bultos==""){
			$bultos=0;
		}
		$query='update pedidos set
        cantidad_recibida="'.verifica_vacio($catrr).'",
        cantidad_enviada="'.verifica_vacio($catrr).'",
        cajon="'.verifica_vacio($cajon).'",
        finalizado="S",
         fecha_envio="'.$fecha.'",
        	hora_envio="'.$hora.'",
         fecha_ped_prep="'.verifica_vacio($fecha).'",
        	hora_ped_prep="'.verifica_vacio($hora).'",
        	responsable="'.verifica_vacio($_POST["responsable"]).'",
        	bultos="'.verifica_vacio($bultos).'",
        	estado="Finalizado"
                where id="'.$row["id"].'"
            ';
	}else{
		if($_POST["cantidad".$row["id_articulo"]]==""){
			$catrr=0;
		}
		if($cajon==""){
			$cajon=0;
		}
		if($bultos==""){
			$bultos=0;
		}

		$query='update pedidos set
        cantidad_recibida="'.verifica_vacio($catrr).'",
        cantidad_enviada="'.verifica_vacio($catrr).'",
        cajon="'.verifica_vacio($cajon).'",
        finalizado="S",
         fecha_envio="'.verifica_vacio($fecha).'",
        	hora_envio="'.verifica_vacio($hora).'",
         fecha_ped_prep="'.verifica_vacio($fecha).'",
        	hora_ped_prep="'.verifica_vacio($hora).'",
        	responsable="'.verifica_vacio($_POST["responsable"]).'",
        	bultos="'.verifica_vacio($_POST["bultos"]).'",
        	estado="Preparado"
                where id="'.$row["id"].'"
            ';
	}
	//echo $query."<br>";
	
    mysql_query($query);
    $numero_pedido=$row["numero_pedido"];
    if(mysql_error()){
		echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";
		log_this("/tmp/pedidos.log",$query);
		log_this("/tmp/pedidos.log",mysql_error());

	}
    
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
			id_articulo="'.verifica_vacio($row["id_articulo"]).'",
			stock_anterior="'.verifica_vacio($array_stock_origen["stock"]).'",
			stock_nuevo="'.verifica_vacio($nuevo1).'",
			tipo="Pedido Envia01",
			origen="'.verifica_vacio($id_sucursal).'",
			destino="'.verifica_vacio($row["sucursal"]).'",
			fecha="'.$fecha.'",
			hora="'.$hora.'",
			cantidad="'.verifica_vacio($_POST["cantidad".$row["id_articulo"]]).'",
			envio="'.verifica_vacio($row["numero_pedido"]).'"';

		//echo $query."<br>";
		mysql_query($query);
		if(mysql_error()){ echo "q1:".$query."<br><br>"; echo mysql_error()."<br><br>"; echo $_SERVER["SCRIPT_NAME"]."<br>"; 	
			log_this("/tmp/pedidos.log",$query);
			log_this("/tmp/pedidos.log",mysql_error());
			}		
		#---------------------------------------------------------------------------------

		
		#---------------------------------------------------------------------------------
		//inserta movimiento destino
		$ant2=$array_stock_destino["stock"];
		$nuevo2=( $ant2 + $row["cantidad"] );
		$query='insert into seguimiento_stock set
			id_articulo="'.verifica_vacio($row["id_articulo"]).'",
			stock_anterior="'.verifica_vacio($array_stock_destino["stock"]).'",
			stock_nuevo="'.verifica_vacio($nuevo2).'",
			tipo="Pedido recibe01",
			origen="'.verifica_vacio($id_sucursal).'",
			destino="'.verifica_vacio($row["sucursal"]).'",
			fecha="'.$fecha.'",
			hora="'.$hora.'",
			cantidad="'.verifica_vacio($_POST["cantidad".$row["id_articulo"]]).'",
			envio="'.verifica_vacio($row["numero_pedido"]).'"';
		//echo $query."<br>";
		mysql_query($query);
		if(mysql_error()){ echo "q12:".$query."<br><br>"; echo mysql_error()."<br><br>"; echo $_SERVER["SCRIPT_NAME"]."<br>"; 	
			log_this("/tmp/pedidos.log",$query);
			log_this("/tmp/pedidos.log",mysql_error());
	}		
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
		log_this("/tmp/pedidos.log",$query);
		log_this("/tmp/pedidos.log",mysql_error());
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
	$result=mysql_query($query);
	if(mysql_error()){
		log_this("/tmp/pedidos.log",$query);
		log_this("/tmp/pedidos.log",mysql_error());
 	
	}	
	
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
	mysql_query($q1);
	if(mysql_error()){
		log_this("/tmp/pedidos.log",$query);
		log_this("/tmp/pedidos.log",mysql_error());
	
	}	

	
}
#-----------------------------------------------------------------



?>