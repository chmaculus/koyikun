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
include("pedidos_base.php");
echo "Pedidos a proveedores pendientes<br>";


echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post">';

include("fecha_desde_hasta.inc.php");echo "<br>";

echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
echo "</form>";


if(!$_POST["fecha_desde"]){
	exit;
}


$fecha_desde=fecha_conv("/",$_POST["fecha_desde"]);
$fecha_hasta=fecha_conv("/",$_POST["fecha_hasta"]);


$query='select distinct numero_pedido, marca, fecha, hora, enviado, fecha_enviado, hora_enviado from pedidos_proveedor where fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'" and finalizado="N"';
$result=mysql_query($query,$id_connection);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
    echo "<th>Pedido N</th>";
    echo "<th>Proveedor</th>";
    echo "<th>Importe</th>";
    echo "<th>fecha</th>";
    echo "<th>hora</th>";
    echo "<th>Enviado</th>";
    echo "<th>Responsable</th>";
    echo "<th>Fecha Enviado</th>";
    echo "<th>Hora Enviado</th>";
    echo "<th>pago</th>";
    echo "<th>Detalle</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	$q='select sum(costo * cantidad_solicitada) from pedidos_proveedor where numero_pedido="'.$row["numero_pedido"].'"';
	$res=mysql_query($q,$id_connection);
	if(mysql_error()){
		echo mysql_error()."<br>";
	}
	$total=mysql_result($res,0,0);

	$banco_kaiser=banco_kaiser($row["numero_pedido"]);


    echo "<tr>";
    echo '<td>'.$row["numero_pedido"].'</td>';
    echo '<td>'.$row["marca"].'</td>';
    echo '<td>'.round($total,2).'</td>';
    echo '<td>'.$row["fecha"].'</td>';
    echo '<td>'.$row["hora"].'</td>';
    echo '<td>'.$row["enviado"].'</td>';
    echo '<td>'.$row["responsable"].'</td>';
    echo '<td>'.$row["fecha_enviado"].'</td>';
    echo '<td>'.$row["hora_enviado"].'</td>';
    if($banco_kaiser>0){
	    echo '<td>S</td>';
    }else{
	    echo '<td>N</td>';
    }
    echo '<td><A HREF="pedidos_detalle.php?numero_pedido='.$row["numero_pedido"].'&sucursal='.$row["sucursal"].'&marca='.base64_encode($row["sucursal"]).'"><button>Detalle</button></A></td>';
    echo '<td><A HREF="rospdf/examples/prueba.php?numero_pedido='.$row["numero_pedido"].'&sucursal='.$row["sucursal"].'&marca='.base64_encode($row["sucursal"]).'"><button>PDF</button></A></td>';
    echo '<td><A HREF="pedidos_detalle2.php?numero_pedido='.$row["numero_pedido"].'&sucursal='.$row["sucursal"].'&marca='.base64_encode($row["sucursal"]).'"><button>imprimir</button></A></td>';
    echo '<td><A HREF="pedidos_enviar.php?numero_pedido='.$row["numero_pedido"].'&sucursal='.$row["sucursal"].'"><button>Enviar</button></A></td>';
    echo '<td><A HREF="pedidos_agregar_articulo.php?numero_pedido='.$row["numero_pedido"].'&marca='.base64_encode($row["marca"]).'"><button>Agregar</button></A></td>';
    echo '<td><A HREF="pedidos_eliminar.php?numero_pedido='.$row["numero_pedido"].'"><button>Eliminar</button></A></td>';
    echo "</tr>".chr(10);
}


#-----------------------------------------------------------------
function banco_kaiser($numero_pedido){
	$q='select * from gastos.banco where numero_pedido="'.$numero_pedido.'"';
	$res=mysql_query($q,$id_connection_kaiser);
	if(mysql_error()){
		echo mysql_error()."<br>";
	}
	//echo $q."<br>";
	//$total=mysql_result($res,0,0);
	$rows=mysql_num_rows($res);
	return $rows;
#-----------------------------------------------------------------
}




?>
</table></center>