<?php
include("tarjetas_base.php");
if($_GET["id_tarjetas"]){
    include_once("../includes/connect.php");
    $query='select * from tarjetas where id="'.$_GET["id_tarjetas"].'"';
    $array_tarjetas=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}
if($_GET["uuid_tarjetas"]){
    include_once("../includes/connect.php");
    $query='select * from tarjetas where uuid="'.$_GET["uuid_tarjetas"].'"';
    $array_tarjetas=mysql_fetch_array(mysql_query($query));
}
?>
<form method="post" action="tarjetas_update.php" name="form_tarjetas">

<center>
<table class="t1" border="1">
	<tr>
		<th>id</th>
		<td><input type="text" name="id" id="id" value="<?php if($array_tarjetas["id"]){echo $array_tarjetas["id"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>tarjeta</th>
		<td><input type="text" name="tarjeta" id="tarjeta" value="<?php if($array_tarjetas["tarjeta"]){echo $array_tarjetas["tarjeta"];}?>" size="10"></td>
	</tr>

</table>



<?php
if($_GET["id_tarjetas"] OR $array_tarjetas["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_tarjetas" value="'.$array_tarjetas["id"].'">';
    echo '<input type="hidden" name="uuid_tarjetas" value="'.$array_tarjetas["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
