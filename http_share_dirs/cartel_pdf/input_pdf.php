<center>
<form action="pdf.php" method="post">
<table border="1">
<tr>
	<td>Texto</td> 
	<td>Texto</td> 
	<td>Fuente</td> 
	<td>Tamano</td> 
	<td>Eje X</td> 
	<td>Eje Y</td> 
</tr>

<tr>
	<td>Marca</td>
	<td><input type="text" name="texto1" size="30" value="ELICA PLUS"></td>
	<td>
	<select name="font_texto1">
		<?php include("fuentes.inc.php")?>
	</select>
	</td> 
	<td><input type="text" name="tam1" value="60" size="5"></td>
	<td><input type="text" name="x_texto1" value="300" size="5"></td>
	<td><input type="text" name="y_texto1" value="520" size="5"></td>
</tr>

<tr>
	<td>Descripcion</td>
	<td><input type="text" name="texto2" size="30" value="Plancha para el cabello"></td>
	<td>
	<select name="font_texto2">
		<?php include("fuentes.inc.php")?>
	</select>
	</td> 
	<td><input type="text" name="tam2" value="30" size="5"></td>
	<td><input type="text" name="x_texto2" value="260" size="5"></td>
	<td><input type="text" name="y_texto2" value="490" size="5"></td>
</tr>
</table>

<table border="1">
<tr>
<td>
<textarea name="texto3" rows="10" cols="35">
ION + OZONO
-Sistema de placas flotantes.
-Regulador de temperatura
-Alcanza la temperatura deseada
en 30 segundos
-Cable giratorio sin fin
-Bivoltaje 110-240v
-Garantia 2 anos.
</textarea>
</td>
<td>
	<table border="1">
		Fuente<br>
	<select name="font_texto3">
		<?php include("fuentes.inc.php")?>
	</select><br>
		Tamano<br>
		<input type="text" name="tam3" value="22" size="5"><br>
		Eje X<br>
		<input type="text" name="x_texto3" value="50" size="5"><br>
		Eje Y<br>
		<input type="text" name="y_texto3" value="400" size="5"><br>
	</table>
</td>


<td>
<textarea name="texto4" rows="10" cols="35">
*Para cabello fino y delicado elija
una temperatura baja(80c)
*Para cabello normal o
levemente ondulado, elija una
temperatura media (120c)
*Para cabello grueso, con rizos o
dificiles de alisar, elija una
temperatura media alta (180c)
</textarea>
</td>
<td>
	<table border="1">
		Fuente<br>
	<select name="font_texto4">
		<?php include("fuentes.inc.php")?>
	</select><br>
		Tamano<br>
		<input type="text" name="tam4" value="12" size="5"><br>
		Eje X<br>
		<input type="text" name="x_texto4" value="540" size="5"><br>
		Eje Y<br>
		<input type="text" name="y_texto4" value="400" size="5"><br>
	</table>
</td>
</tr>
</table>


<table border="1">
<tr>
<td>
	<table>
		<tr>
				<td>Precio</td><td><input type="text" name="precio" size="10" value="$133,00"></td>
		</tr>
		<tr>
				<td>Fuente</td><td><select name="font_precio">
			<?php include("fuentes.inc.php")?>
		</select></td>
		</tr>
		<tr>
			<td>Tamano</td><td><input type="text" name="tam_precio" value="60" size="5"></td>
		</tr>
		<tr>
			<td>Eje X</td><td><input type="text" name="x_precio" value="300" size="5"></td>
		</tr>
		<tr>
			<td>Eje Y</td><td><input type="text" name="y_precio" value="50" size="5"></td>
		</tr>
	</table>
</td>

<td>
	Imagen
	<table border="1">

	<tr>
	<td>Eje X</td>
	<td><input type="text" name="x_image" value="650" size="5"></td>
	</tr>

	<tr>
	<td>Eje Y</td>
	<td><input type="text" name="y_image" value="30" size="5"></td>
	</tr>

	<tr>
	<td>Tamano</td>
	<td><input type="text" name="tam_image" value="150" size="5"></td>
	</tr>
	</table>
</td>

<td>
	<table>
	<tr>
		<td>Marca</td>
		<td><input type="text" name="marca" value="Arcmetal" size="10"></td>
	</tr>
	<tr>
		<td>Vigencia desde</td>
		<td><input type="text" name="desde" value="<?php echo date("d/n/Y");?>" size="10"></td>
	</tr>
	<tr>
		<td>Vigencia hasta</td>
		<td><input type="text" name="hasta" value="<?php echo date("d/n/Y");?>" size="10"></td>
	</tr>
	<tr>
		<td>Tamano</td>
		<td><input type="text" name="tam_marca" value="10" size="10"></td>
	</tr>
	<tr>
		<td>Eje X</td>
		<td><input type="text" name="x_marca" value="50" size="10"></td>
	</tr>
	<tr>
		<td>Eje y</td>
		<td><input type="text" name="y_marca" value="90" size="10"></td>
	</tr>
	<tr>
		<td>Int</td>
		<td><input type="checkbox" name="int" value="int"></td>
	</tr>
	<tr>
		<td>Ext</td>
		<td><input type="checkbox" name="ext" value="ext"></td>
	</tr>
	</table>
</td>


</tr>

</table>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
<?php

?>

