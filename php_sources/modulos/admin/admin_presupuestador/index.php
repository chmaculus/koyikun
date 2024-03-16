<?php
include_once("../../includes/connect.php");
include_once("../../includes/funciones_stock.php");

include("../../login/login_verifica.inc.php");
include_once("../seguridad.inc.php"); 

include_once("cabecera.inc.php");?>

<script language="javascript" src="js/jquery-1.3.min.js"></script>
<script language="javascript" src="funciones.js"></script>


<body>

<center>
<titulo>Modificacion de costos</titulo>

<?php
include_once("../includes/funciones_costos.php");
include_once("../includes/funciones_precios.php");

$fecha=date("Y-n-d");


echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="post">';
include("select.inc.php");
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
echo "</form>";

echo '<Titulo>Modificacion de costos</titulo><br><br>';

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
if(mysql_error()){
    echo mysql_error()."<br>".$query."<br>";
}
$numrows=mysql_num_rows($result);
#---------------------------------------------------------------

echo '<br>Cantidad de articulos: '.$numrows.'<br>';

echo '<form method="post" action="costos_update.php" name="form_costos" target="_self" id="form_costos">';
?>

<table class="t1">
<tr>
	<th>ID</th>
	<th>Descripcion</th>
	<th>Color</th>
	<th>Contenido</th>
	<th>Pesentacion</th>
	<th>Clasificacion</th>
	<th>Sub-clasificacion</th>
	<th>cod barra</th>
	<th>P./costo</th>
	<th>Desc1</th>
	<th>Desc2</th>
	<th>Desc3</th>
	<th>Desc4</th>
	<th>Desc5</th>
	<th>Desc6</th>
	<th>IVA</th>
	<th>Margen</th>
	<th>P./venta</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){

	$array_precios=precio_sucursal($row["id"],"1");
	$array_costos=array_costo( $row["id"] );
	
	if( $array_costos=="0" OR $array_costos["precio_costo"]=="" OR $array_costos["precio_costo"]==NULL OR $array_costos["precio_costo"]=="0"  ){
		$fecha=$array_precios["fecha"];
		$array_costos["precio_costo"]="0";
		$precio_venta=$array_precios["precio_base"];
	}else{
		//$array_costos["precio_costo"]=rand("101","999");
		$precio_venta=calcula_precio_venta( $array_costos );
		$precio_web=calcula_precio_web( $array_costos );
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
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["color"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["codigo_barra"].'</td>';

/*
	if(file_exists ( "./imagenes/miniaturas/".$row["id"].".jpg" )==1){
		echo '<td><A HREF="detalle.php?id_articulo='.$row["id"].'" onClick="return popup(this, \'notes\')">
		<img  src="./imagenes/miniaturas/'.$row["id"].'".jpg" width="150" height="100">
		</A></td>';
	}else{
		echo '<td></td>';
	}
*/
	
	echo '<td>'.$array_costos["precio_costo"].'</td>';
	echo '<td>'.$array_costos["descuento1"].'</td>';
	echo '<td>'.$array_costos["descuento2"].'</td>';
	echo '<td>'.$array_costos["descuento3"].'</td>';
	echo '<td>'.$array_costos["descuento4"].'</td>';
	echo '<td>'.$array_costos["descuento5"].'</td>';
	echo '<td>'.$array_costos["descuento6"].'</td>';
	echo '<td>'.$array_costos["iva"].'</td>';
	echo '<td>'.$array_costos["margen"].'</td>';
	echo '<td>'.$precio_venta.'</td>';
	echo '<td>';
		include("rotacion.inc.php");
	echo '</td>';
	echo '<td><A HREF="enviar.php?id_articulo='.$row["id"].'" onClick="return popup(this, \'notes\')"><button>ENVIAR</button></A></td>';
	echo "</tr>".chr(13);
}
?>
</table>


<input type="hidden" name="marca" value="<?php echo $_POST["marca"]; ?>">
<input type="hidden" name="query" value="<?php echo base64_encode($query); ?>">
<input type="submit" name="APLICAR" value="APLICAR">
</form>

</center>
</body>
</html>
