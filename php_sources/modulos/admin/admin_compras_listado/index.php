<?php
include_once("../../includes/connect.php");

include("../../login/login_verifica.inc.php");
include_once("../seguridad.inc.php"); 

include_once("cabecera.inc.php");
include_once("../includes/funciones_varias.php");

?>

<?php
/*
<script language="javascript" src="js/jquery-1.3.min.js"></script>
<script language="javascript" src="funciones.js"></script>
*/
?>

<body>

<center>
<titulo>Modificacion de costos</titulo>

<?php
include_once("../../includes/funciones_costos.php");
include_once("../../includes/funciones_precios.php");

$fecha=date("Y-n-d");


echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post">';
include("select.inc.php");
include("fecha_desde_hasta.inc.php");
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
echo "</form>";

//echo '<Titulo>Modificacion de costos</titulo><br><br>';

echo '<font1>Seleccione marca:</font1>';
#---------------------------------------------------------------
if($_POST["marca"]!="" AND $_POST["clasificacion"]=="" AND $_POST["subclasificacion"]=="" ){
	$query='select * from articulos where marca="'.$_POST["marca"].'" order by marca, clasificacion, subclasificacion, descripcion';
}

if($_POST["marca"]!="" AND $_POST["clasificacion"]!="" AND $_POST["subclasificacion"]=="" ){
	$query='select * from articulos where marca="'.$_POST["marca"].'" and clasificacion="'.$_POST["clasificacion"].'" order by marca, clasificacion, subclasificacion, descripcion';
}

if($_POST["marca"]!="" AND $_POST["clasificacion"]!="" AND $_POST["subclasificacion"]!="" ){
	$query='select * from articulos where marca="'.$_POST["marca"].'" and clasificacion="'.$_POST["clasificacion"].'" and subclasificacion="'.$_POST["subclasificacion"].'" order by marca, clasificacion, subclasificacion, descripcion';
}

$result=mysql_query($query)or die(mysql_error());
$numrows=mysql_num_rows($result);
#---------------------------------------------------------------

echo '<br>Cantidad de articulos: '.$numrows.'<br>';

echo '<form method="post" action="costos_update.php" name="form_costos" target="_self" id="form_costos">';
?>

<table class="t1">
<tr>
	<th>ID</th>
	<th>Cod Int</th>
	<th>Descripcion</th>
	<th>Contenido</th>
	<th>Pesentacion</th>
	<th>Clasificacion</th>
	<th>Sub-clasificacion</th>
	<th>cod barra</th>
	<th>Imagen</th>
	<th>mod</th>
	<th>Eliminar</th>
	<th>Promo</th>
	<th>Web</th>
	<th>EPMR</th>
	<th>Ingreso x compra</th>
	
</tr>

<?php
while($row=mysql_fetch_array($result)){
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["codigo_interno"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["codigo_barra"].'</td>';

	if(file_exists ( "./imagenes/miniaturas/".$row["id"].".jpg" )==1){
		echo '<td><A HREF="detalle.php?id_articulo='.$row["id"].'" onClick="return popup(this, \'notes\')">
		<img  src="./imagenes/miniaturas/'.$row["id"].'".jpg" width="150" height="100">
		</A></td>';
	}else{
		echo '<td></td>';
	}
	if($row["id_web"]>0){
		$qq='select * from categorias_web where id="'.$row["id_web"].'"';
		$arr1=mysql_fetch_array(mysql_query($qq));
	}else{
		$arr1[1]="SIN ASIGNAR";
		$arr1[2]="";
	}
	
	
	
	echo '<td><A HREF="../admin_articulos/articulos_ingreso.php?id_articulos='.$row["id"].'" onClick="return popup(this, \'notes\')"><button>Modif.</button></A></td>';
	echo '<td><A HREF="../admin_articulos/articulos_eliminar.php?id_articulos='.$row["id"].'" onClick="return popup(this, \'notes\')"><button>Elim</button></A></td>';
	echo '<td><A HREF="../admin_promociones/promociones_ingreso.php?id_articulos='.$row["id"].'" onClick="return popup(this, \'notes\')"><button>Prom</button></A></td>';
   echo '<td><A HREF="../asignar_categoria_web.inc/index.php?id_articulo='.$row["id"].'" onClick="return popup(this, \'notes\')"><font3>'.$arr1[1].'<BR>'.$arr1[2].'</font3></A></td>';

	/////EPMR
   echo '<td><A HREF="../admin_stock_epmr/stock_epmr_ingreso.php?id_articulo='.$row["id"].'" onClick="return popup(this, \'notes\')"><font3>';
   echo '<table border="1">';
   echo "<tr>";
   echo '<td>E</td>';
   echo '<td>'.$array_epmr["estanteria"].'</td>';
   echo "<tr>";

   echo "<tr>";
   echo '<td>P</td>';
   echo '<td>'.$array_epmr["piso"].'</td>';
   echo "<tr>";

   echo "<tr>";
   echo '<td>M</td>';
   echo '<td>'.$array_epmr["modulo"].'</td>';
   echo "<tr>";

   echo "<tr>";
   echo '<td>R</td>';
   echo '<td>'.$array_epmr["reserva"].'</td>';
   echo "<tr>";
   echo '</table>';
   echo '</font3></A></td>';
	/////EPMR */


	$qb='select sum(cantidad) from seguimiento_stock where tipo="INGRESO POR COMPRA" and id_articulo="'.$row["id"].'" and fecha>="'.fecha_conv("/",$_POST["fecha_desde"]).'" and fecha<="'.fecha_conv("/",$_POST["fecha_hasta"]).'"';
	$rr=mysql_query($qb);
	$arr1=mysql_fetch_array($rr);
	echo '<td>'.$arr1[0].'</td>';
	$total=$total+$arr1[0];

	echo "</tr>".chr(13);
}
?>
</table>

<?php
	echo 'Total de unidades compradas: '.$total;
?>


</center>
</body>
</html>
