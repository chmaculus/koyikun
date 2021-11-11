
<?php

include_once("../../includes/connect.php");

include("../../login/login_verifica2.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	echo "No tiene Permiso para acceder<br>";
	exit;
}

include_once("cabecera.inc.php");

include_once("../../includes/funciones_costos.php");
include_once("../../includes/funciones_precios.php");

$fecha=date("Y-n-d");


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

echo '<center>';

echo "Tipo Cambio: ".$_POST["tipo_cambio"]."<br>";
echo "Detalle: ".$_POST["detalle"]."<br>";

echo '<br>Cantidad de articulos: '.$numrows.'<br>';

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
	<th>P./costo</th>
	<th>D1</th>
	<th>D2</th>
	<th>D3</th>
	<th>D4</th>
	<th>D5</th>
	<th>D6</th>
	<th>IVA</th>
	<th>Margen</th>
	<th>P./venta</th>
	<th>Fecha Fab</th>
	<th>Fecha Ger</th>
</tr>

<?php
while($row=mysql_fetch_array($result)){
	$precio_costo=precio_costo( $row["id"] );
	$array_costo=array_costo($row["id"]);
	$array_precios=precio_sucursal($row["id"],"1");
	
	if( $row=="0" OR $row["precio_costo"]=="" OR $row["precio_costo"]==NULL OR $row["precio_costo"]=="0"  ){
		$fecha=$array_precios["fecha"];
		$row["precio_costo"]="0";
		$precio_venta=$array_precios["precio_base"];
	}else{
		//$row["precio_costo"]=rand("101","999");
		$precio_venta=calcula_precio_venta( $row );
		$fecha=$row["fecha"];
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

	if(file_exists ( "./imagenes/miniaturas/".$row["id"].".jpg" )==1){
		echo '<td><A HREF="detalle.php?id_articulo='.$row["id"].'" onClick="return popup(this, \'notes\')">
		<img  src="./imagenes/miniaturas/'.$row["id"].'".jpg" width="150" height="100">
		</A></td>';
	}else{
		echo '<td></td>';
	}
	
	//echo '<td><A HREF="../admin_articulos/articulos_ingreso.php?id_articulos='.$row["id"].'" onClick="return popup(this, \'notes\')"><button>Modificar</button></A></td>';
	echo '<td><form action="costo_modifica.php" target="FrameMedio2" method="post"> 
			<input type="submit" name="a" value="a" />
			<input type="hidden" name="id_articulos" value="'.$row["id"].'" /> 
			</form></td>';
echo "<td>".$array_costo["precio_costo"]."</td>";
echo "<td>".$array_costo["descuento1"]."</td>";
echo "<td>".$array_costo["descuento2"]."</td>";
echo "<td>".$array_costo["descuento3"]."</td>";
echo "<td>".$array_costo["descuento4"]."</td>";
echo "<td>".$array_costo["descuento5"]."</td>";
echo "<td>".$array_costo["descuento6"]."</td>";
echo "<td>".$array_costo["iva"]."</td>";
echo "<td>".$array_costo["margen"]."</td>";
echo "<td>".$array_costo["fecha"]."</td>";
echo "<td>".$array_costo["fecha_gerencia"]."</td>";
	echo "</tr>".chr(13);
}



#----------------------------------------------------------------
#Guarda variables

$rows=mysql_num_rows(mysql_query('select id_session, descripcion from variables_temporales where id_session="'.$id_session.'" and descripcion="costo_tipo_cambio"'));
if($rows>0){
	mysql_query('update variables_temporales set valor="'.$_POST["tipo_cambio"].'"  where id_session="'.$id_session.'" and descripcion="costo_tipo_cambio"');
}else{
	mysql_query('insert into variables_temporales set valor="'.$_POST["tipo_cambio"].'", id_session="'.$id_session.'", descripcion="costo_tipo_cambio"');
}
#//////////////////////////////////////////////
$rows=mysql_num_rows(mysql_query('select id_session, descripcion from variables_temporales where id_session="'.$id_session.'" and descripcion="costo_detalle"'));
if($rows>0){
	mysql_query('update variables_temporales set valor="'.$_POST["detalle"].'"  where id_session="'.$id_session.'" and descripcion="costo_detalle"');
}else{
	mysql_query('insert into variables_temporales set valor="'.$_POST["detalle"].'", id_session="'.$id_session.'", descripcion="costo_detalle"');
}

#----------------------------------------------------------------






?>
</table>

</center>
</body>
</html>
