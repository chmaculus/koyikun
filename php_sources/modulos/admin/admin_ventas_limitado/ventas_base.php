<?php
include_once("../../includes/connect.php");

include("../../login/login_verifica.inc.php");
$jerarquia=$_COOKIE["jerarquia"];
#jrarquia 0 coresponde a administrador
if($jerarquia!="0"){
        header('Location: ../../login/login_nologin.php?nologin=6');
	        exit;
		}
		
		include_once("cabecera.inc.php");
?>
<center>
<titulo>ventas</titulo>

<table><tr>

<td>
	<A HREF="ventas_listado.php"><button>Listado</button></A>
</td>

<td>
	<A HREF="listado_x_vendedor.php"><button>Listado x vendedor</button></A>
</td>

</tr></table>

</center>
</body>
</html>