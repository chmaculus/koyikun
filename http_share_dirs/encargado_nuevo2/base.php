<body bgcolor="#000000">
<body background="FONDO.png">

<center>
<table>

<?php

$prefijo="./modulos";
echo '<tr>'.chr(10);
	echo '<td><a class="heading" target="centro" href="'.$prefijo.'/enc_articulos/articulos_base.php"><img src="./botones/ARTICULOS.png"></a></td>'.chr(10);
	echo '<td><a class="heading" target="centro" href="'.$prefijo.'/enc_costos/index.php"><img src="./botones/COSTOS.png"></a></td>'.chr(10);
	echo '<td><a class="heading" target="centro" href="'.$prefijo.'/encargado_stock_ingreso1/index.php"><img src="./botones/INGRESO_STOCK_POR_COMPRA.png"></a></td>'.chr(10);
	echo '<td><a class="heading" target="centro" href="'.$prefijo.'/encargado_stock_modifica3/index.php"><img src="./botones/CARGA_STOCK_INDIVIDUAL.png"></a></td>'.chr(10);
	echo '<td><a class="heading" target="centro" href="'.$prefijo.'/encargado_pedidos/pedidos_base.php"><img src="./botones/PEDIDOS_SUCURSALES.png"></a></td>'.chr(10);
	echo '<td><a class="heading" target="centro" href="'.$prefijo.'/encargado_stock_movimiento_interno/base.php"><button>MOV INTERNO</button></a></td>'.chr(10);
	echo '</tr>';



	echo '<tr>';
	echo '<td><a class="heading" target="centro" href="'.$prefijo.'/encargado_reset_stock/index.php"><img src="./botones/RESET_STOCK.png"></a></td>'.chr(10);
	echo '<td><a class="heading" target="centro" href="'.$prefijo.'/encargado_pedidos_proveedor/index.php"><img src="./botones/PEDIDOS_PROVEEDORES.png"></a></td>'.chr(10);
	echo '<td><a class="heading" target="centro" href="'.$prefijo.'/encargado_pedidos_recepcion/index.php"><img src="./botones/PEDIDOS_RECEPCION.png"></a></td>'.chr(10);
	echo '<td><a target="centro" href="'.$prefijo.'/encargado_stock_modifica_frame/index.php"><img src="./botones/STOCK_POR_MARCA.png"></a></td>';
	echo '<td><a class="heading" target="centro" href="'.$prefijo.'/encargado_stock_seguimiento1/index.php"><img src="./botones/SEGUIMIENTO_STOCK.png"></a></td>'.chr(10);
	echo '<td><a target="centro" href="./login/login_finaliza.php"><img src="./botones/CERRAR_SESION.png"></a></td>'.chr(10);
	echo '</tr>';
	
	echo '<tr>';
	echo '<td><a target="centro" href="'.$prefijo.'/admin_estadisticas/reposicion2_2.php"><img src="./botones/GENERADOR_PEDIDO_CLASIFICADO.png"></a></td>';
	echo '<td><a target="centro" href="'.$prefijo.'/admin_estadisticas/reposicion2.php"><img src="./botones/GENERADOR_DE_PEDIDOS_POR_ROTACION.png"></a></td>';
	echo '<td><a target="centro" href="'.$prefijo.'/encargado_asistencias/index.php"><img src="./botones/ASISTENCIA.png"></a></td>';
	echo '<td><a target="centro" href="'.$prefijo.'/deposito_ingresos1/deposito_ingresos1_base.php"><img src="./botones/PEDIDOS_RECIBIDOS.png"></a></td>';
	echo '<td><a target="centro" href="'.$prefijo.'/encargado_stock_fijos/index.php"><img src="./botones/STOCK_FIJOS.png"></a></td>';
	
echo '</tr>'.chr(10);

?>
</table>
</center>
