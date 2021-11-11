<! #------------------------------------------------------------- >
tabla headers : clientes_persona

<table class="t1">
	<th>id</th>
	<th>apellido</th>
	<th>nombres</th>
	<th>dni</th>
	<th>estado_civil</th>
	<th>telefono</th>
	<th>celular</th>
	<th>email</th>
	<th>profesion</th>
	<th>usa_tarjeta</th>
	<th>vendedor</th>
	<th>sucursal</th>
	<th>tel_comercial</th>
	<th>dom_comercial</th>
	<th>ciudad</th>
	<th>provincia</th>
	<th>carnet</th>
	<th>codigo_barras</th>
	<th>fecha_entrega</th>
	<th>radio</th>
	<th>canal</th>
	<th>programas</th>
	<th>fecha</th>
	<th>hora</th>
</table>
<! #------------------------------------------------------------- >


<! #------------------------------------------------------------- >
tabla: clientes_persona

<table class="t1">
	<td>id</td>
	<td>apellido</td>
	<td>nombres</td>
	<td>dni</td>
	<td>estado_civil</td>
	<td>telefono</td>
	<td>celular</td>
	<td>email</td>
	<td>profesion</td>
	<td>usa_tarjeta</td>
	<td>vendedor</td>
	<td>sucursal</td>
	<td>tel_comercial</td>
	<td>dom_comercial</td>
	<td>ciudad</td>
	<td>provincia</td>
	<td>carnet</td>
	<td>codigo_barras</td>
	<td>fecha_entrega</td>
	<td>radio</td>
	<td>canal</td>
	<td>programas</td>
	<td>fecha</td>
	<td>hora</td>
</table>
<! #------------------------------------------------------------- >


<! #------------------------------------------------------------- >

<?php
#rows
	$row["id"]
	$row["apellido"]
	$row["nombres"]
	$row["dni"]
	$row["estado_civil"]
	$row["telefono"]
	$row["celular"]
	$row["email"]
	$row["profesion"]
	$row["usa_tarjeta"]
	$row["vendedor"]
	$row["sucursal"]
	$row["tel_comercial"]
	$row["dom_comercial"]
	$row["ciudad"]
	$row["provincia"]
	$row["carnet"]
	$row["codigo_barras"]
	$row["fecha_entrega"]
	$row["radio"]
	$row["canal"]
	$row["programas"]
	$row["fecha"]
	$row["hora"]


#--------------------------------------------------------
#rows table
echo '<table class="t1">';
	echo "<td>".$row["id"]."</td>"
	echo "<td>".$row["apellido"]."</td>"
	echo "<td>".$row["nombres"]."</td>"
	echo "<td>".$row["dni"]."</td>"
	echo "<td>".$row["estado_civil"]."</td>"
	echo "<td>".$row["telefono"]."</td>"
	echo "<td>".$row["celular"]."</td>"
	echo "<td>".$row["email"]."</td>"
	echo "<td>".$row["profesion"]."</td>"
	echo "<td>".$row["usa_tarjeta"]."</td>"
	echo "<td>".$row["vendedor"]."</td>"
	echo "<td>".$row["sucursal"]."</td>"
	echo "<td>".$row["tel_comercial"]."</td>"
	echo "<td>".$row["dom_comercial"]."</td>"
	echo "<td>".$row["ciudad"]."</td>"
	echo "<td>".$row["provincia"]."</td>"
	echo "<td>".$row["carnet"]."</td>"
	echo "<td>".$row["codigo_barras"]."</td>"
	echo "<td>".$row["fecha_entrega"]."</td>"
	echo "<td>".$row["radio"]."</td>"
	echo "<td>".$row["canal"]."</td>"
	echo "<td>".$row["programas"]."</td>"
	echo "<td>".$row["fecha"]."</td>"
	echo "<td>".$row["hora"]."</td>"
</table>
#--------------------------------------------------------


