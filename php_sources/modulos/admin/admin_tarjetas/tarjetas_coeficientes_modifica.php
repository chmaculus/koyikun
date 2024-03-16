<?php
include("cabecera.inc.php");
echo "<center><br>";
if($_GET["id_tarjetas_coeficientes"]){
    include_once("../includes/connect.php");
    $query='select * from tarjetas_coeficientes where id="'.$_GET["id_tarjetas_coeficientes"].'"';
    $array_tarjetas_coeficientes=mysql_fetch_array(mysql_query($query));
    if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}
if($_GET["uuid_tarjetas_coeficientes"]){
    include_once("../includes/connect.php");
    $query='select * from tarjetas_coeficientes where uuid="'.$_GET["uuid_tarjetas_coeficientes"].'"';
    $array_tarjetas_coeficientes=mysql_fetch_array(mysql_query($query));
}


?>
<form method="post" action="tarjetas_coeficientes_update.php" name="form_tarjetas_coeficientes">


<table class="t1" border="1">
	<tr>
		<th>Tarjeta</th>
		<td><?php echo base64_decode($_GET["tarjeta"]);?></td>
	</tr>
	<tr>
		<th>cantidad_pagos</th>
		<td><input type="text" name="cantidad_pagos" id="cantidad_pagos" value="<?php if($array_tarjetas_coeficientes["cantidad_pagos"]){echo $array_tarjetas_coeficientes["cantidad_pagos"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>coeficiente</th>
		<td><input type="text" name="coeficiente" id="coeficiente" value="<?php if($array_tarjetas_coeficientes["coeficiente"]){echo $array_tarjetas_coeficientes["coeficiente"];}?>" size="10"></td>
	</tr>
	<tr>
		<th>fecha</th>
		<td><?php if($array_tarjetas_coeficientes["fecha"]){echo $array_tarjetas_coeficientes["fecha"];}?></td>
	</tr>
	<tr>
		<th>hora</th>
		<td><?php if($array_tarjetas_coeficientes["hora"]){echo $array_tarjetas_coeficientes["hora"];}?></td>
	</tr>

</table>


<?php
if($_GET["id_tarjetas_coeficientes"] OR $array_tarjetas_coeficientes["id"]){
    echo '<input type="hidden" name="accion" value="modificacion">';
    echo '<input type="hidden" name="uuid_tarjetas_coeficientes" value="'.$array_tarjetas_coeficientes["uuid"].'">';
    echo '<input type="hidden" name="id_tarjetas_coeficientes" value="'.$array_tarjetas_coeficientes["id"].'">';
    echo '<input type="hidden" name="url" value="'.$_GET["url"].'">';
    
}else{
    echo '<input type="hidden" name="accion" value="ingreso">';
    echo '<input type="hidden" name="id_tarjeta" value="'.$_GET["id_tarjeta"].'">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>
