<?php
include_once("articulos_base.php");
include_once("../../includes/connect.php");
include_once("../../includes/funciones_precios.php");
include_once("../../includes/funciones_costos.php");
include_once("../../includes/funciones_listas.php");

$fecha=date("Y-n-d");
$hora=date("H:i:s");




if($_POST["marca1"]){ $marca=$_POST["marca1"];	
}else{		$marca=$_POST["marca"]; 	}

if($_POST["clasificacion1"]){ $clasificacion=$_POST["clasificacion1"];	
}else{		$clasificacion=$_POST["clasificacion"]; 	}

if($_POST["subclasificacion1"]){ $subclasificacion=$_POST["subclasificacion1"];	
}else{		$subclasificacion=$_POST["subclasificacion"]; 	}




#---------------------------------------------------------------------------------
if($_POST["accion"]=="ingreso"){

	if($_POST["zona"]==""){ 	echo '<center><alerta1>Debe especificar la zona</alerta1>'; 	exit; }
	$query='insert into articulos set
		codigo_interno="'.$_POST["codigo_interno"].'",
		marca="'.$marca.'",
		descripcion="'.$_POST["descripcion"].'",
		color="'.$_POST["color"].'",
		contenido="'.$_POST["contenido"].'",
		presentacion="'.$_POST["presentacion"].'",
		codigo_barra="'.$_POST["codigo_barra"].'",
		fecha="'.$fecha.'",
		hora="'.$hora.'",
		clasificacion="'.$clasificacion.'",
		zona="'.$_POST["zona"].'",
		subclasificacion="'.$subclasificacion.'",
		observaciones="'.trim($_POST["observaciones"]).'"
		';
	mysql_query($query)or die(mysql_error());
	$id_articulos=mysql_insert_id($id_connection);

		$query='insert into precios set
			id_articulo="'.$id_articulos.'",
			precio_base="'.$_POST["precio_base"].'",
			porcentaje_contado="'.$_POST["porcentaje_contado"].'",
			porcentaje_tarjeta="'.$_POST["porcentaje_tarjeta"].'",
			id_sucursal="1",
			modulo="16",
			fecha="'.$fecha.'",
			hora="'.$hora.'"
			';
	mysql_query($query)or die(mysql_error());

}
#---------------------------------------------------------------------------------


#---------------------------------------------------------------------------------
if($_POST["accion"]=="modificacion"){

	if($_POST["zona"]==""){ 	echo '<center><alerta1>Debe especificar la zona</alerta1>'; 	exit; }

		$id_articulos=$_POST["id_articulos"];
		
		$query='update articulos set
			codigo_interno="'.$_POST["codigo_interno"].'",
			marca="'.$_POST["marca"].'",
			descripcion="'.$_POST["descripcion"].'",
			color="'.$_POST["color"].'",
			contenido="'.$_POST["contenido"].'",
			presentacion="'.$_POST["presentacion"].'",
			codigo_barra="'.$_POST["codigo_barra"].'",
			fecha="'.$fecha.'",
			hora="'.$hora.'",
			clasificacion="'.$clasificacion.'",
			subclasificacion="'.$subclasificacion.'",
		zona="'.$_POST["zona"].'",
			observaciones="'.trim($_POST["observaciones"]).'"
				where id="'.$id_articulos.'"
			';
	//echo "query: ".$query."<br><br>".chr(13);
	mysql_query($query)or die(mysql_error());
	$a=verifica_tabla_costos2($id_articulos);
	if($a==1){
	    $array=array_costo($id_articulos);
	    $precio=calcula_precio_venta($array);
	}

		verifica_tabla_precios($id_articulos,1);
		$query='update precios set
			precio_base="'.$precio.'",
			porcentaje_contado="'.$_POST["porcentaje_contado"].'",
			porcentaje_tarjeta="20",
			fecha="'.$fecha.'",
			hora="'.$hora.'",
			modulo="17"
				where id_articulo="'.$id_articulos.'"
			';
//	echo "query: ".$query."<br><br>".chr(13);
	mysql_query($query)or die(mysql_error());
}
#---------------------------------------------------------------------------------



#---------------------------------------------------------------------------------
if($_POST["accion"]=="ELIMINAR"){
		$id_articulos=$_POST["id_articulos"];

		$query='delete from articulos where id="'.$id_articulos.'"';
		//echo "query: ".$query."<br>".chr(13);
		mysql_query($query);

		$query='delete from precios where id_articulo="'.$id_articulos.'"';
		//echo "query: ".$query."<br>".chr(13);
		mysql_query($query);

		$query='delete from stock where id_articulo="'.$id_articulos.'"';
		//echo "query: ".$query."<br>".chr(13);
		mysql_query($query);

		$query='delete from costos where id_articulos="'.$id_articulos.'"';
		//echo "query: ".$query."<br>".chr(13);
		mysql_query($query);
		if(!mysql_error()){
			echo '<center><font1>El articulo se ha eliminado correctamente</font1>';
			exit;
		}
}
#---------------------------------------------------------------------------------



