<body bgcolor="#000000">
<center>
<table>

<?php

$prefijo='./modulos';
echo '<tr>';
echo '	<td><a target="centro" href="'.$prefijo.'/admin_articulos/articulos_base.php"><button>Articulos</button></a></td>';
echo '  <td><a target="centro" href="'.$prefijo.'/admin_ventas_limitado/ventas_base.php"><button>Ventas</button></a></td>';
echo '  <td><a target="centro" href="'.$prefijo.'/admin_reportes_caja/reportes_caja_listado.php"><button>Reportes</button></a></td>';
echo '  <td><a target="centro" href="'.$prefijo.'/admin_lanzamientos/lanzamientos_base.php"><button>Lanzamientos</button></a></td>'.chr(10);
echo '	<td><a target="centro" href="'.$prefijo.'/admin_promociones_dangerous_x_sucursal/index.php"><button>prom x grup x sucursal</button></a></td>';
echo '	<td><a target="centro" href="'.$prefijo.'/admin_vendedores/index.php"><button>Vendedores</button></a></td>'.chr(10);
echo '	<td><a target="centro" href="'.$prefijo.'/admin_cuota_alquiler/index.php"><button>A Influ</button></a></td>'.chr(10);
echo '	<td><a target="centro" href="'.$prefijo.'/admin_asistencias/asistencias_listado.php"><button>Asistencia</button></a></td>'.chr(10);
echo '</tr>';


?>

</table>
</center>
