<?php 
include("../../login/login_verifica.inc.php");
include_once("../seguridad.inc.php"); 

include_once("../../includes/connect.php");
include_once("cabecera.inc.php");
include_once("funciones_precios.php");

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


<center>
<titulo>Ingreso</titulo>
<form method="post" action="articulos_update.php">
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
	<td><font1>Precio</font1></td>
	<td>
		<table border="0">
		<tr>

<?php

include("costos_ingreso.inc.php");

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

