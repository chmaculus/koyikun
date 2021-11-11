<?php

include_once("../../includes/connect.php");
#include_once("../../login/login_verifica.inc.php");
include_once("cabecera.inc.php");

#jrarquia 0 coresponde a administrador
#if($jerarquia!="1"){
#	header('Location: ../../login/login_nologin.php?nologin=6');
#	exit;
#} 
?>

<center>
<titulo>Sistema de Pedidos</titulo>

<table><tr>

<td>
	<A HREF="pedidos_listado.php"><button>PEDIDOS PENDIENTES</button></A>
</td>

<td>
	<A HREF="pedidos_listado2.php"><button>PEDIDOS FINALIZADOS</button></A>
</td>

</tr></table>
<br>
<br>
<br>
</center>
</body>
</html>