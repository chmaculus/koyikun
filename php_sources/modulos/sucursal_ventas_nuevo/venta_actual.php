<?php
include_once("../../includes/connect.php");
include("cabecera.inc.php");


include_once("../../includes/funciones_precios.php");
include_once("../../includes/funciones_promocion.php");
include_once("../../includes/funciones_articulos.php");
include_once("../../includes/funciones_valores.php");

$id_session=$_COOKIE["id_session"];
$id_sucursal=$_COOKIE["id_sucursal"];

?>
<body>
<center>

<form action="venta_paso1.php" method="post">

<?php


echo "Venta Actual"."<br>";

///////////////////
include_once("includes/venta_muestra1.inc.php");
///////////////////


echo '<br><alerta1>Para eliminar un articulo colocar 0 en la cantidad</alerta1><br><br>';



?>
<input type="submit" name="accion" value="ACTUALIZAR">
<input type="submit" name="accion" value="FINALIZAR">
<input type="submit" name="accion" value="CANCELAR">
</form>
</center>
</body>
</html>

