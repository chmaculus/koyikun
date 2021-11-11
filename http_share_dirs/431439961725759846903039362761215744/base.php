<body bgcolor="#000000">
<center>
<table>

<?php

$prefijo='./modulos';
echo '<tr>';
echo '	<td><a target="centro" href="'.$prefijo.'/admin_costos_incremento/precios_modifica.php"><button>Inc Costos</button></a></td>';
echo '	<td><a target="centro" href="'.$prefijo.'/admin_margenes/margenes_ingreso.php"><button>Margenes</button></a></td>';
echo '	<td><a target="centro" href="'.$prefijo.'/admin_costos_detalle/costos_detalle_base.php"><button>Costos Det</button></a></td>';
echo '	<td><a target="centro" href="'.$prefijo.'/admin_ventas/ventas_base.php"><button>Ventas</button></a></td>';
echo '	<td><a target="centro" href="'.$prefijo.'/admin_promociones/promociones_base.php"><button>Promociones</button></a></td>';
echo '	<td><a target="centro" href="'.$prefijo.'/admin_listas/listas_base.php"><button>Listas</button></a></td>';
echo '	<td><a target="centro" href="'.$prefijo.'/admin_export/costos_excel.php"><button>Costos XLS</button></a></td>';
echo '	<td><a target="centro" href="../koyikun/login/login_finaliza.php"><button>Cerrar session</button></a></td>'.chr(10);
echo '</tr>';

echo '<tr>';
echo '	<td><a target="centro" href="'.$prefijo.'/admin_costos_modificacion/precios_modifica.php"><button>Mod Costos</button></a></td>';
echo '	<td><a target="centro" href="'.$prefijo.'/admin_costos/costos_ingreso.php"><button>Costos</button></a></td>';
echo '	<td><a target="centro" href="'.$prefijo.'/admin_articulos/articulos_base.php"><button>Articulos</button></a></td>';
echo '	<td><a target="centro" href="'.$prefijo.'/admin_ventas/ventas_export.php"><button>Excel</button></a></td>';
echo '	<td><a target="centro" href="'.$prefijo.'/admin_promociones_x_grupo/prueba2.php"><button>prueba2</button></a></td>';
echo '	<td><a target="centro" href="'.$prefijo.'/admin_listas2/listas_modifica.php"><button>Listas2</button></a></td>';
echo '	<td><a target="centro" href="'.$prefijo.'/admin_asistencias/asistencias_listado.php"><button>Asistencia</button></a></td>'.chr(10);
echo '	<td></td>';
echo '</tr>';

echo '<tr>';
echo '	<td><a target="centro" href="'.$prefijo.'/admin_precios_compara/precios_verifica.php"><button>P/Comp</button></a></td>';
echo '	<td><a target="centro" href="'.$prefijo.'/admin_precios_diferencia/precios_diferencia.php"><button>P/difer</button></a></td>';
echo '	<td><a target="centro" href="'.$prefijo.'/admin_reportes_caja/reportes_caja_listado.php"><button>Reportes</button></a></td>';
echo '	<td><a target="centro" href="'.$prefijo.'/admin_articulos_listado/stock_listado.php"><button>Listado Stk/precios</button></a></td>'.chr(10);
echo '	<td></td>';
echo '	<td></td>';
echo '	<td></td>';
echo '	<td></td>';
echo '</tr>';
?>

</table>
</center>
