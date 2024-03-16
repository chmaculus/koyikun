<?php
include_once("../../includes/connect.php");

include("../../login/login_verifica.inc.php");
include_once("../seguridad.inc.php"); 

include_once("cabecera.inc.php");
echo "jejejejje";

?>

<script language="javascript" src="js/jquery-1.3.min.js"></script>
<script language="javascript" src="funciones.js"></script>


<body>

<center>
<titulo>Promociones X grupo</titulo>

<?php
include_once("../../includes/funciones_costos.php");
include_once("../../includes/funciones_precios.php");

$fecha=date("Y-n-d");


echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post">';
include("select.inc.php");
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

echo '<form method="post" action="promociones_update.php" name="form_costos" target="_self" id="form_costos">';
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
	<th>P./venta</th>
	<th>Fecha Fab</th>
	<th>Fecha Ger</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	$array_costos=precio_costo( $row["id"] );
	$array_precios=precio_sucursal($row["id"],"1");
	
	if( $array_costos=="0" OR $array_costos["precio_costo"]=="" OR $array_costos["precio_costo"]==NULL OR $array_costos["precio_costo"]=="0"  ){
		$fecha=$array_precios["fecha"];
		$array_costos["precio_costo"]="0";
		$precio_venta=$array_precios["precio_base"];
	}else{
		//$array_costos["precio_costo"]=rand("101","999");
		$precio_venta=calcula_precio_venta( $array_costos );
		$fecha=$array_costos["fecha"];
	}

	$costo_ultima_actualizacion=costo_ultima_actualizacion($row["id"], $fecha );
	if($costo_ultima_actualizacion==0){
		echo "<tr>";
	}
	
	if($costo_ultima_actualizacion==1){
		echo '<tr class="precaucion">';
	}
	
	if($costo_ultima_actualizacion==2){
		echo '<tr class="grave">';
	}
	
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["codigo_interno"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["codigo_barra"].'</td>';
	echo '<td>'.$array_precios["precio_base"].'</td>';
	echo "</tr>".chr(13);
}
?>
</table>

<br><br>Use con precaucion!<br><br>

<table>
	<tr><td>Precio promocion</td>	<td><input type="text" name="precio_promocion"></td></tr>
	<tr><td>Fecha desde</td>	<td><input type="text" name="fecha_inicio" value="<?php echo date("d/n/Y");?>"></td></tr>
	<tr><td>Fecha hasta</td>	<td><input type="text" name="fecha_finaliza" value="<?php echo date("d/n/Y");?>"></td></tr>
	<tr><td>Sucursal</td><td><select name="sucursal">
	<?php	include("select_sucursal.inc.php");	?></td>
	</tr>
	
	</select>
</table>

<input type="hidden" name="marca" value="<?php echo $_POST["marca"]; ?>">
<input type="hidden" name="query" value="<?php echo base64_encode($query); ?>">
<input type="submit" name="APLICAR" value="APLICAR">
</form>

</center>
</body>
</html>