#--------------------------------------------------------
#rows table font
echo '<table class="t1">';
	echo '<tr>';
	echo "<td>".$row["id"]."</td>"
	echo "<td>".$row["apellido"]."</td>"
	echo "<td>".$row["nombres"]."</td>"
	echo "<td>".$row["dni"]."</td>"
	echo "<td>".$row["estado_civil"]."</td>"
	echo "<td>".$row["telefono"]."</td>"
	echo "<td>".$row["celular"]."</td>"
	echo "<td>".$row["email"]."</td>"
	echo "<td>".$row["profesion"]."</td>"
	echo "<td>".$row["usa_tarjeta"]."</td>"
	echo "<td>".$row["vendedor"]."</td>"
	echo "<td>".$row["sucursal"]."</td>"
	echo "<td>".$row["tel_comercial"]."</td>"
	echo "<td>".$row["dom_comercial"]."</td>"
	echo "<td>".$row["ciudad"]."</td>"
	echo "<td>".$row["provincia"]."</td>"
	echo "<td>".$row["carnet"]."</td>"
	echo "<td>".$row["codigo_barras"]."</td>"
	echo "<td>".$row["fecha_entrega"]."</td>"
	echo "<td>".$row["radio"]."</td>"
	echo "<td>".$row["canal"]."</td>"
	echo "<td>".$row["programas"]."</td>"
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
	<th>apellido</th>
	<td><input type="text" name="apellido" id="apellido" value="" size="10"></td>
</tr>
<tr>
	<th>nombres</th>
	<td><input type="text" name="nombres" id="nombres" value="" size="10"></td>
</tr>
<tr>
	<th>dni</th>
	<td><input type="text" name="dni" id="dni" value="" size="10"></td>
</tr>
<tr>
	<th>estado_civil</th>
	<td><input type="text" name="estado_civil" id="estado_civil" value="" size="10"></td>
</tr>
<tr>
	<th>telefono</th>
	<td><input type="text" name="telefono" id="telefono" value="" size="10"></td>
</tr>
<tr>
	<th>celular</th>
	<td><input type="text" name="celular" id="celular" value="" size="10"></td>
</tr>
<tr>
	<th>email</th>
	<td><input type="text" name="email" id="email" value="" size="10"></td>
</tr>
<tr>
	<th>profesion</th>
	<td><input type="text" name="profesion" id="profesion" value="" size="10"></td>
</tr>
<tr>
	<th>usa_tarjeta</th>
	<td><input type="text" name="usa_tarjeta" id="usa_tarjeta" value="" size="10"></td>
</tr>
<tr>
	<th>vendedor</th>
	<td><input type="text" name="vendedor" id="vendedor" value="" size="10"></td>
</tr>
<tr>
	<th>sucursal</th>
	<td><input type="text" name="sucursal" id="sucursal" value="" size="10"></td>
</tr>
<tr>
	<th>tel_comercial</th>
	<td><input type="text" name="tel_comercial" id="tel_comercial" value="" size="10"></td>
</tr>
<tr>
	<th>dom_comercial</th>
	<td><input type="text" name="dom_comercial" id="dom_comercial" value="" size="10"></td>
</tr>
<tr>
	<th>ciudad</th>
	<td><input type="text" name="ciudad" id="ciudad" value="" size="10"></td>
</tr>
<tr>
	<th>provincia</th>
	<td><input type="text" name="provincia" id="provincia" value="" size="10"></td>
</tr>
<tr>
	<th>carnet</th>
	<td><input type="text" name="carnet" id="carnet" value="" size="10"></td>
</tr>
<tr>
	<th>codigo_barras</th>
	<td><input type="text" name="codigo_barras" id="codigo_barras" value="" size="10"></td>
</tr>
<tr>
	<th>fecha_entrega</th>
	<td><input type="text" name="fecha_entrega" id="fecha_entrega" value="" size="10"></td>
</tr>
<tr>
	<th>radio</th>
	<td><input type="text" name="radio" id="radio" value="" size="10"></td>
</tr>
<tr>
	<th>canal</th>
	<td><input type="text" name="canal" id="canal" value="" size="10"></td>
