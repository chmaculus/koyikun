<center>
<?php

include_once("cabecera.inc.php");
include_once("./includes/connect.php");
include_once("./includes/funciones_precios.php");




#-----------------------------------------------------------------------------------------------------
if(!$_GET["marca"]){
	echo '<form action="'.$_SERVER["SCRIPT_NAME"].'" method="get" >';

	//enctype="text/plain"

	$q='select distinct marca from articulos order by marca';
	$res=mysql_query($q);

	echo '<select name="marca">'.chr(10);
	if(!$_GET["marca"]){
		echo '<option value="" selected>Seleccione</option>'.chr(10);
	}else{
		echo '<option value="">Seleccione</option>'.chr(10);
	}
	

	while($row=mysql_fetch_array($res)){
		if(base64_decode($_GET["marca"])==$row["marca"] and $_GET["marca"]){
			echo '<option value="'.base64_encode($row["marca"]).'" selected>'.$row["marca"].'</option>'.chr(10);
		}else{
			echo '<option value="'.base64_encode($row["marca"]).'">'.$row["marca"].'</option>'.chr(10);
		}
	}

	echo '</select>'.chr(10);

	echo '<br><input type="submit" name="ACEPTAR" value="ACEPTAR">'.chr(10);
	echo '</form>'.chr(10);
	exit;
}
#-----------------------------------------------------------------------------------------------------

//echo "marca: ".$_GET["marca"].chr(10);





$query='select * from articulos where marca="'.base64_decode($_GET["marca"]).'" order by descripcion';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}

echo '<table><tr><td>';
$count=1;
while($row=mysql_fetch_array($result)){
	$count++;
	//if(($count)%2==0){
		echo '</td><td>'.chr(10).chr(10);
	//}
	include("muestra1.inc.php");

	if(($count)%2==0){
		echo '</tr><tr>'.chr(10).chr(10);
	}
}
echo '</table>';
?>
</center>

