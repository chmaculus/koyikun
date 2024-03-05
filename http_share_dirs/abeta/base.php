<head>
<style>



@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Koulen&family=Lato&family=Nunito&family=Playfair+Display:ital@1&family=Prata&family=Raleway:ital,wght@1,100&family=Roboto&family=Roboto+Condensed&family=Teko&display=swap');

.btn2 {
  min-width: 130px;
  height: 20px;
  color: #fff;
  padding: 5px 10px;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  display: inline-block;
  outline: none;
  border-radius: 5px;
  border: none;
  background-size: 120% auto;
  background-image: linear-gradient(315deg, #bdc3c7 0%, #2c3e50 75%);
}
.btn2:hover {
  background-position: right center;
}
.btn2:active {
  top: 2px;
}









.btn {
	box-shadow: 3px 2px 8px 4px #818510;
	background:linear-gradient(to bottom, #c8d607 5%, #eded00 100%);
	background-color:#c8d607;
	border-radius:20px;
	border:1px solid #e6e8da;
	display:inline-block;
	cursor:pointer;
	color:#3d353d;
	font-family:Verdana;
	font-size:12px;
	font-weight:bold;
	padding:3px 3px;
	text-decoration:none;
	text-shadow:0px 1px 0px #828a0b;
}
.btn:hover {
	background:linear-gradient(to bottom, #eded00 5%, #c8d607 100%);
	background-color:#eded00;
}
.btn:active {
	position:relative;
	top:1px;
}

.myButton2 {
	box-shadow: 3px 2px 8px -4px #818510;
	background:linear-gradient(to bottom, #dbaf00 5%, #d6ab00 100%);
	background-color:#dbaf00;
	border-radius:28px;
	border:1px solid #e6e8da;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Verdana;
	font-size:18px;
	font-weight:bold;
	padding:16px 31px;
	text-decoration:none;
	text-shadow:0px 1px 0px #828a0b;
}
.myButton2:hover {
	background:linear-gradient(to bottom, #d6ab00 5%, #dbaf00 100%);
	background-color:#d6ab00;
}
.myButton2:active {
	position:relative;
	top:1px;
}


.myButton3 {
	box-shadow: 3px 2px 8px -4px #818510;
	background:linear-gradient(to bottom, #447d02 5%, #198703 100%);
	background-color:#447d02;
	border-radius:28px;
	border:1px solid #e6e8da;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Verdana;
	font-size:18px;
	font-weight:bold;
	padding:16px 31px;
	text-decoration:none;
	text-shadow:0px 1px 0px #828a0b;
}
.myButton3:hover {
	background:linear-gradient(to bottom, #198703 5%, #447d02 100%);
	background-color:#198703;
}
.myButton3:active {
	position:relative;
	top:1px;
}

.myButton4 {
	box-shadow: 3px 2px 8px -4px #818510;
	background:linear-gradient(to bottom, #c8d607 5%, #eded00 100%);
	background-color:#c8d607;
	border-radius:28px;
	border:1px solid #e6e8da;
	display:inline-block;
	cursor:pointer;
	color:#3d353d;
	font-family:Verdana;
	font-size:18px;
	font-weight:bold;
	padding:16px 31px;
	text-decoration:none;
	text-shadow:0px 1px 0px #828a0b;
}
.myButton4:hover {
	background:linear-gradient(to bottom, #eded00 5%, #c8d607 100%);
	background-color:#eded00;
}
.myButton4:active {
	position:relative;
	top:1px;
}


</style>
</head>



<body bgcolor="#000000">
<body background="FONDO.png">
<center>
<table>

<?php
/*
MARG 2
MARG 1
COST
*/
$prefijo='./modulos';
echo '<tr>';
echo '	<td><a target="centro" class="btn2"  href="'.$prefijo.'/admin_costos_incremento/precios_modifica.php">COST-INC</a></td>';
echo '	<td><a target="centro" class="btn2"  href="'.$prefijo.'/admin_ventas/ventas_base.php">VENTAS</a></td>';
echo '	<td><a target="centro" class="btn2"  href="'.$prefijo.'/admin_articulos/articulos_base.php">ARTICULOS</a></td>';
echo '</tr>';

echo '<tr>';
echo '	<td><a target="centro" class="btn2"  href="'.$prefijo.'/admin_costos_modificacion/precios_modifica.php">COST-MOD</a></td>';
echo '	<td><a target="centro" class="btn2"  href="'.$prefijo.'/admin_ventas/ventas_export.php">EXCEL</a></td>';
echo '</tr>';

echo '<tr>';
echo '	<td><a target="centro" class="btn2"  href="'.$prefijo.'/admin_export/costos_excel.php">COST-XLS</a></td>';
echo '	<td><a target="centro" class="btn2"  href="'.$prefijo.'/admin_costos/costos_ingreso.php">COST</a></td>';
echo '	<td><a target="centro" class="btn2"  href="'.$prefijo.'/admin_precios_compara/precios_verifica.php">PRECIO VERIF</a></td>';
echo '	<td><a target="centro" class="btn2"  href="'.$prefijo.'/admin_articulos_listado/stock_listado.php">STOCK PRECIO</a></td>'.chr(10);
echo '	<td><a target="centro" class="btn2"  href="'.$prefijo.'/admin_reportes_caja/reportes_caja_listado.php">REPORT</a></td>';
/* echo '	<td><a target="centro" class="btn2"  href="'.$prefijo.'/admin_export/precios_excel.php"><img src="./botones/PRECIOS_EXCEL.png"></a></td>'.chr(10);*/
echo '</tr>';


echo '<tr>';
echo '	<td><a target="centro" class="btn2"  href="'.$prefijo.'/admin_listas2/">MARGENES II</a></td>';
echo '	<td><a target="centro" class="btn2"  href="'.$prefijo.'/admin_precios_diferencia/precios_diferencia.php">PRECIO DIF</a></td>';
echo '	<td><a target="centro" class="btn2"  href="../koyikun/login/login_finaliza.php">CERRAR SESION</a></td>'.chr(10);
/* echo '	<td><a target="centro" class="btn2"  href="'.$prefijo.'/logic/articulos/index.php"><img src="./botones/ARTICULOS_NUEVOS.png"></a></td>'.chr(10); */
echo '</tr>';

?>

</table>
</center>
