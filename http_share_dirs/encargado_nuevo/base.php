<body bgcolor="#000000">
<center>
<table>

<?php
$prefijo='./modulos';

echo '<tr>';
echo '<td><a class="heading" target="centro" href="'.$prefijo.'/encargado_stock_movimiento/articulos_busqueda.php"><button>Mov Stock</button></a></td>';
echo '<td><a target="centro" href="./login/login_finaliza.php"><button>Cerrar session</button></a></td>';
echo '</tr>';

echo '<tr>';

echo '<td>	<a class="heading" target="centro" href="'.$prefijo.'/encargado_stock_movimiento/venta_actual.php"><button>Mov Actual</button></a></td>';

echo '<td>';
echo '<a target="centro" href="'.$prefijo.'/encargado_ventas_dia_limit/ventas_listado_limit.php"><button>Ventas dia 20</button></a>';
echo '</td>';

echo '</tr>';

?>

</table>
</center>
