<! #------------------------------------------------------------- >
tabla headers : cajones_contenido

<table class="t1">
	<th>id</th>
	<th>id_cajon</th>
	<th>id_articulo</th>
	<th>marca</th>
	<th>descripcion</th>
	<th>contenido</th>
	<th>presentacion</th>
	<th>clasificacion</th>
	<th>subclasificacion</th>
	<th>precio_unitario</th>
	<th>cantidad</th>
</table>
<! #------------------------------------------------------------- >


<! #------------------------------------------------------------- >
tabla: cajones_contenido

<table class="t1">
	<td>id</td>
	<td>id_cajon</td>
	<td>id_articulo</td>
	<td>marca</td>
	<td>descripcion</td>
	<td>contenido</td>
	<td>presentacion</td>
	<td>clasificacion</td>
	<td>subclasificacion</td>
	<td>precio_unitario</td>
	<td>cantidad</td>
</table>
<! #------------------------------------------------------------- >


<! #------------------------------------------------------------- >

<?php
#rows
	$row["id"]
	$row["id_cajon"]
	$row["id_articulo"]
	$row["marca"]
	$row["descripcion"]
	$row["contenido"]
	$row["presentacion"]
	$row["clasificacion"]
	$row["subclasificacion"]
	$row["precio_unitario"]
	$row["cantidad"]


#--------------------------------------------------------
#rows table
echo '<table class="t1">';
	echo "<td>".$row["id"]."</td>"
	echo "<td>".$row["id_cajon"]."</td>"
	echo "<td>".$row["id_articulo"]."</td>"
	echo "<td>".$row["marca"]."</td>"
	echo "<td>".$row["descripcion"]."</td>"
	echo "<td>".$row["contenido"]."</td>"
	echo "<td>".$row["presentacion"]."</td>"
	echo "<td>".$row["clasificacion"]."</td>"
	echo "<td>".$row["subclasificacion"]."</td>"
	echo "<td>".$row["precio_unitario"]."</td>"
	echo "<td>".$row["cantidad"]."</td>"
</table>
#--------------------------------------------------------


#--------------------------------------------------------
#rows table font
echo '<table class="t1">';
	echo '<tr>';
	echo "<td>".$row["id"]."</td>"
	echo "<td>".$row["id_cajon"]."</td>"
	echo "<td>".$row["id_articulo"]."</td>"
	echo "<td>".$row["marca"]."</td>"
	echo "<td>".$row["descripcion"]."</td>"
	echo "<td>".$row["contenido"]."</td>"
	echo "<td>".$row["presentacion"]."</td>"
	echo "<td>".$row["clasificacion"]."</td>"
	echo "<td>".$row["subclasificacion"]."</td>"
	echo "<td>".$row["precio_unitario"]."</td>"
	echo "<td>".$row["cantidad"]."</td>"
	echo '</tr>'.chr(13);
</table>
#--------------------------------------------------------


#--------------------------------------------------------
#input
<table class="t1">
<tr>
	<th>id</th>
	<td><input type="text" name="id" id="id" value="" size="10"></td>
</tr>
<tr>
	<th>id_cajon</th>
	<td><input type="text" name="id_cajon" id="id_cajon" value="" size="10"></td>
</tr>
<tr>
	<th>id_articulo</th>
	<td><input type="text" name="id_articulo" id="id_articulo" value="" size="10"></td>
</tr>
<tr>
	<th>marca</th>
	<td><input type="text" name="marca" id="marca" value="" size="10"></td>
</tr>
<tr>
	<th>descripcion</th>
	<td><input type="text" name="descripcion" id="descripcion" value="" size="10"></td>
</tr>
<tr>
	<th>contenido</th>
	<td><input type="text" name="contenido" id="contenido" value="" size="10"></td>
</tr>
<tr>
	<th>presentacion</th>
	<td><input type="text" name="presentacion" id="presentacion" value="" size="10"></td>
</tr>
<tr>
	<th>clasificacion</th>
	<td><input type="text" name="clasificacion" id="clasificacion" value="" size="10"></td>
</tr>
<tr>
	<th>subclasificacion</th>
	<td><input type="text" name="subclasificacion" id="subclasificacion" value="" size="10"></td>
</tr>
<tr>
	<th>precio_unitario</th>
	<td><input type="text" name="precio_unitario" id="precio_unitario" value="" size="10"></td>
</tr>
<tr>
	<th>cantidad</th>
	<td><input type="text" name="cantidad" id="cantidad" value="" size="10"></td>
</tr>
</table>
#--------------------------------------------------------


