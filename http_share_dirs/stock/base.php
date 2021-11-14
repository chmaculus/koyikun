<?php
include("cabecera.inc.php");

?>

<body>
<center>

<table>
<tr>
<?php

$prefijo='./';

echo '<td><a target="centro" href="'.$prefijo.'/"><button>D1</button></a></td>';
echo '<td><a target="centro" href="'.$prefijo.'/"><button>DC</button></a></td>';
echo '<td><a target="centro" href="../login/login_finaliza.php"><button>Finalizar session</button></a></td>';
?>
</table>
<br>