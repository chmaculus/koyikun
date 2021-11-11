<head>
	<link type="text/css" href="style.css" rel="stylesheet" />
</head>
<body>


<?php
include_once("../../login/login_verifica.inc.php");
include_once("../../includes/connect.php");

echo "<br><br>";
$id_vendedores=$_GET["id_vendedor"];
$query='select * from vendedores where id="'.$id_vendedores.'"';
$array_vendedores=mysql_fetch_array(mysql_query($query));


?>



<center>
<table class="t1">
<tr>
	<th>id</th>	<td><?php echo $array_vendedores["id"]; ?></td>
</tr>
<tr>
	<th>id_legajo</th>	<td><?php echo $array_vendedores["id_legajo"]; ?></td>
</tr>
<tr>
	<th>numero</th>	<td><?php echo $array_vendedores["numero"]; ?></td>
</tr>
<tr>
	<th>apellido</th>	<td><?php echo $array_vendedores["apellido"]; ?></td>
</tr>
<tr>
	<th>nombres</th>	<td><?php echo $array_vendedores["nombres"]; ?></td>
</tr>
<tr>
	<th>fecha</th>	<td><?php echo $array_vendedores["fecha"]; ?></td>
</tr>
<tr>
	<th>hora</th>	<td><?php echo $array_vendedores["hora"]; ?></td>
</tr>

<tr>
<th>Imagen</th>
<?php	
	echo "./vendedores/".$array_vendedores["id"].".jpg";
 if(file_exists ( "./vendedores/".$array_vendedores["id"].".jpg" )==1){
 		echo 'existe';
	 echo '<td><img  src="./vendedores/'.$array_vendedores["id"].'.jpg" width="100" height="110"></td>';
	}else{
 		echo 'no existe';
		echo '<td></td>';
	}
?>	

<tr>
	<th>Trasladar a:</th>	
	<td>
	<form action="vendedor_traslada_update.php" method="post">
<select name="id_sucursal">
<option value="seleccione" selected>seleccione</option>
<?php
$q='select id,sucursal from sucursales order by sucursal';
$res=mysql_query($q);
while($row=mysql_fetch_array($res)){
	echo '<option value="'.$row["id"].'">'.$row["sucursal"].'</option>'.chr(10);
}

?>
</select>
	
	</td>

	<td>
	<?php echo '<input type="hidden" name="vendedor" value="'.$array_vendedores["numero"].'">';
	
	?>
	<input type="submit" name="ACEPTAR" value="ACEPTAR">
	</form>
	</td>

</tr>
</table>

