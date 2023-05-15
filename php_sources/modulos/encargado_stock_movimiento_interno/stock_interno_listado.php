<?php 
include_once("../../includes/connect.php");
include_once("../../includes/funciones_ventas.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");
include("base.php");




$q='select distinct numero_envio,nombre, apellido, fecha, hora from stock_movimiento_interno order by fecha desc, hora desc';
// 
$res=mysql_query($q);


echo '<br><br>';
echo '<table class="t1">';
echo '	<tr>';
echo '<td>Numero Envio</td>';
echo '<td>Nombre</td>';
echo '<td>Total</td>';
echo '<td>C/Desc.</td>';
echo '<td>Fecha</td>';
echo '<td>Hora</td>';
echo '	</tr>';


while($row=mysql_fetch_array($res)){
	echo '	<tr>';
	$tot=trae_totales_presupuesto_franquicia($row[0]);
	$aaaa=aa($row[0]);
	echo '<td>'.$row[0].'</td>';
	echo '<td>'.$aaaa["nombre"]." ".$aaaa["apellido"].'</td>';
	echo '<td>$'.number_format($tot["total"],0,",",".").'.-</td>';
	echo '<td>$'.number_format($tot["descuento"],0,",",".").'.-</td>';
	echo '<td>'.$row[3].'</td>';
	echo '<td>'.$row[4].'</td>';
	echo '<td><A HREF="stock_interno_detalle.php?numero_envio='.$row["0"].'"><button>Detalle</button></A></td>';
	echo '<td><A HREF="stock_interno_detalle.php?numero_envio='.$row["0"].'"><button>Detalle</button></A></td>';
	echo '<td><A HREF="stock_interno_editar.php?numero_envio='.$row["0"].'"><button>Editar</button></A></td>';
	echo '	</tr>';
	
}



echo '</table>';




function aa($numero){
	$q='select * from stock_movimiento_interno_datos where numero_movimiento="'.$numero.'" ';
	$res=mysql_query($q);
	if(mysql_error()){
		echo $q."<br>";
		echo mysql_error()."<br>";
	}
	$array=mysql_fetch_array($res);
	return $array;	
}











?>
