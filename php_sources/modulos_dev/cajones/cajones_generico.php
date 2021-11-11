<! #------------------------------------------------------------- >
tabla headers : cajones

<table class="t1">
	<th>id</th>
	<th>numero</th>
	<th>id_sucursal_origen</th>
	<th>id_sucursal_destino</th>
	<th>vendedor_envia</th>
	<th>vendedor_recibe</th>
	<th>fechao</th>
	<th>horao</th>
	<th>fechad</th>
	<th>horad</th>
	<th>estado</th>
</table>
<! #------------------------------------------------------------- >


<! #------------------------------------------------------------- >
tabla: cajones

<table class="t1">
	<td>id</td>
	<td>numero</td>
	<td>id_sucursal_origen</td>
	<td>id_sucursal_destino</td>
	<td>vendedor_envia</td>
	<td>vendedor_recibe</td>
	<td>fechao</td>
	<td>horao</td>
	<td>fechad</td>
	<td>horad</td>
	<td>estado</td>
</table>
<! #------------------------------------------------------------- >


<! #------------------------------------------------------------- >

<?php
#rows
	$row["id"]
	$row["numero"]
	$row["id_sucursal_origen"]
	$row["id_sucursal_destino"]
	$row["vendedor_envia"]
	$row["vendedor_recibe"]
	$row["fechao"]
	$row["horao"]
	$row["fechad"]
	$row["horad"]
	$row["estado"]


#--------------------------------------------------------
#rows table
echo '<table class="t1">';
	echo "<td>".$row["id"]."</td>"
	echo "<td>".$row["numero"]."</td>"
	echo "<td>".$row["id_sucursal_origen"]."</td>"
	echo "<td>".$row["id_sucursal_destino"]."</td>"
	echo "<td>".$row["vendedor_envia"]."</td>"
	echo "<td>".$row["vendedor_recibe"]."</td>"
	echo "<td>".$row["fechao"]."</td>"
	echo "<td>".$row["horao"]."</td>"
	echo "<td>".$row["fechad"]."</td>"
	echo "<td>".$row["horad"]."</td>"
	echo "<td>".$row["estado"]."</td>"
</table>
#--------------------------------------------------------


#--------------------------------------------------------
#rows table font
echo '<table class="t1">';
	echo '<tr>';
	echo "<td>".$row["id"]."</td>"
	echo "<td>".$row["numero"]."</td>"
	echo "<td>".$row["id_sucursal_origen"]."</td>"
	echo "<td>".$row["id_sucursal_destino"]."</td>"
	echo "<td>".$row["vendedor_envia"]."</td>"
	echo "<td>".$row["vendedor_recibe"]."</td>"
	echo "<td>".$row["fechao"]."</td>"
	echo "<td>".$row["horao"]."</td>"
	echo "<td>".$row["fechad"]."</td>"
	echo "<td>".$row["horad"]."</td>"
	echo "<td>".$row["estado"]."</td>"
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
	<th>numero</th>
	<td><input type="text" name="numero" id="numero" value="" size="10"></td>
</tr>
<tr>
	<th>id_sucursal_origen</th>
	<td><input type="text" name="id_sucursal_origen" id="id_sucursal_origen" value="" size="10"></td>
</tr>
<tr>
	<th>id_sucursal_destino</th>
	<td><input type="text" name="id_sucursal_destino" id="id_sucursal_destino" value="" size="10"></td>
</tr>
<tr>
	<th>vendedor_envia</th>
	<td><input type="text" name="vendedor_envia" id="vendedor_envia" value="" size="10"></td>
</tr>
<tr>
	<th>vendedor_recibe</th>
	<td><input type="text" name="vendedor_recibe" id="vendedor_recibe" value="" size="10"></td>
</tr>
<tr>
	<th>fechao</th>
	<td><input type="text" name="fechao" id="fechao" value="" size="10"></td>
</tr>
<tr>
	<th>horao</th>
	<td><input type="text" name="horao" id="horao" value="" size="10"></td>
</tr>
<tr>
	<th>fechad</th>
	<td><input type="text" name="fechad" id="fechad" value="" size="10"></td>
</tr>
<tr>
	<th>horad</th>
	<td><input type="text" name="horad" id="horad" value="" size="10"></td>
</tr>
<tr>
	<th>estado</th>
	<td><input type="text" name="estado" id="estado" value="" size="10"></td>
</tr>
</table>
#--------------------------------------------------------


