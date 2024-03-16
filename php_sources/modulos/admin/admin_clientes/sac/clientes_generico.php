<! #------------------------------------------------------------- >
tabla headers : clientes

<table class="t1">
	<th>id</th>
	<th>razon_social</th>
	<th>nombres</th>
	<th>condicion_iva</th>
	<th>cuit</th>
	<th>tipo_cliente</th>
	<th>carnet</th>
	<th>direccion</th>
	<th>ciudad</th>
	<th>provincia</th>
	<th>pais</th>
	<th>codigo_postal</th>
	<th>email</th>
	<th>pagina_web</th>
	<th>telefonos</th>
	<th>fax</th>
	<th>vendedor</th>
	<th>informacion_contacto</th>
	<th>observaciones</th>
	<th>sucursal</th>
	<th>fecha</th>
	<th>hora</th>
</table>
<! #------------------------------------------------------------- >


<! #------------------------------------------------------------- >
tabla: clientes

<table class="t1">
	<td>id</td>
	<td>razon_social</td>
	<td>nombres</td>
	<td>condicion_iva</td>
	<td>cuit</td>
	<td>tipo_cliente</td>
	<td>carnet</td>
	<td>direccion</td>
	<td>ciudad</td>
	<td>provincia</td>
	<td>pais</td>
	<td>codigo_postal</td>
	<td>email</td>
	<td>pagina_web</td>
	<td>telefonos</td>
	<td>fax</td>
	<td>vendedor</td>
	<td>informacion_contacto</td>
	<td>observaciones</td>
	<td>sucursal</td>
	<td>fecha</td>
	<td>hora</td>
</table>
<! #------------------------------------------------------------- >


<! #------------------------------------------------------------- >

<?php
#rows
	$row["id"]
	$row["razon_social"]
	$row["nombres"]
	$row["condicion_iva"]
	$row["cuit"]
	$row["tipo_cliente"]
	$row["carnet"]
	$row["direccion"]
	$row["ciudad"]
	$row["provincia"]
	$row["pais"]
	$row["codigo_postal"]
	$row["email"]
	$row["pagina_web"]
	$row["telefonos"]
	$row["fax"]
	$row["vendedor"]
	$row["informacion_contacto"]
	$row["observaciones"]
	$row["sucursal"]
	$row["fecha"]
	$row["hora"]


#--------------------------------------------------------
#rows table
echo '<table class="t1">';
	echo "<td>".$row["id"]."</td>"
	echo "<td>".$row["razon_social"]."</td>"
	echo "<td>".$row["nombres"]."</td>"
	echo "<td>".$row["condicion_iva"]."</td>"
	echo "<td>".$row["cuit"]."</td>"
	echo "<td>".$row["tipo_cliente"]."</td>"
	echo "<td>".$row["carnet"]."</td>"
	echo "<td>".$row["direccion"]."</td>"
	echo "<td>".$row["ciudad"]."</td>"
	echo "<td>".$row["provincia"]."</td>"
	echo "<td>".$row["pais"]."</td>"
	echo "<td>".$row["codigo_postal"]."</td>"
	echo "<td>".$row["email"]."</td>"
	echo "<td>".$row["pagina_web"]."</td>"
	echo "<td>".$row["telefonos"]."</td>"
	echo "<td>".$row["fax"]."</td>"
	echo "<td>".$row["vendedor"]."</td>"
	echo "<td>".$row["informacion_contacto"]."</td>"
	echo "<td>".$row["observaciones"]."</td>"
	echo "<td>".$row["sucursal"]."</td>"
	echo "<td>".$row["fecha"]."</td>"
	echo "<td>".$row["hora"]."</td>"
</table>
#--------------------------------------------------------


#--------------------------------------------------------
#rows table font
echo '<table class="t1">';
	echo '<tr>';
	echo "<td>".$row["id"]."</td>"
	echo "<td>".$row["razon_social"]."</td>"
	echo "<td>".$row["nombres"]."</td>"
	echo "<td>".$row["condicion_iva"]."</td>"
	echo "<td>".$row["cuit"]."</td>"
	echo "<td>".$row["tipo_cliente"]."</td>"
	echo "<td>".$row["carnet"]."</td>"
	echo "<td>".$row["direccion"]."</td>"
	echo "<td>".$row["ciudad"]."</td>"
	echo "<td>".$row["provincia"]."</td>"
	echo "<td>".$row["pais"]."</td>"
	echo "<td>".$row["codigo_postal"]."</td>"
	echo "<td>".$row["email"]."</td>"
	echo "<td>".$row["pagina_web"]."</td>"
	echo "<td>".$row["telefonos"]."</td>"
	echo "<td>".$row["fax"]."</td>"
	echo "<td>".$row["vendedor"]."</td>"
	echo "<td>".$row["informacion_contacto"]."</td>"
	echo "<td>".$row["observaciones"]."</td>"
	echo "<td>".$row["sucursal"]."</td>"
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
	<th>razon_social</th>
	<td><input type="text" name="razon_social" id="razon_social" value="" size="10"></td>
