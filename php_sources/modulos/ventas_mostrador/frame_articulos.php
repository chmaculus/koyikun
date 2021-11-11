<?php
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
?>
<html>
<head>
<link href="../../includes/css/logic/estilos.css" type="text/css" rel="stylesheet">
</head>
<script language="javascript">

function pon_prefijo(id, marca, descripcion, clasificacion, subclasificacion, precio) {
	parent.opener.document.formulario_lineas.id.value=id;
	parent.opener.document.formulario_lineas.marca.value=marca;
	parent.opener.document.formulario_lineas.descripcion.value=descripcion;
	parent.opener.document.formulario_lineas.clasificacion.value=clasificacion;
	parent.opener.document.formulario_lineas.subclasificacion.value=subclasificacion;
	parent.opener.document.formulario_lineas.precio.value=precio;
	parent.opener.actualizar_importe();
	parent.window.close();
}

</script>
<? include ("../../includes/connect.php"); 

#---------------------------------------------------------------------------------------------
function precio_sucursal( $id_articulo, $id_sucursal ){
        $query='select * from precios where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
        $res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
        $rows=mysql_num_rows($res);
        if($rows==1){
                $array_precios=mysql_fetch_array($res);
                $array_precios["query"]=$query;
                $array_precios["rows"]=$rows;
                return $array_precios;
        }
        if($rows<1){
                $array_precios["precio_base"]="0";
                $array_precios["porcentaje_contado"]="0";
                $array_precios["porcentaje_tarjeta"]="0";
                $array_precios["rows"]=$rows;
                $array_precios["query"]=$query;
                return $array_precios;
        }
return $array_precios;
}
#---------------------------------------------------------------------------------------------


















$familia=$_POST["cmbfamilia"];
$referencia=$_POST["referencia"];
$descripcion=$_POST["descripcion"];
$where="1=1";

if ($familia<>0) { $where.=" AND articulos.codfamilia='$familia'"; }
if ($referencia<>"") { $where.=" AND referencia like '%$referencia%'"; }
if ($descripcion<>"") { $where.=" AND descripcion like '%$descripcion%'"; } ?>
<body>
<?
	
#	$consulta="SELECT * FROM articulos WHERE ".$where." AND articulos.codfamilia=familias.codfamilia AND articulos.borrado=0 ORDER BY articulos.codfamilia ASC,articulos.descripcion ASC";
	$consulta="SELECT * FROM articulos limit 0,100";
	$rs_tabla = mysql_query($consulta);
	$nrs=mysql_num_rows($rs_tabla);
?>
<div id="tituloForm2" class="header">
<form id="form1" name="form1">
<? if ($nrs>0) { ?>
<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
 <tr>
<td width="15%"><div align="center"><b>ID</b></div></td>
<td width="15%"><div align="center"><b>Marca</b></div></td>
<td width="40%"><div align="center"><b>Descripci&oacute;n</b></div></td>
<td width="15%"><div align="center"><b>Clasificacion</b></div></td>
<td width="15%"><div align="center"><b>Subclasificacion</b></div></td>
<td width="20%"><div align="center"><b>contenido</b></div></td>
<td width="20%"><div align="center"><b>Presentacion</b></div></td>
<td width="20%"><div align="center"><b>Precio</b></div></td>
<td width="10%"><div align="center"></td>
 </tr>
<?php
while($row=mysql_fetch_array($rs_tabla)) {
	$precio=precio_sucursal($row["id"],1);
    $count++;
    if ($count % 2) { 
        $fondolinea="itemParTabla"; } 
    else { $fondolinea="itemImparTabla"; 
    }
		
	echo '<tr class="'.$fondolinea.'">';
		echo '<td><div align="center">'.$row["id"].'</div></td>';
		echo '<td><div align="center">'.$row["marca"].'</div></td>';
		echo '<td><div align="left">'.$row["descripcion"].'</div></td>';
		echo '<td><div align="left">'.$row["clasificacion"].'</div></td>';
		echo '<td><div align="left">'.$row["subclasificacion"].'</div></td>';
		echo '<td><div align="left">'.$row["contenido"].'</div></td>';
		echo '<td><div align="left">'.$row["presentacion"].'</div></td>';
		echo '<td><div align="left">'.$precio["precio_base"].'</div></td>';
		echo '<td align="center">';
//id, marca, descripcion, clasificacion, subclasificacion, precio)
		echo '<div align="center">';
?>
			<a href="javascript:pon_prefijo(<?php echo $row["id"]; ?>,
			'<?php echo $row["marca"]; ?>',
			'<?php echo $row["descripcion"]; ?>',
			'<?php echo $row["clasificacion"]; ?>',
			'<?php echo $row["subclasificacion"]; ?>',
			'<?php echo $precio["precio_base"]; ?>');">
<?php			
			echo '<img src="./img/convertir.png" border="0" title="Seleccionar"></a></div>
					</td>					
				</tr>';
			 }
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
</body>
</html>
