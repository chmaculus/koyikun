<?php
include("clientes_persona2_base.php");

if($_GET["id_clientes_persona2"]){
    include_once("../../includes/connect.php");
    $query='select * from clientes_persona2 where id="'.$_GET["id_clientes_persona2"].'"';
    $array_clientes_persona2=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}
if($_GET["uuid_clientes_persona2"]){
    include_once("connect.php");
    $query='select * from clientes_persona2 where uuid="'.$_GET["uuid_clientes_persona2"].'"';
    $array_clientes_persona2=mysql_fetch_array(mysql_query($query));
}
?>
<form method="post" action="clientes_persona2_update.php" name="form_clientes_persona2">

<center>
<table class="t1" border="1">
	<tr>
		<th>Apellido</th>
		<td><input type="text" name="apellido" id="apellido" value="<?php if($array_clientes_persona2["apellido"]){echo $array_clientes_persona2["apellido"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Nombres</th>
		<td><input type="text" name="nombres" id="nombres" value="<?php if($array_clientes_persona2["nombres"]){echo $array_clientes_persona2["nombres"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>D.N.I.</th>
		<td><input type="text" name="dni" id="dni" value="<?php if($array_clientes_persona2["dni"]){echo $array_clientes_persona2["dni"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Estado civil</th>
		<td><input type="text" name="estado_civil" id="estado_civil" value="<?php if($array_clientes_persona2["estado_civil"]){echo $array_clientes_persona2["estado_civil"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Telefono</th>
		<td><input type="text" name="telefono" id="telefono" value="<?php if($array_clientes_persona2["telefono"]){echo $array_clientes_persona2["telefono"];}?>" size="25"></td>
	</tr>
	<tr>
		<th>Celular</th>
		<td><input type="text" name="celular" id="celular" value="<?php if($array_clientes_persona2["celular"]){echo $array_clientes_persona2["celular"];}?>" size="25"></td>
	</tr>
	<tr>
		<th>E-mail</th>
		<td><input type="text" name="email" id="email" value="<?php if($array_clientes_persona2["email"]){echo $array_clientes_persona2["email"];}?>" size="30"></td>
	</tr>
	<tr>
		<th>Web</th>
		<td><input type="text" name="web" id="web" value="<?php if($array_clientes_persona2["web"]){echo $array_clientes_persona2["web"];}?>" size="15"></td>
	</tr>
	<tr>
		<th>Calle</th>
		<td><input type="text" name="calle" id="calle" value="<?php if($array_clientes_persona2["calle"]){echo $array_clientes_persona2["calle"];}?>" size="15"></td>
	</tr>
	<tr>
		<th>Numero</th>
		<td><input type="text" name="numero" id="numero" value="<?php if($array_clientes_persona2["numero"]){echo $array_clientes_persona2["numero"];}?>" size="6"></td>
	</tr>
	<tr>
		<th>Piso</th>
		<td><input type="text" name="piso" id="piso" value="<?php if($array_clientes_persona2["piso"]){echo $array_clientes_persona2["piso"];}?>" size="3"></td>
	</tr>
	<tr>
		<th>Dpto</th>
		<td><input type="text" name="dpto" id="dpto" value="<?php if($array_clientes_persona2["dpto"]){echo $array_clientes_persona2["dpto"];}?>" size="5"></td>
	</tr>
	<tr>
		<th>Localidad</th>
		<td><input type="text" name="localidad" id="localidad" value="<?php if($array_clientes_persona2["localidad"]){echo $array_clientes_persona2["localidad"];}?>" size="15"></td>
	</tr>
	<tr>
		<th>Departamento</th>
		<td><input type="text" name="departamento" id="departamento" value="<?php if($array_clientes_persona2["departamento"]){echo $array_clientes_persona2["departamento"];}?>" size="15"></td>
	</tr>
	<tr>
		<th>Provincia</th>
		<td><input type="text" name="provincia" id="provincia" value="<?php if($array_clientes_persona2["provincia"]){echo $array_clientes_persona2["provincia"];}?>" size="15"></td>
	</tr>
	<tr>
		<th>Pais</th>
		<td><input type="text" name="pais" id="pais" value="<?php if($array_clientes_persona2["pais"]){echo $array_clientes_persona2["pais"];}?>" size="13"></td>
	</tr>
	<tr>
		<th>Profesion</th>
		<td><input type="text" name="profesion" id="profesion" value="<?php if($array_clientes_persona2["profesion"]){echo $array_clientes_persona2["profesion"];}?>" size="20"></td>
	</tr>
	<tr>
		<th>Observaciones</th>
			<td><textarea name="observaciones" id="observaciones" rows="10" cols="33"><?php if($array_clientes_persona2["observaciones"]){echo $array_clientes_persona2["observaciones"];}?></textarea></td>	</tr>
	<tr>
		<th>Usa tarjeta</th>
		<td><input type="text" name="usa_tarjeta" id="usa_tarjeta" value="<?php if($array_clientes_persona2["usa_tarjeta"]){echo $array_clientes_persona2["usa_tarjeta"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Nombre del Comercio</th>
		<td><input type="text" name="nombre_comercio" id="nombre_comercio" value="<?php if($array_clientes_persona2["nombre_comercio"]){echo $array_clientes_persona2["nombre_comercio"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Tel Comercial</th>
		<td><input type="text" name="tel_comercial" id="tel_comercial" value="<?php if($array_clientes_persona2["tel_comercial"]){echo $array_clientes_persona2["tel_comercial"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Domicilio comercial</th>
		<td><input type="text" name="dom_comercial" id="dom_comercial" value="<?php if($array_clientes_persona2["dom_comercial"]){echo $array_clientes_persona2["dom_comercial"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Localidad comercio</th>
		<td><input type="text" name="localidad_comercio" id="localidad_comercio" value="<?php if($array_clientes_persona2["localidad_comercio"]){echo $array_clientes_persona2["localidad_comercio"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Dpto Comercio</th>
		<td><input type="text" name="dpto_comercio" id="dpto_comercio" value="<?php if($array_clientes_persona2["dpto_comercio"]){echo $array_clientes_persona2["dpto_comercio"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Calle del comercio</th>
		<td><input type="text" name="calle_comercio" id="calle_comercio" value="<?php if($array_clientes_persona2["calle_comercio"]){echo $array_clientes_persona2["calle_comercio"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Numero del comercio</th>
		<td><input type="text" name="numero_comercio" id="numero_comercio" value="<?php if($array_clientes_persona2["numero_comercio"]){echo $array_clientes_persona2["numero_comercio"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Piso del comercio</th>
		<td><input type="text" name="piso_comercio" id="piso_comercio" value="<?php if($array_clientes_persona2["piso_comercio"]){echo $array_clientes_persona2["piso_comercio"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>provincia_comercio</th>
		<td><input type="text" name="provincia_comercio" id="provincia_comercio" value="<?php if($array_clientes_persona2["provincia_comercio"]){echo $array_clientes_persona2["provincia_comercio"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>pais_comercio</th>
		<td><input type="text" name="pais_comercio" id="pais_comercio" value="<?php if($array_clientes_persona2["pais_comercio"]){echo $array_clientes_persona2["pais_comercio"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>carnet</th>
		<td><input type="text" name="carnet" id="carnet" value="<?php if($array_clientes_persona2["carnet"]){echo $array_clientes_persona2["carnet"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Codigo de barras</th>
		<td><input type="text" name="codigo_barras" id="codigo_barras" value="<?php if($array_clientes_persona2["codigo_barras"]){echo $array_clientes_persona2["codigo_barras"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Radio que escucha</th>
		<td><input type="text" name="radio" id="radio" value="<?php if($array_clientes_persona2["radio"]){echo $array_clientes_persona2["radio"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Canales que ve</th>
		<td><input type="text" name="canal" id="canal" value="<?php if($array_clientes_persona2["canal"]){echo $array_clientes_persona2["canal"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>Programas que ve</th>
		<td><input type="text" name="programas" id="programas" value="<?php if($array_clientes_persona2["programas"]){echo $array_clientes_persona2["programas"];}?>" size="10"></td>
	</tr>

</table>


<?php
if($_GET["id_clientes_persona2"] OR $array_clientes_persona2["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_clientes_persona2" value="'.$array_clientes_persona2["id"].'">';
    echo '<input type="hidden" name="uuid_clientes_persona2" value="'.$array_clientes_persona2["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
