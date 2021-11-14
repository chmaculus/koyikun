
<body background="FONDO.png">
<center>
<table>

<?php
$prefijo="./modulos";
echo '<tr>'.chr(10);
/*







*/

echo '<td><a target="centro" href="'.$prefijo.'/admin_compras_listado/index.php"><img src="./botones/listadoporcompra.png"></a></td>';
echo '<td><a target="centro" href="'.$prefijo.'/admin_estadisticas/reposicion.php"><img src="./botones/REPOSICIONPORROTACION.png"></a></td>';
echo '<td><a target="centro" href="'.$prefijo.'/admin_estadisticas/reposicion2.php"><img src="./botones/GENERADORPEDIDOPORROTACION.png"></a></td>';
echo '<td><a target="centro" href="'.$prefijo.'/admin_estadisticas/reposicion_pedido.php"><img src="./botones/PEDIDOEMERGENCIA.png"></a></td>';
 echo '<td><a class="heading" target="centro" href="'.$prefijo.'/encargado_pedidos_proveedor/index.php"><img src="./botones/PEDIDOSPREPARADOS.png"></a></td>'.chr(10);
echo '</tr>'.chr(10);

echo '<tr>'.chr(10);
echo '<td><a target="centro" href="'.$prefijo.'/admin_estadisticas/paretto.php"><img src="./botones/rotaciongeneralpormarca.png"></a></td>';
echo '<td><a target="centro" href="'.$prefijo.'/admin_estadisticas/paretto_general.php"><img src="./botones/ROTACIONGENERALTOTAL.png"></a></td>';
echo '<td><a target="centro" href="'.$prefijo.'/admin_estadisticas/reposicion2_2.php"><img src="./botones/GENERADORDEPEDIDOCLASIFICADO.png"></a></td>';
echo '<td><a target="centro" href="'.$prefijo.'/admin_estadisticas/reposicion2_2_imprimir.php"><img src="./botones/GENERADORDEPEDIDOCLASIFICADOIMPR.png"></a></td>';
echo '<td><a target="centro" href="./login/login_finaliza.php"><img src="./botones/CERRARSESION.png"></a></td>'.chr(10);
echo '</tr>';

?>
</table>
</center>
