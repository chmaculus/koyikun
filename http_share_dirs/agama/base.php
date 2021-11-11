<body bgcolor="#000000">
<center>
<table>

<?php

$prefijo='./modulos';
echo '<tr>';

//
echo '	<td><a target="centro" href="'.$prefijo.'/admin_costos/costos_ingreso.php"><button>Costos</button></a></td>';
echo '	<td><a target="centro" href="'.$prefijo.'/admin_articulos/articulos_base.php"><button>Articulos</button></a></td>';
echo '	<td><a target="centro" href="'.$prefijo.'/admin_costos_incremento/precios_modifica.php"><button>Inc Costos</button></a></td>';
echo '	<td><a target="centro" href="'.$prefijo.'/admin_margenes/margenes_ingreso.php"><button>Margenes</button></a></td>';
echo '	<td><a target="centro" href="'.$prefijo.'/logic/articulos/index.php"><button>Articulos Nuevo</button></a></td>'.chr(10);
echo '	<td><a target="centro" href="'.$prefijo.'/admin_articulos_codigo_barra/index.php"><button>Articulos codigo barra</button></a></td>'.chr(10);



echo '</tr>';

?>

</table>
</center>