</tr>
<tr>
	<th>nombres</th>
	<td><input type="text" name="nombres" id="nombres" value="" size="10"></td>
</tr>
<tr>
	<th>condicion_iva</th>
	<td><input type="text" name="condicion_iva" id="condicion_iva" value="" size="10"></td>
</tr>
<tr>
	<th>cuit</th>
	<td><input type="text" name="cuit" id="cuit" value="" size="10"></td>
</tr>
<tr>
	<th>tipo_cliente</th>
	<td><input type="text" name="tipo_cliente" id="tipo_cliente" value="" size="10"></td>
</tr>
<tr>
	<th>carnet</th>
	<td><input type="text" name="carnet" id="carnet" value="" size="10"></td>
</tr>
<tr>
	<th>direccion</th>
	<td><input type="text" name="direccion" id="direccion" value="" size="10"></td>
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
	<th>pais</th>
	<td><input type="text" name="pais" id="pais" value="" size="10"></td>
</tr>
<tr>
	<th>codigo_postal</th>
	<td><input type="text" name="codigo_postal" id="codigo_postal" value="" size="10"></td>
</tr>
<tr>
	<th>email</th>
	<td><textarea name="email" id="email" rows="3" cols="30"></textarea></td>
</tr>
<tr>
	<th>pagina_web</th>
	<td><input type="text" name="pagina_web" id="pagina_web" value="" size="10"></td>
</tr>
<tr>
	<th>telefonos</th>
	<td><textarea name="telefonos" id="telefonos" rows="3" cols="30"></textarea></td>
</tr>
<tr>
	<th>fax</th>
	<td><input type="text" name="fax" id="fax" value="" size="10"></td>
</tr>
<tr>
	<th>vendedor</th>
	<td><input type="text" name="vendedor" id="vendedor" value="" size="10"></td>
</tr>
<tr>
	<th>informacion_contacto</th>
	<td><textarea name="informacion_contacto" id="informacion_contacto" rows="3" cols="30"></textarea></td>
</tr>
<tr>
	<th>observaciones</th>
	<td><textarea name="observaciones" id="observaciones" rows="3" cols="30"></textarea></td>
</tr>
<tr>
	<th>sucursal</th>
	<td><input type="text" name="sucursal" id="sucursal" value="" size="10"></td>
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
	<td><input type="text" name="id" id="id" value="<?php if($array_clientes["id"]){ echo $array_clientes["id"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>razon_social</th>
	<td><input type="text" name="razon_social" id="razon_social" value="<?php if($array_clientes["razon_social"]){ echo $array_clientes["razon_social"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>nombres</th>
	<td><input type="text" name="nombres" id="nombres" value="<?php if($array_clientes["nombres"]){ echo $array_clientes["nombres"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>condicion_iva</th>
	<td><input type="text" name="condicion_iva" id="condicion_iva" value="<?php if($array_clientes["condicion_iva"]){ echo $array_clientes["condicion_iva"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>cuit</th>
	<td><input type="text" name="cuit" id="cuit" value="<?php if($array_clientes["cuit"]){ echo $array_clientes["cuit"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>tipo_cliente</th>
	<td><input type="text" name="tipo_cliente" id="tipo_cliente" value="<?php if($array_clientes["tipo_cliente"]){ echo $array_clientes["tipo_cliente"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>carnet</th>
	<td><input type="text" name="carnet" id="carnet" value="<?php if($array_clientes["carnet"]){ echo $array_clientes["carnet"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>direccion</th>
	<td><input type="text" name="direccion" id="direccion" value="<?php if($array_clientes["direccion"]){ echo $array_clientes["direccion"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>ciudad</th>
	<td><input type="text" name="ciudad" id="ciudad" value="<?php if($array_clientes["ciudad"]){ echo $array_clientes["ciudad"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>provincia</th>
	<td><input type="text" name="provincia" id="provincia" value="<?php if($array_clientes["provincia"]){ echo $array_clientes["provincia"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>pais</th>
	<td><input type="text" name="pais" id="pais" value="<?php if($array_clientes["pais"]){ echo $array_clientes["pais"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>codigo_postal</th>
	<td><input type="text" name="codigo_postal" id="codigo_postal" value="<?php if($array_clientes["codigo_postal"]){ echo $array_clientes["codigo_postal"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>email</th>
	<td><textarea name="email" id="email" rows="3" cols="30"><?php if($array_clientes["email"]){ echo $array_clientes["email"]; } ?></textarea></td>
