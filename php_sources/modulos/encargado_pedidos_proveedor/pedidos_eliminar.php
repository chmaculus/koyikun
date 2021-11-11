
<?php
include("pedidos_base.php");
echo "<br>";

include("../includes/connect.php");

#muestra registro ingresado
$query='select * from pedidos_proveedor where numero_pedido="'.$_GET["numero_pedido"].'"';
#echo "q: ".$query."<br>";
$result=mysql_query($query);
if(mysql_error()){
    echo mysql_error()." ".$query."<br>";
}

//$array_pedidos_proveedor=mysql_fetch_array($result);

include("pedidos_proveedor_muestra.inc.php");

?>

<form action="update2.php" method="post">
<input type="hidden" name="numero_pedido" value="<?php echo $_GET["numero_pedido"]; ?>">
<input type="submit" name="accion" value="ELIMINAR">
<input type="submit" name="accion" value="CANCELAR">
</form>