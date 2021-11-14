<?php




include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
include_once("../../includes/funciones_articulos.php");
include_once("../../login/login_verifica.inc.php");

#jrarquia 0 coresponde a administrador

/*
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
*/


include("cabecera.inc.php");


$hora=time();

$ultimo_mes=$hora-(60 * 60 * 24 * 30);
$ultimo_tres=$hora-(60 * 60 * 24 * 30 * 3);
$ultimo_seis=$hora-(60 * 60 * 24 * 30 * 6);

$ultimo_nueve=$hora-(60 * 60 * 24 * 30 * 9 );
$ultimo_doce=$hora-(60 * 60 * 24 * 365);



$fecha=date("Y-n-d");

$u_mes=date("Y-n-d",$ultimo_mes);
$u_tres=date("Y-n-d",$ultimo_tres);
$u_seis=date("Y-n-d",$ultimo_seis);

$u_nueve=date("Y-n-d",$ultimo_nueve);
$u_doce=date("Y-n-d",$ultimo_doce);







?>
<script language="javascript" src="funciones.js"></script>

<center>
Pedido Actual<BR>
<?php
include("../../includes/connect.php");
include("pedidos_base.php");

if($_GET["numero_pedido"]){
	$query='select * from pedidos where marca="'.$GET["marca"].'" and fecha>="'.$GET["fecha_desde"].'" and fecha<="'.$GET["fecha_hasta"].'" and cajon=0 order by marca, clasificacion, subclasificacion, descripcion';
#	echo $query."<br>".$q1."<br>";
}else{
	echo "jejejje";
	exit;
}


$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}

echo '<center>';


echo '<table class="t1">';
echo "<tr>";
	echo "<th>id_articulo</th>";
	echo "<th>marca</th>";
	echo "<th>descripcion</th>";
	echo "<th>color</th>";
	echo "<th>contenido</th>";
	echo "<th>presentacion</th>";
	echo "<th>clasificacion</th>";
	echo "<th>subclasificacion</th>";
	echo "<th>cantidad_solicitada</th>";
	echo "<th>sucursal</th>";
	echo "<th>fecha</th>";
	echo "<th>hora</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["id_articulo"].'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["color"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["cantidad_solicitada"].'</td>';
	echo '<td>'.$row["sucursal"].'</td>';
	echo "</tr>".chr(10);
}
echo '</table>';



?>
</center>
