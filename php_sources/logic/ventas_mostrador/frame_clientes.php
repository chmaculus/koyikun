<?php
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
?>
<html>
<head>
	<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
</head>
<script language="javascript">
	function pon_prefijo(pref,nombre) {
		parent.opener.document.formulario.codcliente.value=pref;
		parent.opener.document.formulario.nombre.value=nombre;
		parent.window.close();
	}
</script>
<? include ("../../includes/connect.php"); ?>
<body>
	<?
	
	$consulta="SELECT * FROM clientes limit 0,100";
	$rs_tabla = mysql_query($consulta);
	$nrs=mysql_num_rows($rs_tabla);
	?>
	<div id="tituloForm2" class="header">
		<div align="center">
			<form id="form1" name="form1">
				<? if ($nrs>0) { ?>
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="10%"><div align="center"><b>Codigo</b></div></td>
							<td width="30%"><div align="center"><b>Razon social/apellido</b></div></td>
							<td width="30%"><div align="center"><b>Nombres</b></div></td>
							<td width="20%"><div align="center"><b>DNI/CUIT</b></div></td>
							<td width="10%"><div align="center"></td>
							</tr>
							<?php
							while($row=mysql_fetch_array($rs_tabla)){
								$i++;

								if ($i % 2) { 
									$fondolinea="itemParTabla"; 
								} else { 
									$fondolinea="itemImparTabla"; 
								}
							?>
								<tr class="<?php echo $fondolinea?>">
									<td>
										<div align="center"><?php echo $row["id"];?>
									</div>
								</td>
								<td><div align="left"><?php echo utf8_encode($row["razon_social"]);?></div></td>
									<td><div align="center"><?php echo utf8_encode($row["nombres"]);?></div></td>
									<td><div align="center"><?php echo utf8_encode($row["cuit"]);?></div></td>
									<td align="center"><div align="center"><a href="javascript:pon_prefijo(<?php echo $row["id"]?>,'<?php echo $row["razon_social"]." ".$row["nombres"];?>')"><img src="../img/convertir.png" border="0" title="Seleccionar"></a></div></td>					
								</tr>
							<?php }?>
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
