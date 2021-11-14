<?php
include("cabecera2.inc.php");
include("./includes/funciones_varias.inc.php");
include_once("./includes/funciones_tabla_gastos.php");
include_once("./includes/funciones_vendedor.php");
include_once("./includes/funciones_sucursal.php");
include_once("./includes/funciones_calculo.php");
include("connect.php");

echo "<center>";


echo '<table border="1">';
echo '<tr>';
echo '	<td width="350px" height="300px"><iframe width="100%" height="100%" src="asistencias_parte1.php"></iframe></td>';
echo '	<td width="350px" height="300px"><iframe width="100%" height="100%" src="asistencias_parte2.php"></iframe></td>';
echo '</tr><tr>';
echo '	<td width="350px" height="300px"><iframe width="100%" height="100%" src="asistencias_parte3.php"></iframe></td>';
echo '	<td width="350px" height="300px"><iframe width="100%" height="100%" src="asistencias_parte4.php"></iframe></td>';
echo '</tr>';
echo '</table>';




?>