<?php
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
?>
<html>
<head>
	<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
</head>


<script language="javascript">

	function pon_prefijo(codarticulo) {
		parent.opener.document.form_busqueda.codarticulo.value=codarticulo;
		parent.window.close();
	}

</script>


<? 
include ("../conectar.php"); 
$familia=$_POST["cmbfamilia"];
$referencia=$_POST["referencia"];
$descripcion=$_POST["descripcion"];
$where="1=1";

if ($familia<>0) { 
	$where.=" AND articulos.codfamilia='$familia'"; }

	if ($referencia<>"") { 
		$where.=" AND referencia like '%$referencia%'"; 
	}
	if ($descripcion<>"") { 
		$where.=" AND descripcion like '%$descripcion%'"; 
	} ?>

	<body>

		<?
		
		$consulta="SELECT * FROM koyikun.articulos";  
		$rs_tabla = mysql_query($consulta);
		$nrs=mysql_num_rows($rs_tabla);
		?>

		<div id="tituloForm2" class="header">
			<div align="center">
				<form id="form1" name="form1">
					<? if ($nrs>0) { ?>
						<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
							<tr>
								<td width="20%"><div align="center"><b>ID</b></div></td>
								<td width="20%"><div align="center"><b>Marca</b></div></td>
								<td width="20%"><div align="center"><b>Codigo interno</b></div></td>
								<td width="20%"><div align="center"><b>Descripcion</b></div></td>
								<td width="20%"><div align="center"><b>Color</b></div></td>
								<td width="20%"><div align="center"><b>Clasificacion</b></div></td>
								<td width="20%"><div align="center"><b>Sub clasificacion</b></div></td>
								<td width="20%"><div align="center"><b>Contenido</b></div></td>
								<td width="20%"><div align="center"><b>Presentacion</b></div></td>
								<td width="10%"><div align="center"></td>
								</tr>
								<?php
								$count=0;
								while ($row=mysql_fetch_array($rs_tabla)) {
									if ($count % 2) { 
										$fondolinea="itemParTabla"; 
									} else { 
										$fondolinea="itemImparTabla"; 
									}
									$count++;
									echo '<tr class="'.$fondolinea.'">';
									echo '<td><div align="left">'.$row["id"].'</div></td>';
									echo '<td><div align="left">'.$row["codigo_interno"].'</div></td>';
									echo '<td><div align="left">'.$row["marca"].'</div></td>';
									echo '<td><div align="left">'.$row["color"].'</div></td>';
									echo '<td><div align="left">'.$row["clasificacion"].'</div></td>';
									echo '<td><div align="left">'.$row["subclasificacion"].'</div></td>';
									echo '<td><div align="left">'.$row["contenido"].'</div></td>';
									echo '<td><div align="left">'.$row["presentacion"].'</div></td>';

									?>					
									<td align="left">
										<div align="left">
											<a href="javascript:pon_prefijo(<? echo $codarticulo?>)">
												<img src="../img/convertir.png" border="0" title="Seleccionar"></a>
											</div>
										</td>					

									</tr>
								<?php }
								?>
							</table>
							<?php 
						}  ?>
						<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
							<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
						</iframe>
						<input type="hidden" id="accion" name="accion">
					</form>
				</div>
			</div>
		</body>
		</html>
