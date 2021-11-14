<?php
include_once("login_verifica.inc.php");

if($jerarquia!="1"){
	/* Jerarquia 1 corresponde a sucursal encargado*/
	header('Location: login_nologin.php?nologin=8');
}

include_once("cabecera.inc.php");
?>


<center>
<titulo>N3Rv</titulo>

<table>
<tr>


<td><A href="datos_caja_ingreso.php"><button>C I</button></a></td>

<td><A href="comisiones_vendedores_ingreso.php"><button>C O I</button></a></td>

<td><A href="comisiones_finaliza.php"><button>C O F</button></a></td>

</tr>
</table>
</center>