#muestra registro ingresado
$query='select * from articulos where id="'.$id_articulos.'"';
echo "q1: ".$query."<br>";
$array_articulos=mysql_fetch_array(mysql_query($query));

$query='select * from precios where id_articulo="'.$id_articulos.'" and id_sucursal="1"';
$array_precios=mysql_fetch_array(mysql_query($query));
?>

<center>
<table class="t1">

<tr>
	<td>Codigo interno</td>
	<td><?php echo $array_articulos["codigo_interno"]; ?></td>
</tr>
<tr>
	<td>Marca</td>
	<td><?php echo $array_articulos["marca"]; ?></td>
</tr>
<tr>
	<td>Descripcion</td>
	<td><?php echo $array_articulos["descripcion"]; ?></td>
</tr>
<tr>
	<td>Contenido</td>
	<td><?php echo $array_articulos["contenido"]; ?></td>
</tr>
<tr>
	<td>Presentacion</td>
	<td><?php echo $array_articulos["presentacion"]; ?></td>
</tr>
<tr>
	<td>Codigo barras</td>
	<td><?php echo $array_articulos["codigo_barra"]; ?></td>
</tr>
<tr>
	<td>Fecha</td>
	<td><?php echo $array_articulos["fecha"]; ?></td>
</tr>
<tr>
	<td>Hora</td>
	<td><?php echo $array_articulos["hora"]; ?></td>
</tr>
<tr>
	<td>Clasificacion</td>
	<td><?php echo $array_articulos["clasificacion"]; ?></td>
</tr>
<tr>
	<td>Subclasificacion</td>
	<td><?php echo $array_articulos["subclasificacion"]; ?></td>
</tr>
<tr>
	<td>Precio base</td>
	<td><?php echo $array_precios["precio_base"]; ?></td>
</tr>
<tr>
	<td>Porcentaje contado</td>
	<td><?php echo $array_precios["porcentaje_contado"]; ?></td>
</tr>
<tr>
	<td>Porcentaje Tarjeta</td>
	<td><?php echo $array_precios["porcentaje_tarjeta"]; ?></td>
</tr>
</table>


<?php



#----------------------------------------------------------------------------------------------
$costo_anterior=calcula_precio_costo( $id_articulos );
verifica_tabla_costos( $id_articulos );
verifica_tabla_precios( $id_articulos, 1 );

		#---------------------------------------------------------------------------------------------
			$query='update costos set 	precio_costo="'.$_POST["precio_costo"].'",
											descuento1="'.$_POST["des0a"].'",
											descuento2="'.$_POST["des0b"].'",
											descuento3="'.$_POST["des0c"].'",
											descuento4="'.$_POST["des0d"].'",
											descuento5="'.$_POST["des0e"].'",
											descuento6="'.$_POST["des0f"].'",
											descuento7="'.$_POST["des0g"].'",
											descuento8="'.$_POST["des0h"].'",
											descuento9="'.$_POST["des0i"].'",
											descuento10="'.$_POST["des0j"].'",
											iva="'.$_POST["iva"].'",
											margen="'.$_POST["margen"].'",
											fecha="'.$fecha.'",
											hora="'.$hora.'",
											modulo="13"
												where id_articulos="'.$id_articulos.'"
											';
		#---------------------------------------------------------------------------------------------

		echo "query: ".$query."<br>".chr(13);
		mysql_query($query)or die(mysql_error());

$array_costos=array_costo($id_articulos);
$precio_venta=calcula_precio_venta($array_costos);


			$query='update precios set precio_base="'.$precio_venta.'",
												porcentaje_contado="0", 
												porcentaje_tarjeta="'.$_POST["tarjeta"].'", 
												fecha="'.$fecha.'",
												hora="'.$hora.'",
												modulo="15"
													where id_articulo="'.$id_articulos.'"
												';
		echo "query: ".$query."<br>".chr(13);
		mysql_query($query)or die(mysql_error());
#----------------------------------------------------------------------------------------------



























#--------------------------------------------------------------------
#esta funcion verifica si existe el id_articulos en la tabla precios
function verifica_precios($id_articulos){
	$query='select * from precios where id_articulo="'.$id_articulos.'" and id_sucursal="1" ';
	$rows=mysql_num_rows(mysql_query($query));
	if($rows<"1"){
		$query='insert into precios set id_articulo="'.$id_articulos.'", id_sucursal="1" ';
		mysql_query($query);
	}
}
#--------------------------------------------------------------------






if(!mysql_error()){
	if($_POST["accion"]=="ingreso"){
		echo '<td><font1>Los datos se ingresaron correctamente</font1></td>';
	}
	if($_POST["accion"]=="modificacion"){
		echo '<td><font1>Los datos se actualizaron correctamente</font1></td>';
	}
}

if($_POST["accion"]=="ELIMINAR"){
 	$query='delete from articulos where id="'.$id_articulos.'"';
 	mysql_query($query)or die(mysql_error());
 	exit;
}


?>


</center>
</body>
</html>