</tr>
<tr>
	<th>programas</th>
	<td><input type="text" name="programas" id="programas" value="" size="10"></td>
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
	<td><input type="text" name="id" id="id" value="<?php if($array_clientes_persona["id"]){ echo $array_clientes_persona["id"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>apellido</th>
	<td><input type="text" name="apellido" id="apellido" value="<?php if($array_clientes_persona["apellido"]){ echo $array_clientes_persona["apellido"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>nombres</th>
	<td><input type="text" name="nombres" id="nombres" value="<?php if($array_clientes_persona["nombres"]){ echo $array_clientes_persona["nombres"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>dni</th>
	<td><input type="text" name="dni" id="dni" value="<?php if($array_clientes_persona["dni"]){ echo $array_clientes_persona["dni"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>estado_civil</th>
	<td><input type="text" name="estado_civil" id="estado_civil" value="<?php if($array_clientes_persona["estado_civil"]){ echo $array_clientes_persona["estado_civil"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>telefono</th>
	<td><input type="text" name="telefono" id="telefono" value="<?php if($array_clientes_persona["telefono"]){ echo $array_clientes_persona["telefono"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>celular</th>
	<td><input type="text" name="celular" id="celular" value="<?php if($array_clientes_persona["celular"]){ echo $array_clientes_persona["celular"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>email</th>
	<td><input type="text" name="email" id="email" value="<?php if($array_clientes_persona["email"]){ echo $array_clientes_persona["email"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>profesion</th>
	<td><input type="text" name="profesion" id="profesion" value="<?php if($array_clientes_persona["profesion"]){ echo $array_clientes_persona["profesion"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>usa_tarjeta</th>
	<td><input type="text" name="usa_tarjeta" id="usa_tarjeta" value="<?php if($array_clientes_persona["usa_tarjeta"]){ echo $array_clientes_persona["usa_tarjeta"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>vendedor</th>
	<td><input type="text" name="vendedor" id="vendedor" value="<?php if($array_clientes_persona["vendedor"]){ echo $array_clientes_persona["vendedor"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>sucursal</th>
	<td><input type="text" name="sucursal" id="sucursal" value="<?php if($array_clientes_persona["sucursal"]){ echo $array_clientes_persona["sucursal"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>tel_comercial</th>
	<td><input type="text" name="tel_comercial" id="tel_comercial" value="<?php if($array_clientes_persona["tel_comercial"]){ echo $array_clientes_persona["tel_comercial"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>dom_comercial</th>
	<td><input type="text" name="dom_comercial" id="dom_comercial" value="<?php if($array_clientes_persona["dom_comercial"]){ echo $array_clientes_persona["dom_comercial"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>ciudad</th>
	<td><input type="text" name="ciudad" id="ciudad" value="<?php if($array_clientes_persona["ciudad"]){ echo $array_clientes_persona["ciudad"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>provincia</th>
	<td><input type="text" name="provincia" id="provincia" value="<?php if($array_clientes_persona["provincia"]){ echo $array_clientes_persona["provincia"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>carnet</th>
	<td><input type="text" name="carnet" id="carnet" value="<?php if($array_clientes_persona["carnet"]){ echo $array_clientes_persona["carnet"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>codigo_barras</th>
	<td><input type="text" name="codigo_barras" id="codigo_barras" value="<?php if($array_clientes_persona["codigo_barras"]){ echo $array_clientes_persona["codigo_barras"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>fecha_entrega</th>
	<td><input type="text" name="fecha_entrega" id="fecha_entrega" value="<?php if($array_clientes_persona["fecha_entrega"]){ echo $array_clientes_persona["fecha_entrega"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>radio</th>
	<td><input type="text" name="radio" id="radio" value="<?php if($array_clientes_persona["radio"]){ echo $array_clientes_persona["radio"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>canal</th>
	<td><input type="text" name="canal" id="canal" value="<?php if($array_clientes_persona["canal"]){ echo $array_clientes_persona["canal"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>programas</th>
	<td><input type="text" name="programas" id="programas" value="<?php if($array_clientes_persona["programas"]){ echo $array_clientes_persona["programas"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>fecha</th>
	<td><input type="text" name="fecha" id="fecha" value="<?php if($array_clientes_persona["fecha"]){ echo $array_clientes_persona["fecha"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>hora</th>
	<td><input type="text" name="hora" id="hora" value="<?php if($array_clientes_persona["hora"]){ echo $array_clientes_persona["hora"]; } ?>" size="10"></td>
