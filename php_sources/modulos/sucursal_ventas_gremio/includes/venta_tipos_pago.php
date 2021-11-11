<?php

/*
formulario de tipos de pago

*/

echo '<table class="t1">';
echo '<tr>';
echo '<td><input type="radio" name="tipo_pago" value="contado" id="radio08"></td>';
echo '<td><font1>Contado</font1></td>';
echo '<td><font1>$'.$total_contado.'</font1></td>';
echo '</tr>';

echo '<tr>';
echo '<td><input type="radio" name="tipo_pago" value="debito" id="radio08"></td>';
echo '<td><font1>Débito</font1></td>';
echo '<td><font1>$'.$total_contado.'</font1></td>';
echo '</tr>';

echo '<tr>';
echo '<td><input type="radio" name="tipo_pago" value="tarjeta" id="radio08"></td>';
echo '<td><font1>Tarjeta</font1></td>';
echo '<td><font1>$'.$total_tarjeta.'</font1></td>';
echo '</tr>';
echo '</table>';



?>