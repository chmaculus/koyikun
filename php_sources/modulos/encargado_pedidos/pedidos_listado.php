<?php

include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
include_once("../../login/login_verifica.inc.php");
include_once("cabecera.inc.php");

#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
?>


<center>
<?php

$fecha=date("Y-n-d");
$hora=date("H:i:s");

$time_stamp=time($fecha);

include("pedidos_base.php");


include("responsable_preparado.inc.php");




echo "Pedidos pendientes<br>";
$query='select distinct pedidos.numero_pedido, pedidos.sucursal, pedidos.fecha 
from pedidos 
	where (pedidos.estado is NULL or pedidos.finalizado !="S") and 
		(pedidos.zona="1" or 
		pedidos.zona="2" or 
		pedidos.zona="3") 
			order by fecha, sucursal';

$query='select distinct pedidos.numero_pedido, pedidos.sucursal, pedidos.fecha 
from pedidos 
	where (pedidos.estado is NULL or pedidos.finalizado !="S")  
			order by fecha, sucursal LIMIT 0,10';
			

echo $query."<br>";

$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
    echo "<th>Pedido N</th>";
    echo "<th>Sucursal</th>";
    echo "<th>Tipo</th>";
    echo "<th>fecha</th>";
    echo "<th>hora</th>";
    echo "<th>Dias de retraso</th>";
    echo "<th>Detalle</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
		echo '<tr>';    
		$tipo=trae_tipo($row["numero_pedido"],$row["sucursal"]);
		if($tipo=="Virtual"){ echo '<tr class="special">';		}else{echo "<tr>";}
    
    echo '<td>'.$row["numero_pedido"].'</td>';
    echo '<td>'.nombre_sucursal($row["sucursal"]).'</td>';


    #------------------------------------------------------
    echo '<td>';
		if($tipo=="Humano"){
			echo '<img  src="./imagenes/ped1/humano.jpg" width="100" height="100"><br>';
		}
		if($tipo=="Virtual"){
			echo '<img  src="./imagenes/ped1/virtual.jpg" width="100" height="100"><br>';
		}

    echo $tipo;
    echo '</td>';
    #------------------------------------------------------
    echo '<td>'.$row["fecha"].'</td>';
    echo '<td>'.$row["hora"].'</td>';

    $f2=strtotime($row["fecha"]);
    $retraso=($time_stamp - $f2);
    $dias=($retraso / 60 / 60 / 24);
    $aa=explode(".",$dias);

    if($aa[0]<=3){
	    echo '<td><font4>'.$aa[0].'</font4></td>';
    }elseif($aa[0]>=4 AND $aa[0]<=5){
	    echo '<td><font6>'.$aa[0].'</font6></td>';
    }elseif($aa[0]>5){
	    echo '<td><font5>'.$aa[0].'</font5></td>';
    }
    echo '<td>'.$row["finalizado"].'</td>';

	#-----------------------------------------
	echo '<td>';
		include("marcas.inc.php");
	echo '</td>';
	#-----------------------------------------

$countaa++;
	if($countaa<=6){	
		echo '<td><A HREF="pedidos_detalle.php?numero_pedido='.$row["numero_pedido"].'&sucursal='.$row["sucursal"].'"><button>Detalle</button></A></td>';
	}else{
		echo '<td><img src="nohab.jpg" width="150" height="100"></td>';
	}	
    
    echo "</tr>".chr(10);
    $count++;
}





function contar1($marca, $numero_pedido, $sucursal){
		
	$q2='select count(*) from articulos,pedidos where 	pedidos.numero_pedido="'.$numero_pedido.'" and 
																				pedidos.sucursal="'.$sucursal.'" and
																				articulos.marca="'.$marca.'" and
																				articulos.id=pedidos.id_articulo'; 
																					
	$res2=mysql_query($q2);
	if(mysql_error()){
		echo "<td>".mysql_error()."</td>";
	}

	//echo "<td>".$q2."</td>";
	$array=mysql_fetch_array($res2);
	//$rows=mysql_num_rows($res2);
	return $array[0];


}














?>
</table></center>
