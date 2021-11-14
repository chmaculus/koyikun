<center>
<form action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>" method="post">
<input type="text" name="base64" value="<?php echo $_POST["base64"]; ?>" size="50">
<input type="submit" name="ACEPTAR" value="ACEPTAR">
<br>

<?php
echo base64_decode($_POST["base64"])."<br>";

?>
</form>
</center>
