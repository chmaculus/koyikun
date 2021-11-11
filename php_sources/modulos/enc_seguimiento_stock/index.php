<?php
include_once("../../includes/connect.php");
include_once("barcode.php");

include("../../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

include_once("includes/cabecera.inc.php");?>

<script language="javascript" src="js/jquery-1.3.min.js"></script>
<script language="javascript" src="js/funciones.js"></script>


<body>

<center>
<titulo>Modificacion de costos</titulo>

<?php
include_once("../../includes/funciones_costos.php");
include_once("../../includes/funciones_precios.php");

$fecha=date("Y-n-d");


echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post">';
include("includes/select.inc.php");
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
echo "</form>";

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
	<th>mod</th>
	<th>P./costo</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	$seguimiento=seguimiento_stock($row["id"]);
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["codigo_interno"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td><img src="../../includes/barcode/barcode.php?encode=EAN-13&bdata='.$row["codigo_barra"].'&height=50&scale=2&bgcolor=%23FFFFEC&color=%23333366&type=jpg><br>';
	echo $row["codigo_barra"].'</td>';
	echo '<td><A HREF="seguimiento_stock.php?id_articulo='.$row["id"].'" onClick="return popup(this, \'notes\')"><button>'.$seguimiento.'</button></A></td>';
	echo "</tr>".chr(13);
}



function seguimiento_stock($id_articulo){
	$q='select * from seguimiento_stock where id_articulo="'.$id_articulo.'"';
	$r=mysql_query($q);
	if(mysql_error()){
		echo mysql_error();
	}
	$rows=mysql_num_rows($r);
	return $rows;
}






?>
</table>


<input type="hidden" name="marca" value="<?php echo $_POST["marca"]; ?>">
<input type="hidden" name="query" value="<?php echo base64_encode($query); ?>">
</form>

</center>
</body>
</html>
