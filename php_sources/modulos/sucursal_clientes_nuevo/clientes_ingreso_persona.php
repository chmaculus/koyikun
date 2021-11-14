<?php 
include_once("index.php");

//include_once("../../includes/connect.php");
//include_once("cabecera.inc.php");

include_once("../../includes/funciones_varias.php");
include("funciones.php");

$nombre_sucursal=nombre_sucursal( $_COOKIE["id_sucursal"] );

echo "<center>";
echo "<titulo>Ingreso de clientes</titulo><br>";


if($_GET["id_clientes"]){
	$query='select * from clientes_persona where id="'.$_GET["id_clientes"].'"';
	$array_clientes_persona=mysql_fetch_array(mysql_query($query));
	$id_clientes_persona=$_GET["id_clientes"];
	$id_cliente=$id_clientes_persona;
	
}
/*
$array_clientes_persona["apellido"]="Máculus";
$array_clientes_persona["nombres"]="Christian Ariel";
$array_clientes_persona["dni"]="26774478";
$array_clientes_persona["telefono"]="425706";
$array_clientes_persona["celular"]="156533991";
$array_clientes_persona["email"]="chmaculus@hotmail.com";
$array_clientes_persona["vendedor"]="21";
$array_clientes_persona["nombre_comercio"]="jejejejeje";
$array_clientes_persona["tel_comercial"]="4228842";
$array_clientes_persona["dom_comercial"]="Petr Arg. B11 dPto 4";
$array_clientes_persona["ciudad"]="G.C.";
$array_clientes_persona["provincia"]="Mza";
$array_clientes_persona["carnet"]="555";
$array_clientes_persona["codigo_barras"]="77915627384";
$array_clientes_persona["fecha_entrega"]="22/09/1978";
$array_clientes_persona["radio"]="Pehuenche, tobas, huarpes, puelches, escucha";
$array_clientes_persona["canal"]="2^10";
$array_clientes_persona["programas"]="Tinelli (Criterio de consumo acorde al material que consume)";
*/



?>
<center>
<form method="post" action="clientes_update.php">
<table border="1" class="t1">

<tr>
	<th>Apellido</th>
	<td><input type="text" name="apellido" value="<?php if($array_clientes_persona["apellido"]){ echo $array_clientes_persona["apellido"]; } ?>" size="20"></td>
</tr>
<tr>
	<th>Nombres</th>
	<td><input type="text" name="nombres" value="<?php if($array_clientes_persona["nombres"]){ echo $array_clientes_persona["nombres"]; } ?>" size="30"></td>
</tr>
<tr>
	<th>D.N.I.</th>
	<td><input type="text" name="dni" value="<?php if($array_clientes_persona["dni"]){ echo $array_clientes_persona["dni"]; }else{ echo "( opcional )"; } ?>" size="13"></td>
</tr>

<tr>
	<th>Estado civil</th>
	<td>
	<?php
		include("ingreso/estado_civil.inc.php");
	?>
	</td>
</tr>

<tr>
	<th>Teléfono</th>
	<td><input type="text" name="telefono" value="<?php if($array_clientes_persona["telefono"]){ echo $array_clientes_persona["telefono"]; } ?>" size="15"></td>
</tr>
<tr>
	<th>Celular</th>
	<td><input type="text" name="celular" value="<?php if($array_clientes_persona["celular"]){ echo $array_clientes_persona["celular"]; } ?>" size="20"></td>
</tr>
<tr>
	<th>Correo Electronico @</th>
	<td><input type="text" name="email" value="<?php if($array_clientes_persona["email"]){ echo $array_clientes_persona["email"]; } ?>" size="30"></td>
</tr>
<tr>
	<th>N.Carnet</th>
	<td><input type="text" name="carnet" value="<?php if($array_clientes_persona["carnet"]){ echo $array_clientes_persona["carnet"]; } ?>" size="13"></td>
</tr>

<tr>
	<th>Vendedor/a</th>
	<td><input type="text" name="vendedor" value="<?php if($array_clientes_persona["vendedor"]){ echo $array_clientes_persona["vendedor"]; } ?>" size="5"></td>
</tr>

<tr>
	<th>Profesión</th>
		<td>
		<?php
		include("ingreso/profesion.inc.php");
		?>
		</td>
</tr>
<tr>
	<th>Observaciones</th>
		<td>
			<textarea name="observaciones" rows="5" cols="40"><?php if($array_clientes_persona["observaciones"]){ echo $array_clientes_persona["observaciones"]; } ?></textarea>
		</td>
</tr>
</table>

<table border="1">
<tr>
<?php

include("ingreso/tarjetas_de_credito.inc.php");
?>
</tr>


<tr>
<?php
include("ingreso/cosmetologo.inc.php");
?>
</tr>

<tr>
<?php
include("ingreso/marcas_peluquero.inc.php");
?>
</tr>
</table>
Información comercial

<?php
include("ingreso/informacion_adicional.inc.php");
?>

<input type="hidden" name="sucursal"value="<?php echo $nombre_sucursal; ?>">


</table>
<?php
if($_GET["id_clientes"]){
	echo '<input type="hidden" name="accion" value="modificacion">';
	echo '<input type="hidden" name="id_clientes_persona" value="'.$array_clientes_persona["id"].'">';
}else{
	echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
