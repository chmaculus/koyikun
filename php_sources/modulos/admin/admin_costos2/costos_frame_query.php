<?php

include_once("../../includes/connect.php");
include_once("cabecera.inc.php");

?>

<script language="javascript" src="js/jquery-1.3.min.js"></script>
<script language="javascript" src="funciones.js"></script>


<body>



<center>
<titulo>Modificacion de costos</titulo>

<?php
include_once("../../includes/funciones_costos.php");
include_once("../../includes/funciones_precios.php");

$fecha=date("Y-n-d");


echo '<form action="costos_frame_resultados.php" method="post" target="FrameCuerpo2" >';
echo '<table>';
echo '<tr>';
echo '<td>';
include("costos_tipo_cambio.inc.php");
echo '</td>';


echo '<td>';

include("select.inc.php");


echo '</td>';
echo '</tr>';
echo '</table>';




echo '<input type="submit" name="ACEPTAR" value="ACEPTAR"><br>';
echo "</form>";

