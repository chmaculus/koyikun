<?php
include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("seguridad.inc.php");

include_once("usuarios_base.php");
if($_GET["id_usuarios"]){
	include_once("connect.php");
	$query='select * from usuarios where id="'.$_GET["id_usuarios"].'"';
	$array_usuarios=mysql_fetch_array(mysql_query($query));
}else{
	$array_usuarios["jerarquia"]="2";
}

?>
<center>
<?php if($_GET["existe"]==1){echo "<alerta1>El usuario ".base64_decode($_GET["usuario"])." ya existe</alerta1><br>";}?>
<form method="post" action="usuarios_update.php" name="form_usuarios">
<table class="t1">

<tr>
	<th>Nombre</th>
	<td><input type="text" name="nombre" id="nombre" value="<?php if($array_usuarios["nombre"]){ echo $array_usuarios["nombre"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>Usuario</th>
	<td><input type="text" name="usuario" id="usuario" value="<?php if($array_usuarios["usuario"]){ echo $array_usuarios["usuario"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>Clave</th>
	<td><input type="password" name="contrasena" id="contrasena" value="<?php if($array_usuarios["contrasena"]){ echo $array_usuarios["contrasena"]; } ?>" size="10"></td>
</tr>
<tr>
	<th>Sucursal</th>
	<td>
		<?php 
		$id_sucursal=$array_usuarios["id_sucursal"];
		include("sucursal_select.inc.php"); 
		?>
	</td>
</tr>
<tr>
	<th>Jerarquia</th>
	<td><?php include("jerarquias.inc.php"); ?></td>
</tr>

</table>
<?php
if($_GET["id_usuarios"] OR $array_usuarios["id"]){
	echo '<input type="hidden" name="accion" value="modificacion">';
	echo '<input type="hidden" name="id_usuarios" value="'.$array_usuarios["id"].'">';
}else{
	echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
