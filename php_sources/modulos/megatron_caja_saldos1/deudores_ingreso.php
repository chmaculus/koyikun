<?php
include("index.php");
include_once("../includes/connect.php");



if($_GET["id_cajas_deudores"]){
    $query='select * from cajas_deudores where id="'.$_GET["id_cajas_deudores"].'"';
    $array_cajas_deudores=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}
if($_GET["uuid_cajas_deudores"]){
    $query='select * from cajas_deudores where uuid="'.$_GET["uuid_cajas_deudores"].'"';
    $array_cajas_deudores=mysql_fetch_array(mysql_query($query));
}
?>
<form method="post" action="deudores_update.php" name="form_cajas_deudores">

<center>
<table class="t1" border="1">

	</tr>
	<tr>
		<th>deudor</th>
		<td><input type="text" name="deudor" id="deudor" value="<?php if($array_cajas_deudores["deudor"]){echo $array_cajas_deudores["deudor"];}?>" size="10"></td>
	</tr>

</table>



</table>

<?php
if($_GET["id_cajas_deudores"] OR $array_cajas_deudores["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_cajas_deudores" value="'.$array_cajas_deudores["id"].'">';
    echo '<input type="hidden" name="uuid_cajas_deudores" value="'.$array_cajas_deudores["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
