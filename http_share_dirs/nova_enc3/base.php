<body bgcolor="#000000">
<center>
<table>

<?php
$prefijo="'.$prefijo.'";
echo '<tr>';
echo '<td><a target="centro" href="'.$prefijo.'/encargado_stock_modifica/stock_ingreso.php"><button>Stock</button></a></td>';
echo '<td><a target="centro" href="'.$prefijo.'/encargado_stock_modifica2/index.php"><button>Stock x codigo de barras</button></a></td>';
echo '<td><a class="heading" target="centro" href="'.$prefijo.'/encargado_stock_movimiento/articulos_busqueda.php"><button>Mov Stock</button></a></td>';

echo '<td><a target="centro" href="./login/login_finaliza.php"><button>Cerrar session</button></a></td>';
echo '<td></td>':
echo '<td>	<a class="heading" target="centro" href="'.$prefijo.'/encargado_stock_movimiento/venta_actual.php"><button>Mov Actual</button></a></td>';

echo '</tr>';


echo '<tr>';
echo '<td><a target="centro" href="'.$prefijo.'/encargado_stock_modifica_frame/index.php"><button>Stock2</button></a></td>';

echo '<tr>';

?>
</table>
</center>