</tr>
<tr>
	<th>pagina_web</th>
	<td><input type="text" name="pagina_web" id="pagina_web" value="<?php if($array_clientes["pagina_web"]){ echo $array_clientes["pagina_web"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>telefonos</th>
	<td><textarea name="telefonos" id="telefonos" rows="3" cols="30"><?php if($array_clientes["telefonos"]){ echo $array_clientes["telefonos"]; } ?></textarea></td>
</tr>
<tr>
	<th>fax</th>
	<td><input type="text" name="fax" id="fax" value="<?php if($array_clientes["fax"]){ echo $array_clientes["fax"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>vendedor</th>
	<td><input type="text" name="vendedor" id="vendedor" value="<?php if($array_clientes["vendedor"]){ echo $array_clientes["vendedor"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>informacion_contacto</th>
	<td><textarea name="informacion_contacto" id="informacion_contacto" rows="3" cols="30"><?php if($array_clientes["informacion_contacto"]){ echo $array_clientes["informacion_contacto"]; } ?></textarea></td>
</tr>
<tr>
	<th>observaciones</th>
	<td><textarea name="observaciones" id="observaciones" rows="3" cols="30"><?php if($array_clientes["observaciones"]){ echo $array_clientes["observaciones"]; } ?></textarea></td>
</tr>
<tr>
	<th>sucursal</th>
	<td><input type="text" name="sucursal" id="sucursal" value="<?php if($array_clientes["sucursal"]){ echo $array_clientes["sucursal"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>fecha</th>
	<td><input type="text" name="fecha" id="fecha" value="<?php if($array_clientes["fecha"]){ echo $array_clientes["fecha"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>hora</th>
	<td><input type="text" name="hora" id="hora" value="<?php if($array_clientes["hora"]){ echo $array_clientes["hora"]; } ?>" size="10"></td>
</tr>
</table>

#--------------------------------------------------------


?>
<! #------------------------------------------------------------- >
#modify2
<table class="t1">
	<tr>
		<td>id</td>
		<td><input type="text" name="id" value="<?php echo $array_clientes["id"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>razon_social</td>
		<td><input type="text" name="razon_social" value="<?php echo $array_clientes["razon_social"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>nombres</td>
		<td><input type="text" name="nombres" value="<?php echo $array_clientes["nombres"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>condicion_iva</td>
		<td><input type="text" name="condicion_iva" value="<?php echo $array_clientes["condicion_iva"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>cuit</td>
		<td><input type="text" name="cuit" value="<?php echo $array_clientes["cuit"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>tipo_cliente</td>
		<td><input type="text" name="tipo_cliente" value="<?php echo $array_clientes["tipo_cliente"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>carnet</td>
		<td><input type="text" name="carnet" value="<?php echo $array_clientes["carnet"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>direccion</td>
		<td><input type="text" name="direccion" value="<?php echo $array_clientes["direccion"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>ciudad</td>
		<td><input type="text" name="ciudad" value="<?php echo $array_clientes["ciudad"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>provincia</td>
		<td><input type="text" name="provincia" value="<?php echo $array_clientes["provincia"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>pais</td>
		<td><input type="text" name="pais" value="<?php echo $array_clientes["pais"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>codigo_postal</td>
		<td><input type="text" name="codigo_postal" value="<?php echo $array_clientes["codigo_postal"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>email</td>
		<td><input type="text" name="email" value="<?php echo $array_clientes["email"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>pagina_web</td>
		<td><input type="text" name="pagina_web" value="<?php echo $array_clientes["pagina_web"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>telefonos</td>
		<td><input type="text" name="telefonos" value="<?php echo $array_clientes["telefonos"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>fax</td>
		<td><input type="text" name="fax" value="<?php echo $array_clientes["fax"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>vendedor</td>
		<td><input type="text" name="vendedor" value="<?php echo $array_clientes["vendedor"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>informacion_contacto</td>
		<td><input type="text" name="informacion_contacto" value="<?php echo $array_clientes["informacion_contacto"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>observaciones</td>
		<td><input type="text" name="observaciones" value="<?php echo $array_clientes["observaciones"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>sucursal</td>
		<td><input type="text" name="sucursal" value="<?php echo $array_clientes["sucursal"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>fecha</td>
		<td><input type="text" name="fecha" value="<?php echo $array_clientes["fecha"]; ?>" size="30" maxlength="80"></td>
	</tr>
	<tr>
		<td>hora</td>
		<td><input type="text" name="hora" value="<?php echo $array_clientes["hora"]; ?>" size="30" maxlength="80"></td>
	</tr>
