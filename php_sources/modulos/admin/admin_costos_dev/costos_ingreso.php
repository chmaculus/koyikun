<?php
include_once("../../includes/connect.php");

include("../../login/login_verifica.inc.php");
include_once("../seguridad.inc.php"); 

include_once("cabecera.inc.php");?>

<script language="javascript" src="js/jquery-1.3.min.js"></script>
<script language="javascript" src="funciones.js"></script>


<body>

<center>
<titulo>Modificacion de costos</titulo>

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
	<th>Elim</th>
	<th>P./costo</th>
	<th>Desc1</th>
	<th>Desc2</th>
	<th>Desc3</th>
	<th>Desc4</th>
	<th>Desc5</th>
	<th>Desc6</th>
	<th>IVA</th>
	<th>Margen</th>
	<th>% Tarj.</th>
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
	echo '<div id="divedit'.$row["id"].'">';
	//echo '<iframe id="frameedit'.$row["id"].'">';
	echo '<td><A HREF="../admin_articulos/articulos_ingreso.php?id_articulos='.$row["id"].'" onClick="return popup(this, \'notes\')"><button>Modi</button></A></td>';
	echo '<td><A HREF="articulos_eliminar.php?id_articulos='.$row["id"].'" onClick="return popup(this, \'notes\')"><button>Elim</button></A></td>';
	echo '<td><input type="text" name="precio_costo'.$row["id"].'" id="precio_costo'.$row["id"].'" size="4" onchange="cal2('.$row["id"].');" value="'.$array_costos["precio_costo"].'"></td>';
	echo '<td><input type="text" name="des0a'.$row["id"].'" id="des0a'.$row["id"].'" size="4" onchange="cal2('.$row["id"].');" value="'.$array_costos["descuento1"].'"></td>';
	echo '<td><input type="text" name="des0b'.$row["id"].'" id="des0b'.$row["id"].'" size="4" onchange="cal2('.$row["id"].');" value="'.$array_costos["descuento2"].'"></td>';
	echo '<td><input type="text" name="des0c'.$row["id"].'" id="des0c'.$row["id"].'" size="4" onchange="cal2('.$row["id"].');" value="'.$array_costos["descuento3"].'"></td>';
	echo '<td><input type="text" name="des0d'.$row["id"].'" id="des0d'.$row["id"].'" size="4" onchange="cal2('.$row["id"].');" value="'.$array_costos["descuento4"].'"></td>';
	echo '<td><input type="text" name="des0e'.$row["id"].'" id="des0e'.$row["id"].'" size="4" onchange="cal2('.$row["id"].');" value="'.$array_costos["descuento5"].'"></td>';
	echo '<td><input type="text" name="des0f'.$row["id"].'" id="des0f'.$row["id"].'" size="4" onchange="cal2('.$row["id"].');" value="'.$array_costos["descuento6"].'"></td>';
	echo '<td><input type="text" name="iva'.$row["id"].'" id="iva'.$row["id"].'" size="4" onchange="cal2('.$row["id"].');" value="'.$array_costos["iva"].'"></td>';
	echo '<td><input type="text" name="margen'.$row["id"].'" id="margen'.$row["id"].'" size="4" onchange="cal2('.$row["id"].');" value="'.$array_costos["margen"].'"></td>';
	echo '<td><input type="text" name="tarjeta'.$row["id"].'" id="tarjeta'.$row["id"].'" size="4" value="'.$array_precios["porcentaje_tarjeta"].'"></td>';
	echo '<td><input type="text" name="precio_venta'.$row["id"].'" id="precio_venta'.$row["id"].'" size="8" value="'.$precio_venta.'"></td>';
//	echo '</iframe>';
	echo '</div>';
	echo '<td>'.$array_costos["fecha"].'</td>';
	echo '<td>'.$array_costos["fecha_gerencia"].'</td>';
	echo "</tr>".chr(13);
}
?>
</table>

<table class="t1">
	<tr>
	<td>
	<table class="t1">
		<tr>
		<td>Fabrica</td>
		<td><input type="radio" name="tipo_cambio" value="fabrica" checked ></td>
		</tr>
		<tr>
		<td>Gerencia</td>
		<td><input type="radio" name="tipo_cambio" value="gerencia"></td>
		</tr>
	</table>
	</td>
	<td>
	<font1>Detalle</font1><br>
	<textarea name="detalle" rows="4" cols="20"></textarea>
	</td>
	</tr>
</table>

<input type="hidden" name="marca" value="<?php echo $_POST["marca"]; ?>">
<input type="hidden" name="query" value="<?php echo base64_encode($query); ?>">
<input type="submit" name="APLICAR" value="APLICAR">
</form>

</center>
</body>
</html>
