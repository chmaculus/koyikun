<! #------------------------------------------------------------- >
tabla headers : reportes

<table class="t1">
	<th>id</th>
	<th>id_sucursal</th>
	<th>motivo</th>
	<th>texto</th>
	<th>fecha</th>
	<th>hora</th>
</table>
<! #------------------------------------------------------------- >


<! #------------------------------------------------------------- >
tabla: reportes

<table class="t1">
	<td>id</td>
	<td>id_sucursal</td>
	<td>motivo</td>
	<td>texto</td>
	<td>fecha</td>
	<td>hora</td>
</table>
<! #------------------------------------------------------------- >


<! #------------------------------------------------------------- >

<?php
#rows
	$row["id"]
	$row["id_sucursal"]
	$row["motivo"]
	$row["texto"]
	$row["fecha"]
	$row["hora"]


#--------------------------------------------------------
#rows table
echo '<table class="t1">';
	echo "<td>".$row["id"]."</td>"
	echo "<td>".$row["id_sucursal"]."</td>"
	echo "<td>".$row["motivo"]."</td>"
	echo "<td>".$row["texto"]."</td>"
	echo "<td>".$row["fecha"]."</td>"
	echo "<td>".$row["hora"]."</td>"
</table>
#--------------------------------------------------------


#--------------------------------------------------------
#rows table font
echo '<table class="t1">';
	echo '<tr>';
	echo "<td>".$row["id"]."</td>"
	echo "<td>".$row["id_sucursal"]."</td>"
	echo "<td>".$row["motivo"]."</td>"
	echo "<td>".$row["texto"]."</td>"
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
	<th>id_sucursal</th>
	<td><input type="text" name="id_sucursal" id="id_sucursal" value="" size="10"></td>
</tr>
<tr>
	<th>motivo</th>
	<td><input type="text" name="motivo" id="motivo" value="" size="10"></td>
</tr>
<tr>
	<th>texto</th>
	<td><textarea name="texto" id="texto" rows="3" cols="30"></textarea></td>
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
	<td><input type="text" name="id" id="id" value="<?php if($array_reportes["id"]){ echo $array_reportes["id"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>id_sucursal</th>
	<td><input type="text" name="id_sucursal" id="id_sucursal" value="<?php if($array_reportes["id_sucursal"]){ echo $array_reportes["id_sucursal"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>motivo</th>
	<td><input type="text" name="motivo" id="motivo" value="<?php if($array_reportes["motivo"]){ echo $array_reportes["motivo"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>texto</th>
	<td><textarea name="texto" id="texto" rows="3" cols="30"><?php if($array_reportes["texto"]){ echo $array_reportes["texto"]; } ?></textarea></td>
</tr>
<tr>
	<th>fecha</th>
	<td><input type="text" name="fecha" id="fecha" value="<?php if($array_reportes["fecha"]){ echo $array_reportes["fecha"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>hora</th>
	<td><input type="text" name="hora" id="hora" value="<?php if($array_reportes["hora"]){ echo $array_reportes["hora"]; } ?>" size="10"></td>
</tr>
</table>

#--------------------------------------------------------


?>
<! #------------------------------------------------------------- >
#modify2
<table class="t1">
	<tr>
		<td>id</td>
		<td><input type="text" name="id" value="<?php echo $array_reportes["id"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>id_sucursal</td>
		<td><input type="text" name="id_sucursal" value="<?php echo $array_reportes["id_sucursal"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>motivo</td>
		<td><input type="text" name="motivo" value="<?php echo $array_reportes["motivo"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>texto</td>
		<td><input type="text" name="texto" value="<?php echo $array_reportes["texto"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>fecha</td>
		<td><input type="text" name="fecha" value="<?php echo $array_reportes["fecha"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>hora</td>
		<td><input type="text" name="hora" value="<?php echo $array_reportes["hora"]; ?>" size="30" maxlength="80"></td>
	</tr>
</table>
<! #------------------------------------------------------------- >
<?php

#----------------------------------------------------------------------------------
#muestra
echo '<table class="t1">';
echo "<tr>";
	echo '<td>id</td>';
	echo '<td>'.$array_reportes["id"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>id_sucursal</td>';
	echo '<td>'.$array_reportes["id_sucursal"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>motivo</td>';
	echo '<td>'.$array_reportes["motivo"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>texto</td>';
	echo '<td>'.$array_reportes["texto"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>fecha</td>';
	echo '<td>'.$array_reportes["fecha"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>hora</td>';
	echo '<td>'.$array_reportes["hora"].'</td>';
echo "</tr>";
</table>
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#array post
	$array_reportes["id"]=$_POST["id"];
	$array_reportes["id_sucursal"]=$_POST["id_sucursal"];
	$array_reportes["motivo"]=$_POST["motivo"];
	$array_reportes["texto"]=$_POST["texto"];
	$array_reportes["fecha"]=$_POST["fecha"];
	$array_reportes["hora"]=$_POST["hora"];
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#array get
	$array_reportes["id"]=$_GET["id"];
	$array_reportes["id_sucursal"]=$_GET["id_sucursal"];
	$array_reportes["motivo"]=$_GET["motivo"];
	$array_reportes["texto"]=$_GET["texto"];
	$array_reportes["fecha"]=$_GET["fecha"];
	$array_reportes["hora"]=$_GET["hora"];
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#rows char 13
	echo $row["id"].'<br>'.chr(13);
	echo $row["id_sucursal"].'<br>'.chr(13);
	echo $row["motivo"].'<br>'.chr(13);
	echo $row["texto"].'<br>'.chr(13);
	echo $row["fecha"].'<br>'.chr(13);
	echo $row["hora"].'<br>'.chr(13);
#----------------------------------------------------------------------------------


#--------------------------------------
<table class="t1">
	<th>id</th>
	<th>id_sucursal</th>
	<th>motivo</th>
	<th>texto</th>
	<th>fecha</th>
	<th>hora</th>
$query='select * from reportes';
$result=mysql_query($query)or die(mysql_error() ." ".$_SERVER["script_name"]." ".$query);
while($row=mysql_fetch_array($result)){
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["id_sucursal"].'</td>';
	echo '<td>'.$row["motivo"].'</td>';
	echo '<td>'.$row["texto"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
}
</table>
#--------------------------------------


#estructura tabla: reportes
#--------------------------------------
# 0	id	mediumint(8) unsigned
# 1	id_sucursal	int(11)
# 2	motivo	varchar(30)
# 3	texto	text
# 4	fecha	date
# 5	hora	time
#--------------------------------------


#--------------------------------------
#temporal mio
	echo '<td><input type="text" name="id'.$row["id"].'" id="id'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["id"].'"></td>';
	echo '<td><input type="text" name="id_sucursal'.$row["id"].'" id="id_sucursal'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["id_sucursal"].'"></td>';
	echo '<td><input type="text" name="motivo'.$row["id"].'" id="motivo'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["motivo"].'"></td>';
	echo '<td><input type="text" name="texto'.$row["id"].'" id="texto'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["texto"].'"></td>';
	echo '<td><input type="text" name="fecha'.$row["id"].'" id="fecha'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["fecha"].'"></td>';
	echo '<td><input type="text" name="hora'.$row["id"].'" id="hora'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["hora"].'"></td>';
#--------------------------------------

?>


