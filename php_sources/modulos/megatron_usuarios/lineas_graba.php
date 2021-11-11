<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  <title>Tablabla usuarios_listas By Christian Máculus</title>
</head>



<center>
<?php
if($_GET["id_usuarios"]){
	$id_usuarios=$_GET["id_usuarios"];
}

if($_POST["id_usuarios"]){
	$id_usuarios=$_POST["id_usuarios"];
}

include("../includes/connect.php");


#------------------------------------------------------------------------------
if($_POST["LIMPIAR"]=="LIMPIAR") {
	$q='delete from usuarios_lineas where id_usuario="'.$id_usuarios.'"';
	echo $q."<br>";
	mysql_query($q);
	exit;
}
#------------------------------------------------------------------------------

if($_POST["clasificacion"]){
	$clasificacion=$_POST["clasificacion"];
}else{
	$clasificacion="TODAS";
}
if($_POST["subclasificacion"]){
	$subclasificacion=$_POST["subclasificacion"];
}else{
	$subclasificacion="TODAS";
}

if($_POST["marca"]){
	$q='insert into usuarios_lineas set id_usuario="'.$id_usuarios.'", marca="'.$_POST["marca"].'", 	clasificacion="'.$clasificacion.'", subclasificacion="'.$subclasificacion.'"';

	echo $q."<br>";
	mysql_query($q);
	if(mysql_error()) {
		echo mysql_error()."<br>";
	}
}



$query='select * from usuarios_lineas where id_usuario="'.$id_usuarios.'"';
$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


echo '<table class="t1">';
echo "<tr>";
	echo "<th>marca</th>";
	echo "<th>clasificacion</th>";
	echo "<th>subclasificacion</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["marca"].'</td>';
	echo '<td>'.$row["clasificacion"].'</td>';
	echo '<td>'.$row["subclasificacion"].'</td>';
	echo "</tr>".chr(10);
}
echo '</table>';


?>



<br>
<form action="<?php echo $S_SERVER["SCRIPT_NAME"]; ?>" method="post">
<?php echo '<input type="hidden" name="id_usuarios" value="'.$id_usuarios.'">'; ?>
<input type="submit" name="LIMPIAR" value="LIMPIAR">
</form>




</center>
