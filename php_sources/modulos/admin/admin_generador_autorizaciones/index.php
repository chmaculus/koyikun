<?php
include_once("seguridad.inc.php");
include_once("cabecera.inc.php");

?>


<center>

<form action="index.php" method="POST">

Ingrese Numero de autorización<br><br><input type="text" name="numero" size="5" value="<?php echo $_POST["numero"];?>">
<input type="submit" name="ACEPTAR" value="ACEPTAR">

</form>

<?php
if($_POST["numero"]){
    echo '<br>El código de autorización es: ';
	echo ($_POST["numero"] * 2) + 7;
}
?>