#--------------------------------------------------------
#modify
<table class="t1">
<tr>
	<th>id</th>
	<td><input type="text" name="id" id="id" value="<?php if($array_cajones["id"]){ echo $array_cajones["id"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>numero</th>
	<td><input type="text" name="numero" id="numero" value="<?php if($array_cajones["numero"]){ echo $array_cajones["numero"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>id_sucursal_origen</th>
	<td><input type="text" name="id_sucursal_origen" id="id_sucursal_origen" value="<?php if($array_cajones["id_sucursal_origen"]){ echo $array_cajones["id_sucursal_origen"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>id_sucursal_destino</th>
	<td><input type="text" name="id_sucursal_destino" id="id_sucursal_destino" value="<?php if($array_cajones["id_sucursal_destino"]){ echo $array_cajones["id_sucursal_destino"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>vendedor_envia</th>
	<td><input type="text" name="vendedor_envia" id="vendedor_envia" value="<?php if($array_cajones["vendedor_envia"]){ echo $array_cajones["vendedor_envia"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>vendedor_recibe</th>
	<td><input type="text" name="vendedor_recibe" id="vendedor_recibe" value="<?php if($array_cajones["vendedor_recibe"]){ echo $array_cajones["vendedor_recibe"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>fechao</th>
	<td><input type="text" name="fechao" id="fechao" value="<?php if($array_cajones["fechao"]){ echo $array_cajones["fechao"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>horao</th>
	<td><input type="text" name="horao" id="horao" value="<?php if($array_cajones["horao"]){ echo $array_cajones["horao"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>fechad</th>
	<td><input type="text" name="fechad" id="fechad" value="<?php if($array_cajones["fechad"]){ echo $array_cajones["fechad"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>horad</th>
	<td><input type="text" name="horad" id="horad" value="<?php if($array_cajones["horad"]){ echo $array_cajones["horad"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>estado</th>
	<td><input type="text" name="estado" id="estado" value="<?php if($array_cajones["estado"]){ echo $array_cajones["estado"]; } ?>" size="10"></td>
</tr>
</table>

#--------------------------------------------------------


?>
<! #------------------------------------------------------------- >
#modify2
<table class="t1">
	<tr>
		<td>id</td>
		<td><input type="text" name="id" value="<?php echo $array_cajones["id"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>numero</td>
		<td><input type="text" name="numero" value="<?php echo $array_cajones["numero"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>id_sucursal_origen</td>
		<td><input type="text" name="id_sucursal_origen" value="<?php echo $array_cajones["id_sucursal_origen"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>id_sucursal_destino</td>
		<td><input type="text" name="id_sucursal_destino" value="<?php echo $array_cajones["id_sucursal_destino"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>vendedor_envia</td>
		<td><input type="text" name="vendedor_envia" value="<?php echo $array_cajones["vendedor_envia"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>vendedor_recibe</td>
		<td><input type="text" name="vendedor_recibe" value="<?php echo $array_cajones["vendedor_recibe"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>fechao</td>
		<td><input type="text" name="fechao" value="<?php echo $array_cajones["fechao"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>horao</td>
		<td><input type="text" name="horao" value="<?php echo $array_cajones["horao"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>fechad</td>
		<td><input type="text" name="fechad" value="<?php echo $array_cajones["fechad"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>horad</td>
		<td><input type="text" name="horad" value="<?php echo $array_cajones["horad"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>estado</td>
		<td><input type="text" name="estado" value="<?php echo $array_cajones["estado"]; ?>" size="30" maxlength="80"></td>
	</tr>
</table>
<! #------------------------------------------------------------- >
<?php

