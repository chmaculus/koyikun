<?php
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 

include ("../includes/connect.php");
?>
<html>
<head>
	<title>Articulos</title>
	<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
	<script language="javascript" src="./index.js"></script>
</head>
<body onLoad="inicio()">
	<div id="pagina">
		<div id="zonaContenido">
			<div align="center">
				<div id="tituloForm" class="header">Buscar ARTICULO </div>
				
				<!--  inicio formulario busqueda  -->
				<div id="frmBusqueda"  align="left">
					<form id="form_busqueda" name="form_busqueda" method="post" action="listado.php" target="frame_rejilla">

						<?php include("./select/select.inc.php");?>

					</div>
					<!--  fin formulario busqueda  -->
					
					<div id="botonBusqueda"><img src="../img/botonbuscar.jpg" width="69" height="22" border="1" onClick="buscar()" onMouseOver="style.cursor=cursor">
						<img src="../img/botonlimpiar.jpg" width="69" height="22" border="1" onClick="limpiar_busqueda()" onMouseOver="style.cursor=cursor">
						<img src="../img/botonnuevoarticulo.jpg" width="111" height="22" border="1" onClick="nuevo_articulo()" onMouseOver="style.cursor=cursor">
						<img src="../img/botonimprimir.jpg" width="79" height="22" border="1" onClick="imprimir()" onMouseOver="style.cursor=cursor"></div>				
						<div id="lineaResultado">
							<table class="fuente8" width="80%" cellspacing=0 cellpadding=3 border=0>
								<tr>
									<td width="50%" align="left">N de articulos encontrados <input id="filas" type="text" class="cajaPequena" NAME="filas" maxlength="5" readonly></td>
									<td width="50%" align="right">Mostrados <select name="paginas" id="paginas" onChange="paginar()"></select></td>
								</table>
							</div>
							<div id="cabeceraResultado" class="header">relacion de ARTICULOS </div>

							<input type="hidden" id="iniciopagina" name="iniciopagina">
							<input type="hidden" id="cadena_busqueda" name="cadena_busqueda">
						</form>
						<div id="lineaResultado">
							<iframe width="100%" height="250" id="frame_rejilla" name="frame_rejilla" frameborder="0">
								<ilayer width="100%" height="250" id="frame_rejilla" name="frame_rejilla"></ilayer>
							</iframe>
						</div>
					</div>
				</div>			
			</div>
		</body>
		</html>
