<? 
include("includes/connect.php");
?>
<html>
<head>
  <title>Facturacion Web</title>
  <script language="JavaScript" src="estructura/menu/JSCookMenu.js"></script>
  <link rel="stylesheet" href="estructura/menu/theme.css" type="text/css">
  <script language="JavaScript" src="estructura/menu/theme.js"></script>
  <script language="JavaScript">
var MenuPrincipal = [
	[null,'Inicio','central2.php','principal','Inicio'],
	[null,'Articulos',null,null,'Ventas clientes',
		[null,'Articulos','./modulos/admin_articulos/articulos_base.php','principal','Proveedores']
	],
	[null,'Costos',null,null,'Ventas clientes',
		[null,'Inc Costo','./modulos/admin_costos_incremento/precios_modifica.php','principal','Proveedores'],
		[null,'Margenes','./modulos/admin_margenes/margenes_ingreso.php','principal','Clientes'],
		
		[null,'Ingreso','./modulos/admin_costos/costos_ingreso.php','principal','Proveedores'],
		[null,'Modificar','./modulos/admin_costos_modificacion/precios_modifica.php','principal','Proveedores'],
		[null,'Detalle','./modulos/admin_costos_detalle/costos_detalle_base.php','principal','Proveedores'],
		[null,'Exportar','./modulos/admin_export/costos_excel.php','principal','Proveedores'],
		[null,'Precios compara','./modulos/admin_precios_compara/precios_verifica.php','principal','Proveedores'],
		[null,'Precios Diferencia','./modulos/admin_precios_diferencia/precios_diferencia.php','principal','Proveedores'],
		[null,'costos2','./modulos/admin_costos2/index.php','principal','Proveedores']
	],
	[null,'Ventas',null,null,'Ventas',
		[null,'Ventas','./modulos/admin_ventas/ventas_base.php','principal','Articulos'],
		[null,'Exportar','./modulos/admin_ventas/ventas_export.php','principal','Articulos']
		
	],
	[null,'Promociones',null,null,'Ventas clientes',
		[null,'Promociones','./modulos/admin_promociones/promociones_base.php','principal','Ventas Mostrador'],
		[null,'promociones x grupo','./modulos/admin_promociones_x_grupo/prueba2.php','principal','Facturas']
	],
	[null,'Listas',null,null,'Compras proveedores',
		[null,'Listas','./modulos/admin_listas/listas_base.php','principal','Proveedores'],
		[null,'Listas 2','./modulos/admin_listas2/listas_modifica.php','principal','Remitos']
	],
	[null,'Asistencia',null,null,'Tesoreria',
		[null,'Listado','./modulos/admin_asistencias/asistencias_listado.php','principal','Cobros']
	],
	[null,'Reportes',null,null,'Mantenimientos',
		[null,'Reportes','./modulos/admin_reportes_caja/reportes_caja_listado.php','principal','Etiquetas']
	],
	[null,'Stock',null,null,'Presupuestos',
		[null,'Stock','./modulos/admin_articulos_listado/stock_listado.php','principal','Presupuestos'],
		[null,'Reposición','./modulos/admin_stock_reposicion/index.php','principal','Presupuestos'],
		[null,'Min Max','./modulos/admin_stock_nuevo/index.php','principal','Presupuestos']
	],
	[null,'Creditos','creditos.php','principal','Creditos'],
	[null,'Cerrar session','creditos.php','principal','Creditos']
];

</script>
  <style type="text/css">
  body { background-color: rgb(255, 255,255);
    background-image: url(img/terra-blue.jpg);
    background-repeat: no-repeat;
	margin: 0px;
    }

  #MenuAplicacion { margin-left: 10px;
    margin-top: 0px;
    }


  </style>
</head>
<body>
<div id="MenuAplicacion" align="center"></div>
<script language="JavaScript">
<!--
	cmDraw ('MenuAplicacion', MenuPrincipal, 'hbr', cmThemeGray, 'ThemeGray');
-->
</script>
<iframe src="" name="principal" title="principal" width="100%" height="95%" frameborder=0 scrolling="auto" style="margin-left: 0px; margin-right: 0px; margin-top: 2px; margin-bottom: 0px;"></iframe>
</body>
</html>
