<?php 
include("../../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 

include_once("../../includes/connect.php");
include_once("articulos_base.php");
include_once("../../includes/funciones_precios.php");
include_once("../../includes/funciones_costos.php");

if($_GET["id_articulos"]){
	$query='select * from articulos where id="'.$_GET["id_articulos"].'"';
	$array_articulos=mysql_fetch_array(mysql_query($query));
	$marca=$array_articulos["marca"];
	$clasificacion=$array_articulos["clasificacion"];
	$array_precios=precio_sucursal($_GET["id_articulos"], "1");
	$id_articulo=$_GET["id_articulos"];
}
?>

<script language="javascript" src="js/jquery-1.3.min.js"></script>
<script language="javascript" src="funciones_dependiente.js"></script>
<script language="javascript" src="funciones.js"></script>


<center>
<titulo>Ingreso</titulo>
<form method="post" action="articulos_update.php" name="form_costos" id="form_costos">

<table border="1" class="t1">

<tr>
	<td><font1>Codigo Interno</font1></td>
	<td><input type="text" name="codigo_interno" size="14" value="<?php if($array_articulos["codigo_interno"]){echo $array_articulos["codigo_interno"];} ?>" ></td>
</tr>
<tr>
	<td><font1>Marca</font1></td>
	<td><input type="text" name="marca1" size="25"><br>
	<?php 	
		echo '<select name="marca" id="marca" onChange="fun_marca();">';	
		if($array_articulos["marca"]){$marca=$array_articulos["marca"];}
		include("select_marca.inc.php"); 
		echo '</select>';
	?>
	</td>
</tr>
<tr>
	<td><font1>Descripcion</font1></td>
	<td><input type="text" name="descripcion" size="40" value="<?php if($array_articulos["descripcion"]){echo $array_articulos["descripcion"];} ?>" ></td>
</tr>
<tr>
	<td><font1>Color</font1></td>
	<td><input type="text" name="color" size="8" value="<?php if($array_articulos["color"]){echo $array_articulos["color"];} ?>" ></td>
</tr>
<tr>
	<td><font1>Contenido</font1></td>
	<td><input type="text" name="contenido" size="15" value="<?php if($array_articulos["contenido"]){echo $array_articulos["contenido"];} ?>" ></td>
</tr>
<tr>
	<td><font1>Presentacion</font1></td>
	<td><input type="text" name="presentacion" size="10" value="<?php if($array_articulos["presentacion"]){echo $array_articulos["presentacion"];} ?>" ></td>
</tr>
<tr>
	<td><font1>Codigo barras</font1></td>
	<td><input type="text" name="codigo_barra" size="14" value="<?php if($array_articulos["codigo_barra"]){echo $array_articulos["codigo_barra"];} ?>" ></td>
</tr>
<tr>
	<td><font1>Clasificacion</font1></td>
	<td><input type="text" name="clasificacion1" size="30"><br>
	<?php 
		echo '<select name="clasificacion" id="clasificacion" onchange="fun_clasificacion();">';
		if($array_articulos["clasificacion"]){$clasificacion=$array_articulos["clasificacion"];}
		include("select_clasificacion.inc.php");  
		echo '</select>';
	?>

	</td>
</tr>

<tr>
	<td><font1>Sub-clasificacion</font1></td>
	<td><input type="text" name="subclasificacion1" size="30"><br>
	<?php
		echo '<select name="subclasificacion" id="subclasificacion">';	
		if($array_articulos["subclasificacion"]){$subclasificacion=$array_articulos["subclasificacion"];}
		include("select_subclasificacion.inc.php");  
		echo '</select>';
	?>

	</td>
</tr>

<tr>
	<td><font1>Zona</font1></td>
	<td>
	<?php
		echo '<select name="zona" id="zona">';
		echo '<option value="">Seleccione</option>';	
		for($i=1;$i<=5;$i++){
			if($i==$array_articulos["zona"]){$sel="selected";}else{$sel="";}
			
			echo '<option value="'.$i.'" '.$sel.'>Zona '.$i.'</option>';	
		}
		echo '</select>';
	?>

	</td>
</tr>

<tr>
	<td><font1>Informacion del producto</font1></td>
	<td>
	<textarea name="observaciones" rows="10" cols="80">
	<?php if($array_articulos["observaciones"]){echo $array_articulos["observaciones"];} ?>
	</textarea>
	</td>
</tr>


<tr>
	<td><font1>Precio</font1></td>
	<td>
		<table border="0">
		<tr>

<!-- 
#----------------------------------------------------------------------
#costos
 -->
<tr>
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

echo "id: ".$id_articulo."<br>";
$array_costos=array_costos($id_articulo);
$precio_venta=calcula_precio_venta($array_costos);

echo '<td><input type="text" name="precio_costo" id="precio_costo" size="4" onchange="cal3();" value="'.$array_costos["precio_costo"].'"></td>'.chr(10);
echo '<td><input type="text" name="des0b" id="des0b" size="4" onchange="cal3();" value="'.$array_costos["descuento2"].'"></td>'.chr(10);
echo '<td><input type="text" name="des0a" id="des0a" size="4" onchange="cal3();" value="'.$array_costos["descuento1"].'"></td>'.chr(10);
echo '<td><input type="text" name="des0c" id="des0c" size="4" onchange="cal3();" value="'.$array_costos["descuento3"].'"></td>'.chr(10);
echo '<td><input type="text" name="des0d" id="des0d" size="4" onchange="cal3();" value="'.$array_costos["descuento4"].'"></td>'.chr(10);
echo '<td><input type="text" name="des0e" id="des0e" size="4" onchange="cal3();" value="'.$array_costos["descuento5"].'"></td>'.chr(10);
echo '<td><input type="text" name="des0f" id="des0f" size="4" onchange="cal3();" value="'.$array_costos["descuento6"].'"></td>'.chr(10);
echo '<td><input type="text" name="iva" id="iva" size="4" onchange="cal3();" value="'.$array_costos["iva"].'"></td>'.chr(10);
echo '<td><input type="text" name="margen" id="margen" size="4" onchange="cal3();" value="'.$array_costos["margen"].'"></td>'.chr(10);
echo '<td><input type="text" name="tarjeta" id="tarjeta" size="4" value="'.$array_precios["porcentaje_tarjeta"].'"></td>';
echo '<td><input type="text" name="precio_venta" id="precio_venta" size="8" value="'.round($precio_venta,2).'"></td>';

#fin costos

#----------------------------------------------------------------------







#----------------------------------------------------------------------
function array_costos($id_articulo){
 $q='select * from costos where id_articulos="'.$id_articulo.'"';
 $r=mysql_query($q);
 if(mysql_error()){echo mysql_error()."<br>";}
/*
 echo "rows: ".mysql_num_rows($r)."<br>";
 echo "id: ".$id_articulo."<br>";
 echo "q: ".$q."<br>";
*/
 $array=mysql_fetch_array($r);
 return $array;
}
#----------------------------------------------------------------------








?>

		</tr>
		</table>
	</td>
</tr>


</table>
<?php
if($_GET["id_articulos"]){
	echo '<input type="hidden" name="id_articulos" value="'.$_GET["id_articulos"].'">';
	echo '<input type="hidden" name="accion" value="modificacion">';
}else{
	echo '<input type="hidden" name="accion" value="ingreso">';
}
?>

<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
</body>
</html>