#--------------------------------------------------------
#modify
<table class="t1">
<tr>
	<th>id</th>
	<td><input type="text" name="id" id="id" value="<?php if($array_cajones_contenido["id"]){ echo $array_cajones_contenido["id"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>id_cajon</th>
	<td><input type="text" name="id_cajon" id="id_cajon" value="<?php if($array_cajones_contenido["id_cajon"]){ echo $array_cajones_contenido["id_cajon"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>id_articulo</th>
	<td><input type="text" name="id_articulo" id="id_articulo" value="<?php if($array_cajones_contenido["id_articulo"]){ echo $array_cajones_contenido["id_articulo"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>marca</th>
	<td><input type="text" name="marca" id="marca" value="<?php if($array_cajones_contenido["marca"]){ echo $array_cajones_contenido["marca"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>descripcion</th>
	<td><input type="text" name="descripcion" id="descripcion" value="<?php if($array_cajones_contenido["descripcion"]){ echo $array_cajones_contenido["descripcion"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>contenido</th>
	<td><input type="text" name="contenido" id="contenido" value="<?php if($array_cajones_contenido["contenido"]){ echo $array_cajones_contenido["contenido"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>presentacion</th>
	<td><input type="text" name="presentacion" id="presentacion" value="<?php if($array_cajones_contenido["presentacion"]){ echo $array_cajones_contenido["presentacion"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>clasificacion</th>
	<td><input type="text" name="clasificacion" id="clasificacion" value="<?php if($array_cajones_contenido["clasificacion"]){ echo $array_cajones_contenido["clasificacion"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>subclasificacion</th>
	<td><input type="text" name="subclasificacion" id="subclasificacion" value="<?php if($array_cajones_contenido["subclasificacion"]){ echo $array_cajones_contenido["subclasificacion"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>precio_unitario</th>
	<td><input type="text" name="precio_unitario" id="precio_unitario" value="<?php if($array_cajones_contenido["precio_unitario"]){ echo $array_cajones_contenido["precio_unitario"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>cantidad</th>
	<td><input type="text" name="cantidad" id="cantidad" value="<?php if($array_cajones_contenido["cantidad"]){ echo $array_cajones_contenido["cantidad"]; } ?>" size="10"></td>
</tr>
</table>

#--------------------------------------------------------


?>
<! #------------------------------------------------------------- >
#modify2
<table class="t1">
	<tr>
		<td>id</td>
		<td><input type="text" name="id" value="<?php echo $array_cajones_contenido["id"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>id_cajon</td>
		<td><input type="text" name="id_cajon" value="<?php echo $array_cajones_contenido["id_cajon"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>id_articulo</td>
		<td><input type="text" name="id_articulo" value="<?php echo $array_cajones_contenido["id_articulo"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>marca</td>
		<td><input type="text" name="marca" value="<?php echo $array_cajones_contenido["marca"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>descripcion</td>
		<td><input type="text" name="descripcion" value="<?php echo $array_cajones_contenido["descripcion"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>contenido</td>
		<td><input type="text" name="contenido" value="<?php echo $array_cajones_contenido["contenido"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>presentacion</td>
		<td><input type="text" name="presentacion" value="<?php echo $array_cajones_contenido["presentacion"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>clasificacion</td>
		<td><input type="text" name="clasificacion" value="<?php echo $array_cajones_contenido["clasificacion"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>subclasificacion</td>
		<td><input type="text" name="subclasificacion" value="<?php echo $array_cajones_contenido["subclasificacion"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>precio_unitario</td>
		<td><input type="text" name="precio_unitario" value="<?php echo $array_cajones_contenido["precio_unitario"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>cantidad</td>
		<td><input type="text" name="cantidad" value="<?php echo $array_cajones_contenido["cantidad"]; ?>" size="30" maxlength="80"></td>
	</tr>
</table>
<! #------------------------------------------------------------- >
<?php

