<?php

include_once("../../includes/connect.php");
include_once("../../login/login_verifica.inc.php");
include_once("cabecera.inc.php");

#jrarquia 0 coresponde a administrador
if($jerarquia!="1"){
	header('Location: ../../login/login_nologin.php?nologin=6');
	exit;
} 
?>



<center>
<titulo>PEDIDOS</titulo><br>
<br>

<table><tr>

<td>
	<A HREF="pedidos_listado_liberado.php"><button>ZONA 1 - 2 - 3</button></A>
</td>
<td>
	<A HREF="pedidos_listado_zona4.php"><button>ZONA 4</button></A>
</td>
<td>
	<A HREF="pedidos_listado_zona5.php"><button>ZONA 5</button></A>
</td>
<td>
	<A HREF="pedidos_faltante_fijo.php"><button>FALTAS</button></A>
</td>
</tr>


<tr>

<td>
	<A HREF="pedidos_listado_preparados.php"><button>PEDIDOS PREPARADOS</button></A>
</td>

<td>
	<A HREF="pedidos_listado_transito.php"><button>PEDIDOS TRANSITO</button></A>
</td>

<td>
	<A HREF="pedidos_listado_recibidos.php"><button>PEDIDOS RECIBIDOS</button></A>
</td>

<td>
	<A HREF="pedidos_listado_finalizados.php"><button>PEDIDOS FINALIZADOS</button></A>
</td>


</tr></table>
<br>




</center>
</body>
</html>