<! #------------------------------------------------------------- >
tabla headers : costos_detalle

<table class="t1">
	<th>id</th>
	<th>marca</th>
	<th>detalle</th>
	<th>fecha</th>
	<th>hora</th>
</table>
<! #------------------------------------------------------------- >


<! #------------------------------------------------------------- >
tabla: costos_detalle

<table class="t1">
	<td>id</td>
	<td>marca</td>
	<td>detalle</td>
	<td>fecha</td>
	<td>hora</td>
</table>
<! #------------------------------------------------------------- >


<! #------------------------------------------------------------- >

<?php
#rows
	$row["id"]
	$row["marca"]
	$row["detalle"]
	$row["fecha"]
	$row["hora"]


#--------------------------------------------------------
#rows table
echo '<table class="t1">';
	echo "<td>".$row["id"]."</td>"
	echo "<td>".$row["marca"]."</td>"
	echo "<td>".$row["detalle"]."</td>"
	echo "<td>".$row["fecha"]."</td>"
	echo "<td>".$row["hora"]."</td>"
</table>
#--------------------------------------------------------


#--------------------------------------------------------
#rows table font
echo '<table class="t1">';
	echo '<tr>';
	echo "<td>".$row["id"]."</td>"
	echo "<td>".$row["marca"]."</td>"
	echo "<td>".$row["detalle"]."</td>"
	echo "<td>".$row["fecha"]."</td>"
	echo "<td>".$row["hora"]."</td>"
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
	<th>marca</th>
	<td><input type="text" name="marca" id="marca" value="" size="10"></td>
</tr>
<tr>
	<th>detalle</th>
	<td><textarea name="detalle" id="detalle" rows="3" cols="30"></textarea></td>
</tr>
<tr>
	<th>fecha</th>
	<td><input type="text" name="fecha" id="fecha" value="" size="10"></td>
</tr>
<tr>
	<th>hora</th>
	<td><input type="text" name="hora" id="hora" value="" size="10"></td>
</tr>
</table>
#--------------------------------------------------------


#--------------------------------------------------------
#modify
<table class="t1">
<tr>
	<th>id</th>
	<td><input type="text" name="id" id="id" value="<?php if($array_costos_detalle["id"]){ echo $array_costos_detalle["id"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>marca</th>
	<td><input type="text" name="marca" id="marca" value="<?php if($array_costos_detalle["marca"]){ echo $array_costos_detalle["marca"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>detalle</th>
	<td><textarea name="detalle" id="detalle" rows="3" cols="30"><?php if($array_costos_detalle["detalle"]){ echo $array_costos_detalle["detalle"]; } ?></textarea></td>
</tr>
<tr>
	<th>fecha</th>
	<td><input type="text" name="fecha" id="fecha" value="<?php if($array_costos_detalle["fecha"]){ echo $array_costos_detalle["fecha"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>hora</th>
	<td><input type="text" name="hora" id="hora" value="<?php if($array_costos_detalle["hora"]){ echo $array_costos_detalle["hora"]; } ?>" size="10"></td>
</tr>
</table>

#--------------------------------------------------------


?>
<! #------------------------------------------------------------- >
#modify2
<table class="t1">
	<tr>
		<td>id</td>
		<td><input type="text" name="id" value="<?php echo $array_costos_detalle["id"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>marca</td>
		<td><input type="text" name="marca" value="<?php echo $array_costos_detalle["marca"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>detalle</td>
		<td><input type="text" name="detalle" value="<?php echo $array_costos_detalle["detalle"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>fecha</td>
		<td><input type="text" name="fecha" value="<?php echo $array_costos_detalle["fecha"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>hora</td>
		<td><input type="text" name="hora" value="<?php echo $array_costos_detalle["hora"]; ?>" size="30" maxlength="80"></td>
	</tr>
</table>
<! #------------------------------------------------------------- >
<?php

#----------------------------------------------------------------------------------
#muestra
echo '<table class="t1">';
echo "<tr>";
	echo '<td>id</td>';
	echo '<td>'.$array_costos_detalle["id"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>marca</td>';
	echo '<td>'.$array_costos_detalle["marca"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>detalle</td>';
	echo '<td>'.$array_costos_detalle["detalle"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>fecha</td>';
	echo '<td>'.$array_costos_detalle["fecha"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>hora</td>';
	echo '<td>'.$array_costos_detalle["hora"].'</td>';
echo "</tr>";
</table>
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#array post
	$array_costos_detalle["id"]=$_POST["id"];
	$array_costos_detalle["marca"]=$_POST["marca"];
	$array_costos_detalle["detalle"]=$_POST["detalle"];
	$array_costos_detalle["fecha"]=$_POST["fecha"];
	$array_costos_detalle["hora"]=$_POST["hora"];
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#array get
	$array_costos_detalle["id"]=$_GET["id"];
	$array_costos_detalle["marca"]=$_GET["marca"];
	$array_costos_detalle["detalle"]=$_GET["detalle"];
	$array_costos_detalle["fecha"]=$_GET["fecha"];
	$array_costos_detalle["hora"]=$_GET["hora"];
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#rows char 13
	echo $row["id"].'<br>'.chr(13);
	echo $row["marca"].'<br>'.chr(13);
	echo $row["detalle"].'<br>'.chr(13);
	echo $row["fecha"].'<br>'.chr(13);
	echo $row["hora"].'<br>'.chr(13);
#----------------------------------------------------------------------------------


#--------------------------------------
<table class="t1">
	<th>id</th>
	<th>marca</th>
	<th>detalle</th>
	<th>fecha</th>
	<th>hora</th>
$query='select * from costos_detalle';
$result=mysql_query($query)or die(mysql_error() ." ".$_SERVER["script_name"]." ".$query);
while($row=mysql_fetch_array($result)){
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["detalle"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
}
</table>
#--------------------------------------


#estructura tabla: costos_detalle
#--------------------------------------
# 0	id	mediumint(8) unsigned
# 1	marca	varchar(30)
# 2	detalle	text
# 3	fecha	date
# 4	hora	time
#--------------------------------------


#--------------------------------------
#temporal mio
	echo '<td><input type="text" name="id'.$row["id"].'" id="id'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["id"].'"></td>';
	echo '<td><input type="text" name="marca'.$row["id"].'" id="marca'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["marca"].'"></td>';
	echo '<td><input type="text" name="detalle'.$row["id"].'" id="detalle'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["detalle"].'"></td>';
	echo '<td><input type="text" name="fecha'.$row["id"].'" id="fecha'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["fecha"].'"></td>';
	echo '<td><input type="text" name="hora'.$row["id"].'" id="hora'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["hora"].'"></td>';
#--------------------------------------

?>


