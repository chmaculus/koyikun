
<center>
<?php

include_once("pedidos_base.php");

include_once("../includes/connect.php");
include_once("../includes/funciones_varias.php");

echo '<font2>Listado de marcas que se dieron de baja con cantidad 0 al finalizar el pedido</font2>';

echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="POST">';

	include("fecha_desde_hasta.inc.php");
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
echo '</form>';


if(!$_POST["fecha_desde"]){
	exit;
}

$fd=explode("/", $_POST["fecha_desde"]);
$fh=explode("/", $_POST["fecha_hasta"]);

$fecha_desd=$fd[2]."-".$fd[1]."-".$fd[0];
$fecha_hast=$fh[2]."-".$fh[1]."-".$fh[0];

//echo "fd".$_POST["fecha_desde"]."<br>";
//echo "fd".$_POST["fecha_hasta"]."<br>";

//echo "fd".$fecha_desd."<br>";
//echo "fh".$fecha_hast."<br>";


$q='select distinct marca from pedidos where fecha>="'.$fecha_desd.'" and fecha<="'.$fecha_hast.'" and finalizado="S" and cantidad_recibida=0';
//echo $q."<br>";
if(mysql_error()){echo mysql_error();}
$res=mysql_query($q);


//echo '<form action="faltantes_detalle.php" method="post">';
//echo '<input type="hidden" name="fecha_desde" value="'.$fecha_desde.'">';
//echo '<input type="hidden" name="fecha_hasta" value="'.$fecha_hasta.'">';

echo '<table border="1">';

while($row=mysql_fetch_array($res)){
	echo '<tr>';
	echo '<td>'.$row[0].'</td>';
	$var=base64_encode($fecha_desd."|".$fecha_hast."|".$row[0]);
	echo '<td><a href="faltantes_detalle.php?var='.$var.'"><button>Detalle</button></a></td>';
	echo '</tr>';
}

echo '</table>'
//echo '</form>';
?>

