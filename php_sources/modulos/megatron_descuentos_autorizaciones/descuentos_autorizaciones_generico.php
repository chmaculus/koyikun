<! #------------------------------------------------------------- >
tabla headers : descuentos_autorizaciones

<table class="t1">
	<th>id</th>
	<th>n_carnet</th>
	<th>nombre</th>
	<th>apellido</th>
	<th>id_sucursal</th>
	<th>codigo</th>
</table>
<! #------------------------------------------------------------- >


<! #------------------------------------------------------------- >
tabla: descuentos_autorizaciones

<table class="t1">
	<td>id</td>
	<td>n_carnet</td>
	<td>nombre</td>
	<td>apellido</td>
	<td>id_sucursal</td>
	<td>codigo</td>
</table>
<! #------------------------------------------------------------- >


<! #------------------------------------------------------------- >

<?php
#rows
	$row["id"]
	$row["n_carnet"]
	$row["nombre"]
	$row["apellido"]
	$row["id_sucursal"]
	$row["codigo"]


#--------------------------------------------------------
#rows table
echo '<table class="t1">';
	echo "<td>".$row["id"]."</td>"
	echo "<td>".$row["n_carnet"]."</td>"
	echo "<td>".$row["nombre"]."</td>"
	echo "<td>".$row["apellido"]."</td>"
	echo "<td>".$row["id_sucursal"]."</td>"
	echo "<td>".$row["codigo"]."</td>"
</table>
#--------------------------------------------------------


#--------------------------------------------------------
#rows table font
echo '<table class="t1">';
	echo '<tr>';
	echo "<td>".$row["id"]."</td>"
	echo "<td>".$row["n_carnet"]."</td>"
	echo "<td>".$row["nombre"]."</td>"
	echo "<td>".$row["apellido"]."</td>"
	echo "<td>".$row["id_sucursal"]."</td>"
	echo "<td>".$row["codigo"]."</td>"
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
	<th>n_carnet</th>
	<td><input type="text" name="n_carnet" id="n_carnet" value="" size="10"></td>
</tr>
<tr>
	<th>nombre</th>
	<td><input type="text" name="nombre" id="nombre" value="" size="10"></td>
</tr>
<tr>
	<th>apellido</th>
	<td><input type="text" name="apellido" id="apellido" value="" size="10"></td>
</tr>
<tr>
	<th>id_sucursal</th>
	<td><input type="text" name="id_sucursal" id="id_sucursal" value="" size="10"></td>
</tr>
<tr>
	<th>codigo</th>
	<td><input type="text" name="codigo" id="codigo" value="" size="10"></td>
</tr>
</table>
#--------------------------------------------------------


#--------------------------------------------------------
#modify
<table class="t1">
<tr>
	<th>id</th>
	<td><input type="text" name="id" id="id" value="<?php if($array_descuentos_autorizaciones["id"]){ echo $array_descuentos_autorizaciones["id"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>n_carnet</th>
	<td><input type="text" name="n_carnet" id="n_carnet" value="<?php if($array_descuentos_autorizaciones["n_carnet"]){ echo $array_descuentos_autorizaciones["n_carnet"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>nombre</th>
	<td><input type="text" name="nombre" id="nombre" value="<?php if($array_descuentos_autorizaciones["nombre"]){ echo $array_descuentos_autorizaciones["nombre"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>apellido</th>
	<td><input type="text" name="apellido" id="apellido" value="<?php if($array_descuentos_autorizaciones["apellido"]){ echo $array_descuentos_autorizaciones["apellido"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>id_sucursal</th>
	<td><input type="text" name="id_sucursal" id="id_sucursal" value="<?php if($array_descuentos_autorizaciones["id_sucursal"]){ echo $array_descuentos_autorizaciones["id_sucursal"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>codigo</th>
	<td><input type="text" name="codigo" id="codigo" value="<?php if($array_descuentos_autorizaciones["codigo"]){ echo $array_descuentos_autorizaciones["codigo"]; } ?>" size="10"></td>
</tr>
</table>

#--------------------------------------------------------


?>
<! #------------------------------------------------------------- >
#modify2
<table class="t1">
	<tr>
		<td>id</td>
		<td><input type="text" name="id" value="<?php echo $array_descuentos_autorizaciones["id"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>n_carnet</td>
		<td><input type="text" name="n_carnet" value="<?php echo $array_descuentos_autorizaciones["n_carnet"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>nombre</td>
		<td><input type="text" name="nombre" value="<?php echo $array_descuentos_autorizaciones["nombre"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>apellido</td>
		<td><input type="text" name="apellido" value="<?php echo $array_descuentos_autorizaciones["apellido"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>id_sucursal</td>
		<td><input type="text" name="id_sucursal" value="<?php echo $array_descuentos_autorizaciones["id_sucursal"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>codigo</td>
		<td><input type="text" name="codigo" value="<?php echo $array_descuentos_autorizaciones["codigo"]; ?>" size="30" maxlength="80"></td>
	</tr>
