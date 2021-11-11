<?php
include("cabecera.inc.php");
include("../includes/cabecera.inc.php");
//include("../includes/connect.php");



if($_GET["id_articulo"]){
    include("../includes/connect.php");
    $query='select * from articulos where id="'.$_GET["id_articulo"].'"';
    $array_articulos=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}

  	$qa='select * from stock_epmr where id_articulo="'.$_GET["id_articulo"].'"';
	$ra=mysql_query($qa);
	$rowa=mysql_num_rows($ra);
	if($rowa>0){
		$array_stock_epmr=mysql_fetch_array($ra);
		
	}

}
if($_GET["uuid_articulo"]){
    include("../includes/connect.php");
    $query='select * from articulos where uuid="'.$_GET["uuid_articulo"].'"';
    $array_articulos=mysql_fetch_array(mysql_query($query));
}



echo "<center>";
#----------------------------------------
echo '<table border="1">';
	echo '<tr>';
		echo '<th>id</th>';
		echo '<td>'.$array_articulos["id"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>codigo_interno</th>';
		echo '<td>'.$array_articulos["codigo_interno"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>marca</th>';
		echo '<td>'.$array_articulos["marca"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>descripcion</th>';
		echo '<td>'.$array_articulos["descripcion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>contenido</th>';
		echo '<td>'.$array_articulos["contenido"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>presentacion</th>';
		echo '<td>'.$array_articulos["presentacion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>codigo_barra</th>';
		echo '<td>'.$array_articulos["codigo_barra"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>fecha</th>';
		echo '<td>'.$array_articulos["fecha"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>hora</th>';
		echo '<td>'.$array_articulos["hora"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>clasificacion</th>';
		echo '<td>'.$array_articulos["clasificacion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>subclasificacion</th>';
		echo '<td>'.$array_articulos["subclasificacion"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>id_web</th>';
		echo '<td>'.$array_articulos["id_web"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>publicar_web</th>';
		echo '<td>'.$array_articulos["publicar_web"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>discontinuo</th>';
		echo '<td>'.$array_articulos["discontinuo"].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>observaciones</th>';
		echo '<td>'.$array_articulos["observaciones"].'</td>';
	echo '</tr>';
echo "</table>";
#----------------------------------------

?>
<br>
<form method="post" action="stock_epmr_update.php" name="form_stock_epmr">

<table class="t1" border="1">
	<tr>
		<th>estanteria</th>
		<td><input type="text" name="estanteria" id="estanteria" value="<?php if($array_stock_epmr["estanteria"]){echo $array_stock_epmr["estanteria"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>piso</th>
		<td><input type="text" name="piso" id="piso" value="<?php if($array_stock_epmr["piso"]){echo $array_stock_epmr["piso"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>modulo</th>
		<td><input type="text" name="modulo" id="modulo" value="<?php if($array_stock_epmr["modulo"]){echo $array_stock_epmr["modulo"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>reserva</th>
		<td><input type="text" name="reserva" id="reserva" value="<?php if($array_stock_epmr["reserva"]){echo $array_stock_epmr["reserva"];}?>" size="10"></td>
	</tr>

</table>


<?php echo '<input type="hidden" name="id_articulo" value="'.$array_articulos["id"].'">'; ?>

<?php
if($_GET["id_articulo"] OR $array_stock_epmr["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="id_stock_epmr" value="'.$array_stock_epmr["id"].'">';
    echo '<input type="hidden" name="uuid_stock_epmr" value="'.$array_stock_epmr["uuid"].'">';
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