</table>
<! #------------------------------------------------------------- >
<?php

#----------------------------------------------------------------------------------
#muestra
echo '<table class="t1">';
echo "<tr>";
	echo '<td>id</td>';
	echo '<td>'.$array_clientes["id"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>razon_social</td>';
	echo '<td>'.$array_clientes["razon_social"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>nombres</td>';
	echo '<td>'.$array_clientes["nombres"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>condicion_iva</td>';
	echo '<td>'.$array_clientes["condicion_iva"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>cuit</td>';
	echo '<td>'.$array_clientes["cuit"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>tipo_cliente</td>';
	echo '<td>'.$array_clientes["tipo_cliente"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>carnet</td>';
	echo '<td>'.$array_clientes["carnet"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>direccion</td>';
	echo '<td>'.$array_clientes["direccion"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>ciudad</td>';
	echo '<td>'.$array_clientes["ciudad"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>provincia</td>';
	echo '<td>'.$array_clientes["provincia"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>pais</td>';
	echo '<td>'.$array_clientes["pais"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>codigo_postal</td>';
	echo '<td>'.$array_clientes["codigo_postal"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>email</td>';
	echo '<td>'.$array_clientes["email"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>pagina_web</td>';
	echo '<td>'.$array_clientes["pagina_web"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>telefonos</td>';
	echo '<td>'.$array_clientes["telefonos"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>fax</td>';
	echo '<td>'.$array_clientes["fax"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>vendedor</td>';
	echo '<td>'.$array_clientes["vendedor"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>informacion_contacto</td>';
	echo '<td>'.$array_clientes["informacion_contacto"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>observaciones</td>';
	echo '<td>'.$array_clientes["observaciones"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>sucursal</td>';
	echo '<td>'.$array_clientes["sucursal"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>fecha</td>';
	echo '<td>'.$array_clientes["fecha"].'</td>';
echo "</tr>";
echo "<tr>";
	echo '<td>hora</td>';
	echo '<td>'.$array_clientes["hora"].'</td>';
echo "</tr>";
</table>
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#array post
	$array_clientes["id"]=$_POST["id"];
	$array_clientes["razon_social"]=$_POST["razon_social"];
	$array_clientes["nombres"]=$_POST["nombres"];
	$array_clientes["condicion_iva"]=$_POST["condicion_iva"];
	$array_clientes["cuit"]=$_POST["cuit"];
	$array_clientes["tipo_cliente"]=$_POST["tipo_cliente"];
	$array_clientes["carnet"]=$_POST["carnet"];
	$array_clientes["direccion"]=$_POST["direccion"];
	$array_clientes["ciudad"]=$_POST["ciudad"];
	$array_clientes["provincia"]=$_POST["provincia"];
	$array_clientes["pais"]=$_POST["pais"];
	$array_clientes["codigo_postal"]=$_POST["codigo_postal"];
	$array_clientes["email"]=$_POST["email"];
	$array_clientes["pagina_web"]=$_POST["pagina_web"];
	$array_clientes["telefonos"]=$_POST["telefonos"];
	$array_clientes["fax"]=$_POST["fax"];
	$array_clientes["vendedor"]=$_POST["vendedor"];
	$array_clientes["informacion_contacto"]=$_POST["informacion_contacto"];
	$array_clientes["observaciones"]=$_POST["observaciones"];
	$array_clientes["sucursal"]=$_POST["sucursal"];
	$array_clientes["fecha"]=$_POST["fecha"];
	$array_clientes["hora"]=$_POST["hora"];
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#array get
	$array_clientes["id"]=$_GET["id"];
	$array_clientes["razon_social"]=$_GET["razon_social"];
	$array_clientes["nombres"]=$_GET["nombres"];
	$array_clientes["condicion_iva"]=$_GET["condicion_iva"];
	$array_clientes["cuit"]=$_GET["cuit"];
	$array_clientes["tipo_cliente"]=$_GET["tipo_cliente"];
	$array_clientes["carnet"]=$_GET["carnet"];
	$array_clientes["direccion"]=$_GET["direccion"];
	$array_clientes["ciudad"]=$_GET["ciudad"];
	$array_clientes["provincia"]=$_GET["provincia"];
	$array_clientes["pais"]=$_GET["pais"];
	$array_clientes["codigo_postal"]=$_GET["codigo_postal"];
	$array_clientes["email"]=$_GET["email"];
	$array_clientes["pagina_web"]=$_GET["pagina_web"];
	$array_clientes["telefonos"]=$_GET["telefonos"];
	$array_clientes["fax"]=$_GET["fax"];
	$array_clientes["vendedor"]=$_GET["vendedor"];
	$array_clientes["informacion_contacto"]=$_GET["informacion_contacto"];
	$array_clientes["observaciones"]=$_GET["observaciones"];
	$array_clientes["sucursal"]=$_GET["sucursal"];
	$array_clientes["fecha"]=$_GET["fecha"];
	$array_clientes["hora"]=$_GET["hora"];
#----------------------------------------------------------------------------------


#----------------------------------------------------------------------------------
#rows char 13
	echo $row["id"].'<br>'.chr(13);
	echo $row["razon_social"].'<br>'.chr(13);
	echo $row["nombres"].'<br>'.chr(13);
	echo $row["condicion_iva"].'<br>'.chr(13);
	echo $row["cuit"].'<br>'.chr(13);
	echo $row["tipo_cliente"].'<br>'.chr(13);
	echo $row["carnet"].'<br>'.chr(13);
	echo $row["direccion"].'<br>'.chr(13);
	echo $row["ciudad"].'<br>'.chr(13);
	echo $row["provincia"].'<br>'.chr(13);
	echo $row["pais"].'<br>'.chr(13);
	echo $row["codigo_postal"].'<br>'.chr(13);
	echo $row["email"].'<br>'.chr(13);
	echo $row["pagina_web"].'<br>'.chr(13);
	echo $row["telefonos"].'<br>'.chr(13);
	echo $row["fax"].'<br>'.chr(13);
	echo $row["vendedor"].'<br>'.chr(13);
	echo $row["informacion_contacto"].'<br>'.chr(13);
	echo $row["observaciones"].'<br>'.chr(13);
	echo $row["sucursal"].'<br>'.chr(13);
	echo $row["fecha"].'<br>'.chr(13);
	echo $row["hora"].'<br>'.chr(13);
#----------------------------------------------------------------------------------


#--------------------------------------
<table class="t1">
	<th>id</th>
	<th>razon_social</th>
	<th>nombres</th>
	<th>condicion_iva</th>
	<th>cuit</th>
	<th>tipo_cliente</th>
	<th>carnet</th>
	<th>direccion</th>
	<th>ciudad</th>
	<th>provincia</th>
	<th>pais</th>
	<th>codigo_postal</th>
	<th>email</th>
	<th>pagina_web</th>
	<th>telefonos</th>
	<th>fax</th>
	<th>vendedor</th>
	<th>informacion_contacto</th>
	<th>observaciones</th>
	<th>sucursal</th>
	<th>fecha</th>
	<th>hora</th>
$query='select * from clientes';
$result=mysql_query($query)or die(mysql_error() ." ".$_SERVER["script_name"]." ".$query);
while($row=mysql_fetch_array($result)){
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["razon_social"].'</td>';
	echo '<td>'.$row["nombres"].'</td>';
	echo '<td>'.$row["condicion_iva"].'</td>';
	echo '<td>'.$row["cuit"].'</td>';
	echo '<td>'.$row["tipo_cliente"].'</td>';
	echo '<td>'.$row["carnet"].'</td>';
	echo '<td>'.$row["direccion"].'</td>';
	echo '<td>'.$row["ciudad"].'</td>';
	echo '<td>'.$row["provincia"].'</td>';
	echo '<td>'.$row["pais"].'</td>';
	echo '<td>'.$row["codigo_postal"].'</td>';
	echo '<td>'.$row["email"].'</td>';
	echo '<td>'.$row["pagina_web"].'</td>';
	echo '<td>'.$row["telefonos"].'</td>';
	echo '<td>'.$row["fax"].'</td>';
	echo '<td>'.$row["vendedor"].'</td>';
	echo '<td>'.$row["informacion_contacto"].'</td>';
	echo '<td>'.$row["observaciones"].'</td>';
	echo '<td>'.$row["sucursal"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
}
</table>
#--------------------------------------


#estructura tabla: clientes
#--------------------------------------
# 0	id	mediumint(8) unsigned
# 1	razon_social	varchar(60)
# 2	nombres	varchar(60)
# 3	condicion_iva	varchar(4)
# 4	cuit	varchar(20)
# 5	tipo_cliente	varchar(20)
# 6	carnet	varchar(15)
# 7	direccion	varchar(100)
# 8	ciudad	varchar(25)
# 9	provincia	varchar(25)
# 10	pais	varchar(20)
# 11	codigo_postal	varchar(10)
# 12	email	text
# 13	pagina_web	varchar(50)
# 14	telefonos	text
# 15	fax	varchar(80)
# 16	vendedor	varchar(6)
# 17	informacion_contacto	text
# 18	observaciones	text
# 19	sucursal	varchar(15)
# 20	fecha	date
# 21	hora	time
#--------------------------------------


#--------------------------------------
#temporal mio
	echo '<td><input type="text" name="id'.$row["id"].'" id="id'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["id"].'"></td>';
	echo '<td><input type="text" name="razon_social'.$row["id"].'" id="razon_social'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["razon_social"].'"></td>';
	echo '<td><input type="text" name="nombres'.$row["id"].'" id="nombres'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["nombres"].'"></td>';
	echo '<td><input type="text" name="condicion_iva'.$row["id"].'" id="condicion_iva'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["condicion_iva"].'"></td>';
	echo '<td><input type="text" name="cuit'.$row["id"].'" id="cuit'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["cuit"].'"></td>';
	echo '<td><input type="text" name="tipo_cliente'.$row["id"].'" id="tipo_cliente'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["tipo_cliente"].'"></td>';
	echo '<td><input type="text" name="carnet'.$row["id"].'" id="carnet'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["carnet"].'"></td>';
	echo '<td><input type="text" name="direccion'.$row["id"].'" id="direccion'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["direccion"].'"></td>';
	echo '<td><input type="text" name="ciudad'.$row["id"].'" id="ciudad'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["ciudad"].'"></td>';
	echo '<td><input type="text" name="provincia'.$row["id"].'" id="provincia'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["provincia"].'"></td>';
	echo '<td><input type="text" name="pais'.$row["id"].'" id="pais'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["pais"].'"></td>';
	echo '<td><input type="text" name="codigo_postal'.$row["id"].'" id="codigo_postal'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["codigo_postal"].'"></td>';
	echo '<td><input type="text" name="email'.$row["id"].'" id="email'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["email"].'"></td>';
	echo '<td><input type="text" name="pagina_web'.$row["id"].'" id="pagina_web'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["pagina_web"].'"></td>';
	echo '<td><input type="text" name="telefonos'.$row["id"].'" id="telefonos'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["telefonos"].'"></td>';
	echo '<td><input type="text" name="fax'.$row["id"].'" id="fax'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["fax"].'"></td>';
	echo '<td><input type="text" name="vendedor'.$row["id"].'" id="vendedor'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["vendedor"].'"></td>';
	echo '<td><input type="text" name="informacion_contacto'.$row["id"].'" id="informacion_contacto'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["informacion_contacto"].'"></td>';
	echo '<td><input type="text" name="observaciones'.$row["id"].'" id="observaciones'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["observaciones"].'"></td>';
	echo '<td><input type="text" name="sucursal'.$row["id"].'" id="sucursal'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["sucursal"].'"></td>';
	echo '<td><input type="text" name="fecha'.$row["id"].'" id="fecha'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["fecha"].'"></td>';
	echo '<td><input type="text" name="hora'.$row["id"].'" id="hora'.$row["id"].'" size="4" onchange="calcular2('.$row["id"].');" value="'.$array_costos["hora"].'"></td>';
#--------------------------------------

?>


