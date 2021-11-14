<body bgcolor="#000000">
<center>
<table>
<tr>

<?php
$prefijo="./modulos";

echo '<td><a target="centro" href="'.$prefijo.'/admin_articulos/articulos_base.php"><button>Articulos</button></a></td>';
echo '<td><a target="centro" href="'.$prefijo.'/admin_StockReposicion/index.php"><button>Stock</button></a></td>';

echo '<td><a target="centro" href="'.$prefijo.'/admin_reportes_caja/reportes_caja_listado.php"><button>Reportes</button></a></td>';
echo '<td><a target="centro" href="'.$prefijo.'/admin_novedades/novedades_base.php"><button>Novedades</button></a></td>';
echo '<td><a target="centro" href="./login/login_finaliza.php"><button>Cerrar session</button></a></td>';
?>

</tr>

</table>
</center>
