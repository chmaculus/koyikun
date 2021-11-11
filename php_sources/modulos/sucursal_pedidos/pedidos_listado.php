<?php

include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
include_once("../../login/login_verifica.inc.php");
include_once("cabecera.inc.php");

#jrarquia 0 coresponde a administrador
if($jerarquia!="2"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
?>

<center>
<?php


include("pedidos_base.php");

echo "Pedidos finalizados<br>";

/*

echo '<form method="POST" action="'.$_SERVER["SCRIPT_NAME"].'">'.chr(10);

include("fecha_desde_hasta.inc.php");

ECHO '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
echo '</form><br>';


if(!$_POST["fecha_desde"]) {
	exit;
}



$fecha_desde=fecha_conv("/",$_POST["fecha_desde"]);
$fecha_hasta=fecha_conv("/",$_POST["fecha_hasta"]);
*/


$id_session=$_COOKIE["id_session"];
$id_sucursal=$_COOKIE["id_sucursal"];

$nombre_sucursal=nombre_sucursal($id_sucursal);





$query='select distinct numero_pedido, sucursal, fecha, hora, finalizado, estado from pedidos where (estado="Pendiente" or estado is NULL ) and sucursal="'.$id_sucursal.'"';
//echo "q: ".$query."<br>";


$result=mysql_query($query);
$rows=mysql_num_rows($result);

echo "Cantidad de resultados: ".$rows."<br><br>";

if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
    echo "<th>Pedido N</th>";
    echo "<th>Sucursal</th>";
    echo "<th>fecha</th>";
    echo "<th>hora</th>";
    echo "<th>Estado</th>";
    echo "<th>imagen</th>";
    echo "<th>Detalle</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	if($row["estado"]=="Pendinte"){
		$estado=$row["estado"];
	}
	if($row["estado"]==""){
		$estado="Pendiente";
	}
	if($row["estado"]=="Preparado"){
		$estado=$row["estado"];
	}
	if($row["estado"]=="Transito"){
		$estado=$row["estado"];
	}
	if($row["estado"]=="Finalizado"){
		$estado=$row["estado"];
	}

 $zona=trae_zona($row["numero_pedido"],$row["sucursal"]);
 if($zona==1 or $zona==2 or $zona==3){$zz="zona 1, 2, 3";}
 if($zona==4){$zz="zona 4";}
 if($zona==5){$zz="zona 5";}


	
    echo "<tr>";
    echo '<td>'.$row["numero_pedido"].'</td>';
    echo '<td>'.nombre_sucursal($row["sucursal"]).'</td>';
    echo '<td>'.$row["fecha"].'</td>';
    echo '<td>'.$row["hora"].'</td>';
    echo '<td>'.$estado.'</td>';
    if(file_exists ( "./images/".$estado.".jpg" )==1){
            echo '<td><img  src="./images/'.$estado.'".jpg" width="50" height="40"></td>';
    }else{
    		echo '<td></td>';
    }
                    
    echo '<td>'.$zz.'</td>';
    echo '<td><A HREF="pedidos_detalle.php?numero_pedido='.$row["numero_pedido"].'&sucursal='.$row["sucursal"].'"><button>Detalle</button></A></td>';
    /*if($row["estado"]=="Transito"){
	     echo '<td><A HREF="pedidos_recibir.php?numero_pedido='.$row["numero_pedido"].'&sucursal='.$row["sucursal"].'"><button>Recibir</button></A></td>';
    }    */
    echo "</tr>".chr(10);
}







?>
</table></center>