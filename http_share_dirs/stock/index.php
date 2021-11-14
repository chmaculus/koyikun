<?php

include_once("./includes/connect.php");
include_once("./includes/funciones_stock.php");
include_once("./includes/funciones_varias.php");
include("seguridad.inc.php");
include("base.php");


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


<form name="aa" action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>" method="post">
<input type="text" name="busqueda" value="">
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>


<?php

if($_GET["aa"]=="updated"){
	echo "Se actualizo un stock correctamente<br>";	

}

if(!$_POST["busqueda"]){
	exit;
}

$busqueda=addslashes($_POST["busqueda"]);


$q='select * from articulos where id="'.$busqueda.'" or
												descripcion like "%'.$busqueda.'%" or
												codigo_barra like "%'.$busqueda.'%"
';






$res=mysql_query($q);
$rows=mysql_num_rows($res);

if($rows==1){
	echo '<form action="update.php" method="post">';

#----------------------------------------
	$array_articulos=mysql_fetch_array($res);
	$stock=stock_sucursal($array_articulos["id"], $_COOKIE["id_sucursal"]);	
	$id_articulos=$array_articulos["id"];
	echo '<input type="hidden" name="id_articulo" value="'.$array_articulos["id"].'">';
	echo '<input type="hidden" name="stock" value="'.$stock["stock"].'">';

echo '<table class="t1">';
	echo '<tr>';
		echo '<th>id</th>';
		echo '<td>'.$array_articulos["id"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>marca</th>';
		echo '<td>'.$array_articulos["marca"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>descripcion</th>';
		echo '<td>'.$array_articulos["descripcion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>contenido</th>';
		echo '<td>'.$array_articulos["contenido"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>presentacion</th>';
		echo '<td>'.$array_articulos["presentacion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>codigo_barra</th>';
		echo '<td>'.$array_articulos["codigo_barra"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>clasificacion</th>';
		echo '<td>'.$array_articulos["clasificacion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>subclasificacion</th>';
		echo '<td>'.$array_articulos["subclasificacion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>Stock</th>';
		echo '<td>'.$stock["stock"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>Cantidad</th>';
		echo "<td>";include("cantidades.inc.php");echo "</td>";
	echo '</tr>';
echo "</table>";



#----------------------------------------

	echo '<br><input type="submit" name="ACEPTAR" value="ACEPTAR">';
	echo '</form>';
}


echo "<br><br>";

include("rotacion.inc.php");
?>