</tr>
</table>

#--------------------------------------------------------


?>
<! #------------------------------------------------------------- >
#modify2
<table class="t1">
	<tr>
		<td>id</td>
		<td><input type="text" name="id" value="<?php echo $array_clientes_persona["id"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>apellido</td>
		<td><input type="text" name="apellido" value="<?php echo $array_clientes_persona["apellido"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>nombres</td>
		<td><input type="text" name="nombres" value="<?php echo $array_clientes_persona["nombres"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>dni</td>
		<td><input type="text" name="dni" value="<?php echo $array_clientes_persona["dni"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>estado_civil</td>
		<td><input type="text" name="estado_civil" value="<?php echo $array_clientes_persona["estado_civil"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>telefono</td>
		<td><input type="text" name="telefono" value="<?php echo $array_clientes_persona["telefono"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>celular</td>
		<td><input type="text" name="celular" value="<?php echo $array_clientes_persona["celular"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>email</td>
		<td><input type="text" name="email" value="<?php echo $array_clientes_persona["email"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>profesion</td>
		<td><input type="text" name="profesion" value="<?php echo $array_clientes_persona["profesion"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>usa_tarjeta</td>
		<td><input type="text" name="usa_tarjeta" value="<?php echo $array_clientes_persona["usa_tarjeta"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>vendedor</td>
		<td><input type="text" name="vendedor" value="<?php echo $array_clientes_persona["vendedor"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>sucursal</td>
		<td><input type="text" name="sucursal" value="<?php echo $array_clientes_persona["sucursal"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>tel_comercial</td>
		<td><input type="text" name="tel_comercial" value="<?php echo $array_clientes_persona["tel_comercial"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>dom_comercial</td>
		<td><input type="text" name="dom_comercial" value="<?php echo $array_clientes_persona["dom_comercial"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>ciudad</td>
		<td><input type="text" name="ciudad" value="<?php echo $array_clientes_persona["ciudad"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>provincia</td>
		<td><input type="text" name="provincia" value="<?php echo $array_clientes_persona["provincia"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>carnet</td>
		<td><input type="text" name="carnet" value="<?php echo $array_clientes_persona["carnet"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>codigo_barras</td>
		<td><input type="text" name="codigo_barras" value="<?php echo $array_clientes_persona["codigo_barras"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>fecha_entrega</td>
		<td><input type="text" name="fecha_entrega" value="<?php echo $array_clientes_persona["fecha_entrega"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>radio</td>
		<td><input type="text" name="radio" value="<?php echo $array_clientes_persona["radio"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>canal</td>
		<td><input type="text" name="canal" value="<?php echo $array_clientes_persona["canal"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>programas</td>
		<td><input type="text" name="programas" value="<?php echo $array_clientes_persona["programas"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>fecha</td>
		<td><input type="text" name="fecha" value="<?php echo $array_clientes_persona["fecha"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>hora</td>
		<td><input type="text" name="hora" value="<?php echo $array_clientes_persona["hora"]; ?>" size="30" maxlength="80"></td>
	</tr>
</table>
<! #------------------------------------------------------------- >
<?php

