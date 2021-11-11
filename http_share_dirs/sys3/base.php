<body bgcolor="#000000">
<center>

<table>
<tr>

<?php

$prefijo='./modulos';

echo '<td><a target="centro" href="'.$prefijo.'/megatron_usuarios/usuarios_base.php"><button>Usuarios</button></a></td>';
echo '<td><a target="centro" href="'.$prefijo.'/megatron_descuentos_autorizaciones/descuentos_autorizaciones_base.php"><button>Autorizaciones descuentos</button></a></td>';
/*
http://190.15.204.116/tron3/modulos/megatron_descuentos_autorizaciones/descuentos_autorizaciones_base.php
*/
echo '<td><a target="centro" href="'.$prefijo.'/megatron_sessiones_activas/sessiones_activas_listado.php"><button>Sessiones activas</button></a></td>';
echo '<td><a target="centro" href="'.$prefijo.'/megatron_valores/index.php"><button>Valores</button></a></td>';
echo '<td><a target="centro" href="'.$prefijo.'/megatron_reset_stock/index.php"><button>Reset Stk</button></a></td>';

echo '<td><a target="centro" href="./login/login_finaliza.php"><button>Finalizar session</button></a></td>';
?>


</tr>
</table>
</center>