</table>
<! #------------------------------------------------------------- >
<?php

#----------------------------------------------------------------------------------
#muestra
echo '<table class="t1">';
echo "<tr>";
	echo '<td>id</td>';
	echo '<td>'.$array_descuentos_autorizaciones["id"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>n_carnet</td>';
	echo '<td>'.$array_descuentos_autorizaciones["n_carnet"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>nombre</td>';
	echo '<td>'.$array_descuentos_autorizaciones["nombre"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>apellido</td>';
	echo '<td>'.$array_descuentos_autorizaciones["apellido"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>id_sucursal</td>';
	echo '<td>'.$array_descuentos_autorizaciones["id_sucursal"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>codigo</td>';
	echo '<td>'.$array_descuentos_autorizaciones["codigo"].'</td>';
echo "</tr>";
</table>
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#array post
	$array_descuentos_autorizaciones["id"]=$_POST["id"];
	$array_descuentos_autorizaciones["n_carnet"]=$_POST["n_carnet"];
	$array_descuentos_autorizaciones["nombre"]=$_POST["nombre"];
	$array_descuentos_autorizaciones["apellido"]=$_POST["apellido"];
	$array_descuentos_autorizaciones["id_sucursal"]=$_POST["id_sucursal"];
	$array_descuentos_autorizaciones["codigo"]=$_POST["codigo"];
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#array get
	$array_descuentos_autorizaciones["id"]=$_GET["id"];
	$array_descuentos_autorizaciones["n_carnet"]=$_GET["n_carnet"];
	$array_descuentos_autorizaciones["nombre"]=$_GET["nombre"];
	$array_descuentos_autorizaciones["apellido"]=$_GET["apellido"];
	$array_descuentos_autorizaciones["id_sucursal"]=$_GET["id_sucursal"];
	$array_descuentos_autorizaciones["codigo"]=$_GET["codigo"];
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#rows char 13
	echo $row["id"].'<br>'.chr(13);
	echo $row["n_carnet"].'<br>'.chr(13);
	echo $row["nombre"].'<br>'.chr(13);
	echo $row["apellido"].'<br>'.chr(13);
	echo $row["id_sucursal"].'<br>'.chr(13);
	echo $row["codigo"].'<br>'.chr(13);
#----------------------------------------------------------------------------------


#--------------------------------------
<table class="t1">
	<th>id</th>
	<th>n_carnet</th>
	<th>nombre</th>
	<th>apellido</th>
	<th>id_sucursal</th>
	<th>codigo</th>
$query='select * from descuentos_autorizaciones';
$result=mysql_query($query)or die(mysql_error() ." ".$_SERVER["script_name"]." ".$query);
while($row=mysql_fetch_array($result)){
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["n_carnet"].'</td>';
	echo '<td>'.$row["nombre"].'</td>';
	echo '<td>'.$row["apellido"].'</td>';
	echo '<td>'.$row["id_sucursal"].'</td>';
	echo '<td>'.$row["codigo"].'</td>';
}
</table>
#--------------------------------------


#estructura tabla: descuentos_autorizaciones
#--------------------------------------
# 0	id	mediumint(8) unsigned
# 1	n_carnet	varchar(20)
# 2	nombre	varchar(25)
# 3	apellido	varchar(25)
# 4	id_sucursal	mediumint(8) unsigned
# 5	codigo	varchar(40)
#--------------------------------------


#--------------------------------------
#temporal mio
	echo '<td><input type="text" name="id'.$row["id"].'" id="id'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["id"].'"></td>';
	echo '<td><input type="text" name="n_carnet'.$row["id"].'" id="n_carnet'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["n_carnet"].'"></td>';
	echo '<td><input type="text" name="nombre'.$row["id"].'" id="nombre'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["nombre"].'"></td>';
	echo '<td><input type="text" name="apellido'.$row["id"].'" id="apellido'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["apellido"].'"></td>';
	echo '<td><input type="text" name="id_sucursal'.$row["id"].'" id="id_sucursal'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["id_sucursal"].'"></td>';
	echo '<td><input type="text" name="codigo'.$row["id"].'" id="codigo'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["codigo"].'"></td>';
#--------------------------------------

?>


