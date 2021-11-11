<?php

include("cabecera.inc.php");
include("../includes/connect.php");
include("../includes/funciones.php");

$precio_dolar=round( get_value("1"), 2);
#get value=2 publico 
$margen=get_value("2");
$update=get_value("4");

?>
<body>
<div class="divarriba" id="divarriba">
<table border="1" class="table1">
<tr>

	<td class="td_column">
	<center>
	Precios
	<form method="post" action="cuerpo.php" target="framecentro">
	<table>
	<tr>
	<td>
		<table>
		<tr>
			<td>Categoría</td>
			<td><?php include("articulos_select_clasific.php");?></td>
		</tr>
		<tr>
			<td>Busqueda</td>
			<td><input type="text" name="busqueda" value="<?php echo $_POST["busqueda"]; ?>">
			<input type="submit" name="ACEPTAR" value="ACEPTAR">
			</td>
		</tr>
		</table>
	</td>
	<td>
		<table border=1>
		<tr><td>Precio Dolar</td><td>$<?php echo str_replace("." , "," ,$precio_dolar);?></td></tr>
		<tr><td>Ultima Actualizacion:</td><td><?php echo $update;?></td></tr>
		</table>	
	</td>
	</tr>
	</table>
	</center>
	</td>
	<input type="hidden" name="margen" value="<?php echo $margen; ?>">
	</form>
</tr>
</table>
</div>

	<div class="divcuerpo" name="divcuerpo" id="divcuerpo">
			<iframe name="framecentro" class="framecentro"></iframe>
	</div>

</body>