#----------------------------------------------------------------------------------
#muestra
echo '<table class="t1">';
echo "<tr>";
	echo '<td>id</td>';
	echo '<td>'.$array_cajones["id"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>numero</td>';
	echo '<td>'.$array_cajones["numero"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>id_sucursal_origen</td>';
	echo '<td>'.$array_cajones["id_sucursal_origen"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>id_sucursal_destino</td>';
	echo '<td>'.$array_cajones["id_sucursal_destino"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>vendedor_envia</td>';
	echo '<td>'.$array_cajones["vendedor_envia"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>vendedor_recibe</td>';
	echo '<td>'.$array_cajones["vendedor_recibe"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>fechao</td>';
	echo '<td>'.$array_cajones["fechao"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>horao</td>';
	echo '<td>'.$array_cajones["horao"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>fechad</td>';
	echo '<td>'.$array_cajones["fechad"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>horad</td>';
	echo '<td>'.$array_cajones["horad"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>estado</td>';
	echo '<td>'.$array_cajones["estado"].'</td>';
echo "</tr>";
</table>
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#array post
	$array_cajones["id"]=$_POST["id"];
	$array_cajones["numero"]=$_POST["numero"];
	$array_cajones["id_sucursal_origen"]=$_POST["id_sucursal_origen"];
	$array_cajones["id_sucursal_destino"]=$_POST["id_sucursal_destino"];
	$array_cajones["vendedor_envia"]=$_POST["vendedor_envia"];
	$array_cajones["vendedor_recibe"]=$_POST["vendedor_recibe"];
	$array_cajones["fechao"]=$_POST["fechao"];
	$array_cajones["horao"]=$_POST["horao"];
	$array_cajones["fechad"]=$_POST["fechad"];
	$array_cajones["horad"]=$_POST["horad"];
	$array_cajones["estado"]=$_POST["estado"];
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#array get
	$array_cajones["id"]=$_GET["id"];
	$array_cajones["numero"]=$_GET["numero"];
	$array_cajones["id_sucursal_origen"]=$_GET["id_sucursal_origen"];
	$array_cajones["id_sucursal_destino"]=$_GET["id_sucursal_destino"];
	$array_cajones["vendedor_envia"]=$_GET["vendedor_envia"];
	$array_cajones["vendedor_recibe"]=$_GET["vendedor_recibe"];
	$array_cajones["fechao"]=$_GET["fechao"];
	$array_cajones["horao"]=$_GET["horao"];
	$array_cajones["fechad"]=$_GET["fechad"];
	$array_cajones["horad"]=$_GET["horad"];
	$array_cajones["estado"]=$_GET["estado"];
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#rows char 13
	echo $row["id"].'<br>'.chr(13);
	echo $row["numero"].'<br>'.chr(13);
	echo $row["id_sucursal_origen"].'<br>'.chr(13);
	echo $row["id_sucursal_destino"].'<br>'.chr(13);
	echo $row["vendedor_envia"].'<br>'.chr(13);
	echo $row["vendedor_recibe"].'<br>'.chr(13);
	echo $row["fechao"].'<br>'.chr(13);
	echo $row["horao"].'<br>'.chr(13);
	echo $row["fechad"].'<br>'.chr(13);
	echo $row["horad"].'<br>'.chr(13);
	echo $row["estado"].'<br>'.chr(13);
#----------------------------------------------------------------------------------


#--------------------------------------
<table class="t1">
	<th>id</th>
	<th>numero</th>
	<th>id_sucursal_origen</th>
	<th>id_sucursal_destino</th>
	<th>vendedor_envia</th>
	<th>vendedor_recibe</th>
	<th>fechao</th>
	<th>horao</th>
	<th>fechad</th>
	<th>horad</th>
	<th>estado</th>
$query='select * from cajones';
$result=mysql_query($query)or die(mysql_error() ." ".$_SERVER["script_name"]." ".$query);
while($row=mysql_fetch_array($result)){
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["numero"].'</td>';
	echo '<td>'.$row["id_sucursal_origen"].'</td>';
	echo '<td>'.$row["id_sucursal_destino"].'</td>';
	echo '<td>'.$row["vendedor_envia"].'</td>';
	echo '<td>'.$row["vendedor_recibe"].'</td>';
	echo '<td>'.$row["fechao"].'</td>';
	echo '<td>'.$row["horao"].'</td>';
	echo '<td>'.$row["fechad"].'</td>';
	echo '<td>'.$row["horad"].'</td>';
	echo '<td>'.$row["estado"].'</td>';
}
</table>
#--------------------------------------


#estructura tabla: cajones
#--------------------------------------
# 0	id	mediumint(8) unsigned
# 1	numero	mediumint(9)
# 2	id_sucursal_origen	mediumint(9)
# 3	id_sucursal_destino	mediumint(9)
# 4	vendedor_envia	varchar(10)
# 5	vendedor_recibe	varchar(10)
# 6	fechao	date
# 7	horao	time
# 8	fechad	date
# 9	horad	time
# 10	estado	varchar(1)
#--------------------------------------


#--------------------------------------
#temporal mio
	echo '<td><input type="text" name="id'.$row["id"].'" id="id'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["id"].'"></td>';
	echo '<td><input type="text" name="numero'.$row["id"].'" id="numero'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["numero"].'"></td>';
	echo '<td><input type="text" name="id_sucursal_origen'.$row["id"].'" id="id_sucursal_origen'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["id_sucursal_origen"].'"></td>';
	echo '<td><input type="text" name="id_sucursal_destino'.$row["id"].'" id="id_sucursal_destino'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["id_sucursal_destino"].'"></td>';
	echo '<td><input type="text" name="vendedor_envia'.$row["id"].'" id="vendedor_envia'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["vendedor_envia"].'"></td>';
	echo '<td><input type="text" name="vendedor_recibe'.$row["id"].'" id="vendedor_recibe'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["vendedor_recibe"].'"></td>';
	echo '<td><input type="text" name="fechao'.$row["id"].'" id="fechao'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["fechao"].'"></td>';
	echo '<td><input type="text" name="horao'.$row["id"].'" id="horao'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["horao"].'"></td>';
	echo '<td><input type="text" name="fechad'.$row["id"].'" id="fechad'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["fechad"].'"></td>';
	echo '<td><input type="text" name="horad'.$row["id"].'" id="horad'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["horad"].'"></td>';
	echo '<td><input type="text" name="estado'.$row["id"].'" id="estado'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["estado"].'"></td>';
#--------------------------------------

?>