#----------------------------------------------------------------------------------
#muestra
echo '<table class="t1">';
echo "<tr>";
	echo '<td>id</td>';
	echo '<td>'.$array_cajones_contenido["id"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>id_cajon</td>';
	echo '<td>'.$array_cajones_contenido["id_cajon"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>id_articulo</td>';
	echo '<td>'.$array_cajones_contenido["id_articulo"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>marca</td>';
	echo '<td>'.$array_cajones_contenido["marca"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>descripcion</td>';
	echo '<td>'.$array_cajones_contenido["descripcion"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>contenido</td>';
	echo '<td>'.$array_cajones_contenido["contenido"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>presentacion</td>';
	echo '<td>'.$array_cajones_contenido["presentacion"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>clasificacion</td>';
	echo '<td>'.$array_cajones_contenido["clasificacion"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>subclasificacion</td>';
	echo '<td>'.$array_cajones_contenido["subclasificacion"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>precio_unitario</td>';
	echo '<td>'.$array_cajones_contenido["precio_unitario"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>cantidad</td>';
	echo '<td>'.$array_cajones_contenido["cantidad"].'</td>';
echo "</tr>";
</table>
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#array post
	$array_cajones_contenido["id"]=$_POST["id"];
	$array_cajones_contenido["id_cajon"]=$_POST["id_cajon"];
	$array_cajones_contenido["id_articulo"]=$_POST["id_articulo"];
	$array_cajones_contenido["marca"]=$_POST["marca"];
	$array_cajones_contenido["descripcion"]=$_POST["descripcion"];
	$array_cajones_contenido["contenido"]=$_POST["contenido"];
	$array_cajones_contenido["presentacion"]=$_POST["presentacion"];
	$array_cajones_contenido["clasificacion"]=$_POST["clasificacion"];
	$array_cajones_contenido["subclasificacion"]=$_POST["subclasificacion"];
	$array_cajones_contenido["precio_unitario"]=$_POST["precio_unitario"];
	$array_cajones_contenido["cantidad"]=$_POST["cantidad"];
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#array get
	$array_cajones_contenido["id"]=$_GET["id"];
	$array_cajones_contenido["id_cajon"]=$_GET["id_cajon"];
	$array_cajones_contenido["id_articulo"]=$_GET["id_articulo"];
	$array_cajones_contenido["marca"]=$_GET["marca"];
	$array_cajones_contenido["descripcion"]=$_GET["descripcion"];
	$array_cajones_contenido["contenido"]=$_GET["contenido"];
	$array_cajones_contenido["presentacion"]=$_GET["presentacion"];
	$array_cajones_contenido["clasificacion"]=$_GET["clasificacion"];
	$array_cajones_contenido["subclasificacion"]=$_GET["subclasificacion"];
	$array_cajones_contenido["precio_unitario"]=$_GET["precio_unitario"];
	$array_cajones_contenido["cantidad"]=$_GET["cantidad"];
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#rows char 13
	echo $row["id"].'<br>'.chr(13);
	echo $row["id_cajon"].'<br>'.chr(13);
	echo $row["id_articulo"].'<br>'.chr(13);
	echo $row["marca"].'<br>'.chr(13);
	echo $row["descripcion"].'<br>'.chr(13);
	echo $row["contenido"].'<br>'.chr(13);
	echo $row["presentacion"].'<br>'.chr(13);
	echo $row["clasificacion"].'<br>'.chr(13);
	echo $row["subclasificacion"].'<br>'.chr(13);
	echo $row["precio_unitario"].'<br>'.chr(13);
	echo $row["cantidad"].'<br>'.chr(13);
#----------------------------------------------------------------------------------


#--------------------------------------
<table class="t1">
	<th>id</th>
	<th>id_cajon</th>
	<th>id_articulo</th>
	<th>marca</th>
	<th>descripcion</th>
	<th>contenido</th>
	<th>presentacion</th>
	<th>clasificacion</th>
	<th>subclasificacion</th>
	<th>precio_unitario</th>
	<th>cantidad</th>
$query='select * from cajones_contenido';
$result=mysql_query($query)or die(mysql_error() ." ".$_SERVER["script_name"]." ".$query);
while($row=mysql_fetch_array($result)){
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["id_cajon"].'</td>';
	echo '<td>'.$row["id_articulo"].'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["descripcion"].'</td>';
	echo '<td>'.$row["contenido"].'</td>';
	echo '<td>'.$row["presentacion"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo '<td>'.$row["precio_unitario"].'</td>';
	echo '<td>'.$row["cantidad"].'</td>';
}
</table>
#--------------------------------------


#estructura tabla: cajones_contenido
#--------------------------------------
# 0	id	mediumint(8) unsigned
# 1	id_cajon	mediumint(8) unsigned
# 2	id_articulo	mediumint(8) unsigned
# 3	marca	varchar(30)
# 4	descripcion	varchar(60)
# 5	contenido	varchar(30)
# 6	presentacion	varchar(30)
# 7	clasificacion	varchar(40)
# 8	subclasificacion	varchar(40)
# 9	precio_unitario	double
# 10	cantidad	double(6,0)
#--------------------------------------


#--------------------------------------
#temporal mio
	echo '<td><input type="text" name="id'.$row["id"].'" id="id'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["id"].'"></td>';
	echo '<td><input type="text" name="id_cajon'.$row["id"].'" id="id_cajon'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["id_cajon"].'"></td>';
	echo '<td><input type="text" name="id_articulo'.$row["id"].'" id="id_articulo'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["id_articulo"].'"></td>';
	echo '<td><input type="text" name="marca'.$row["id"].'" id="marca'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["marca"].'"></td>';
	echo '<td><input type="text" name="descripcion'.$row["id"].'" id="descripcion'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["descripcion"].'"></td>';
	echo '<td><input type="text" name="contenido'.$row["id"].'" id="contenido'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["contenido"].'"></td>';
	echo '<td><input type="text" name="presentacion'.$row["id"].'" id="presentacion'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["presentacion"].'"></td>';
	echo '<td><input type="text" name="clasificacion'.$row["id"].'" id="clasificacion'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["clasificacion"].'"></td>';
	echo '<td><input type="text" name="subclasificacion'.$row["id"].'" id="subclasificacion'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["subclasificacion"].'"></td>';
	echo '<td><input type="text" name="precio_unitario'.$row["id"].'" id="precio_unitario'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["precio_unitario"].'"></td>';
	echo '<td><input type="text" name="cantidad'.$row["id"].'" id="cantidad'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["cantidad"].'"></td>';
#--------------------------------------

?>


