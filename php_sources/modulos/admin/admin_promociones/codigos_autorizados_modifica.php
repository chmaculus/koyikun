<?php
if($_GET["id_codigos_autorizados"]){
    include_once("connect.php");
    $query='select * from codigos_autorizados where id="'.$_GET["id_codigos_autorizados"].'"';
    $array_codigos_autorizados=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}

/*
if($_GET["uuid_codigos_autorizados"]){
    include_once("connect.php");
    $query='select * from codigos_autorizados where uuid="'.$_GET["uuid_codigos_autorizados"].'"';
    $array_codigos_autorizados=mysql_fetch_array(mysql_query($query));
}
*/

?>
<form method="post" action="codigos_autorizados_update.php" name="form_codigos_autorizados">

<center>
<table class="t1" border="1">
	<tr>
		<th>tipo</th>
		<td><input type="text" name="tipo" id="tipo" value="<?php if($array_codigos_autorizados["tipo"]){echo $array_codigos_autorizados["tipo"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>codigo</th>
		<td><input type="text" name="codigo" id="codigo" value="<?php if($array_codigos_autorizados["codigo"]){echo $array_codigos_autorizados["codigo"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>fecha_vigencia</th>
		<td><input type="text" name="fecha_vigencia" id="fecha_vigencia" value="<?php if($array_codigos_autorizados["fecha_vigencia"]){echo $array_codigos_autorizados["fecha_vigencia"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>fecha_caducidad</th>
		<td><input type="text" name="fecha_caducidad" id="fecha_caducidad" value="<?php if($array_codigos_autorizados["fecha_caducidad"]){echo $array_codigos_autorizados["fecha_caducidad"];}?>" size="10"></td>
	</tr>
</table>

<?php
if($_GET["id_codigos_autorizados"] OR $array_codigos_autorizados["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_codigos_autorizados" value="'.$array_codigos_autorizados["id"].'">';
    echo '<input type="hidden" name="uuid_codigos_autorizados" value="'.$array_codigos_autorizados["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