#----------------------------------------------------------------------------------
#muestra
echo '<table class="t1">';
echo "<tr>";
	echo '<td>id</td>';
	echo '<td>'.$array_clientes_persona["id"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>apellido</td>';
	echo '<td>'.$array_clientes_persona["apellido"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>nombres</td>';
	echo '<td>'.$array_clientes_persona["nombres"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>dni</td>';
	echo '<td>'.$array_clientes_persona["dni"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>estado_civil</td>';
	echo '<td>'.$array_clientes_persona["estado_civil"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>telefono</td>';
	echo '<td>'.$array_clientes_persona["telefono"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>celular</td>';
	echo '<td>'.$array_clientes_persona["celular"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>email</td>';
	echo '<td>'.$array_clientes_persona["email"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>profesion</td>';
	echo '<td>'.$array_clientes_persona["profesion"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>usa_tarjeta</td>';
	echo '<td>'.$array_clientes_persona["usa_tarjeta"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>vendedor</td>';
	echo '<td>'.$array_clientes_persona["vendedor"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>sucursal</td>';
	echo '<td>'.$array_clientes_persona["sucursal"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>tel_comercial</td>';
	echo '<td>'.$array_clientes_persona["tel_comercial"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>dom_comercial</td>';
	echo '<td>'.$array_clientes_persona["dom_comercial"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>ciudad</td>';
	echo '<td>'.$array_clientes_persona["ciudad"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>provincia</td>';
	echo '<td>'.$array_clientes_persona["provincia"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>carnet</td>';
	echo '<td>'.$array_clientes_persona["carnet"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>codigo_barras</td>';
	echo '<td>'.$array_clientes_persona["codigo_barras"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>fecha_entrega</td>';
	echo '<td>'.$array_clientes_persona["fecha_entrega"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>radio</td>';
	echo '<td>'.$array_clientes_persona["radio"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>canal</td>';
	echo '<td>'.$array_clientes_persona["canal"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>programas</td>';
	echo '<td>'.$array_clientes_persona["programas"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>fecha</td>';
	echo '<td>'.$array_clientes_persona["fecha"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>hora</td>';
	echo '<td>'.$array_clientes_persona["hora"].'</td>';
echo "</tr>";
</table>
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#array post
	$array_clientes_persona["id"]=$_POST["id"];
	$array_clientes_persona["apellido"]=$_POST["apellido"];
	$array_clientes_persona["nombres"]=$_POST["nombres"];
	$array_clientes_persona["dni"]=$_POST["dni"];
	$array_clientes_persona["estado_civil"]=$_POST["estado_civil"];
	$array_clientes_persona["telefono"]=$_POST["telefono"];
	$array_clientes_persona["celular"]=$_POST["celular"];
	$array_clientes_persona["email"]=$_POST["email"];
	$array_clientes_persona["profesion"]=$_POST["profesion"];
	$array_clientes_persona["usa_tarjeta"]=$_POST["usa_tarjeta"];
	$array_clientes_persona["vendedor"]=$_POST["vendedor"];
	$array_clientes_persona["sucursal"]=$_POST["sucursal"];
	$array_clientes_persona["tel_comercial"]=$_POST["tel_comercial"];
	$array_clientes_persona["dom_comercial"]=$_POST["dom_comercial"];
	$array_clientes_persona["ciudad"]=$_POST["ciudad"];
	$array_clientes_persona["provincia"]=$_POST["provincia"];
	$array_clientes_persona["carnet"]=$_POST["carnet"];
	$array_clientes_persona["codigo_barras"]=$_POST["codigo_barras"];
	$array_clientes_persona["fecha_entrega"]=$_POST["fecha_entrega"];
	$array_clientes_persona["radio"]=$_POST["radio"];
	$array_clientes_persona["canal"]=$_POST["canal"];
	$array_clientes_persona["programas"]=$_POST["programas"];
	$array_clientes_persona["fecha"]=$_POST["fecha"];
	$array_clientes_persona["hora"]=$_POST["hora"];
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#array get
	$array_clientes_persona["id"]=$_GET["id"];
	$array_clientes_persona["apellido"]=$_GET["apellido"];
	$array_clientes_persona["nombres"]=$_GET["nombres"];
	$array_clientes_persona["dni"]=$_GET["dni"];
	$array_clientes_persona["estado_civil"]=$_GET["estado_civil"];
	$array_clientes_persona["telefono"]=$_GET["telefono"];
	$array_clientes_persona["celular"]=$_GET["celular"];
	$array_clientes_persona["email"]=$_GET["email"];
	$array_clientes_persona["profesion"]=$_GET["profesion"];
	$array_clientes_persona["usa_tarjeta"]=$_GET["usa_tarjeta"];
	$array_clientes_persona["vendedor"]=$_GET["vendedor"];
	$array_clientes_persona["sucursal"]=$_GET["sucursal"];
	$array_clientes_persona["tel_comercial"]=$_GET["tel_comercial"];
	$array_clientes_persona["dom_comercial"]=$_GET["dom_comercial"];
	$array_clientes_persona["ciudad"]=$_GET["ciudad"];
	$array_clientes_persona["provincia"]=$_GET["provincia"];
	$array_clientes_persona["carnet"]=$_GET["carnet"];
	$array_clientes_persona["codigo_barras"]=$_GET["codigo_barras"];
	$array_clientes_persona["fecha_entrega"]=$_GET["fecha_entrega"];
	$array_clientes_persona["radio"]=$_GET["radio"];
	$array_clientes_persona["canal"]=$_GET["canal"];
	$array_clientes_persona["programas"]=$_GET["programas"];
	$array_clientes_persona["fecha"]=$_GET["fecha"];
	$array_clientes_persona["hora"]=$_GET["hora"];
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#rows char 13
	echo $row["id"].'<br>'.chr(13);
	echo $row["apellido"].'<br>'.chr(13);
	echo $row["nombres"].'<br>'.chr(13);
	echo $row["dni"].'<br>'.chr(13);
	echo $row["estado_civil"].'<br>'.chr(13);
	echo $row["telefono"].'<br>'.chr(13);
	echo $row["celular"].'<br>'.chr(13);
	echo $row["email"].'<br>'.chr(13);
	echo $row["profesion"].'<br>'.chr(13);
	echo $row["usa_tarjeta"].'<br>'.chr(13);
	echo $row["vendedor"].'<br>'.chr(13);
	echo $row["sucursal"].'<br>'.chr(13);
	echo $row["tel_comercial"].'<br>'.chr(13);
	echo $row["dom_comercial"].'<br>'.chr(13);
	echo $row["ciudad"].'<br>'.chr(13);
	echo $row["provincia"].'<br>'.chr(13);
	echo $row["carnet"].'<br>'.chr(13);
	echo $row["codigo_barras"].'<br>'.chr(13);
	echo $row["fecha_entrega"].'<br>'.chr(13);
	echo $row["radio"].'<br>'.chr(13);
	echo $row["canal"].'<br>'.chr(13);
	echo $row["programas"].'<br>'.chr(13);
	echo $row["fecha"].'<br>'.chr(13);
	echo $row["hora"].'<br>'.chr(13);
#----------------------------------------------------------------------------------


#--------------------------------------
<table class="t1">
	<th>id</th>
	<th>apellido</th>
	<th>nombres</th>
	<th>dni</th>
	<th>estado_civil</th>
	<th>telefono</th>
	<th>celular</th>
	<th>email</th>
	<th>profesion</th>
	<th>usa_tarjeta</th>
	<th>vendedor</th>
	<th>sucursal</th>
	<th>tel_comercial</th>
	<th>dom_comercial</th>
	<th>ciudad</th>
	<th>provincia</th>
	<th>carnet</th>
	<th>codigo_barras</th>
	<th>fecha_entrega</th>
	<th>radio</th>
	<th>canal</th>
	<th>programas</th>
	<th>fecha</th>
	<th>hora</th>
$query='select * from clientes_persona';
$result=mysql_query($query)or die(mysql_error() ." ".$_SERVER["script_name"]." ".$query);
while($row=mysql_fetch_array($result)){
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["apellido"].'</td>';
	echo '<td>'.$row["nombres"].'</td>';
	echo '<td>'.$row["dni"].'</td>';
	echo '<td>'.$row["estado_civil"].'</td>';
	echo '<td>'.$row["telefono"].'</td>';
	echo '<td>'.$row["celular"].'</td>';
	echo '<td>'.$row["email"].'</td>';
	echo '<td>'.$row["profesion"].'</td>';
	echo '<td>'.$row["usa_tarjeta"].'</td>';
	echo '<td>'.$row["vendedor"].'</td>';
	echo '<td>'.$row["sucursal"].'</td>';
	echo '<td>'.$row["tel_comercial"].'</td>';
	echo '<td>'.$row["dom_comercial"].'</td>';
	echo '<td>'.$row["ciudad"].'</td>';
	echo '<td>'.$row["provincia"].'</td>';
	echo '<td>'.$row["carnet"].'</td>';
	echo '<td>'.$row["codigo_barras"].'</td>';
	echo '<td>'.$row["fecha_entrega"].'</td>';
	echo '<td>'.$row["radio"].'</td>';
	echo '<td>'.$row["canal"].'</td>';
	echo '<td>'.$row["programas"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
}
</table>
#--------------------------------------


#estructura tabla: clientes_persona
#--------------------------------------
# 0	id	mediumint(8) unsigned
# 1	apellido	varchar(30)
# 2	nombres	varchar(40)
# 3	dni	varchar(20)
# 4	estado_civil	varchar(20)
# 5	telefono	varchar(20)
# 6	celular	varchar(20)
# 7	email	varchar(30)
# 8	profesion	varchar(15)
# 9	usa_tarjeta	varchar(2)
# 10	vendedor	varchar(6)
# 11	sucursal	varchar(15)
# 12	tel_comercial	varchar(20)
# 13	dom_comercial	varchar(40)
# 14	ciudad	varchar(25)
# 15	provincia	varchar(25)
# 16	carnet	varchar(15)
# 17	codigo_barras	varchar(15)
# 18	fecha_entrega	date
# 19	radio	varchar(15)
# 20	canal	varchar(15)
# 21	programas	varchar(15)
# 22	fecha	date
# 23	hora	time
#--------------------------------------


#--------------------------------------
#temporal mio
	echo '<td><input type="text" name="id'.$row["id"].'" id="id'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["id"].'"></td>';
	echo '<td><input type="text" name="apellido'.$row["id"].'" id="apellido'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["apellido"].'"></td>';
	echo '<td><input type="text" name="nombres'.$row["id"].'" id="nombres'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["nombres"].'"></td>';
	echo '<td><input type="text" name="dni'.$row["id"].'" id="dni'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["dni"].'"></td>';
	echo '<td><input type="text" name="estado_civil'.$row["id"].'" id="estado_civil'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["estado_civil"].'"></td>';
	echo '<td><input type="text" name="telefono'.$row["id"].'" id="telefono'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["telefono"].'"></td>';
	echo '<td><input type="text" name="celular'.$row["id"].'" id="celular'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["celular"].'"></td>';
	echo '<td><input type="text" name="email'.$row["id"].'" id="email'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["email"].'"></td>';
	echo '<td><input type="text" name="profesion'.$row["id"].'" id="profesion'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["profesion"].'"></td>';
	echo '<td><input type="text" name="usa_tarjeta'.$row["id"].'" id="usa_tarjeta'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["usa_tarjeta"].'"></td>';
	echo '<td><input type="text" name="vendedor'.$row["id"].'" id="vendedor'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["vendedor"].'"></td>';
	echo '<td><input type="text" name="sucursal'.$row["id"].'" id="sucursal'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["sucursal"].'"></td>';
	echo '<td><input type="text" name="tel_comercial'.$row["id"].'" id="tel_comercial'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["tel_comercial"].'"></td>';
	echo '<td><input type="text" name="dom_comercial'.$row["id"].'" id="dom_comercial'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["dom_comercial"].'"></td>';
	echo '<td><input type="text" name="ciudad'.$row["id"].'" id="ciudad'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["ciudad"].'"></td>';
	echo '<td><input type="text" name="provincia'.$row["id"].'" id="provincia'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["provincia"].'"></td>';
	echo '<td><input type="text" name="carnet'.$row["id"].'" id="carnet'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["carnet"].'"></td>';
	echo '<td><input type="text" name="codigo_barras'.$row["id"].'" id="codigo_barras'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["codigo_barras"].'"></td>';
	echo '<td><input type="text" name="fecha_entrega'.$row["id"].'" id="fecha_entrega'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["fecha_entrega"].'"></td>';
	echo '<td><input type="text" name="radio'.$row["id"].'" id="radio'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["radio"].'"></td>';
	echo '<td><input type="text" name="canal'.$row["id"].'" id="canal'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["canal"].'"></td>';
	echo '<td><input type="text" name="programas'.$row["id"].'" id="programas'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["programas"].'"></td>';
	echo '<td><input type="text" name="fecha'.$row["id"].'" id="fecha'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["fecha"].'"></td>';
	echo '<td><input type="text" name="hora'.$row["id"].'" id="hora'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["hora"].'"></td>';
#--------------------------------------

?>


