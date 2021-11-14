<?php

echo '<form action="stock_update.inc.php" method="post">';
#------------------------------------------------------------------------------------------------
echo '<table class="t1">';
echo '<tr>';
echo '<td>Cantidad a ingresar</td>';
echo '</tr>';
echo '<tr>';
echo '<td><input type="text" name="cantidad" value="0" size="6"></td>';
echo '</tr>';
echo '</table>';


#------------------------------------------------------------------------------------------------


echo '<input type="hidden" name="stock" value="'.$row["stock"].'" />';
echo '<input type="hidden" name="query" value="'.base64_encode($q).'" />';
echo '<input type="hidden" name="id_articulos" value="'.$array_articulos["id"].'" />';
echo '<input type="submit" name="ACEPTAR" value="ACEPTAR" />';
echo "</form>";

?>
