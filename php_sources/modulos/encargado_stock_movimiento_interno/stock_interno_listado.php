<?php 
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");
include("base.php");

$q='select distinct numero_envio,nombre, fecha, hora from stock_movimiento_interno order by fecha desc, hora desc';
$res=mysql_query($q);


echo '<br><br>';
echo '<table class="t1">';
echo '	<tr>';
echo '<td>Numero Envio</td>';
echo '<td>Nombre</td>';
echo '<td>Fecha</td>';
echo '<td>Hora</td>';
echo '	</tr>';


while($row=mysql_fetch_array($res)){
	echo '	<tr>';
	echo '<td>'.$row[0].'</td>';
	echo '<td>'.$row[1].'</td>';
	echo '<td>'.$row[2].'</td>';
	echo '<td>'.$row[3].'</td>';
	echo '<td><A HREF="stock_interno_detalle.php?numero_envio='.$row["0"].'"><button>Detalle</button></A></td>';
	echo '<td><A HREF="stock_interno_imprimir.php?numero_envio='.$row["0"].'"><button>Imprimir</button></A></td>';
	echo '	</tr>';
	
}



echo '</table>';
















?>
