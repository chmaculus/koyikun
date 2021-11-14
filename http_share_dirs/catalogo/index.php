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



#-----------------------------------------------------------------------------------------------------
$fecha=date("Y-n-d");
$dia=$fecha=date("d");
$mes=$fecha=date("F");
$anio=$fecha=date("Y");
$hora=date("H:i:s");
echo '<p><img  src="./imagenes/miniaturas/af.jpg" width="120" height="120">';
echo '<img  src="./imagenes/miniaturas/ap.jpg" width="120" height="120"><br><br>';




echo '<font5>Catalogo on line '.base64_decode($_GET["marca"]).'</font5><br><br>';
echo $dia.' de '.$mes.' de '.$anio.' '.$hora.'<br><br>';
echo 'Precios validos por 2 dias a partir de la fecha o sujetos al stock del momento<br><br>';
echo 'Consultas: +54 9 261 722-5115<br>';
echo 'hola@almacendefragancias.com<br>';
echo 'San Martin 1418 - Mendoza - Argentina<br>';
echo 'www.almacendefragancias.com</p><br>';
#-----------------------------------------------------------------------------------------------------




$query='select * from articulos where marca="'.base64_decode($_GET["marca"]).'" order by descripcion';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<center>';
echo '<table id="t1">';
while($row=mysql_fetch_array($result)){
	$array_precios=array_precios($row["id"],1);
	echo "<tr>";
	echo '<td>ID: '.$row["id"];
	echo '<br>'.$row["marca"];
	echo '<br>'.$row["descripcion"];
	echo '<br>'.$row["color"];
	echo '<br>'.$row["contenido"];
	echo '<br>'.$row["presentacion"];
	
	echo '<br><br>';
	
	echo '<table border="0">';
	echo '	<tr><td>';
	echo '	<table border="0">';
	echo '		<tr><td>Contado</td><td><font4>$'.$array_precios["precio_base"].'</font4></td></tr>';
	echo '		<tr><td>Tarjeta</td><td><font4>$'.round(($array_precios["precio_base"] * 1.2),2).'</font4></td></tr>';
	echo '	</table>';
	echo '	</td>';

	echo '	<td>';
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo '	</td>';

	echo '	<td>';
	include("cantidades.inc.php");
	echo '	</td>';

	echo '	</tr>';
	echo '	</table>';
	
	if(file_exists ( "./imagenes/miniaturas/".$row["id"].".jpg" )==1){
	    echo '<td><img  src="./imagenes/miniaturas/'.$row["id"].'".jpg" width="200" height="200"></td>';
	 }else{
	    echo '<td><img  src="./imagenes/miniaturas/af.jpg" width="200" height="200"></td>';
	 }
	 
	echo "</tr>".chr(10);
}
?>
</table></center>

